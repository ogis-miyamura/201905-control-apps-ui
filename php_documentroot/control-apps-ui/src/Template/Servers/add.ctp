<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Server $server
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Servers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Server Parameters'), ['controller' => 'ServerParameters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Server Parameter'), ['controller' => 'ServerParameters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servers form large-9 medium-8 columns content">
    <?= $this->Form->create($server) ?>
    <fieldset>
        <legend><?= __('Add Server') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('comment');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
