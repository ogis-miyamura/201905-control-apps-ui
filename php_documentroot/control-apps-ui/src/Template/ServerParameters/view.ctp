<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServerParameter $serverParameter
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Server Parameter'), ['action' => 'edit', $serverParameter->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Server Parameter'), ['action' => 'delete', $serverParameter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serverParameter->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Server Parameters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Server Parameter'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Servers'), ['controller' => 'Servers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Server'), ['controller' => 'Servers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parameter Types'), ['controller' => 'ParameterTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parameter Type'), ['controller' => 'ParameterTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="serverParameters view large-9 medium-8 columns content">
    <h3><?= h($serverParameter->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Server') ?></th>
            <td><?= $serverParameter->has('server') ? $this->Html->link($serverParameter->server->title, ['controller' => 'Servers', 'action' => 'view', $serverParameter->server->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $serverParameter->has('application') ? $this->Html->link($serverParameter->application->title, ['controller' => 'Applications', 'action' => 'view', $serverParameter->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parameter Type') ?></th>
            <td><?= $serverParameter->has('parameter_type') ? $this->Html->link($serverParameter->parameter_type->title, ['controller' => 'ParameterTypes', 'action' => 'view', $serverParameter->parameter_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= h($serverParameter->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comment') ?></th>
            <td><?= h($serverParameter->comment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($serverParameter->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($serverParameter->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($serverParameter->updated) ?></td>
        </tr>
    </table>
</div>
