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

class Tiendo extends AppModel
{
    public $useTable = 'tiendos';
    public $name = 'Tiendo';
    

    public function tiendo_detail($node_id)
    {
        $this->Node = ClassRegistry::init('Node');
        $this->Category = ClassRegistry::init('Category');
        $this->Comment = ClassRegistry::init('Comment');
        $this->CategoryLinked = ClassRegistry::init('CategoryLinked');

        $check = $this->Node->findById($node_id);
        $read = $check['Node']['read'] + 1;
        $this->Node->id = $node_id;
        $this->Node->saveField('read', $read);
        
        $data = $this->find('first', array(
            'joins'=>array(
                array(
                        'table'=>'nodes',
                        'alias'=>'Node',
                        'type'=>'INNER',
                        'conditions'=>array('Tiendo.node_id = Node.id')
                ),
                array(
                    'table'=>'category_linkeds',
                    'alias'=>'CategoryLinked',
                    'type'=>'INNER',
                    'conditions'=>array('Node.id = CategoryLinked.node_id')
                )
            ),
            'conditions'=>array(
                'Node.type'=>'tiendo',
                'Node.status'=>1,
                'Node.id'=>$node_id
            ),
            'fields'=>array('Node.*', 'Tiendo.*', 'CategoryLinked.*')
        ));

        return $data;
    }
}