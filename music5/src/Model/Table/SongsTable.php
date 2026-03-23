<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Songs Model
 *
 * @property \App\Model\Table\DiscosTable&\Cake\ORM\Association\BelongsTo $Discos
 *
 * @method \App\Model\Entity\Song newEmptyEntity()
 * @method \App\Model\Entity\Song newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Song> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Song get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Song findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Song patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Song> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Song|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Song saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Song>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Song>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Song>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Song> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Song>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Song>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Song>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Song> deleteManyOrFail(iterable $entities, array $options = [])
 */
class SongsTable extends Table
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

        $this->setTable('songs');
        $this->setDisplayField('titulo');
        $this->setPrimaryKey('id');

        $this->belongsTo('Discos', [
            'foreignKey' => 'disco_id',
            'joinType' => 'INNER',
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
            ->scalar('titulo')
            ->maxLength('titulo', 100)
            ->requirePresence('titulo', 'create')
            ->notEmptyString('titulo');

        $validator
            ->scalar('letra')
            ->requirePresence('letra', 'create')
            ->notEmptyString('letra');

        $validator
            ->integer('disco_id')
            ->notEmptyString('disco_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['disco_id'], 'Discos'), ['errorField' => 'disco_id']);

        return $rules;
    }
}
