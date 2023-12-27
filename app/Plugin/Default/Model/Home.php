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

class Home extends AppModel
{
    public $useTable = 'admins';
    public $name = 'Home';
    
    public function getHomeData()
    {
        // $category_gioithieu_cid = 95;

        // $category_namtai_cid = 211;
        // $category_baotu_cid = 212;
        // $category_quatang_cid = 213;
        // $tinhoatdong_cid = 240;

        $this->Node = ClassRegistry::init('Node');
        $this->Team = ClassRegistry::init('Team');
        // $this->Video = ClassRegistry::init('Video');
        // $this->Rate = ClassRegistry::init('Rate');
        // $this->Category = ClassRegistry::init('Category');
        // $this->Bosuutap = ClassRegistry::init('Bosuutap');

        $lang_array = Configure::read('lang_array');
        $data = array();

        //Giới thiệu
        // $check = $this->Category->findById($category_gioithieu_cid);

        // if(is_array($check) && count($check) > 0)
        // {
        //     $data['gioithieu'] = $this->Node->find('first', array(
        //         'joins'=>array(
        //             array(
        //                     'table'=>'categories',
        //                     'alias'=>'Category',
        //                     'type'=>'INNER',
        //                     'conditions'=>array('Category.node_id = Node.id')
        //             )                    
        //         ),
        //         'conditions'=>array(
        //             'Node.type'=>'category',
        //             'Category.id'=>$category_gioithieu_cid,
        //             'Node.status'=>1,
        //         ),
        //         'fields'=>array('Node.*', 'Category.*'),
        //         'order'=>array('Node.pos DESC', 'Node.id DESC')
        //     ));
        // }


        // if(is_numeric($category_namtai_cid))
        // {
        //     $check = $this->Category->findById($category_namtai_cid);

        //     $lst = $this->Category->find('all', array(
        //         'conditions'=>array(
        //             'Category.lft >=' => $check['Category']['lft'],
        //             'Category.rght <=' => $check['Category']['rght']
        //         )
        //     ));

        //     $ids = array();
        //     foreach($lst as $v)
        //     {
        //         $ids[] = $v['Category']['id'];
        //     }

        //     $tbl = 'news';
        //     $alias = 'News';
        //     $node_type = 'news';

        //     if($check['Category']['type'] == 'collection')
        //     {
        //     	$tbl = 'collections';
        //     	$alias = 'Collection';
        //     	$node_type = 'collection';
        //     }

        //     if($check['Category']['type'] == 'product')
        //     {
        //         $tbl = 'products';
        //         $alias = 'Product';
        //         $node_type = 'product';
        //     }

        //     $data['category']['namtai'] = $check;

        //     $data['namtai'] = $this->Node->find('all', array(
        //         'joins'=>array(
        //             array(
        //                     'table'=>$tbl,
        //                     'alias'=>$alias,
        //                     'type'=>'INNER',
        //                     'conditions'=>array($alias . '.node_id = Node.id')
        //             ),
        //             array(
        //                 'table'=>'category_linkeds',
        //                 'alias'=>'CategoryLinked',
        //                 'type'=>'INNER',
        //                 'conditions'=>array('Node.id = CategoryLinked.node_id')
        //             )
        //         ),
        //         'conditions'=>array(
        //             'Node.type'=>$node_type,
        //             'Node.status'=>1,
        //             'CategoryLinked.category_id'=>$ids,
        //         ),
        //         'limit'=>4,
        //         'fields'=>array('Node.*', $alias . '.*'),
        //         'group'=>'CategoryLinked.node_id',
        //         'order'=>array('Node.pos DESC', 'Node.id DESC')
        //     ));
        // }


        // if(is_numeric($category_quatang_cid))
        // {
        //     $check = $this->Category->findById($category_quatang_cid);

        //     $lst = $this->Category->find('all', array(
        //         'conditions'=>array(
        //             'Category.lft >=' => $check['Category']['lft'],
        //             'Category.rght <=' => $check['Category']['rght']
        //         )
        //     ));

        //     $ids = array();
        //     foreach($lst as $v)
        //     {
        //         $ids[] = $v['Category']['id'];
        //     }

        //     $tbl = 'news';
        //     $alias = 'News';
        //     $node_type = 'news';

        //     if($check['Category']['type'] == 'collection')
        //     {
        //         $tbl = 'collections';
        //         $alias = 'Collection';
        //         $node_type = 'collection';
        //     }

        //     if($check['Category']['type'] == 'product')
        //     {
        //         $tbl = 'products';
        //         $alias = 'Product';
        //         $node_type = 'product';
        //     }

        //     $data['category']['quatang'] = $check;

        //     $data['quatang'] = $this->Node->find('all', array(
        //         'joins'=>array(
        //             array(
        //                     'table'=>$tbl,
        //                     'alias'=>$alias,
        //                     'type'=>'INNER',
        //                     'conditions'=>array($alias . '.node_id = Node.id')
        //             ),
        //             array(
        //                 'table'=>'category_linkeds',
        //                 'alias'=>'CategoryLinked',
        //                 'type'=>'INNER',
        //                 'conditions'=>array('Node.id = CategoryLinked.node_id')
        //             )
        //         ),
        //         'conditions'=>array(
        //             'Node.type'=>$node_type,
        //             'Node.status'=>1,
        //             'CategoryLinked.category_id'=>$ids,
        //         ),
        //         'limit'=>4,
        //         'fields'=>array('Node.*', $alias . '.*'),
        //         'group'=>'CategoryLinked.node_id',
        //         'order'=>array('Node.pos DESC', 'Node.id DESC')
        //     ));
        // }


        // if(is_numeric($category_baotu_cid))
        // {
        //     $check = $this->Category->findById($category_baotu_cid);

        //     $lst = $this->Category->find('all', array(
        //         'conditions'=>array(
        //             'Category.lft >=' => $check['Category']['lft'],
        //             'Category.rght <=' => $check['Category']['rght']
        //         )
        //     ));

        //     $ids = array();
        //     foreach($lst as $v)
        //     {
        //         $ids[] = $v['Category']['id'];
        //     }

        //     $tbl = 'news';
        //     $alias = 'News';
        //     $node_type = 'news';

        //     if($check['Category']['type'] == 'collection')
        //     {
        //         $tbl = 'collections';
        //         $alias = 'Collection';
        //         $node_type = 'collection';
        //     }

        //     if($check['Category']['type'] == 'product')
        //     {
        //         $tbl = 'products';
        //         $alias = 'Product';
        //         $node_type = 'product';
        //     }

        //     $data['category']['baotu'] = $check;

        //     $data['baotu'] = $this->Node->find('all', array(
        //         'joins'=>array(
        //             array(
        //                     'table'=>$tbl,
        //                     'alias'=>$alias,
        //                     'type'=>'INNER',
        //                     'conditions'=>array($alias . '.node_id = Node.id')
        //             ),
        //             array(
        //                 'table'=>'category_linkeds',
        //                 'alias'=>'CategoryLinked',
        //                 'type'=>'INNER',
        //                 'conditions'=>array('Node.id = CategoryLinked.node_id')
        //             )
        //         ),
        //         'conditions'=>array(
        //             'Node.type'=>$node_type,
        //             'Node.status'=>1,
        //             'CategoryLinked.category_id'=>$ids,
        //         ),
        //         'limit'=>4,
        //         'fields'=>array('Node.*', $alias . '.*'),
        //         'group'=>'CategoryLinked.node_id',
        //         'order'=>array('Node.pos DESC', 'Node.id DESC')
        //     ));
        // }


        // $check = $this->Category->findById($tinhoatdong_cid);

        // if(is_array($check) && count($check) > 0)
        // {
        //     $lst = $this->Category->find('all', array(
        //         'conditions'=>array(
        //             'Category.lft >=' => $check['Category']['lft'],
        //             'Category.rght <=' => $check['Category']['rght']
        //         )
        //     ));

        //     $ids = array();
        //     foreach($lst as $v)
        //     {
        //         $ids[] = $v['Category']['id'];
        //     }

        //     $tbl = 'news';
        //     $alias = 'News';
        //     $node_type = 'news';

        //     if($check['Category']['type'] == 'collection')
        //     {
        //     	$tbl = 'collections';
        //     	$alias = 'Collection';
        //     	$node_type = 'collection';
        //     }

        //     $data['category']['tinhoatdong'] = $check;

        //     $data['tinhoatdong'] = $this->Node->find('all', array(
        //         'joins'=>array(
        //             array(
        //                     'table'=>$tbl,
        //                     'alias'=>$alias,
        //                     'type'=>'INNER',
        //                     'conditions'=>array($alias . '.node_id = Node.id')
        //             ),
        //             array(
        //                 'table'=>'category_linkeds',
        //                 'alias'=>'CategoryLinked',
        //                 'type'=>'INNER',
        //                 'conditions'=>array('Node.id = CategoryLinked.node_id')
        //             )
        //         ),
        //         'conditions'=>array(
        //             'Node.type'=>$node_type,
        //             'Node.status'=>1,
        //             'CategoryLinked.category_id'=>$ids,
        //         ),
        //         'limit'=>6,
        //         'fields'=>array('Node.*', $alias . '.*'),
        //         'group'=>'CategoryLinked.node_id',
        //         'order'=>array('Node.pos DESC', 'Node.id DESC')
        //     ));
        // }
        // else
        // {
        //     $data['category']['tinhoatdong'] = array();
        //     $data['tinhoatdong'] = array();
        // }


        // $data['xuhuong'] = $this->Node->find('all', array(
        //     'joins'=>array(
        //             array(
        //                 'table'=>'products',
        //                 'alias'=>'Product',
        //                 'type'=>'INNER',
        //                 'conditions'=>array('Product.node_id = Node.id')
        //         )                    
        //     ),
        //     'conditions'=>array(
        //         'Node.type'=>'product',
        //         'Node.status'=>1,
        //         'Product.xuhuong'=>1,
        //     ),
        //     'limit'=>9,
        //     'fields'=>array('Node.*', 'Product.*'),
        //     'order'=>array('Node.pos' => 'desc', 'Node.id' => 'desc')
        // ));




        //  $data['khuyenmai'] = $this->Node->find('all', array(
        //      'joins'=>array(
        //              array(
        //                  'table'=>'products',
        //                  'alias'=>'Product',
        //                  'type'=>'INNER',
        //                  'conditions'=>array('Product.node_id = Node.id')
        //          )                    
        //      ),
        //      'conditions'=>array(
        //          'Node.type'=>'product',
        //          'Node.status'=>1,
        //          'Product.price_off >'=>0,
        //      ),
        //      'limit'=>8,
        //      'fields'=>array('Node.*', 'Product.*'),
        //      'order'=>array('Node.pos' => 'desc', 'Node.id' => 'desc')
        //  ));

        // $data['videos'] = $this->Video->find('all', array(
        //     'limit'=>8,
        //     'order'=>array('Video.pos' => 'desc', 'Video.id' => 'desc')
        // ));

        // $data['bosuutap'] = $this->Bosuutap->find('all', array(
        //     'limit'=>2,
        //     'order'=>array('Bosuutap.pos' => 'desc', 'Bosuutap.id' => 'asc')
        // ));

        
        
        // $data['sanpham_nb'] = $this->Node->find('all', array(
        //     'joins'=>array(
        //             array(
        //                 'table'=>'products',
        //                 'alias'=>'Product',
        //                 'type'=>'INNER',
        //                 'conditions'=>array('Product.node_id = Node.id')
        //         )                    
        //     ),
        //     'conditions'=>array(
        //         'Node.type'=>'product',
        //         'Node.status'=>1,
        //         'Product.featured'=>1,
        //     ),
        //     'limit'=>8,
        //     'fields'=>array('Node.*', 'Product.*'),
        //     'order'=>array('Node.pos' => 'desc', 'Node.id' => 'desc')
        // ));

        // $data['categories'] = $this->Category->find('all', array(
        //     'joins'=>array(
        //         array(
        //             'table'=>'nodes',
        //             'alias'=>'Node',
        //             'conditions'=>array('Node.id = Category.node_id'),
        //             'type'=>'INNER'
        //         )
        //     ),
        //     'conditions'=>array(
        //         'Category.home'=>1,
        //         // 'Category.parent_id'=>NULL
        //     ),
        //     'order'=>array('Node.pos'=>'desc', 'Node.id'=>'desc'),
        //     'fields'=>array('Node.*', 'Category.*')
        // ));



        //List tất cả mục lục hiển thị trang chủ

        // $data['cats'] = $this->Category->find('all', array(
        //     'joins'=>array(
        //         array(
        //             'table'=>'nodes',
        //             'alias'=>'Node',
        //             'conditions'=>array('Node.id = Category.node_id'),
        //             'type'=>'INNER'
        //         )
        //     ),
        //     'conditions'=>array(
        //         'Category.parent_id'=>103
        //     ),
        //     'order'=>array('Node.pos'=>'desc', 'Node.id'=>'desc'),
        //     'fields'=>array('Node.*', 'Category.*')
        // ));

        // foreach($data['cats'] as $v)
        // {
        //     $data[$v['Category']['id']]['category'] = $v;
        //     $arr = array();
        //     $check = $this->Category->find('all', array(
        //         'conditions'=>array(
        //             'Category.lft >='=>$v['Category']['lft'],
        //             'Category.rght <='=>$v['Category']['rght']
        //         )
        //     ));

        //     foreach ($check as $key => $value) {
        //         $arr[] = $value['Category']['id'];
        //     }

        //     $data[$v['Category']['id']]['data'] = $this->Node->find('all', array(
        //         'joins'=>array(
        //             array(
        //                 'table'=>'news',
        //                 'alias'=>'News',
        //                 'type'=>'INNER',
        //                 'conditions'=>array(
        //                     'News.node_id = Node.id',
        //                 )
        //             ), 
        //             array(
        //                 'table'=>'category_linkeds',
        //                 'alias'=>'CategoryLinked',
        //                 'type'=>'INNER',
        //                 'conditions'=>array('Node.id = CategoryLinked.node_id')
        //             )
        //         ),
        //         'conditions'=>array(
        //             'Node.status'=>1,
        //             'Node.type'=>'news',
        //             'CategoryLinked.category_id'=>$arr
        //         ),
        //         'order'=>array('Node.pos'=>'desc','Node.id'=>'desc'),
        //         'fields'=>array('Node.*', 'News.*', 'CategoryLinked.*'),
        //         'group'=>'CategoryLinked.node_id',
        //         'limit'=>6
        //     ));
        // }


        // $data['rates'] = $this->Rate->find('all', array(
        //     'order'=>array('Rate.id'=>'desc'),
        //     'limit'=>10
        // ));

        // $data['featured'] = $this->Node->find('all', array(
        //     'joins'=>array(
        //             array(
        //                 'table'=>'products',
        //                 'alias'=>'Product',
        //                 'type'=>'INNER',
        //                 'conditions'=>array('Product.node_id = Node.id')
        //         )                    
        //     ),
        //     'conditions'=>array(
        //         'Node.type'=>'product',
        //         'Node.status'=>1,
        //         'Product.featured'=>1,
        //     ),
        //     'limit'=>8,
        //     'fields'=>array('Node.*', 'Product.*'),
        //     'order'=>array('Node.pos' => 'desc', 'Node.id' => 'desc')
        // ));

        // $data['home1'] = $this->Node->find('all', array(
        //     'joins'=>array(
        //             array(
        //                 'table'=>'products',
        //                 'alias'=>'Product',
        //                 'type'=>'INNER',
        //                 'conditions'=>array('Product.node_id = Node.id')
        //         )                    
        //     ),
        //     'conditions'=>array(
        //         'Node.type'=>'product',
        //         'Node.status'=>1,
        //         'Product.home1'=>1,
        //     ),
        //     'limit'=>8,
        //     'fields'=>array('Node.*', 'Product.*'),
        //     'order'=>array('Node.pos' => 'desc', 'Node.id' => 'desc')
        // ));

        // $data['home2'] = $this->Node->find('all', array(
        //     'joins'=>array(
        //             array(
        //                 'table'=>'products',
        //                 'alias'=>'Product',
        //                 'type'=>'INNER',
        //                 'conditions'=>array('Product.node_id = Node.id')
        //         )                    
        //     ),
        //     'conditions'=>array(
        //         'Node.type'=>'product',
        //         'Node.status'=>1,
        //         'Product.home2'=>1,
        //     ),
        //     'limit'=>8,
        //     'fields'=>array('Node.*', 'Product.*'),
        //     'order'=>array('Node.pos' => 'desc', 'Node.id' => 'desc')
        // ));

        // $data['home3'] = $this->Node->find('all', array(
        //     'joins'=>array(
        //             array(
        //                 'table'=>'products',
        //                 'alias'=>'Product',
        //                 'type'=>'INNER',
        //                 'conditions'=>array('Product.node_id = Node.id')
        //         )                    
        //     ),
        //     'conditions'=>array(
        //         'Node.type'=>'product',
        //         'Node.status'=>1,
        //         'Product.home3'=>1,
        //     ),
        //     'limit'=>8,
        //     'fields'=>array('Node.*', 'Product.*'),
        //     'order'=>array('Node.pos' => 'desc', 'Node.id' => 'desc')
        // ));

        // $data['home4'] = $this->Node->find('all', array(
        //     'joins'=>array(
        //         array(
        //             'table'=>'products',
        //             'alias'=>'Product',
        //             'type'=>'INNER',
        //             'conditions'=>array('Product.node_id = Node.id')
        //         )                    
        //     ),
        //     'conditions'=>array(
        //         'Node.type'=>'product',
        //         'Node.status'=>1,
        //         'Product.home4'=>1,
        //     ),
        //     'limit' => 8,
        //     'fields'=>array('Node.*', 'Product.*'),
        //     'order'=>array('Node.pos' => 'desc', 'Node.id' => 'desc')
        // ));

        $time = time();

        // $data['khoahoc'] = $this->Node->find('all', array(
        //     'joins'=>array(
        //         array(
        //             'table'=>'products',
        //             'alias'=>'Product',
        //             'type'=>'INNER',
        //             'conditions'=>array('Product.node_id = Node.id')
        //         )                    
        //     ),
        //     'conditions'=>array(
        //         'Node.type'=>'product',
        //         'Node.status'=>1,
        //         'Product.khaigiang >='=> $time,
        //     ),
        //     'limit' => 60,
        //     'fields'=>array('Node.*', 'Product.*'),
        //     'order'=>array('Node.pos' => 'desc', 'Node.id' => 'desc')
        // ));

        // $data['team'] = $this->Team->find('all', array(
        //     'conditions'=>array(
        //         'Team.featured'=> 1,
        //     ),
        //     'limit' => 60,
        //     'fields'=>array('Team.*'),
        //     'order'=>array('Team.pos' => 'desc', 'Team.id' => 'desc')
        // ));

        // $data['news_featured'] = $this->Node->find('all', array(
        //      'joins'=>array(
        //              array(
        //                  'table'=>'news',
        //                  'alias'=>'News',
        //                  'type'=>'INNER',
        //                  'conditions'=>array('News.node_id = Node.id')
        //          )                    
        //      ),
        //      'conditions'=>array(
        //          'Node.status'=>1,
        //          'News.featured'=>1,
        //      ),
        //      'limit'=>8,
        //      'fields'=>array('Node.*', 'News.image', 'News.description'),
        //      'order'=>array('Node.pos' => 'desc', 'Node.id' => 'desc')
        // ));

        // $data['news'] = $this->Node->find('all', array(
        //     'joins'=>array(
        //         array(
        //          'table'=>'news',
        //          'alias'=>'News',
        //          'type'=>'INNER',
        //          'conditions'=>array('News.node_id = Node.id')
        //          )                    
        //     ),
        //     'conditions'=>array(
        //          'Node.status'=>1,
        //         'News.featured' => 0
        //     ),
        //      'limit'=>12,
        //      'fields'=>array('Node.*', 'News.image', 'News.description'),
        //      'order'=>array('Node.pos' => 'desc', 'News.featured' => 'desc', 'Node.id' => 'desc')
        //  ));


        return $data;
    }
}