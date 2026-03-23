<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Discos Controller
 *
 * @property \App\Model\Table\DiscosTable $Discos
 */
class DiscosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Discos->find();
        $discos = $this->paginate($query);

        $this->set(compact('discos'));
    }

    /**
     * View method
     *
     * @param string|null $id Disco id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $disco = $this->Discos->get($id, contain: ['Cdvarios', 'Clientes', 'Songs']);
        $this->set(compact('disco'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $disco = $this->Discos->newEmptyEntity();
        if ($this->request->is('post')) {
            $disco = $this->Discos->patchEntity($disco, $this->request->getData());
            if ($this->Discos->save($disco)) {
                $this->Flash->success(__('The disco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The disco could not be saved. Please, try again.'));
        }
        $cdvarios = $this->Discos->Cdvarios->find('list', limit: 200)->all();
        $clientes = $this->Discos->Clientes->find('list', limit: 200)->all();
        $this->set(compact('disco', 'cdvarios', 'clientes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Disco id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $disco = $this->Discos->get($id, contain: ['Cdvarios', 'Clientes']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $disco = $this->Discos->patchEntity($disco, $this->request->getData());
            if ($this->Discos->save($disco)) {
                $this->Flash->success(__('The disco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The disco could not be saved. Please, try again.'));
        }
        $cdvarios = $this->Discos->Cdvarios->find('list', limit: 200)->all();
        $clientes = $this->Discos->Clientes->find('list', limit: 200)->all();
        $this->set(compact('disco', 'cdvarios', 'clientes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Disco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $disco = $this->Discos->get($id);
        if ($this->Discos->delete($disco)) {
            $this->Flash->success(__('The disco has been deleted.'));
        } else {
            $this->Flash->error(__('The disco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
