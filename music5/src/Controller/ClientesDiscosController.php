<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Mailer\Mailer;
/**
 * ClientesDiscos Controller
 *
 * @property \App\Model\Table\ClientesDiscosTable $ClientesDiscos
 */
class ClientesDiscosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ClientesDiscos->find()
            ->contain(['Clientes', 'Discos']);
        $clientesDiscos = $this->paginate($query);

        $this->set(compact('clientesDiscos'));
    }

    /**
     * View method
     *
     * @param string|null $id Clientes Disco id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clientesDisco = $this->ClientesDiscos->get($id, contain: ['Clientes', 'Discos']);
        $this->set(compact('clientesDisco'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clientesDisco = $this->ClientesDiscos->newEmptyEntity();
        if ($this->request->is('post')) {
            $clientesDisco = $this->ClientesDiscos->patchEntity($clientesDisco, $this->request->getData());
            if ($this->ClientesDiscos->save($clientesDisco)) {
                $this->Flash->success(__('The clientes disco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clientes disco could not be saved. Please, try again.'));
        }
        $clientes = $this->ClientesDiscos->Clientes->find('list', limit: 200)->all();
        $discos = $this->ClientesDiscos->Discos->find('list', limit: 200)->all();
        $this->set(compact('clientesDisco', 'clientes', 'discos'));
    }

    public function grabaCarrito($idCliente=null)
    {
        $session = $this->request->getSession();
        $discosCarrito = $session->read('discos') ?? [];
        if($idCliente == null){
            $idCliente = $session->read('idCliente');
        }
        //$idCliente = $session->read('idCliente');
        // Validación robusta
        if (empty($idCliente) || empty($discosCarrito)) {
            $this->Flash->error(__('Se ha superado el tiempo para realizar la compra o el carrito está vacío.'));
            return $this->redirect([
                'controller' => 'Discos',
                'action' => 'tienda'
            ]);
        }

        foreach ($discosCarrito as $discoId) {

            $clientesDisco = $this->ClientesDiscos->newEmptyEntity();

            $clientesDisco = $this->ClientesDiscos->patchEntity($clientesDisco, [
                'cliente_id' => $idCliente,
                'disco_id' => $discoId,
                'pago' => 'contrareembolso'
            ]);

            if (!$this->ClientesDiscos->save($clientesDisco)) {
                $this->Flash->error(__('Error al guardar uno de los discos.'));
                return $this->redirect([
                    'controller' => 'Discos',
                    'action' => 'tienda'
                ]);
            }
        }

        // 🧹 limpiar carrito (MUY recomendable)
        $session->delete('discos');

        $this->Flash->success(__('Compra realizada correctamente.'));

        return $this->redirect([
            'action' => 'indexcliente'
        ]);
    }

    public function indexcliente()
    {
        $session = $this->request->getSession();
        $idCliente = $session->read('idCliente');

        if (empty($idCliente)) {
            $this->Flash->error(__('Se ha superado el tiempo para realizar la compra.'));
            return $this->redirect([
                'controller' => 'Discos',
                'action' => 'tienda'
            ]);
        }

        $query = $this->ClientesDiscos->find()
            ->contain(['Clientes', 'Discos'])
            ->where([
                'cliente_id' => $idCliente,
                'finalizado' => 0
            ]);

        $clientesDiscos = $this->paginate($query);

        $this->set(compact('clientesDiscos'));
    }

    public function formapago()
    {
        if($this->request->is('ajax')){
            //recibimos por ajax el id del cliente y la forma de pago
            $id=$this->request->getData('id');
            $pago=$this->request->getData('fpago');
            //buscamos los registros de ese cliente y grabamos la forma de pago para cada uno de ellos
            $clientes=$this->ClientesDiscos->find('all')->where(['cliente_id'=>$id]);
            foreach($clientes as $cliente){
                $clientesDisco = $this->ClientesDiscos->get($cliente->id, [
                    'contain' => []
                ]);
                $clientesDisco = $this->ClientesDiscos->patchEntity($clientesDisco, ['pago'=>$pago]);
                $this->ClientesDiscos->save($clientesDisco);
            }
        return $this->redirect(['action' => 'muestracompra']);
        }
        
        //$this->autoRender=false;
    }

    public function muestracompra()
    {
        $this->paginate = [
            'contain' => ['Clientes', 'Discos']
        ];
        $session = $this->request->getSession();
        $id=$session->read('idCliente');
        if(isset($id)){
            $clientesDiscos=$this->ClientesDiscos->find('all')
                                             ->where(['cliente_id'=>$id]);
            $this->set('clientesDiscos', $this->paginate($clientesDiscos));
            $this->set('_serialize', ['clientesDiscos']);

            //buscamos la provincia del cliente para poder mostrarla en la vista
            foreach($clientesDiscos as $provCliente){
                $provincia=$provCliente->cliente->provincia_id;
            }
            $provincias=$this->ClientesDiscos->Clientes->Provincias->find()->select('name')->where(['id'=>$provincia]);
            $this->set('provincias', $provincias);
        }else{
            $this->Flash->error(__('Se ha superado el tiempo para realizar la compra. Por favor, vuelve a seleccionar los discos'));
            return $this->redirect(array('controller' => 'discos', 'action' => 'tienda'));
        }
        
    }

    public function finalizacompra($total=null)
    {
        $session = $this->request->getSession();
        $id=$session->read('idCliente');
        $session->write('total', $total);
        
        $clientes=$this->ClientesDiscos->find('all')->where(['cliente_id'=>$id]);
                
        foreach($clientes as $cliente){
            if($cliente->pago != "PayPal"){
                return $this->redirect(['action' => 'avisacompra']);
            }
        }       
               
        $this->set(compact('clientes', 'total'));
        
        
    }

    public function mailtoadmin($user=null){
        /*Para este ejemplo no necesito de renderizar
          una vista por lo que autorender lo pongo a false
         */
        $this->autoRender = false;
        /*enviando el correo*/
        $correo = new Mailer(); //instancia de correo
        $correo
          ->transport('default') //nombre del configTrasnport que acabamos de configurar
          ->template('correovtatienda') //plantilla a utilizar
          ->emailFormat('html') //formato de correo
          ->to('javierhernandezcollado@gmail.com') //correo para
          ->from('info@hermanmusic.formatext.es') //correo de
          ->subject('Correo de aviso de venta de CD en la tienda de hermanmusic') //asunto
          ->viewVars([ //enviar variables a la plantilla
            'var1' => $user
          ]);
        
        if($correo->send()){
           return $this->redirect(['action' => 'pagofinalizadotienda']);
        }else{
           $this->Flash->error(__('Se ha superado el tiempo para realizar la compra. Por favor, vuelve a seleccionar los discos'));
           return $this->redirect(['controller'=>'discos', 'action' => 'tienda']);
        }    
    }

    public function avisacompra()
    {
        $this->autoRender = false;
        $session = $this->request->getSession();
        $id=$session->read('idCliente');
        $this->mailtoadmin($id);
    }

    public function pagofinalizadotienda()
    {
        $session = $this->request->getSession();
        $id=$session->read('idCliente');
        
        $total=$session->read('total');
        $clientes=$this->ClientesDiscos->find('all', ['contain' => ['Discos']])->where(['cliente_id'=>$id]);
        foreach($clientes as $cliente){
            $clientesDisco = $this->ClientesDiscos->get($cliente->id, [
                    'contain' => []
                ]);
            $clientesDisco = $this->ClientesDiscos->patchEntity($clientesDisco, ['finalizado'=>1]);
                $this->ClientesDiscos->save($clientesDisco);                
        }
        
        //ponemos los discos vendidos en venta=no
        
        $discosCarrito=$session->read('discos');
        for($i=0; $i<count($discosCarrito); $i++){
            $discos=$this->fetchTable('Discos')->find('all')->where(['id'=>$discosCarrito[$i]]);
            foreach($discos as $disco){
                $novtaDisco = $this->Discos->get($disco->id, [
                    'contain' => []
                ]);
                $novtaDisco = $this->Discos->patchEntity($novtaDisco, ['vta'=>0]);
                $this->Discos->save($novtaDisco);
            }
        }
        
        $this->set(compact('clientes', 'total'));
        
        //borramos variables de sesión involucradas en la compra
        $session->delete('discos', 'idCliente', 'total');

        
    }

    /**
     * Edit method
     *
     * @param string|null $id Clientes Disco id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clientesDisco = $this->ClientesDiscos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clientesDisco = $this->ClientesDiscos->patchEntity($clientesDisco, $this->request->getData());
            if ($this->ClientesDiscos->save($clientesDisco)) {
                $this->Flash->success(__('The clientes disco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clientes disco could not be saved. Please, try again.'));
        }
        $clientes = $this->ClientesDiscos->Clientes->find('list', limit: 200)->all();
        $discos = $this->ClientesDiscos->Discos->find('list', limit: 200)->all();
        $this->set(compact('clientesDisco', 'clientes', 'discos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Clientes Disco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clientesDisco = $this->ClientesDiscos->get($id);
        if ($this->ClientesDiscos->delete($clientesDisco)) {
            $this->Flash->success(__('The clientes disco has been deleted.'));
        } else {
            $this->Flash->error(__('The clientes disco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
