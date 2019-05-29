<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConfigTemplate $configTemplate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Config Templates'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="configTemplates form large-9 medium-8 columns content">
    <?= $this->Form->create($configTemplate) ?>
    <fieldset>
        <legend><?= __('Add Config Template') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('text', ['type' => 'textarea']);
            echo $this->Form->control('comment');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
