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

class Node extends AppModel
{
	public $name = 'Node';
	public $useTable = 'nodes';
        
        public function getPaginate($category_id, $node_type, $limit, $sort=array(), $order_id='desc', $filter_price = array())
        {
            $tbl = Inflector::pluralize($node_type);  
            $model = ucfirst($node_type);
            $category_id = $this->getCategoryTree($category_id);


            if(is_array($sort) && count($sort) > 0)
            {
                $sort['Node.pos'] = 'desc';
                $sort['Node.id'] = 'desc';
            }
            else
            {
                $sort = array('Node.pos'=>'desc', 'Node.id'=>$order_id);
            }

            $i = 0;
            $n = count($sort);
            $order = '';

            foreach($sort as $k=>$v)
            {
                $i++;
                
                if($node_type != 'product' && preg_match('/^Product/', $k))
                    continue;

                $order .= $k . ' ' . $v;

                if($i < $n)
                    $order .= ', ';
            }

            $conn['Node.status'] = 1;
            $conn['Node.type'] = $node_type;
            $conn[$model. '.featured'] = 0;
            $conn['CategoryLinked.category_id'] = $category_id;

            if(is_array($filter_price) && count($filter_price) > 0)
            {
                if($node_type == 'product')
                {
                    if(isset($filter_price['min']))
                        $conn['Product.price >='] = $filter_price['min'];
                    
                    if(isset($filter_price['max']))
                        $conn['Product.price <='] = $filter_price['max'];
                }
            }

            // pr($conn);

            return array(
                'joins'=>array(
                    array(
                        'table'=>$tbl,
                        'alias'=>$model,
                        'type'=>'INNER',
                        'conditions'=>array('Node.id=' . $model.'.node_id')
                    ),
                    array(
                        'table'=>'category_linkeds',
                        'alias'=>'CategoryLinked',
                        'type'=>'INNER',
                        'conditions'=>array('Node.id = CategoryLinked.node_id')
                    )
                ),
                'conditions'=>$conn,
                'limit'=>$limit,
                'fields'=>array('Node.*', $model . '.*'),
                'group'=>'CategoryLinked.node_id',
                'order'=> $order
            );
        }
        
        /**
         * Nếu node_type là page thì $category_id là id của node
         */
        public function findNode($node_type, $category_id = null, $limit = 10)
        {
            $table = Inflector::pluralize($node_type);
            $alias = ucfirst($node_type);
            $conn = array();
            
            $conn['Node.status'] = 1;
            $conn['Node.type'] = $node_type;
            
            if($node_type == 'page')
            {
                $limit = 1;
                unset($conn['Node.category_id']);
                $conn['Node.id'] = $category_id;
            }
            else
            {
                if($category_id != null)
                {
                    $conn['Node.category_id'] = $this->getCategoryTree($category_id);
                }
            }
            
            $find = $limit == 1 ? 'first' : 'all';
            
            return $this->find($find, array(
                'joins'=>array(
                    array(
                        'table' => $table,
                        'alias' => $alias,
                        'type'=>'INNER',
                        'conditions'=>array('Node.id='.$alias.'.node_id')
                    )
                ),
                'conditions'=>$conn,
                'fields'=>array('Node.*', $alias.'.*'),
                'limit'=>$limit,
                'order'=>array('Node.pos DESC', 'Node.id DESC')
            ));
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
}