<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Artistas Controller
 *
 * @property \App\Model\Table\ArtistasTable $Artistas
 */
class ArtistasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Artistas->find()
            ->contain(['Paises', 'Estilos']);
        $artistas = $this->paginate($query);

        $this->set(compact('artistas'));
    }

    /**
     * View method
     *
     * @param string|null $id Artista id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $artista = $this->Artistas->get($id, contain: ['Paises', 'Estilos']);
        $this->set(compact('artista'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $artista = $this->Artistas->newEmptyEntity();
        if ($this->request->is('post')) {
            $artista = $this->Artistas->patchEntity($artista, $this->request->getData());
            if ($this->Artistas->save($artista)) {
                $this->Flash->success(__('The artista has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The artista could not be saved. Please, try again.'));
        }
        $paises = $this->Artistas->Paises->find('list', limit: 200)->all();
        $estilos = $this->Artistas->Estilos->find('list', limit: 200)->all();
        $this->set(compact('artista', 'paises', 'estilos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Artista id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $artista = $this->Artistas->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $artista = $this->Artistas->patchEntity($artista, $this->request->getData());
            if ($this->Artistas->save($artista)) {
                $this->Flash->success(__('The artista has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The artista could not be saved. Please, try again.'));
        }
        $paises = $this->Artistas->Paises->find('list', limit: 200)->all();
        $estilos = $this->Artistas->Estilos->find('list', limit: 200)->all();
        $this->set(compact('artista', 'paises', 'estilos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Artista id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $artista = $this->Artistas->get($id);
        if ($this->Artistas->delete($artista)) {
            $this->Flash->success(__('The artista has been deleted.'));
        } else {
            $this->Flash->error(__('The artista could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
