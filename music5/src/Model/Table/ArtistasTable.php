<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Artistas Model
 *
 * @property \App\Model\Table\PaisesTable&\Cake\ORM\Association\BelongsTo $Paises
 * @property \App\Model\Table\EstilosTable&\Cake\ORM\Association\BelongsTo $Estilos
 *
 * @method \App\Model\Entity\Artista newEmptyEntity()
 * @method \App\Model\Entity\Artista newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Artista> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Artista get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Artista findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Artista patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Artista> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Artista|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Artista saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Artista>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Artista>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Artista>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Artista> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Artista>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Artista>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Artista>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Artista> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ArtistasTable extends Table
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

        $this->setTable('artistas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Paises', [
            'foreignKey' => 'paise_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Estilos', [
            'foreignKey' => 'estilo_id',
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('paise_id')
            ->maxLength('paise_id', 3)
            ->notEmptyString('paise_id');

        $validator
            ->scalar('coment')
            ->requirePresence('coment', 'create')
            ->notEmptyString('coment');

        $validator
            ->integer('estilo_id')
            ->notEmptyString('estilo_id');

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
        $rules->add($rules->existsIn(['paise_id'], 'Paises'), ['errorField' => 'paise_id']);
        $rules->add($rules->existsIn(['estilo_id'], 'Estilos'), ['errorField' => 'estilo_id']);

        return $rules;
    }
}
