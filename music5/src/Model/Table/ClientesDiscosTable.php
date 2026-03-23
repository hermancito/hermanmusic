<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ClientesDiscos Model
 *
 * @property \App\Model\Table\ClientesTable&\Cake\ORM\Association\BelongsTo $Clientes
 * @property \App\Model\Table\DiscosTable&\Cake\ORM\Association\BelongsTo $Discos
 *
 * @method \App\Model\Entity\ClientesDisco newEmptyEntity()
 * @method \App\Model\Entity\ClientesDisco newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ClientesDisco> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ClientesDisco get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ClientesDisco findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ClientesDisco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ClientesDisco> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ClientesDisco|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ClientesDisco saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ClientesDisco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ClientesDisco>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ClientesDisco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ClientesDisco> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ClientesDisco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ClientesDisco>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ClientesDisco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ClientesDisco> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClientesDiscosTable extends Table
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

        $this->setTable('clientes_discos');
        $this->setDisplayField('pago');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clientes', [
            'foreignKey' => 'cliente_id',
            'joinType' => 'INNER',
        ]);
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
            ->integer('cliente_id')
            ->notEmptyString('cliente_id');

        $validator
            ->integer('disco_id')
            ->notEmptyString('disco_id');

        $validator
            ->scalar('pago')
            ->maxLength('pago', 25)
            ->requirePresence('pago', 'create')
            ->notEmptyString('pago');

        $validator
            ->boolean('finalizado')
            ->notEmptyString('finalizado');

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
        $rules->add($rules->existsIn(['cliente_id'], 'Clientes'), ['errorField' => 'cliente_id']);
        $rules->add($rules->existsIn(['disco_id'], 'Discos'), ['errorField' => 'disco_id']);

        return $rules;
    }
}
