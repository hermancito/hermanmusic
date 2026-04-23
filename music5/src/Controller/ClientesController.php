<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Clientes Controller
 *
 * @property \App\Model\Table\ClientesTable $Clientes
 */
class ClientesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Clientes->find()
            ->contain(['Provincias']);
        $clientes = $this->paginate($query);

        $this->set(compact('clientes'));
    }

    /**
     * View method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cliente = $this->Clientes->get($id, contain: ['Provincias', 'Cdvarios', 'Discos']);
        $this->set(compact('cliente'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cliente = $this->Clientes->newEmptyEntity();
        if ($this->request->is('post')) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $provincias = $this->Clientes->Provincias->find('list', limit: 200)->all();
        $cdvarios = $this->Clientes->Cdvarios->find('list', limit: 200)->all();
        $discos = $this->Clientes->Discos->find('list', limit: 200)->all();
        $this->set(compact('cliente', 'provincias', 'cdvarios', 'discos'));
    }

    public function adcliente()
    {
        $cliente = $this->Clientes->newEmptyEntity();
        if ($this->request->is('post')) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                
                //obtenemos el ultimo id de cliente grabado y escribimos vble de sesión
                $lastId= $this->Clientes->find('all')->all();
                $lastRow=$lastId->last();
                $idCliente=$lastRow->id;
                $session = $this->request->getSession();
                $session->write('idCliente', $idCliente);

                $this->Flash->success(__('Sus datos de cliente han sido grabados.'));
                return $this->redirect(['controller'=>'ClientesDiscos', 'action' => 'grabaCarrito']);
            } else {
                $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
            }
        }
        
        $provincias = $this->Clientes->Provincias->find('list', ['limit' => 200]);
        $this->set(compact('cliente', 'provincias'));
        $this->set('_serialize', ['cliente']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cliente = $this->Clientes->get($id, contain: ['Cdvarios', 'Discos']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $provincias = $this->Clientes->Provincias->find('list', limit: 200)->all();
        $cdvarios = $this->Clientes->Cdvarios->find('list', limit: 200)->all();
        $discos = $this->Clientes->Discos->find('list', limit: 200)->all();
        $this->set(compact('cliente', 'provincias', 'cdvarios', 'discos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cliente = $this->Clientes->get($id);
        if ($this->Clientes->delete($cliente)) {
            $this->Flash->success(__('The cliente has been deleted.'));
        } else {
            $this->Flash->error(__('The cliente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
