<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Server $server
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Server'), ['action' => 'edit', $server->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Server'), ['action' => 'delete', $server->id], ['confirm' => __('Are you sure you want to delete # {0}?', $server->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Servers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Server'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Server Parameters'), ['controller' => 'ServerParameters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Server Parameter'), ['controller' => 'ServerParameters', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="servers view large-9 medium-8 columns content">
    <h3><?= h($server->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($server->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comment') ?></th>
            <td><?= h($server->comment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($server->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($server->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($server->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Server Parameters') ?></h4>
        <?php if (!empty($server->server_parameters)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Server Id') ?></th>
                <th scope="col"><?= __('Application Id') ?></th>
                <th scope="col"><?= __('Parameter Type Id') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($server->server_parameters as $serverParameters): ?>
            <tr>
                <td><?= h($serverParameters->id) ?></td>
                <td><?= h($serverParameters->server_id) ?></td>
                <td><?= h($serverParameters->application_id) ?></td>
                <td><?= h($serverParameters->parameter_type_id) ?></td>
                <td><?= h($serverParameters->value) ?></td>
                <td><?= h($serverParameters->comment) ?></td>
                <td><?= h($serverParameters->created) ?></td>
                <td><?= h($serverParameters->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ServerParameters', 'action' => 'view', $serverParameters->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ServerParameters', 'action' => 'edit', $serverParameters->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ServerParameters', 'action' => 'delete', $serverParameters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serverParameters->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
