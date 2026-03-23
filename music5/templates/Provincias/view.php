<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Provincia $provincia
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Provincia'), ['action' => 'edit', $provincia->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Provincia'), ['action' => 'delete', $provincia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $provincia->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Provincias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Provincia'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="provincias view content">
            <h3><?= h($provincia->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($provincia->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($provincia->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Clientes') ?></h4>
                <?php if (!empty($provincia->clientes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Last Name') ?></th>
                            <th><?= __('Direcc') ?></th>
                            <th><?= __('Poblacion') ?></th>
                            <th><?= __('Cp') ?></th>
                            <th><?= __('Nif') ?></th>
                            <th><?= __('Tfno') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($provincia->clientes as $cliente) : ?>
                        <tr>
                            <td><?= h($cliente->id) ?></td>
                            <td><?= h($cliente->name) ?></td>
                            <td><?= h($cliente->last_name) ?></td>
                            <td><?= h($cliente->direcc) ?></td>
                            <td><?= h($cliente->poblacion) ?></td>
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
        </div>
    </div>
</div>