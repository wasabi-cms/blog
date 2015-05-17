<?php
/**
 * Wasabi Blog PostsController
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
namespace Wasabi\Blog\Controller;

use Wasabi\Blog\Model\Table\PostsTable;
use Wasabi\Core\Controller\BackendAppController;

/**
 * Class PostsController
 * @property PostsTable Posts
 * @package Wasabi\Blog\Controller
 */
class PostsController extends BackendAppController
{
    /**
     * Initialization hook method.
     */
    public function initialize()
    {
        parent::initialize();
    }

    /**
     * Index action
     * GET
     */
    public function index() {
        $posts = $this->Posts->find('all');
        $this->set('posts',$posts);
    }
}
