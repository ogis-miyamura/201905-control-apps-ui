<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ParameterType $parameterType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Parameter Type'), ['action' => 'edit', $parameterType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Parameter Type'), ['action' => 'delete', $parameterType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parameterType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Parameter Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parameter Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Server Parameters'), ['controller' => 'ServerParameters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Server Parameter'), ['controller' => 'ServerParameters', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="parameterTypes view large-9 medium-8 columns content">
    <h3><?= h($parameterType->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($parameterType->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Regex') ?></th>
            <td><?= h($parameterType->regex) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comment') ?></th>
            <td><?= h($parameterType->comment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($parameterType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($parameterType->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($parameterType->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Server Parameters') ?></h4>
        <?php if (!empty($parameterType->server_parameters)): ?>
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
            <?php foreach ($parameterType->server_parameters as $serverParameters): ?>
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
