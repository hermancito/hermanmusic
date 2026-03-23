<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cdvario $cdvario
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cdvario'), ['action' => 'edit', $cdvario->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cdvario'), ['action' => 'delete', $cdvario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cdvario->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cdvarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cdvario'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cdvarios view content">
            <h3><?= h($cdvario->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($cdvario->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $cdvario->hasValue('user') ? $this->Html->link($cdvario->user->name, ['controller' => 'Users', 'action' => 'view', $cdvario->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cdvario->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Confirmado') ?></th>
                    <td><?= $cdvario->confirmado ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Listarep') ?></th>
                    <td><?= $cdvario->listarep ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Clientes') ?></h4>
                <?php if (!empty($cdvario->clientes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Last Name') ?></th>
                            <th><?= __('Direcc') ?></th>
                            <th><?= __('Poblacion') ?></th>
                            <th><?= __('Provincia Id') ?></th>
                            <th><?= __('Cp') ?></th>
                            <th><?= __('Nif') ?></th>
                            <th><?= __('Tfno') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($cdvario->clientes as $cliente) : ?>
                        <tr>
                            <td><?= h($cliente->id) ?></td>
                            <td><?= h($cliente->name) ?></td>
                            <td><?= h($cliente->last_name) ?></td>
                            <td><?= h($cliente->direcc) ?></td>
                            <td><?= h($cliente->poblacion) ?></td>
                            <td><?= h($cliente->provincia_id) ?></td>
                            <td><?= h($cliente->cp) ?></td>
                            <td><?= h($cliente->nif) ?></td>
                            <td><?= h($cliente->tfno) ?></td>
                            <td><?= h($cliente->email) ?></td>
                            <td><?= h($cliente->created) ?></td>
                            <td><?= h($cliente->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Clientes', 'action' => 'view', $cliente->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Clientes', 'action' => 'edit', $cliente->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Clientes', 'action' => 'delete', $cliente->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $cliente->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Discos') ?></h4>
                <?php if (!empty($cdvario->discos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Banda') ?></th>
                            <th><?= __('Anyo') ?></th>
                            <th><?= __('Copy') ?></th>
                            <th><?= __('Formato') ?></th>
                            <th><?= __('Portada') ?></th>
                            <th><?= __('Portada Dir') ?></th>
                            <th><?= __('Vta') ?></th>
                            <th><?= __('Precio') ?></th>
                            <th><?= __('Destacado') ?></th>
                            <th><?= __('Coment') ?></th>
                            <th><?= __('Reciente') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($cdvario->discos as $disco) : ?>
                        <tr>
                            <td><?= h($disco->id) ?></td>
                            <td><?= h($disco->name) ?></td>
                            <td><?= h($disco->banda) ?></td>
                            <td><?= h($disco->anyo) ?></td>
                            <td><?= h($disco->copy) ?></td>
                            <td><?= h($disco->formato) ?></td>
                            <td><?= h($disco->portada) ?></td>
                            <td><?= h($disco->portada_dir) ?></td>
                            <td><?= h($disco->vta) ?></td>
                            <td><?= h($disco->precio) ?></td>
                            <td><?= h($disco->destacado) ?></td>
                            <td><?= h($disco->coment) ?></td>
                            <td><?= h($disco->reciente) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Discos', 'action' => 'view', $disco->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Discos', 'action' => 'edit', $disco->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Discos', 'action' => 'delete', $disco->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $disco->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>