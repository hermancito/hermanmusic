<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cliente'), ['action' => 'edit', $cliente->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cliente'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Clientes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cliente'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="clientes view content">
            <h3><?= h($cliente->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($cliente->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($cliente->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Direcc') ?></th>
                    <td><?= h($cliente->direcc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Poblacion') ?></th>
                    <td><?= h($cliente->poblacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Provincia') ?></th>
                    <td><?= $cliente->hasValue('provincia') ? $this->Html->link($cliente->provincia->name, ['controller' => 'Provincias', 'action' => 'view', $cliente->provincia->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Cp') ?></th>
                    <td><?= h($cliente->cp) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nif') ?></th>
                    <td><?= h($cliente->nif) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tfno') ?></th>
                    <td><?= h($cliente->tfno) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($cliente->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cliente->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($cliente->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($cliente->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Cdvarios') ?></h4>
                <?php if (!empty($cliente->cdvarios)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Confirmado') ?></th>
                            <th><?= __('Listarep') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($cliente->cdvarios as $cdvario) : ?>
                        <tr>
                            <td><?= h($cdvario->id) ?></td>
                            <td><?= h($cdvario->name) ?></td>
                            <td><?= h($cdvario->user_id) ?></td>
                            <td><?= h($cdvario->confirmado) ?></td>
                            <td><?= h($cdvario->listarep) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Cdvarios', 'action' => 'view', $cdvario->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Cdvarios', 'action' => 'edit', $cdvario->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Cdvarios', 'action' => 'delete', $cdvario->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $cdvario->id),
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
                <?php if (!empty($cliente->discos)) : ?>
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
                        <?php foreach ($cliente->discos as $disco) : ?>
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