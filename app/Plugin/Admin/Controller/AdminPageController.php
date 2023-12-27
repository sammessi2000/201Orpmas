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

App::uses('CKEditor', 'Vendor');
App::uses('CKFinder', 'Vendor');

class AdminPageController extends AdminAppController {

    public $uses = array('Node', 'Page');
    
    public function beforeFilter()
    {
    	parent::beforeFilter();
        
        $this->Session->delete('news_title');
        $this->Session->delete('news_title_org');
    }
    
    public function page_list()
    {
        $this->paginate = array(
            'joins'=>array(
                array(
                    'table'=>'pages',
                    'alias'=>'Page',
                    'type'=>'INNER',
                    'conditions'=>array('Node.id=Page.node_id')
                )
            ),
            'conditions'=>array(
                'Node.type'=>'page'
            ),
            'order'=>array('Node.pos DESC', 'Node.id DESC'),
            'fields'=>array('Node.*, Page.*'),
            'limit' => 12
        );
        
        $this->data = $this->paginate('Node');
    }
    
    public function page_add()
    {
        if($this->data)
        {
            $data_node = $this->data['Node'];
            $data_page = $this->data['Page'];
            
            $data_node['type'] = 'page';
            $data_node['slug'] = Inflector::slug(strtolower($data_node['title']), '-');
            
            $check = $this->Node->findBySlug($data_node['slug']);
            if(is_array($check) && count($check) > 0)
            {
                $this->Session->setFlash("Tên đã tồn tại", "error");
                $this->redirect($this->referer()); die;
            }
            
            $this->Node->save($data_node);
            $node_id = $this->Node->getLastInsertID();
            
            $data_page['node_id'] = $node_id;
            $data_page['image'] = $this->remove_hostname($data_page['image']);
            $this->Page->save($data_page);
            
            $this->Session->setFlash("Đã thêm", "success");
            $this->redirect($this->referer()); die;
        }
    }
    
    public function page_edit($node_id)
    {
        if($this->data)
        {
            $data_node = $this->data['Node'];
            $data_page = $this->data['Page'];
            
            $data_node['type'] = 'page';
            $data_node['slug'] = strtolower(Inflector::slug($data_node['title'], '-'));
            
            $check = $this->Node->find('first', array(
                'conditions'=>array(
                    'Node.slug'=>$data_node['slug'],
                    'NOT'=>array(
                        'Node.id' => $node_id
                    )
                )
            ));
            
            if(is_array($check) && count($check) > 0)
            {
                $this->Session->setFlash("Tên đã tồn tại", "error");
                $this->redirect($this->referer()); die;
            }
            
            $this->Node->id = $node_id;
            $this->Node->save($data_node);
//            $update = array();
//            $conn = array('Node.id'=>$node_id);
//            
//            foreach($data_node as $k=>$v)
//            {
//                $update[$k] = '"' . $v . '"';
//            }
//            
//            $this->Node->updateAll($update, $conn);
            
            $data_page['node_id'] = $node_id;
            $data_page['image'] = $this->remove_hostname($data_page['image']);
            
            $check_page = $this->Page->find('first', array(
                'conditions'=>array(
                    'Page.node_id'=>$node_id
                )
            ));
            
            $this->Page->id = $check_page['Page']['id'];
            $this->Page->save($data_page);
            
//            $update = array();
//            $conn = array('Page.node_id'=>$node_id);
//            
//            foreach($data_page as $k=>$v)
//            {
//                $update[$k] = '"' . $v . '"';
//            }
//            
//            $this->Page->updateAll($update, $conn);            
            
            $this->Session->setFlash("Đã sửa", "success");
            $this->redirect($this->referer()); die;
        }
        
        $this->data = $this->Node->find('first', array(
            'joins'=>array(
                array(
                    'table'=>'pages',
                    'alias'=>'Page',
                    'type'=>'INNER',
                    'conditions'=>array('Page.node_id=Node.id')
                )
            ),
            'conditions'=>array(
                'Node.id'=>$node_id
            ),
            'fields'=>array('Page.*, Node.*')
        ));
    }
}