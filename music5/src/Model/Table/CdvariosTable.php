<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cdvarios Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ClientesTable&\Cake\ORM\Association\BelongsToMany $Clientes
 * @property \App\Model\Table\DiscosTable&\Cake\ORM\Association\BelongsToMany $Discos
 *
 * @method \App\Model\Entity\Cdvario newEmptyEntity()
 * @method \App\Model\Entity\Cdvario newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Cdvario> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cdvario get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Cdvario findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Cdvario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Cdvario> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cdvario|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Cdvario saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Cdvario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cdvario>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cdvario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cdvario> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cdvario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cdvario>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cdvario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cdvario> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CdvariosTable extends Table
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

        $this->setTable('cdvarios');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Clientes', [
            'foreignKey' => 'cdvario_id',
            'targetForeignKey' => 'cliente_id',
            'joinTable' => 'cdvarios_clientes',
        ]);
        $this->belongsToMany('Discos', [
            'foreignKey' => 'cdvario_id',
            'targetForeignKey' => 'disco_id',
            'joinTable' => 'cdvarios_discos',
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
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->boolean('confirmado')
            ->notEmptyString('confirmado');

        $validator
            ->boolean('listarep')
            ->notEmptyString('listarep');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
