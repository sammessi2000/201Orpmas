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

class News extends AppModel
{
    public $useTable = 'news';
    public $name = 'News';
    
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
                        'table'=>'news',
                        'alias'=>'News',
                        'type'=>'INNER',
                        'conditions'=>array('News.node_id = Node.id')
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
            'fields'=>array('Node.*', 'News.*'),
            'group'=>'CategoryLinked.node_id',
            'order'=>array('Node.pos'=>'desc', 'Node.id'=>'desc')
        );
    }

    public function archive_extra($node_id)
    {
        $data = array();

        $this->Node = ClassRegistry::init('Node');

        $category = $this->Node->find('first', array(
            'joins'=>array(
                array(
                    'table'=>'categories',
                    'alias'=>'Category',
                    'type'=>'INNER',
                    'conditions'=>array('Category.node_id=Node.id')
                )
            ),
            'conditions'=>array(
                'Category.id'=>$node_id
            ),
            'fields'=>array('Node.*', 'Category.*')
        ));


        if(is_array($category) && count($category) > 0)
        {
            if(is_numeric($category['Category']['parent_id']))
            {
                $category = $this->Node->find('first', array(
                    'joins'=>array(
                        array(
                            'table'=>'categories',
                            'alias'=>'Category',
                            'type'=>'INNER',
                            'conditions'=>array('Category.node_id=Node.id')
                        )
                    ),
                    'conditions'=>array(
                        'Category.id'=>$category['Category']['parent_id']
                    ),
                    'fields'=>array('Node.*', 'Category.*')
                ));
            }

            $data = $this->Node->find('all', array(
                'joins'=>array(
                    array(
                        'table'=>'categories',
                        'alias'=>'Category',
                        'type'=>'INNER',
                        'conditions'=>array('Category.node_id=Node.id')
                    )
                ),
                'conditions'=>array(
                    'Category.lft >='=>$category['Category']['lft'],
                    'Category.rght <='=>$category['Category']['rght'],
                    'NOT'=>array(
                        'Category.id'=>$category['Category']['id']
                    )
                ),
                'fields'=>array('Node.*', 'Category.*'),
                'order'=>array('Node.pos'=>'desc', 'Node.id'=>'desc')
            ));
        }

        return $data;
    }

    public function news_detail($node_id)
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
                        'conditions'=>array('News.node_id = Node.id')
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
                'Node.id'=>$node_id
            ),
            'fields'=>array('Node.*', 'News.*', 'CategoryLinked.*')
        ));


        $category_node = $data['CategoryLinked']['category_id'];
        $category = $this->Category->findById($category_node);

        $list_cates = array();

        if(is_array($category) && count($category) > 0)
        {
            if(is_numeric($category['Category']['parent_id']))
            {
                $category = $this->Node->find('first', array(
                    'joins'=>array(
                        array(
                            'table'=>'categories',
                            'alias'=>'Category',
                            'type'=>'INNER',
                            'conditions'=>array('Category.node_id=Node.id')
                        )
                    ),
                    'conditions'=>array(
                        'Category.id'=>$category['Category']['parent_id']
                    ),
                    'fields'=>array('Node.*', 'Category.*')
                ));
            }

            $list_cates = $this->Node->find('all', array(
                'joins'=>array(
                    array(
                        'table'=>'categories',
                        'alias'=>'Category',
                        'type'=>'INNER',
                        'conditions'=>array('Category.node_id=Node.id')
                    )
                ),
                'conditions'=>array(
                    'Category.lft >='=>$category['Category']['lft'],
                    'Category.rght <='=>$category['Category']['rght'],
                    'NOT'=>array(
                        'Category.id'=>$category_node
                    )
                ),
                'fields'=>array('Node.*', 'Category.*'),
                'order'=>array('Node.pos'=>'desc', 'Node.id'=>'desc')
            ));
        }

        $data['extra_data'] = $list_cates;
        
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
                        'conditions'=>array('News.node_id = Node.id')
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
                'CategoryLinked.category_id'=>$ids,
                'NOT'=>array(
                    'Node.id'=>$data['Node']['id']
                )
            ),
            'limit'=>10,
            'fields'=>array('Node.*', 'News.*'),
            'group'=>'CategoryLinked.node_id',
            'order'=>array('Node.pos DESC', 'Node.id DESC')
        ));
        
        $data['comment'] = $this->Comment->find('all', array(
            'conditions'=>array(
                'Comment.node_id'=>$data['Node']['id'],
                'Comment.status'=>1,
            ),
            'order'=>array('Comment.id'=>'asc')
        ));

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