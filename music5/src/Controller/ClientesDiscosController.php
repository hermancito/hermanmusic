<?php
declare(strict_types=1);

namespace App\Controller;

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
