<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

class EstilosController extends AppController
{
    public function index()
    {
        $estilos = $this->paginate(
            $this->Estilos->find()
        );

        $this->set(compact('estilos'));
    }

    public function estilosrest()
    {
        $estilos = $this->Estilos
            ->find()
            ->order(['name' => 'ASC']);

        $this->set(compact('estilos'));
        $this->viewBuilder()->setOption('serialize', ['estilos']);
    }

    public function view($id = null)
    {
        $estilo = $this->Estilos->get($id, [
            'contain' => ['Artistas']
        ]);

        $this->set(compact('estilo'));
        $this->viewBuilder()->setOption('serialize', ['estilo']);
    }

    public function add()
    {
        $estilo = $this->Estilos->newEmptyEntity();

        if ($this->request->is('post')) {
            $estilo = $this->Estilos->patchEntity(
                $estilo,
                $this->request->getData()
            );

            if ($this->Estilos->save($estilo)) {
                $this->Flash->success(__('The estilo has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The estilo could not be saved. Please, try again.'));
        }

        $this->set(compact('estilo'));
    }

    public function edit($id = null)
    {
        $estilo = $this->Estilos->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $estilo = $this->Estilos->patchEntity(
                $estilo,
                $this->request->getData()
            );

            if ($this->Estilos->save($estilo)) {
                $this->Flash->success(__('The estilo has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The estilo could not be saved. Please, try again.'));
        }

        $this->set(compact('estilo'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $estilo = $this->Estilos->get($id);

        if ($this->Estilos->delete($estilo)) {
            $this->Flash->success(__('The estilo has been deleted.'));
        } else {
            $this->Flash->error(__('The estilo could not be deleted.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function listas()
    {
        $listas = $this->Estilos
            ->find()
            ->select(['id', 'name'])
            ->order(['name' => 'ASC']);

        $this->set(compact('listas'));
        $this->viewBuilder()->setOption('serialize', ['listas']);
    }
}
