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

class BuildController extends DefaultAppController 
{
    public $uses = array('Hang', 'Filter', 'Category', 'Node');

    public function beforeFilter() 
    {
        parent::beforeFilter();
        $this->autoRender = false;
    }

    public function get_data($cid)
    {
        $current_category = $this->getDetailCategory($cid);

        $data['cid'] = $current_category['Category']['id'];
        $data['cnid'] = $current_category['Node']['id'];
        $data['title'] = $current_category['Node']['title'];

        $data['_price'] = $this->get_filter_price($current_category, array());
        $data['_filter'] = $this->get_filter_filter($current_category, array());
        $data['_hang'] = $this->get_filter_hang($current_category, array());

        $data['products'] = $this->get_products($current_category, array());

        $data['has_filter_price'] = count($data['_price']) > 0 ? 1 : 0;
        $data['has_filter_filter'] = count($data['_filter']) > 0 ? 1 : 0;
        $data['has_filter_hang'] = count($data['_hang']) > 0 ? 1 : 0;

        
        if(isset($_GET['dev']))
            pr($data);

        echo json_encode($data); 
        die;
    }

    public function get_products($current_category, $filters, $limit = 20)
    {
        $lft = $current_category['Category']['lft'];
        $rght = $current_category['Category']['rght'];

        $key = PREFIX . '_ckey__' . $current_category['Category']['id'];
        $try = Cache::read($key);

        if($try === false)
        {
            $try = $this->Category->find('all', array(
                'conditions'=>array(
                    'Category.lft >=' => $lft,
                    'Category.rght <=' => $rght,
                )
            ));
        }

        $ids = array();

        foreach($try as $v)
        {
            $ids[] = $v['Category']['id'];
        }

        $conn['CategoryLinked.category_id'] = $ids;

        $d = $this->Node->find('all', array(
            'joins'=>array(
                array(
                    'table' => 'products',
                    'alias' => 'Product',
                    'type' => 'INNER',
                    'conditions' => array(
                        'Node.id = Product.node_id'
                    )
                ),
                array(
                    'table'=>'category_linkeds',
                    'alias'=>'CategoryLinked',
                    'type'=>'INNER',
                    'conditions'=>array('CategoryLinked.node_id = Node.id')
                )
            ),
            'conditions'=>$conn,
            'order'=>array('Node.pos'=>'desc', 'Node.id'=>'desc'),
            'limit'=>$limit,
            'group'=>'CategoryLinked.node_id',
            'fields' => array(
                'Node.id',  
                'Node.title',  
                'Node.slug',  
                'Product.image',  
                'Product.status',  
                'Product.baohanh',  
                'Product.price',  
            )
        ));

        return $d;
    }

    
    public function get_update_products($current_category_id)
    {
        $min = isset($_GET['min']) && $_GET['min'] > 0 ? (int)$_GET['min'] : '';
        $max = isset($_GET['max']) && $_GET['max'] > 0 ? (int)$_GET['max'] : '';
        $hang_id = isset($_GET['hang_id']) && $_GET['hang_id'] > 0 ? (int)$_GET['hang_id'] : '';
        $limit = isset($_GET['limit']) && $_GET['limit'] > 0 ? (int)$_GET['limit'] : 20;
        $sort = isset($_GET['sort']) && in_array($_GET['sort'], array('price-asc', 'price-desc')) ? $_GET['sort'] : '';
        
        $current_category = $this->getDetailCategory($current_category_id);
        
        $lft = $current_category['Category']['lft'];
        $rght = $current_category['Category']['rght'];
        
        $key = PREFIX . '_ckey__' . $current_category['Category']['id'];
        $try = Cache::read($key);
        $conn = array();

        $order = array('Node.pos' => 'desc', 'Node.id'=> 'desc');
        
        if($sort != '')
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
        
        if($try === false)
        {
            $try = $this->Category->find('all', array(
            'conditions'=>array(
                'Category.lft >=' => $lft,
                'Category.rght <=' => $rght,
                )
            ));
        }
            
        $ids = array();
        
        foreach($try as $v)
        {
            $ids[] = $v['Category']['id'];
        }
        
        $conn['CategoryLinked.category_id'] = $ids;
        
        if($hang_id != '')
        $conn['Product.hang_id'] = $hang_id;
        
        if($min != '')
        $conn['Product.price >='] = $min;
        
        if($max != '')
        $conn['Product.price <='] = $max;
        
        if($min > 0 && $max > 0)
        {
            if(isset($conn['Product.price >=']))
            unset($conn['Product.price >=']);
            
            if(isset($conn['Product.price <=']))
            unset($conn['Product.price <=']);
            
            $conn['AND']['Product.price >='] = $min;
            $conn['AND']['Product.price <='] = $max;
        }
        

        $d = $this->Node->find('all', array(
            'joins'=>array(
                array(
                    'table' => 'products',
                    'alias' => 'Product',
                    'type' => 'INNER',
                    'conditions' => array(
                        'Node.id = Product.node_id'
                    )
                ),
                array(
                    'table'=>'category_linkeds',
                    'alias'=>'CategoryLinked',
                    'type'=>'INNER',
                    'conditions'=>array('CategoryLinked.node_id = Node.id')
                )
            ),
            'conditions'=>$conn,
            'order'=>$order,
            'limit'=>$limit,
            'group'=>'CategoryLinked.node_id',
            'fields' => array(
                'Node.id',  
                'Node.title',  
                'Node.slug',  
                'Product.image',  
                'Product.status',  
                'Product.baohanh',  
                'Product.price',  
            )
        ));
        
        $res = array(
            'products'=>$d
        );
        echo json_encode($res); die;
    }
    
    public function get_filter_price($current_category, $return_array)
    {
        if(!is_array($current_category) || count($current_category) <= 0) return $return_array;

        if(isset($current_category['Category']['filter_price']) 
            && trim($current_category['Category']['filter_price']) != "")
        {
            $filterData = explode("\r", $current_category['Category']['filter_price']);
            $filters = array();
            
            foreach($filterData as $v)
            {
                $txt_arr = explode('|', $v);
                $filter = $txt_arr[1];
                $filter_arr = explode('-', $filter);

                $txt = trim($txt_arr[0]);
                $min = isset($filter_arr[0]) ? trim($filter_arr[0]) : 0;
                $max = isset($filter_arr[1]) ? trim($filter_arr[1]) : 0;

                $item = array(
                    'txt' => $txt,
                    'min' => $min,
                    'max' => $max,
                );
                $filters[] = $item;
            }

            return $filters;
        }
        else
        {
            if(is_numeric($current_category['Category']['parent_id']) && $current_category['Category']['parent_id'] > 0)
            {
                $check = $this->getDetailCategory($current_category['Category']['parent_id']);

                if(is_array($check) && count($check) > 0)
                    return $this->get_filter_price($check, $return_array);
                else
                    return $return_array;
            }
            else
                return $return_array;
        }
        
        return $return_array;
    }
    public function get_filter_hang($current_category, $return_array)
    {
        if(!is_array($current_category) || count($current_category) <= 0) return $return_array;

        if(isset($current_category['Category']['hang_id_list']) 
            && trim($current_category['Category']['hang_id_list']) != "")
        {
            $filterData = explode(",", $current_category['Category']['hang_id_list']);
            
            $filters = array();
            
            foreach($filterData as $v)
            {
                $hang = $this->Hang->findById($v);

                if(is_array($hang) && count($hang) > 0)
                {
                    $item = array();
                    $item['id'] = $hang['Hang']['id'];
                    $item['title'] = $hang['Hang']['title'];

                    $filters[] = $item;
                }
            }

            return $filters;
        }
        else
        {
            if(is_numeric($current_category['Category']['parent_id']) && $current_category['Category']['parent_id'] > 0)
            {
                $check = $this->getDetailCategory($current_category['Category']['parent_id']);

                if(is_array($check) && count($check) > 0)
                    return $this->get_filter_hang($check, $return_array);
                else
                    return $return_array;
            }
            else
                return $return_array;
        }

        return $return_array;
    }
    
    public function get_filter_filter($current_category, $return_array)
    {
        if(!is_array($current_category) || count($current_category) <= 0) return $return_array;

        if(isset($current_category['Category']['filter_id_list']) 
            && trim($current_category['Category']['filter_id_list']) != "")
        {
            $filterData = explode(",", $current_category['Category']['filter_id_list']);
            
            $filters = array();
            
            foreach($filterData as $v)
            {
                $d = $this->Filter->findById($v);

                if(is_array($d) && count($d) > 0)
                {
                    $item = array();
                    $item['id'] = $d['Filter']['id'];
                    $item['title'] = $d['Filter']['title'];
                    $filters[] = $item;
                }
            }

            return $filters;
        }
        else
        {
            if(is_numeric($current_category['Category']['parent_id']) && $current_category['Category']['parent_id'] > 0)
            {
                $check = $this->getDetailCategory($current_category['Category']['parent_id']);

                if(is_array($check) && count($check) > 0)
                    return $this->get_filter_filter($check, $return_array);
                else
                    return $return_array;
            }
            else
                return $return_array;
        }

        return $return_array;
    }
    
    public function getDetailCategory($cid)
    {
        $d = Cache::read(PREFIX . 'cid_' . $cid);

        if($d === false)
        {
            $d = $this->Category->find('first', array(
                'joins'=>array(
                    array(
                        'table'=>'nodes',
                        'alias'=>'Node',
                        'type'=>'INNER',
                        'conditions'=>array('Node.id=Category.node_id')
                    ),
                ),
                'conditions'=>array(
                    'Category.id' => $cid
                ),
                'fields'=>array('Node.*', 'Category.*'),
            ));
        }

        return $d;
    }
}