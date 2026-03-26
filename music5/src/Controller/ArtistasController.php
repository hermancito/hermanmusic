<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\View\JsonView;

class ArtistasController extends AppController
{
   public function viewClasses(): array
    {
        return [JsonView::class];
    }

    public function index()
    {
        $query = $this->Artistas->find()->contain(['Paises', 'Estilos']);
        $artistas = $this->paginate($query);

        $this->set(compact('artistas'));
    }

    public function artistasrest()
    {
        $artistas = $this->Artistas
            ->find()
            ->contain(['Paises', 'Estilos'])
            ->order(['Artistas.name' => 'ASC']);

        $this->set(compact('artistas'));
        $this->viewBuilder()->setOption('serialize', ['artistas']);
    }

    public function artistasxestilo($id_estilo = null)
    {
        $artistas = $this->Artistas
            ->find()
            ->contain(['Paises', 'Estilos'])
            ->where(['estilo_id' => $id_estilo])
            ->order(['Artistas.name' => 'ASC']);

        $this->set(compact('artistas'));
        $this->viewBuilder()->setOption('serialize', ['artistas']);
    }

    public function view($id = null)
    {
        $artista = $this->Artistas->get($id, [
            'contain' => ['Paises', 'Estilos']
        ]);

        $this->set(compact('artista'));
        $this->viewBuilder()->setOption('serialize', ['artista']);
    }

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

        $paises = $this->Artistas->Paises->find('list');
        $estilos = $this->Artistas->Estilos->find('list');

        $this->set(compact('artista', 'paises', 'estilos'));
    }

    public function addrest()
    {
        $this->request->allowMethod(['post']);

        $artista = $this->Artistas->newEmptyEntity();
        $data = $this->request->getData();

        $data['paise_id'] = 'GBR';

        $artista = $this->Artistas->patchEntity($artista, $data);

        $message = 'no_grabado';
        $id = null;

        if ($this->Artistas->save($artista)) {
            $message = 'grabado';
            $id = $artista->id;
        }

        $this->set(compact('message', 'id'));
        $this->viewBuilder()->setOption('serialize', ['message', 'id']);
    }

    public function edit($id = null)
    {
        $artista = $this->Artistas->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $artista = $this->Artistas->patchEntity($artista, $this->request->getData());

            if ($this->Artistas->save($artista)) {
                $this->Flash->success(__('The artista has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The artista could not be saved.'));
        }

        $paises = $this->Artistas->Paises->find('list')->order(['name' => 'ASC']);
        $estilos = $this->Artistas->Estilos->find('list');

        $this->set(compact('artista', 'paises', 'estilos'));
    }

    public function editrest()
    {
        $this->request->allowMethod(['post', 'put']);

        $data = $this->request->getData();
        $artista = $this->Artistas->get($data['id']);

        $artista = $this->Artistas->patchEntity($artista, $data);

        $message = 'no_grabado';

        if ($this->Artistas->save($artista)) {
            $message = 'grabado';
        }

        $this->set(compact('message'));
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $artista = $this->Artistas->get($id);

        if ($this->Artistas->delete($artista)) {
            $this->Flash->success(__('The artista has been deleted.'));
        } else {
            $this->Flash->error(__('The artista could not be deleted.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function deleterest()
    {
        $this->request->allowMethod(['post', 'delete']);

        $id = $this->request->getData('id');
        $artista = $this->Artistas->get($id);

        $message = 'no_grabado';

        if ($this->Artistas->delete($artista)) {
            $message = 'grabado';
        }

        $this->set(compact('message'));
        $this->viewBuilder()->setOption('serialize', ['message']);
    }
}