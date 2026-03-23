<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CdvariosDiscos Controller
 *
 * @property \App\Model\Table\CdvariosDiscosTable $CdvariosDiscos
 */
class CdvariosDiscosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->CdvariosDiscos->find()
            ->contain(['Cdvarios', 'Discos']);
        $cdvariosDiscos = $this->paginate($query);

        $this->set(compact('cdvariosDiscos'));
    }

    /**
     * View method
     *
     * @param string|null $id Cdvarios Disco id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cdvariosDisco = $this->CdvariosDiscos->get($id, contain: ['Cdvarios', 'Discos']);
        $this->set(compact('cdvariosDisco'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cdvariosDisco = $this->CdvariosDiscos->newEmptyEntity();
        if ($this->request->is('post')) {
            $cdvariosDisco = $this->CdvariosDiscos->patchEntity($cdvariosDisco, $this->request->getData());
            if ($this->CdvariosDiscos->save($cdvariosDisco)) {
                $this->Flash->success(__('The cdvarios disco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cdvarios disco could not be saved. Please, try again.'));
        }
        $cdvarios = $this->CdvariosDiscos->Cdvarios->find('list', limit: 200)->all();
        $discos = $this->CdvariosDiscos->Discos->find('list', limit: 200)->all();
        $this->set(compact('cdvariosDisco', 'cdvarios', 'discos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cdvarios Disco id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cdvariosDisco = $this->CdvariosDiscos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cdvariosDisco = $this->CdvariosDiscos->patchEntity($cdvariosDisco, $this->request->getData());
            if ($this->CdvariosDiscos->save($cdvariosDisco)) {
                $this->Flash->success(__('The cdvarios disco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cdvarios disco could not be saved. Please, try again.'));
        }
        $cdvarios = $this->CdvariosDiscos->Cdvarios->find('list', limit: 200)->all();
        $discos = $this->CdvariosDiscos->Discos->find('list', limit: 200)->all();
        $this->set(compact('cdvariosDisco', 'cdvarios', 'discos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cdvarios Disco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cdvariosDisco = $this->CdvariosDiscos->get($id);
        if ($this->CdvariosDiscos->delete($cdvariosDisco)) {
            $this->Flash->success(__('The cdvarios disco has been deleted.'));
        } else {
            $this->Flash->error(__('The cdvarios disco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
