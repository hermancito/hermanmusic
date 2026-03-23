<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CdvariosClientes Controller
 *
 * @property \App\Model\Table\CdvariosClientesTable $CdvariosClientes
 */
class CdvariosClientesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->CdvariosClientes->find()
            ->contain(['Cdvarios', 'Clientes']);
        $cdvariosClientes = $this->paginate($query);

        $this->set(compact('cdvariosClientes'));
    }

    /**
     * View method
     *
     * @param string|null $id Cdvarios Cliente id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cdvariosCliente = $this->CdvariosClientes->get($id, contain: ['Cdvarios', 'Clientes']);
        $this->set(compact('cdvariosCliente'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cdvariosCliente = $this->CdvariosClientes->newEmptyEntity();
        if ($this->request->is('post')) {
            $cdvariosCliente = $this->CdvariosClientes->patchEntity($cdvariosCliente, $this->request->getData());
            if ($this->CdvariosClientes->save($cdvariosCliente)) {
                $this->Flash->success(__('The cdvarios cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cdvarios cliente could not be saved. Please, try again.'));
        }
        $cdvarios = $this->CdvariosClientes->Cdvarios->find('list', limit: 200)->all();
        $clientes = $this->CdvariosClientes->Clientes->find('list', limit: 200)->all();
        $this->set(compact('cdvariosCliente', 'cdvarios', 'clientes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cdvarios Cliente id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cdvariosCliente = $this->CdvariosClientes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cdvariosCliente = $this->CdvariosClientes->patchEntity($cdvariosCliente, $this->request->getData());
            if ($this->CdvariosClientes->save($cdvariosCliente)) {
                $this->Flash->success(__('The cdvarios cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cdvarios cliente could not be saved. Please, try again.'));
        }
        $cdvarios = $this->CdvariosClientes->Cdvarios->find('list', limit: 200)->all();
        $clientes = $this->CdvariosClientes->Clientes->find('list', limit: 200)->all();
        $this->set(compact('cdvariosCliente', 'cdvarios', 'clientes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cdvarios Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cdvariosCliente = $this->CdvariosClientes->get($id);
        if ($this->CdvariosClientes->delete($cdvariosCliente)) {
            $this->Flash->success(__('The cdvarios cliente has been deleted.'));
        } else {
            $this->Flash->error(__('The cdvarios cliente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
