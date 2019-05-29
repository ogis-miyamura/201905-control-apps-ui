<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServerParameter $serverParameter
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $serverParameter->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $serverParameter->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Server Parameters'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Servers'), ['controller' => 'Servers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Server'), ['controller' => 'Servers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parameter Types'), ['controller' => 'ParameterTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parameter Type'), ['controller' => 'ParameterTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="serverParameters form large-9 medium-8 columns content">
    <?= $this->Form->create($serverParameter) ?>
    <fieldset>
        <legend><?= __('Edit Server Parameter') ?></legend>
        <?php
            echo $this->Form->control('server_id', ['options' => $servers]);
            echo $this->Form->control('application_id', ['options' => $applications]);
            echo $this->Form->control('parameter_type_id', ['options' => $parameterTypes]);
            echo $this->Form->control('value');
            echo $this->Form->control('comment');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
