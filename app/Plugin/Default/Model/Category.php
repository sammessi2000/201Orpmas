<?php

/**
 * PHP version 5
 * 
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 * 
 * @author   Bui Thanh Cong <buithanhcong.nd@gmail.com>
 * @license  MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

class Category extends AppModel
{
    public $name = 'Category';
    public $useTable = 'categories';
    public $actsAs = array('Tree');
    
    public function findNode($node_id)
    {
        return $this->find('first', array(
            'conditions'=>array(
                'Category.node_id'=>$node_id,
                'Category.status'=>1
            )
        ));
    }
}