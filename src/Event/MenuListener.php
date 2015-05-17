<?php
/**
 * Wasabi Blog Menu Event Listener
 *
 * Wasabi CMS
 * Copyright (c) Frank Förster (http://frankfoerster.com)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Frank Förster (http://frankfoerster.com)
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Wasabi\Blog\Event;

use Cake\Event\Event;
use Cake\Event\EventListenerInterface;
use Wasabi\Blog\Config;
use Wasabi\Core\Menu;

class MenuListener implements EventListenerInterface
{
    /**
     * Returns a list of events this object is implementing. When the class is registered
     * in an event manager, each individual method will be associated with the respective event.
     *
     * @return array
     */
    public function implementedEvents()
    {
        return [
            'Wasabi.Backend.Menu.initMain' => [
                'callable' => 'initBackendMenuMainItems',
                'priority' => Config::$priority
            ]
        ];
    }

    /**
     * Initialize the backend main menu items.
     *
     * @param Event $event
     */
    public function initBackendMenuMainItems(Event $event)
    {
        /** @var Menu $menu the "backend.main" Nav instance */
        $menu = $event->subject();

        $menu->addMenuItem([
            'alias' => 'blog-posts',
            'name' => __d('wasabi_blog', 'Posts'),
            'priority' => 2,
            'url' => [
                'plugin' => 'Wasabi/Blog',
                'controller' => 'Posts',
                'action' => 'index'
            ],
            'parent' => 'content'
        ]);
    }
}
