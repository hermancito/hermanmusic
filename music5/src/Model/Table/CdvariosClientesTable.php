<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CdvariosClientes Model
 *
 * @property \App\Model\Table\CdvariosTable&\Cake\ORM\Association\BelongsTo $Cdvarios
 * @property \App\Model\Table\ClientesTable&\Cake\ORM\Association\BelongsTo $Clientes
 *
 * @method \App\Model\Entity\CdvariosCliente newEmptyEntity()
 * @method \App\Model\Entity\CdvariosCliente newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CdvariosCliente> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CdvariosCliente get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CdvariosCliente findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CdvariosCliente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CdvariosCliente> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CdvariosCliente|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CdvariosCliente saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CdvariosCliente>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CdvariosCliente>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CdvariosCliente>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CdvariosCliente> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CdvariosCliente>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CdvariosCliente>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CdvariosCliente>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CdvariosCliente> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CdvariosClientesTable extends Table
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

        $this->setTable('cdvarios_clientes');
        $this->setDisplayField('pago');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cdvarios', [
            'foreignKey' => 'cdvario_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Clientes', [
            'foreignKey' => 'cliente_id',
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
            ->integer('cdvario_id')
            ->notEmptyString('cdvario_id');

        $validator
            ->integer('cliente_id')
            ->notEmptyString('cliente_id');

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
        $rules->add($rules->existsIn(['cdvario_id'], 'Cdvarios'), ['errorField' => 'cdvario_id']);
        $rules->add($rules->existsIn(['cliente_id'], 'Clientes'), ['errorField' => 'cliente_id']);

        return $rules;
    }
}
