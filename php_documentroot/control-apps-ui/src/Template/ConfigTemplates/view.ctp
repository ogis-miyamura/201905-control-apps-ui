<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConfigTemplate $configTemplate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Config Template'), ['action' => 'edit', $configTemplate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Config Template'), ['action' => 'delete', $configTemplate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $configTemplate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Config Templates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Config Template'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="configTemplates view large-9 medium-8 columns content">
    <h3><?= h($configTemplate->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($configTemplate->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Text') ?></th>
            <td><pre><?= h($configTemplate->text) ?></pre></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comment') ?></th>
            <td><?= h($configTemplate->comment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($configTemplate->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($configTemplate->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($configTemplate->updated) ?></td>
        </tr>
    </table>
</div>
