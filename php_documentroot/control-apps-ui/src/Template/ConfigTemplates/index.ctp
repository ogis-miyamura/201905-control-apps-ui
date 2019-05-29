<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConfigTemplate[]|\Cake\Collection\CollectionInterface $configTemplates
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Config Template'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="configTemplates index large-9 medium-8 columns content">
    <h3><?= __('Config Templates') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('text') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($configTemplates as $configTemplate): ?>
            <tr>
                <td><?= $this->Number->format($configTemplate->id) ?></td>
                <td><?= h($configTemplate->title) ?></td>
                <td><pre><?= h($configTemplate->text) ?></pre></td>
                <td><?= h($configTemplate->comment) ?></td>
                <td><?= h($configTemplate->created) ?></td>
                <td><?= h($configTemplate->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $configTemplate->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $configTemplate->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $configTemplate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $configTemplate->id)]) ?>
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
