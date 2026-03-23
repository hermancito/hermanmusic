<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CdvariosDiscos Model
 *
 * @property \App\Model\Table\CdvariosTable&\Cake\ORM\Association\BelongsTo $Cdvarios
 * @property \App\Model\Table\DiscosTable&\Cake\ORM\Association\BelongsTo $Discos
 *
 * @method \App\Model\Entity\CdvariosDisco newEmptyEntity()
 * @method \App\Model\Entity\CdvariosDisco newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CdvariosDisco> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CdvariosDisco get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CdvariosDisco findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CdvariosDisco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CdvariosDisco> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CdvariosDisco|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CdvariosDisco saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CdvariosDisco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CdvariosDisco>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CdvariosDisco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CdvariosDisco> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CdvariosDisco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CdvariosDisco>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CdvariosDisco>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CdvariosDisco> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CdvariosDiscosTable extends Table
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

        $this->setTable('cdvarios_discos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cdvarios', [
            'foreignKey' => 'cdvario_id',
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
            ->integer('cdvario_id')
            ->notEmptyString('cdvario_id');

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
        $rules->add($rules->existsIn(['cdvario_id'], 'Cdvarios'), ['errorField' => 'cdvario_id']);
        $rules->add($rules->existsIn(['disco_id'], 'Discos'), ['errorField' => 'disco_id']);

        return $rules;
    }
}
