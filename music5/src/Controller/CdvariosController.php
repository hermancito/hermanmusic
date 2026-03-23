<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cdvarios Controller
 *
 * @property \App\Model\Table\CdvariosTable $Cdvarios
 */
class CdvariosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Cdvarios->find()
            ->contain(['Users']);
        $cdvarios = $this->paginate($query);

        $this->set(compact('cdvarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Cdvario id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cdvario = $this->Cdvarios->get($id, contain: ['Users', 'Clientes', 'Discos']);
        $this->set(compact('cdvario'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cdvario = $this->Cdvarios->newEmptyEntity();
        if ($this->request->is('post')) {
            $cdvario = $this->Cdvarios->patchEntity($cdvario, $this->request->getData());
            if ($this->Cdvarios->save($cdvario)) {
                $this->Flash->success(__('The cdvario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cdvario could not be saved. Please, try again.'));
        }
        $users = $this->Cdvarios->Users->find('list', limit: 200)->all();
        $clientes = $this->Cdvarios->Clientes->find('list', limit: 200)->all();
        $discos = $this->Cdvarios->Discos->find('list', limit: 200)->all();
        $this->set(compact('cdvario', 'users', 'clientes', 'discos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cdvario id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cdvario = $this->Cdvarios->get($id, contain: ['Clientes', 'Discos']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cdvario = $this->Cdvarios->patchEntity($cdvario, $this->request->getData());
            if ($this->Cdvarios->save($cdvario)) {
                $this->Flash->success(__('The cdvario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cdvario could not be saved. Please, try again.'));
        }
        $users = $this->Cdvarios->Users->find('list', limit: 200)->all();
        $clientes = $this->Cdvarios->Clientes->find('list', limit: 200)->all();
        $discos = $this->Cdvarios->Discos->find('list', limit: 200)->all();
        $this->set(compact('cdvario', 'users', 'clientes', 'discos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cdvario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cdvario = $this->Cdvarios->get($id);
        if ($this->Cdvarios->delete($cdvario)) {
            $this->Flash->success(__('The cdvario has been deleted.'));
        } else {
            $this->Flash->error(__('The cdvario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
