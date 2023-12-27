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

class Collection extends AppModel
{
    public $useTable = 'collections';
    public $name = 'Collection';

    public function archive($node_id)
    {
        $data = array();

        $this->Category = ClassRegistry::init('Category');

        $category = $this->Category->findById($node_id);

        if(is_array($category) && count($category) > 0)
        {
            if(is_numeric($category['Category']['parent_id']))
                $category = $this->Category->findById($category['Category']['parent_id']);

            $data = $this->Category->find('all', array(
                'conditions'=>array(
                    'Category.lft >='=>$category['Category']['lft'],
                    'Category.rght <='=>$category['Category']['rght']
                ),
            ));
        }

        $ids = array();

        foreach($data as $v)
        {
            $ids[] = $v['Category']['id'];
        }

        return array(
            'joins'=>array(
                array(
                        'table'=>'collections',
                        'alias'=>'Collection',
                        'type'=>'INNER',
                        'conditions'=>array('Collection.node_id = Node.id')
                ),
                array(
                    'table'=>'category_linkeds',
                    'alias'=>'CategoryLinked',
                    'type'=>'INNER',
                    'conditions'=>array('Node.id = CategoryLinked.node_id')
                )
            ),
            'conditions'=>array(
                'Node.type'=>'news',
                'Node.status'=>1,
                'CategoryLinked.category_id'=>$ids
            ),
            'limit'=>8,
            'fields'=>array('Node.*', 'Collection.*'),
            'group'=>'CategoryLinked.node_id',
            'order'=>array('Node.pos'=>'desc', 'Node.id'=>'desc')
        );
    }
    
    public function collection_detail($node_id)
    {
        $this->Node = ClassRegistry::init('Node');
        $this->Comment = ClassRegistry::init('Comment');
        $this->CategoryLinked = ClassRegistry::init('CategoryLinked');
        $this->Category = ClassRegistry::init('Category');

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
                        'conditions'=>array('Collection.node_id = Node.id')
                ),
                array(
                    'table'=>'category_linkeds',
                    'alias'=>'CategoryLinked',
                    'type'=>'INNER',
                    'conditions'=>array('Node.id = CategoryLinked.node_id')
                )
            ),
            'conditions'=>array(
                'Node.type'=>'collection',
                'Node.status'=>1,
                'Node.id'=>$node_id
            ),
            'fields'=>array('Node.*', 'Collection.*', 'CategoryLinked.*')
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
                        'conditions'=>array('Collection.node_id = Node.id')
                ),
                array(
                    'table'=>'category_linkeds',
                    'alias'=>'CategoryLinked',
                    'type'=>'INNER',
                    'conditions'=>array('Node.id = CategoryLinked.node_id')
                )
            ),
            'conditions'=>array(
                'Node.type'=>'collection',
                'Node.status'=>1,
                'CategoryLinked.category_id'=>$ids,
                'NOT'=>array(
                    'Node.id'=>$data['Node']['id']
                )
            ),
            'limit'=>4,
            'fields'=>array('Node.*', 'Collection.*', 'CategoryLinked.*'),
            'group'=>'CategoryLinked.node_id',
            'order'=>array('Node.pos DESC', 'Node.id DESC')
        ));

        $data['random'] = $this->find('first', array(
            'joins'=>array(
                array(
                        'table'=>'nodes',
                        'alias'=>'Node',
                        'type'=>'INNER',
                        'conditions'=>array('Collection.node_id = Node.id')
                )
            ),
            'conditions'=>array(
                'Node.type'=>'collection',
                'Node.status'=>1,
                'NOT'=>array(
                    'Node.id'=>$data['Node']['id']
                )
            ),
            'fields'=>array('Node.*', 'Collection.*'),
            'order'=>'rand()'
        ));
        
        $data['comment'] = $this->Comment->find('all', array(
            'conditions'=>array(
                'Comment.node_id'=>$data['Node']['id'],
                'Comment.status'=>1,
            ),
            'order'=>array('Comment.id'=>'asc')
        ));

        $data['categories'] = $this->Category->find('list', array('id', 'title'));

       //  $data['product_featured'] = $this->Node->find('all', array(
       //     'joins'=>array(
       //         array(
       //             'table'=>'products',
       //             'alias'=>'Product',
       //             'type'=>'INNER',
       //             'conditions'=>array('Product.node_id = Node.id')
       //         ),
       //          array(
       //              'table'=>'category_linkeds',
       //              'alias'=>'CategoryLinked',
       //              'type'=>'INNER',
       //              'conditions'=>array('Node.id = CategoryLinked.node_id')
       //          )
       //     ),
       //     'conditions'=>array(
       //         'Node.type'=>'product',
       //         'Node.status'=>1,
       //         'Product.featured'=>1
       //     ),
       //     'limit'=>5,
       //     'fields'=>array('Node.*', 'Product.*'),
       //      'group'=>'CategoryLinked.node_id',
       //     'order'=>array('Node.pos DESC', 'Node.id DESC')
       // ));
        
        return $data;
    }
}