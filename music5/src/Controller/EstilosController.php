<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Estilos Controller
 *
 * @property \App\Model\Table\EstilosTable $Estilos
 */
class EstilosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Estilos->find();
        $estilos = $this->paginate($query);

        $this->set(compact('estilos'));
    }

    /**
     * View method
     *
     * @param string|null $id Estilo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estilo = $this->Estilos->get($id, contain: ['Artistas']);
        $this->set(compact('estilo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estilo = $this->Estilos->newEmptyEntity();
        if ($this->request->is('post')) {
            $estilo = $this->Estilos->patchEntity($estilo, $this->request->getData());
            if ($this->Estilos->save($estilo)) {
                $this->Flash->success(__('The estilo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estilo could not be saved. Please, try again.'));
        }
        $this->set(compact('estilo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Estilo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estilo = $this->Estilos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estilo = $this->Estilos->patchEntity($estilo, $this->request->getData());
            if ($this->Estilos->save($estilo)) {
                $this->Flash->success(__('The estilo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estilo could not be saved. Please, try again.'));
        }
        $this->set(compact('estilo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Estilo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estilo = $this->Estilos->get($id);
        if ($this->Estilos->delete($estilo)) {
            $this->Flash->success(__('The estilo has been deleted.'));
        } else {
            $this->Flash->error(__('The estilo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
