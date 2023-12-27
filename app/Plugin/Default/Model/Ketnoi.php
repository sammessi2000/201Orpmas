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

class Ketnoi extends AppModel
{
    public $useTable = 'ketnois';
    public $name = 'Ketnoi';

    public function getCategoryTree($category_id)
    {
        $this->Category = ClassRegistry::init('Category');
        
        $check = $this->Category->find('first', array(
            'conditions'=>array(
                'Category.id'=>$category_id
            )
        ));
        
        $list = $this->Category->find('all', array(
            'conditions'=>array(
                'Category.lft >=' => $check['Category']['lft'],
                'Category.rght <=' => $check['Category']['rght']
            )
        ));
        
        $buff = array();
        
        foreach($list as $v)
        {
            $buff[] = $v['Category']['id'];
        }
        
        return $buff;
    }

    public function getPaginate($category_id, $limit)
        {
            $tbl = 'ketnois';  
            $model = 'Ketnoi';
            $category_id = $this->getCategoryTree($category_id);

            $conn['Node.status'] = 1;
            $conn['Node.type'] = 'ketnoi';
            $conn[$model. '.featured'] = 0;
            $conn['Ketnoi.category_id'] = $category_id;

            return array(
                'joins'=>array(
                    array(
                        'table'=>$tbl,
                        'alias'=>$model,
                        'type'=>'INNER',
                        'conditions'=>array('Node.id=' . $model.'.node_id')
                    ),
                ),
                'conditions'=>$conn,
                'limit'=>$limit,
                'fields'=>array('Node.*', $model . '.*'),
                'order'=> array('Node.pos' => 'desc', 'Node.id'=> 'desc')
            );
        }


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
                        'table'=>'ketnois',
                        'alias'=>'Ketnoi',
                        'type'=>'INNER',
                        'conditions'=>array('Ketnoi.node_id = Node.id')
                ),
            ),
            'conditions'=>array(
                'Node.type'=>'ketnoi',
                'Node.status'=>1,
                'Ketnoi.category_id'=>$ids
            ),
            'limit'=>8,
            'fields'=>array('Node.*', 'Ketnoi.*'),
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
                        'conditions'=>array('Ketnoi.node_id = Node.id')
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
            'fields'=>array('Node.*', 'Ketnoi.*', 'CategoryLinked.*')
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
                        'conditions'=>array('Ketnoi.node_id = Node.id')
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
            'fields'=>array('Node.*', 'Ketnoi.*'),
            'group'=>'CategoryLinked.node_id',
            'order'=>array('Node.pos DESC', 'Node.id DESC')
        ));
        
        
        return $data;
    }
}