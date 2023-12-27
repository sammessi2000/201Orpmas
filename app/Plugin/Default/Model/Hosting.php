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

class Product extends AppModel
{
    public $useTable = 'products';
    public $name = 'Product';
    
    public function archive($node_id)
    {
        $this->Image = ClassRegistry::init('Image');
        $this->Comment = ClassRegistry::init('Comment');

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
                        'conditions'=>array('Product.node_id = Node.id')
                ),
                  array(
                      'table'=>'category_linkeds',
                      'alias'=>'CategoryLinked',
                      'type'=>'INNER',
                      'conditions'=>array('Node.id = CategoryLinked.node_id')
                  )
            ),
            'conditions'=>array(
                'Node.type'=>'product',
                'Node.status'=>1,
                'CategoryLinked.category_id'=>$node_id
            ),
            'group'=>'CategoryLinked.node_id',
            'fields'=>array('Node.*', 'Product.*', 'CategoryLinked.*')
        ));
        
        $data['images'] = $this->Image->find('all', array(
            'conditions'=>array(
                'Image.node_id'=>$data['Node']['id']
            )
        ));
        
         $data['comment'] = $this->Comment->find('all', array(
            'conditions'=>array(
                'Comment.node_id'=>$data['Node']['id'],
                'Comment.status'=>1,
                'Comment.parent_id'=>0
            ),
            'order'=>array('Comment.id'=>'desc')
        ));

        return $data;
    }
    
    public function product_detail($node_id)
    {
        $this->Image = ClassRegistry::init('Image');
        $this->Comment = ClassRegistry::init('Comment');
        $this->CategoryLinked = ClassRegistry::init('CategoryLinked');
        $this->Rate = ClassRegistry::init('Rate');

        $this->Node = ClassRegistry::init('Node');
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
                        'conditions'=>array('Product.node_id = Node.id')
                ),
                array(
                    'table'=>'category_linkeds',
                    'alias'=>'CategoryLinked',
                    'type'=>'INNER',
                    'conditions'=>array('Node.id = CategoryLinked.node_id')
                )
            ),
            'conditions'=>array(
                'Node.type'=>'product',
                'Node.status'=>1,
                'Node.id'=>$node_id
            ),
            'fields'=>array('Node.*', 'Product.*', 'CategoryLinked.*')
        ));
        
        $cats = $this->CategoryLinked->find('all', array(
          'conditions'=>array(
            'CategoryLinked.node_id'=>$node_id
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
                   'conditions'=>array('Product.node_id = Node.id')
               ),
                array(
                    'table'=>'category_linkeds',
                    'alias'=>'CategoryLinked',
                    'type'=>'INNER',
                    'conditions'=>array('Node.id = CategoryLinked.node_id')
                )
           ),
           'conditions'=>array(
               'Node.type'=>'product',
               'Node.status'=>1,
               'CategoryLinked.category_id'=>$ids
           ),
           'limit'=>7,
           'fields'=>array('Node.*', 'Product.*', 'CategoryLinked.*'),
            'group'=>'CategoryLinked.node_id',
           'order'=>array('Node.pos DESC', 'Node.id DESC')
       ));
        
        $data['rates'] = $this->Rate->find('all', array(
            'conditions'=>array(
                'Rate.node_id'=>$node_id
            )
        ));
        
        $data['images'] = $this->Image->find('all', array(
            'conditions'=>array(
                'Image.node_id'=>$node_id
            )
        ));
        
         $data['comment'] = $this->Comment->find('all', array(
            'conditions'=>array(
                'Comment.node_id'=>$data['Node']['id'],
                'Comment.status'=>1,
                'Comment.parent_id'=>0
            ),
            'order'=>array('Comment.id'=>'desc')
        ));
        
        return $data;
    }
}