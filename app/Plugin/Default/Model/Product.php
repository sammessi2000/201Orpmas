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
    
    public function hook($current_category, $limit)
    {
        // $node_id = $current_category['Node']['id'];
        $category_ids = $this->getCategoryTree($current_category['Category']['id']);

        $price_from = isset($_GET['min']) ? (int)$_GET['min'] : -1;
        $price_to = isset($_GET['max']) ? (int)$_GET['max'] : 0;
        $brand = isset($_GET['brand']) ? (int)$_GET['brand'] : 0;
        $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
        $items = $_GET;

        $conn = array();

        if($price_from >= 0)
            $conn['Product.price >='] = $price_from;
            
        if($price_to > 0)
            $conn['Product.price <='] = $price_to;
        
        if($price_from > 0 && $price_to > 0)
        {
            if(isset($conn['Product.price >=']))
            unset($conn['Product.price >=']);
            
            if(isset($conn['Product.price <=']))
            unset($conn['Product.price <=']);

            $conn['AND']['Product.price >='] = $price_from;
            $conn['AND']['Product.price <='] = $price_to;
        }

        if($brand > 0)
            $conn['Product.hang_id'] = $brand;

        $filters = array();

        if(count($_GET) > 0)
        {
            foreach($_GET as $k => $item)
            {
                if(strpos($k, 'item-') !== false)
                {
                    $item = str_replace('item-', '', $item);
                    $item = preg_replace('/[^0-9]/', '', $item);

                    if($item > 0) 
                    {
                        $filters[] = $item;
                    }
                }
            }
        }

        $order = array('Node.pos' => 'desc', 'Node.id'=> 'desc');

        if(in_array($sort, array('price-asc', 'price-desc')))
        {
            $sort_arr = explode('-', $sort);

            if(isset($sort_arr[1]))
            {
                $order = array(
                    'Node.pos' => 'desc', 
                    'Node.id'=> 'desc',
                    'Product.price' => $sort_arr[1]
                );
            }
        }

        $joins = array(
            array(
                'table'=>'products',
                'alias'=>'Product',
                'type'=>'INNER',
                'conditions'=>array('Product.node_id = Node.id')
            ),
            array(
                'table'=>'category_linkeds',
                'alias'=>'CategoryLinked',
                'type'=>'INNER',
                'conditions'=>array('Node.id = CategoryLinked.node_id')
            )
        );

        if(count($filters) > 0)
        {
            $conn['FilterLinked.filter_item_id'] = $filters;
            $joins[] = array(
                'table'=>'filter_linkeds',
                'alias'=>'FilterLinked',
                'type'=>'INNER',
                'conditions'=>array('Node.id = FilterLinked.node_id')
            );
        }

        $conn['Node.status'] = 1;
        $conn['Node.type'] = 'product';
        $conn['CategoryLinked.category_id'] = $category_ids;


        // $this->Node = ClassRegistry::init('Node');
        $this->Image = ClassRegistry::init('Image');
        // $this->Comment = ClassRegistry::init('Comment');

        // $check = $this->Node->findById($node_id);
        // $read = $check['Node']['read'] + 1;
        // $this->Node->id = $node_id;
        // $this->Node->saveField('read', $read);
        
        $data = array(
            'joins' => $joins,
            'conditions'=>$conn,
            'group'=>'CategoryLinked.node_id',
            'order'=>$order,
            'limit'=>$limit,
            'fields'=>array('Node.*', 'Product.*', 'CategoryLinked.*')
        );
        

        // pr($data); 
        // pr($_GET); 
        // pr($conn); 
        // pr($filters); 
        // die;

        return $data;
    }

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
           'limit'=>8,
           'fields'=>array('Node.*', 'Product.*', 'CategoryLinked.*'),
            'group'=>'CategoryLinked.node_id',
           'order'=>array('Node.pos DESC', 'Node.id DESC')
       ));
        
        // $data['rates'] = $this->Rate->find('all', array(
        //     'conditions'=>array(
        //         'Rate.node_id'=>$node_id
        //     )
        // ));
        
        $images = $this->Image->find('all', array(
            'conditions'=>array(
                'Image.node_id'=>$node_id
            )
        ));

        $image_org = array(
            array(
                'Image' => array(
                    'node_id' => $node_id,
                    'image' => $data['Product']['image'],
                )
            )
        );

        $data['images'] = array_merge($image_org, $images);
        
        //  $data['comment'] = $this->Comment->find('all', array(
        //     'conditions'=>array(
        //         'Comment.node_id'=>$data['Node']['id'],
        //         'Comment.status'=>1,
        //         'Comment.parent_id'=>0
        //     ),
        //     'order'=>array('Comment.id'=>'desc')
        // ));
        
        return $data;
    }
}