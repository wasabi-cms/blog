<?php
/**
 * @var \Wasabi\Core\View\AppView $this
 * @var array $posts
 */

$this->Html->setTitle(__d('wasabi_blog', 'Posts'));
$this->Html->setSubTitle(__d('wasabi_blog', 'Management'));
$this->Html->addAction(
    $this->Guardian->protectedLink(
        '<i class="icon-plus"></i>',
        [
            'plugin' => 'Wasabi/Blog',
            'controller' => 'Posts',
            'action' => 'add'
        ],
        [
            'title' => __d('wasabi_blog', 'Create a new Post'),
            'class' => 'add',
            'escapeTitle' => false
        ])
);
var_dump($posts);
