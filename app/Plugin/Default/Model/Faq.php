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

class Faq extends AppModel
{
    public $useTable = 'faqs';
    public $name = 'Faq';
    
    public function archive($node_id)
    {
        $data = null;

        $data = $this->find('all', array(
            'order'=>array('Faq.pos'=>'desc', 'Faq.id'=>'desc')
        ));

        return $data;
    }
    
    public function faq_detail($node_id = null)
    {
        $this->Category = ClassRegistry::init('Category');
        
        $category = $this->Category->find('first', array(
            'conditions'=>array(
                'Category.node_id'=>$node_id
            )
        ));

        $data = array();
        
        if(is_array($category) && count($category)>0)
        {
            $data = $this->find('first', array(
                'joins'=>array(
                    array(
                            'table'=>'nodes',
                            'alias'=>'Node',
                            'type'=>'INNER',
                            'conditions'=>array('Page.node_id = Node.id')
                    )
                ),
                'conditions'=>array(
                    'Node.type'=>'page',
                    'Node.status'=>1,
                    'Page.id'=>$category['Category']['page_id']
                ),
                'fields'=>array('Node.*', 'Page.*')
            ));
        }

        if(!is_array($data) || count($data) <=0)
        {
            $data = $this->find('first', array(
                'joins'=>array(
                    array(
                            'table'=>'nodes',
                            'alias'=>'Node',
                            'type'=>'INNER',
                            'conditions'=>array('Page.node_id = Node.id')
                    )
                ),
                'conditions'=>array(
                    'Node.type'=>'page',
                    'Node.status'=>1,
                    'Node.id'=>$node_id
                ),
                'fields'=>array('Node.*', 'Page.*')
            ));
        }
        
        $data['related'] = null;
       
        return $data;
    }
}