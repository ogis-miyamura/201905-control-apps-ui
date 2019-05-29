<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ParameterType $parameterType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $parameterType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $parameterType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Parameter Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Server Parameters'), ['controller' => 'ServerParameters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Server Parameter'), ['controller' => 'ServerParameters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parameterTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($parameterType) ?>
    <fieldset>
        <legend><?= __('Edit Parameter Type') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('regex');
            echo $this->Form->control('comment');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
