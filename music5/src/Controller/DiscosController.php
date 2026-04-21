<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Collection\Collection;
use Cake\View\JsonView;
/**
 * Discos Controller
 *
 * @property \App\Model\Table\DiscosTable $Discos
 */
class DiscosController extends AppController
{
    public function viewClasses(): array
    {
        return [JsonView::class];
    }
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

     public function discosdestacados()
    {
        $query = $this->Discos->find()->where(['destacado' => 1])->orderBy(['banda' => 'ASC']);
        $discos = $this->paginate($query);

        $this->set(compact('discos'));
    }

    public function discosrecientes()
    {
        $query = $this->Discos->find()->where(['reciente' => 1])->orderBy(['banda' => 'ASC']);
        $discos = $this->paginate($query);

        $this->set(compact('discos'));
    }

    public function discosrest()
    {
        $discos = $this->Discos->find('all')->orderBy(['banda' => 'ASC']);

        $this->set('discos', $discos);
        $this->viewBuilder()->setOption('serialize', ['discos']);
    }

    public function destacadosrest()
    {
        $discos = $this->Discos->find()->where(['destacado' => 1])
            ->orderBy(['banda' => 'ASC']);
        $this->set('discos', $discos);
        $this->viewBuilder()->setOption('serialize', ['discos']);
    }

    public function discosxartista($banda = null)
    {
        $discos = $this->Discos->find()->where(['banda like'=>$banda])->orderBy(['name' => 'ASC']);
        $this->set('discos', $discos);
        $this->viewBuilder()->setOption('serialize', ['discos']);
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

    public function viewrest($id = null)
    {
        $disco = $this->Discos->get($id);
        $this->set('discos', $disco);
        $this->viewBuilder()->setOption('serialize', ['disco']);
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
            $data = $this->request->getData();

            $disco = $this->Discos->patchEntity($disco, $data);
            $banda = $data['banda'] ?? null;

            if ($this->Discos->save($disco)) {

                if (!empty($banda)) {
                    //$this->fetchTable('Artistas');

                    $existeArtista = $this->fetchTable('Artistas')
                        ->find()
                        ->where(['name LIKE' => $banda])
                        ->count();

                    if ($existeArtista === 0) {
                        $artista = $this->Artistas->newEmptyEntity();

                        $artista = $this->Artistas->patchEntity($artista, [
                            'name' => $banda,
                            'paise_id' => 'ESP',
                            'estilo_id' => 10,
                            'coment' => 'No coment'
                        ]);

                        $this->Artistas->save($artista);
                    }
                }

                $this->Flash->success(__('The disco has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The disco could not be saved. Please, try again.'));
        }

        $cdvarios = $this->Discos->Cdvarios->find('list');

        $this->set(compact('disco', 'cdvarios'));
    }

    public function addapp()
    {
        $disco = $this->Discos->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $disco = $this->Discos->patchEntity($disco, $data);
            $banda = $data['banda'] ?? null;

            if ($this->Discos->save($disco)) {

                if (!empty($banda)) {
                    //$this->fetchTable('Artistas');

                    $existeArtista = $this->fetchTable('Artistas')
                        ->find()
                        ->where(['name LIKE' => $banda])
                        ->count();

                    if ($existeArtista === 0) {
                        $artista = $this->Artistas->newEmptyEntity();

                        $artista = $this->Artistas->patchEntity($artista, [
                            'name' => $banda,
                            'paise_id' => 'ESP',
                            'estilo_id' => 10,
                            'coment' => 'No coment'
                        ]);

                        $this->Artistas->save($artista);
                    }
                }

                $this->Flash->success(__('The disco has been saved.'));
                return $this->redirect(['action' => 'addapp']);
            }

            $this->Flash->error(__('The disco could not be saved. Please, try again.'));
        }

        $this->set(compact('disco'));
    }

    public function addphotorest()
    {
        $this->request->allowMethod(['post']);

        $uploadedFile = $this->request->getData('image');

        if (!$uploadedFile || $uploadedFile->getError() !== UPLOAD_ERR_OK) {
            $this->set([
                'error' => 'Please provide a valid image to upload'
            ]);
            $this->viewBuilder()->setOption('serialize', ['error']);
            return;
        }

        // Validar que es imagen
        $tmpPath = $uploadedFile->getStream()->getMetadata('uri');
        $check = getimagesize($tmpPath);

        if ($check === false) {
            $this->set([
                'error' => 'File is not an image.'
            ]);
            $this->viewBuilder()->setOption('serialize', ['error']);
            return;
        }

        // Directorio destino (desde webroot)
        $targetDir = WWW_ROOT . 'files/discos/portada/portadas_desde_app/';

        // Crear carpeta si no existe
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        // Nombre seguro (evita sobrescribir y problemas)
        $originalName = $uploadedFile->getClientFilename();
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $safeName = uniqid() . '.' . $extension;

        $targetFile = $targetDir . $safeName;

        try {
            $uploadedFile->moveTo($targetFile);

            $this->set([
                'response' => 'The image has been uploaded.',
                'foto_name' => $safeName
            ]);
            $this->viewBuilder()->setOption('serialize', ['response', 'foto_name']);

        } catch (\Exception $e) {
            $this->set([
                'error' => 'Sorry, there was an error uploading your file.'
            ]);
            $this->viewBuilder()->setOption('serialize', ['error']);
        }
    }

    public function addrest()
    {
        $this->request->allowMethod(['post']);

        $data = $this->request->getData();

        // Normalizar booleanos
        $destacado = !empty($data['destacado']) && $data['destacado'] != '0';
        $vta = !empty($data['vta']) && $data['vta'] != '0';
        $reciente = !empty($data['reciente']) && $data['reciente'] != '0';

        // Valores por defecto
        $data['precio'] = $data['precio'] ?? 0;
        $data['portada'] = $data['portada'] ?? '';

        // Crear entidad
        $disco = $this->Discos->newEmptyEntity();

        $disco = $this->Discos->patchEntity($disco, [
            'name' => $data['name'] ?? null,
            'banda' => $data['banda'] ?? null,
            'anyo' => $data['anyo'] ?? null,
            'formato' => $data['formato'] ?? null,
            'copy' => 'ORIGINAL',
            'precio' => $data['precio'],
            'destacado' => $destacado,
            'vta' => $vta,
            'reciente' => $reciente,
            'coment' => 'No coment',
            'portada' => $data['portada'],
            'portada_dir' => 'portadas_desde_app'
        ]);

        $message = 'no_grabado';
        $id = null;

        if ($this->Discos->save($disco)) {

            $id = $disco->id;
            $message = 'grabado';

            // Crear artista si no existe
            $banda = $data['banda'] ?? null;

            if (!empty($banda)) {
                //$this->fetchTable('Artistas');

                $existeArtista = $this->fetchTable('Artistas')
                    ->find()
                    ->where(function ($exp) use ($banda) {
                        return $exp->eq(
                            'LOWER(name)',
                            strtolower(trim($banda))
                        );
                    })
                    ->count();

                if ($existeArtista === 0) {
                    $artista = $this->Artistas->newEmptyEntity();

                    $artista = $this->Artistas->patchEntity($artista, [
                        'name' => $banda,
                        'paise_id' => 'ESP',
                        'estilo_id' => 10,
                        'coment' => 'No coment'
                    ]);

                    $this->Artistas->save($artista);
                }
            }
        }

        $this->set(compact('message', 'id'));
        $this->viewBuilder()->setOption('serialize', ['message', 'id']);
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
        $disco = $this->Discos->get($id, [
            'contain' => ['Cdvarios']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $disco = $this->Discos->patchEntity(
                $disco,
                $this->request->getData()
            );

            if ($this->Discos->save($disco)) {
                $this->Flash->success(__('The disco has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The disco could not be saved. Please, try again.'));
        }

        $cdvarios = $this->Discos->Cdvarios
            ->find('list')
            ->orderBy(['name' => 'ASC']);

        $this->set(compact('disco', 'cdvarios'));
    }

    public function editrest()
    {
        $this->request->allowMethod(['post', 'put']);

        $data = $this->request->getData();
        $message = 'no_grabado';

        if (!empty($data['id'])) {

            $disco = $this->Discos->get($data['id']);

            // Normalizar booleanos
            $destacado = !empty($data['destacado']) && $data['destacado'] != '0';
            $vta = !empty($data['vta']) && $data['vta'] != '0';
            $reciente = !empty($data['reciente']) && $data['reciente'] != '0';

            // Defaults
            $data['precio'] = $data['precio'] ?? 0;
            $data['portada'] = $data['portada'] ?? '';

            $disco = $this->Discos->patchEntity($disco, [
                'name' => $data['name'] ?? null,
                'banda' => $data['banda'] ?? null,
                'anyo' => $data['anyo'] ?? null,
                'formato' => $data['formato'] ?? null,
                'copy' => 'ORIGINAL',
                'precio' => $data['precio'],
                'destacado' => $destacado,
                'vta' => $vta,
                'reciente' => $reciente,
                'coment' => 'No coment',
                'portada' => $data['portada']
            ]);

            if ($this->Discos->save($disco)) {

                // Crear artista si no existe
                $banda = $data['banda'] ?? null;

                if (!empty($banda)) {
                    $this->fetchTable('Artistas');

                    $existeArtista = $this->Artistas
                        ->find()
                        ->where(function ($exp) use ($banda) {
                            return $exp->eq(
                                'LOWER(name)',
                                strtolower(trim($banda))
                            );
                        })
                        ->count();

                    if ($existeArtista === 0) {
                        $artista = $this->Artistas->newEmptyEntity();

                        $artista = $this->Artistas->patchEntity($artista, [
                            'name' => $banda,
                            'paise_id' => 'ESP',
                            'estilo_id' => 10,
                            'coment' => 'No coment'
                        ]);

                        $this->Artistas->save($artista);
                    }
                }

                $message = 'grabado';
            }
        }

        $this->set(compact('message'));
        $this->viewBuilder()->setOption('serialize', ['message']);
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

    

    public function destacados()
    {
        $query = $this->Discos
            ->find()
            ->select(['id', 'name', 'banda', 'portada', 'portada_dir'])
            ->where(['destacado' => 1])
            ->orderBy(['name' => 'DESC']);

        // Convertimos a array para poder usar sample bien
        $collection = new Collection($query->all());
        $destacados = $collection->sample(5);

        // Si es petición JSON (alternativa moderna)
        if ($this->request->is('json')) {
            $this->set([
                'destacados' => $destacados,
                '_serialize' => ['destacados']
            ]);
            return;
        }

        // Vista normal
        $this->set(compact('destacados'));
    }

    public function ultimos()
    {
        $query = $this->Discos
            ->find()
            ->select(['id', 'name', 'banda', 'portada', 'portada_dir'])
            ->where(['reciente' => 1])
            ->orderBy(['name' => 'DESC']);

        // Ejecutar query
        $ultimos = $query->all();

        // Colección y sample
        $collection = new Collection($ultimos);
        $subjects = $collection->sample(6);

        if ($this->request->is('requested')) {
            return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($subjects));
        }

        $this->set(compact('subjects'));
    }

    public function tienda()
    {
        $query = $this->Discos
            ->find()
            ->select(['id', 'name', 'banda', 'formato', 'portada', 'portada_dir', 'precio'])
            ->where(['vta' => true])
            ->orderBy(['name' => 'ASC']);

        $this->paginate = [
            'maxLimit' => 6
        ];

        $enventas = $this->paginate($query);

        $this->set(compact('enventas'));

        // Sesión (forma moderna)
        $session = $this->request->getSession();
        $discosCarrito = $session->read('discos');

        $this->set('discos', $discosCarrito);
    }

    public function addisco()
    {
        $this->request->allowMethod(['post', 'ajax']);

        $session = $this->request->getSession();

        if ($this->request->is('ajax')) {

            $id = $this->request->getData('id');

            $discosCarrito = $session->read('discos') ?? [];

            // Añadir y evitar duplicados
            $discosCarrito[] = $id;
            $discosCarrito = array_unique($discosCarrito);

            $session->write('discos', $discosCarrito);
        }

        // Respuesta vacía (sin vista)
        return $this->response->withType('application/json')
            ->withStringBody(json_encode(['status' => 'ok']));
    }

    public function carrito()
    {
        $session = $this->request->getSession();
        $discosCarrito = $session->read('discos') ?? [];

        if (empty($discosCarrito)) {
            $this->Flash->error(__('No hay discos en el carrito'));
            return $this->redirect(['controller' => 'Discos', 'action' => 'tienda']);
        }

        // Obtener todos los discos en una sola query (MUY importante)
        $carritos = $this->Discos
            ->find()
            ->where(['id IN' => $discosCarrito])
            ->all();

        $this->set(compact('carritos'));
    }

    public function borraitem($id = null)
    {
        $session = $this->request->getSession();

        $discosCarrito = $session->read('discos') ?? [];

        $itemaborrar = array_search($id, $discosCarrito);

        if ($itemaborrar !== false) {
            unset($discosCarrito[$itemaborrar]);
            $discosCarrito = array_values($discosCarrito); // reindex seguro
        }

        $session->write('discos', $discosCarrito);

        return $this->redirect([
            'controller' => 'Discos',
            'action' => 'carrito'
        ]);
    }

    public function quitar()
    {
        $session = $this->request->getSession();
        $session->delete('discos');

        return $this->redirect([
            'controller' => 'Discos',
            'action' => 'carrito'
        ]);
    }

    public function searchjson()
    {
        $term = $this->request->getQuery('term');

        $discos = [];

        if (!empty($term)) {

            $terms = array_filter(explode(' ', trim($term)));

            $conditions = ['OR' => []];

            foreach ($terms as $t) {
                $conditions['OR'][] = ['Discos.banda LIKE' => '%' . $t . '%'];
            }

            $discos = $this->Discos
                ->find()
                ->select(['id', 'name', 'banda', 'portada', 'portada_dir'])
                ->where($conditions)
                ->limit(20)
                ->toArray();
        }

        $this->set([
            'discos' => $discos,
            '_serialize' => ['discos']
        ]);
    }

    public function search()
    {
        $search = $this->request->getQuery('search');

        $terms1 = [];
        $discos = new Collection([]);

        if (!empty($search)) {

            $search = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $search);

            $terms = array_filter(explode(' ', trim($search)));

            $conditions = ['OR' => []];

            foreach ($terms as $term) {
                $term = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $term);
                $terms1[] = $term;

                $conditions['OR'][] = [
                    'Discos.banda LIKE' => '%' . $term . '%'
                ];
            }

            $discos = $this->Discos
                ->find()
                ->select([
                    'id', 'name', 'banda', 'portada', 'portada_dir',
                    'anyo', 'copy', 'formato', 'vta', 'precio'
                ])
                ->where($conditions)
                ->limit(20);

            if ($discos->count() === 1) {
                $disco = $discos->first();
                return $this->redirect([
                    'controller' => 'Discos',
                    'action' => 'view',
                    $disco->id
                ]);
            }

            $this->set(compact('discos', 'terms1'));
        }

        $this->set(compact('search'));

        // AJAX handling moderno
        $isAjax = $this->request->is('ajax');

        $this->viewBuilder()->setOption('serialize', ['discos', 'terms1', 'search']);

        $this->set('ajax', $isAjax ? 1 : 0);
    }
}
