<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServerParameter[]|\Cake\Collection\CollectionInterface $serverParameters
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Server Parameter'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Servers'), ['controller' => 'Servers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Server'), ['controller' => 'Servers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parameter Types'), ['controller' => 'ParameterTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parameter Type'), ['controller' => 'ParameterTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="serverParameters index large-9 medium-8 columns content">
    <h3><?= __('Server Parameters') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('server_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parameter_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($serverParameters as $serverParameter): ?>
            <tr>
                <td><?= $this->Number->format($serverParameter->id) ?></td>
                <td><?= $serverParameter->has('server') ? $this->Html->link($serverParameter->server->title, ['controller' => 'Servers', 'action' => 'view', $serverParameter->server->id]) : '' ?></td>
                <td><?= $serverParameter->has('application') ? $this->Html->link($serverParameter->application->title, ['controller' => 'Applications', 'action' => 'view', $serverParameter->application->id]) : '' ?></td>
                <td><?= $serverParameter->has('parameter_type') ? $this->Html->link($serverParameter->parameter_type->title, ['controller' => 'ParameterTypes', 'action' => 'view', $serverParameter->parameter_type->id]) : '' ?></td>
                <td><?= h($serverParameter->value) ?></td>
                <td><?= h($serverParameter->comment) ?></td>
                <td><?= h($serverParameter->created) ?></td>
                <td><?= h($serverParameter->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $serverParameter->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $serverParameter->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $serverParameter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serverParameter->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
