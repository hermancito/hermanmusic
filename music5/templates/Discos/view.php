<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Disco $disco
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Disco'), ['action' => 'edit', $disco->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Disco'), ['action' => 'delete', $disco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $disco->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Discos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Disco'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="discos view content">
            <h3><?= h($disco->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($disco->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Banda') ?></th>
                    <td><?= h($disco->banda) ?></td>
                </tr>
                <tr>
                    <th><?= __('Anyo') ?></th>
                    <td><?= h($disco->anyo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Copy') ?></th>
                    <td><?= h($disco->copy) ?></td>
                </tr>
                <tr>
                    <th><?= __('Formato') ?></th>
                    <td><?= h($disco->formato) ?></td>
                </tr>
                <tr>
                    <th><?= __('Portada') ?></th>
                    <td><?= h($disco->portada) ?></td>
                </tr>
                <tr>
                    <th><?= __('Portada Dir') ?></th>
                    <td><?= h($disco->portada_dir) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($disco->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio') ?></th>
                    <td><?= $this->Number->format($disco->precio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vta') ?></th>
                    <td><?= $disco->vta ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Destacado') ?></th>
                    <td><?= $disco->destacado ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Reciente') ?></th>
                    <td><?= $disco->reciente ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Coment') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($disco->coment)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Cdvarios') ?></h4>
                <?php if (!empty($disco->cdvarios)) : ?>
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
                        <?php foreach ($disco->cdvarios as $cdvario) : ?>
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
                <h4><?= __('Related Clientes') ?></h4>
                <?php if (!empty($disco->clientes)) : ?>
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
                        <?php foreach ($disco->clientes as $cliente) : ?>
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
                <h4><?= __('Related Songs') ?></h4>
                <?php if (!empty($disco->songs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Titulo') ?></th>
                            <th><?= __('Letra') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($disco->songs as $song) : ?>
                        <tr>
                            <td><?= h($song->id) ?></td>
                            <td><?= h($song->titulo) ?></td>
                            <td><?= h($song->letra) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Songs', 'action' => 'view', $song->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Songs', 'action' => 'edit', $song->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Songs', 'action' => 'delete', $song->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $song->id),
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