<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Provincias Model
 *
 * @property \App\Model\Table\ClientesTable&\Cake\ORM\Association\HasMany $Clientes
 *
 * @method \App\Model\Entity\Provincia newEmptyEntity()
 * @method \App\Model\Entity\Provincia newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Provincia> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Provincia get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Provincia findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Provincia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Provincia> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Provincia|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Provincia saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Provincia>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Provincia>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Provincia>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Provincia> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Provincia>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Provincia>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Provincia>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Provincia> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProvinciasTable extends Table
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

        $this->setTable('provincias');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Clientes', [
            'foreignKey' => 'provincia_id',
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
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
