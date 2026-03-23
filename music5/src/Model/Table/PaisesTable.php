<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Paises Model
 *
 * @property \App\Model\Table\ArtistasTable&\Cake\ORM\Association\HasMany $Artistas
 *
 * @method \App\Model\Entity\Paise newEmptyEntity()
 * @method \App\Model\Entity\Paise newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Paise> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Paise get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Paise findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Paise patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Paise> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Paise|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Paise saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Paise>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Paise>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Paise>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Paise> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Paise>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Paise>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Paise>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Paise> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PaisesTable extends Table
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

        $this->setTable('paises');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Artistas', [
            'foreignKey' => 'paise_id',
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

        return $validator;
    }
}
