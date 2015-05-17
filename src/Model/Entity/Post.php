<?php
/**
 * Wasabi Blog PostEntity
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
namespace Wasabi\Blog\Model\Entity;

use Cake\ORM\Entity;

/**
 * Class Post
 * @package Wasabi\Blog\Model\Entity
 */
class Post extends Entity
{
    /**
     * Accessible fields.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true
    ];
}
