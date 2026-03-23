<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Estilos Model
 *
 * @property \App\Model\Table\ArtistasTable&\Cake\ORM\Association\HasMany $Artistas
 *
 * @method \App\Model\Entity\Estilo newEmptyEntity()
 * @method \App\Model\Entity\Estilo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Estilo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Estilo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Estilo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Estilo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Estilo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Estilo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Estilo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Estilo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estilo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Estilo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estilo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Estilo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estilo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Estilo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estilo> deleteManyOrFail(iterable $entities, array $options = [])
 */
class EstilosTable extends Table
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

        $this->setTable('estilos');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Artistas', [
            'foreignKey' => 'estilo_id',
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
            ->maxLength('name', 25)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('imagen')
            ->maxLength('imagen', 25)
            ->requirePresence('imagen', 'create')
            ->notEmptyString('imagen');

        return $validator;
    }
}
