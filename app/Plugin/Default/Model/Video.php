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

class Video extends AppModel
{
    public $useTable = 'videos';
    public $name = 'Video';
    
    public function video_detail($node_id)
    {
        $data = array();

        $this->CategoryLinked = ClassRegistry::init('CategoryLinked');
        $this->Node = ClassRegistry::init('Node');

        $data = $this->Node->find('first', array(
            'joins'=>array(
              array(
                'table'=>'videos',
                'alias'=>'Video',
                'conditions'=>array('Video.node_id = Node.id'),
                'type'=>'INNER'
              ),
                array(
                    'table'=>'category_linkeds',
                    'alias'=>'CategoryLinked',
                    'type'=>'INNER',
                    'conditions'=>array('Node.id = CategoryLinked.node_id')
                )
            ),
            'conditions'=>array(
              'Node.id'=>$node_id
            ),
            'fields'=>array('Node.*', 'Video.*', 'CategoryLinked.*')
        ));

        $cats = $this->CategoryLinked->find('all', array(
          'conditions'=>array(
            'CategoryLinked.node_id'=>$data['Node']['id']
          ),
          'limit'=>10
        ));

        $ids = array();

        foreach($cats as $v)
        {
          $ids[]  = $v['CategoryLinked']['category_id'];
        }

        $data['related'] = $this->find('all', array(
            'joins'=>array(
                array(
                        'table'=>'nodes',
                        'alias'=>'Node',
                        'type'=>'INNER',
                        'conditions'=>array('Video.node_id = Node.id')
                ),
                array(
                    'table'=>'category_linkeds',
                    'alias'=>'CategoryLinked',
                    'type'=>'INNER',
                    'conditions'=>array('Node.id = CategoryLinked.node_id')
                )
            ),
            'conditions'=>array(
                'Node.type'=>'video',
                'Node.status'=>1,
                'CategoryLinked.category_id'=>$ids,
                'NOT'=>array(
                    'Node.id'=>$data['Node']['id']
                )
            ),
            'limit'=>10,
            'fields'=>array('Node.*', 'Video.*'),
            'group'=>'CategoryLinked.node_id',
            'order'=>array('Node.pos DESC', 'Node.id DESC')
        ));
        
        
        return $data;
    }
}