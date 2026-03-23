<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Discos Model
 *
 * @property \App\Model\Table\SongsTable&\Cake\ORM\Association\HasMany $Songs
 * @property \App\Model\Table\CdvariosTable&\Cake\ORM\Association\BelongsToMany $Cdvarios
 * @property \App\Model\Table\ClientesTable&\Cake\ORM\Association\BelongsToMany $Clientes
 *
 * @method \App\Model\Entity\Disco newEmptyEntity()
 * @method \App\Model\Entity\Disco newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Disco> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Disco get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Disco findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Disco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Disco> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Disco|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Disco saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Disco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Disco>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Disco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Disco> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Disco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Disco>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Disco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Disco> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DiscosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('discos');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Songs', [
            'foreignKey' => 'disco_id',
        ]);
        $this->belongsToMany('Cdvarios', [
            'foreignKey' => 'disco_id',
            'targetForeignKey' => 'cdvario_id',
            'joinTable' => 'cdvarios_discos',
        ]);
        $this->belongsToMany('Clientes', [
            'foreignKey' => 'disco_id',
            'targetForeignKey' => 'cliente_id',
            'joinTable' => 'clientes_discos',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 75)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('banda')
            ->maxLength('banda', 75)
            ->requirePresence('banda', 'create')
            ->notEmptyString('banda');

        $validator
            ->requirePresence('anyo', 'create')
            ->notEmptyString('anyo');

        $validator
            ->scalar('copy')
            ->maxLength('copy', 10)
            ->requirePresence('copy', 'create')
            ->notEmptyString('copy');

        $validator
            ->scalar('formato')
            ->maxLength('formato', 10)
            ->requirePresence('formato', 'create')
            ->notEmptyString('formato');

        $validator
            ->scalar('portada')
            ->maxLength('portada', 255)
            ->requirePresence('portada', 'create')
            ->notEmptyString('portada');

        $validator
            ->scalar('portada_dir')
            ->maxLength('portada_dir', 255)
            ->requirePresence('portada_dir', 'create')
            ->notEmptyString('portada_dir');

        $validator
            ->boolean('vta')
            ->requirePresence('vta', 'create')
            ->notEmptyString('vta');

        $validator
            ->integer('precio')
            ->requirePresence('precio', 'create')
            ->notEmptyString('precio');

        $validator
            ->boolean('destacado')
            ->requirePresence('destacado', 'create')
            ->notEmptyString('destacado');

        $validator
            ->scalar('coment')
            ->requirePresence('coment', 'create')
            ->notEmptyString('coment');

        $validator
            ->boolean('reciente')
            ->requirePresence('reciente', 'create')
            ->notEmptyString('reciente');

        return $validator;
    }
}
