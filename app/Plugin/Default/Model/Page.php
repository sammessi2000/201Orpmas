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

class Page extends AppModel
{
    public $useTable = 'pages';
    public $name = 'Page';
    
    public function get_tree_list($category_lft, $category_rght)
    {
        $arr = array();
        $data = $this->Category->find('all', array(
            'joins'=>array(
                array(
                    'table'=>'nodes',
                    'alias'=>'Node',
                    'type'=>'INNER',
                    'conditions'=>array('Node.id = Category.node_id')
                )
            ),
            'conditions'=>array(
                'Category.lft >=' => $category_lft,
                'Category.rght <=' => $category_rght
            ),
            'fields'=>array('Node.*')
        ));
        
        foreach($data as $v)
        {
            $arr[] = $v['Node']['id'];
        }
        
        return $arr;
    }
    
    public function page_detail($node_id = null)
    {
        $this->Category = ClassRegistry::init('Category');
        
        $category = $this->Category->find('first', array(
            'joins'=>array(
                array(
                        'table'=>'nodes',
                        'alias'=>'Node',
                        'type'=>'INNER',
                        'conditions'=>array('Category.node_id = Node.id')
                )
            ),
            'conditions'=>array(
                'Category.node_id'=>$node_id
            ),
            'fields'=>array('Category.*', 'Node.*')
        ));

        // $data = array();
        
        // if(is_array($category) && count($category)>0)
        // {
        //     $data = $this->find('first', array(
        //         'joins'=>array(
        //             array(
        //                     'table'=>'nodes',
        //                     'alias'=>'Node',
        //                     'type'=>'INNER',
        //                     'conditions'=>array('Page.node_id = Node.id')
        //             )
        //         ),
        //         'conditions'=>array(
        //             'Node.type'=>'page',
        //             'Node.status'=>1,
        //             'Page.id'=>$category['Category']['page_id']
        //         ),
        //         'fields'=>array('Node.*', 'Page.*')
        //     ));
        // }

        // if(!is_array($data) || count($data) <=0)
        // {
        //     $data = $this->find('first', array(
        //         'joins'=>array(
        //             array(
        //                     'table'=>'nodes',
        //                     'alias'=>'Node',
        //                     'type'=>'INNER',
        //                     'conditions'=>array('Page.node_id = Node.id')
        //             )
        //         ),
        //         'conditions'=>array(
        //             'Node.type'=>'page',
        //             'Node.status'=>1,
        //             'Node.id'=>$node_id
        //         ),
        //         'fields'=>array('Node.*', 'Page.*')
        //     ));
        // }
        
        $data['related'] = null;
        
        // $data['related'] = $this->find('all', array(
        //     'joins'=>array(
        //         array(
        //                 'table'=>'nodes',
        //                 'alias'=>'Node',
        //                 'type'=>'INNER',
        //                 'conditions'=>array('Page.node_id = Node.id')
        //         )
        //     ),
        //     'conditions'=>array(
        //         'Node.type'=>'page',
        //         'Node.status'=>1,
        //         'Node.category_id'=>$data['Node']['category_id']
        //     ),
        //     'fields'=>array('Node.*', 'Page.*')
        // ));;
        
        return $category;
    }
}