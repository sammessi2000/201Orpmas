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

class AdminServiceController extends AdminAppController {

    public $uses = array('Service', 'Admin.Category', 'Node', 'CategoryLinked');

    public $type = 'service';
    public $tbl = 'Service';
    public $form_title = 'Dịch vụ';

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->set('form_title', $this->form_title);
        $this->set('type', $this->type);
        $this->set('tbl', $this->tbl);

        $this->get_categories(array('type'=>'service'));
    }

    public function index($node_id = null) {
            
        $tbl = $this->tbl;

        $this->paginate = array(
            'joins'=>array(
                array(
                    'table'=>'nodes',
                    'alias'=>'Node',
                    'type'=>'INNER',
                    'conditions'=>array($this->tbl . '.node_id = Node.id')
                ),
            ),
            'limit' => 10,
            'order' => array('Node.pos'=>'desc', 'Node.id'=>'desc'),
            'fields'=>array('Node.*', $this->tbl . '.*')
        );
        
        $this->data = $this->paginate($tbl);
        $this->set('node_id', $node_id);
    }

    public function add($node_id = null) {
        if($this->data)
        {
            $data = $this->data[$this->tbl];
            $data_node = $this->data['Node'];
            $data_node['type'] = 'service';
            
            if(isset($data['image']))
            $data['image'] = $this->remove_hostname($data['image']);

            $data['price'] = preg_replace('/[^0-9]/', '', $data['price']);

            $this->Node->save($data_node);
            $data['node_id'] = $this->Node->getLastInsertId();


            $this->{$this->tbl}->save($data);
            $lastID = $this->{$this->tbl}->getLastInsertId();

            $this->Session->setFlash('Đã thêm', 'success');
            $this->redirect(DOMAINAD . 'admin_'.$this->type.'/edit/' . $lastID);
        }
    }

    public function setting()
    {
        $f = 'cloud-compare';
        $s = $this->settings[$f];
        $setting = unserialize($s);

        $fields = array(
            'cpu' => 'CPU', 
            'ram' => 'Ram', 
            'hdd' => 'HDD', 
            'bandwidth' => 'Băng thông', 
            'price' => 'Giá thành 24 tháng',
            'price2y' => 'Giá đk >= 1 tháng',
            'price3y' => 'Giá đk >= 3 tháng',
            'price4y' => 'Giá đk >= 6 tháng',
            'price5y' => 'Giá đk >= 12 tháng',
        );


        if($this->data)
        {
            $data = $this->data;

            $buff = array();

            foreach($fields as $k=>$v)
            {
                if(isset($data[$k]['show']))
                {
                    $buff[$k]['show'] = $data[$k]['show'];
                    $buff[$k]['title'] = $v;
                }
                else
                {
                    $buff[$k]['title'] = $fields[$k];
                    $buff[$k]['show'] = 0;
                }
            }

            $save = serialize($buff);

            $check = $this->Setting->findByName($f);
            $this->Setting->id = $check['Setting']['id'];
            $this->Setting->saveField('value', $save);

            $this->redirect(DOMAINAD . 'admin_'.$this->type.'/setting');
            die;
        }

        $data = array();

        foreach($fields as $k=>$v)
        {
            if(isset($setting[$k]))
            {
                $data[$k]['title'] = $fields[$k];
                $data[$k]['show'] = $setting[$k]['show'];
            }
            else
            {
                $data[$k]['title'] = $fields[$k];
                $data[$k]['show'] = 0;
            }
        }

        $this->data = $data;
    }

    public function edit($id = null) {
        if ($this->data) {
            $data = $this->data[$this->tbl];
            $data_node = $this->data['Node'];
            $data_node['type'] = 'service';

            if(isset($data['image']))
            $data['image'] = $this->remove_hostname($data['image']);

            $data['price'] = preg_replace('/[^0-9]/', '', $data['price']);

            $check = $this->{$this->tbl}->findById($id);
            $node_id = $check[$this->tbl]['node_id'];

            $this->Node->id = $node_id;
            $this->Node->save(array(
                'title'=>$data_node['title'],
                'status'=>$data_node['status'],
            ));

            $this->{$this->tbl}->id = $id;
            $this->{$this->tbl}->save($data);

            $this->Session->setFlash('Đã sửa', 'success');
            $this->redirect(DOMAINAD . 'admin_'.$this->type.'/index/');
        }

        $this->data = $this->{$this->tbl}->find('first', array(
            'joins'=>array(
                array(
                    'table'=>'nodes',
                    'alias'=>'Node',
                    'type'=>'INNER',
                    'conditions'=>array($this->tbl . '.node_id = Node.id')
                ),
            ),
            'conditions'=>array(
                $this->tbl.'.id'=>$id
            ),
            'fields'=>array('Node.*', $this->tbl . '.*')
        ));
    }

    public function copy($node_id)
    {
        $this->edit($node_id);
    }

    public function count_node($node_id)
    {
        $this->autoRender = false;

        $tbl = $this->tbl;

        return $this->{$this->tbl}->find('count', array(
            'conditions'=>array(
                $tbl . '.node_id'=>$node_id
            )
        ));
    }

    public function delete($id = null)
    {
        $this->autoRender = false;
        $this->{$this->tbl}->delete($id);
        $this->Session->setFlash('Đã xóa', 'success');
        $this->redirect($this->referer());
    }
}
