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

class AdminJobController extends AdminAppController {

    public $uses = array('Job', 'Admin.Category', 'Node', 'CategoryLinked');

    public function beforeFilter() 
    {
        parent::beforeFilter();
    }

    public function job_list() {
        $conditions = array();
        // $conditions['Node.type'] = 'document';
        
        // $filter_category = isset($_GET['list_category']) ? $_GET['list_category'] : '';
        // $filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : '';
                
        // if($filter_category != '')
        // {
        //     $check_cat = $this->Category->findById($filter_category);
        //     $data_check_cat = $this->Category->find('all', array(
        //         'conditions'=>array(
        //             'Category.lft >=' => $check_cat['Category']['lft'],
        //             'Category.rght <=' => $check_cat['Category']['rght']
        //         )
        //     ));

        //     $buff[] = array();

        //     foreach($data_check_cat as $v)
        //     {
        //         $buff[] = $v['Category']['id'];
        //     }

        //     $conditions['CategoryLinked.category_id'] = $buff;
        // }
        
        // if($filter_status != '')
        //     $conditions['Node.status'] = $filter_status;
            
        $this->paginate = array(
            // 'joins'=>array(
            //     array(
            //         'table'=>'documents',
            //         'alias'=>'Job',
            //         'type'=>'INNER',
            //         'conditions'=>array('Job.node_id = Node.id')
            //     ),
            //     array(
            //         'table'=>'category_linkeds',
            //         'alias'=>'CategoryLinked',
            //         'type'=>'LEFT',
            //         'conditions'=>'CategoryLinked.node_id = Node.id'
            //     )
            // ),
            // 'conditions'=> $conditions,
            'limit' => 10,
            // 'order' => 'Node.pos DESC, Node.id DESC',
            'order' => 'Job.pos DESC, Job.id DESC',
            // 'group'=>'CategoryLinked.node_id',
            // 'fields'=>array('Node.*', 'Job.*')
        );
        
        // $this->data = $this->paginate('Node');
        $this->data = $this->paginate('Job');
        // $this->set('filter_category', $filter_category);
        // $this->set('filter_status', $filter_status);
    }

    public function job_add() {
        if ($this->data) {
            // $data = $this->data;
            $data = $this->data['Job'];
            $data_yeucau = (isset($this->data['Yeucau']) && is_array($this->data['Yeucau']) && count($this->data['Yeucau']) > 0) ? $this->data['Yeucau'] : array();
            $data_thongtin = (isset($this->data['Thongtin']) && is_array($this->data['Thongtin']) && count($this->data['Thongtin']) > 0) ? $this->data['Thongtin'] : array();
            $data_hoso = (isset($this->data['Hoso']) && is_array($this->data['Hoso']) && count($this->data['Hoso']) > 0) ? $this->data['Hoso'] : array();

            $data['yeucau'] = isset($data_yeucau['yeucau']) ? $data_yeucau['yeucau'] : $data_yeucau;
            $data['yeucau'] = json_encode($data['yeucau']);
            
            $data['thongtin'] = isset($data_thongtin['thongtin']) ? $data_thongtin['thongtin'] : $data_thongtin;
            $data['thongtin'] = json_encode($data['thongtin']);

            if(isset($data['hosomau']))
                $data['hosomau'] = $this->remove_hostname($data['hosomau']);

            $data['hoso'] = isset($data_hoso['hoso']) ? $data_hoso['hoso'] : $data_hoso;
            $data['hoso'] = json_encode($data['hoso']);

            // pr($data);
            // die;

            $this->Job->save($data);
            $job_id = $this->Job->getLastInsertID();

            $this->Session->setFlash('Đã thêm', 'success');

            if(isset($_GET['copy']) && $_GET['copy'] == 1)
            {
                $this->redirect($this->referer()); 
                die;
            }
            else 
            {
                $this->redirect($this->get_redirect('job', 'add', $job_id)); 
                die;
            }
        }
    }

    public function job_edit($id = null) {
        if ($this->data) {
            $data = $this->data['Job'];

            $data_yeucau = (isset($this->data['Yeucau']['yeucau']) && is_array($this->data['Yeucau']['yeucau']) && count($this->data['Yeucau']['yeucau']) > 0) ? json_encode($this->data['Yeucau']['yeucau']) : json_encode(array());
            $data_yeucau_cn = (isset($this->data['Yeucau']['yeucau_cn']) && is_array($this->data['Yeucau']['yeucau_cn']) && count($this->data['Yeucau']['yeucau_cn']) > 0) ? json_encode($this->data['Yeucau']['yeucau_cn']) : json_encode(array());
            $data_yeucau_en = (isset($this->data['Yeucau']['yeucau_en']) && is_array($this->data['Yeucau']['yeucau_en']) && count($this->data['Yeucau']['yeucau_en']) > 0) ? json_encode($this->data['Yeucau']['yeucau_en']) : json_encode(array());

            $data_thongtin = (isset($this->data['Thongtin']['thongtin']) && is_array($this->data['Thongtin']['thongtin']) && count($this->data['Thongtin']['thongtin']) > 0) ? json_encode($this->data['Thongtin']['thongtin']) : json_encode(array());
            $data_thongtin_cn = (isset($this->data['Thongtin']['thongtin_cn']) && is_array($this->data['Thongtin']['thongtin_cn']) && count($this->data['Thongtin']['thongtin_cn']) > 0) ? json_encode($this->data['Thongtin']['thongtin_cn']) : json_encode(array());
            $data_thongtin_en = (isset($this->data['Thongtin']['thongtin_en']) && is_array($this->data['Thongtin']['thongtin_en']) && count($this->data['Thongtin']['thongtin_en']) > 0) ? json_encode($this->data['Thongtin']['thongtin_en']) : json_encode(array());

            $data_hoso = (isset($this->data['Hoso']['hoso']) && is_array($this->data['Hoso']['hoso']) && count($this->data['Hoso']['hoso']) > 0) ? json_encode($this->data['Hoso']['hoso']) : json_encode(array());
            $data_hoso_cn = (isset($this->data['Hoso']['hoso_cn']) && is_array($this->data['Hoso']['hoso_cn']) && count($this->data['Hoso']['hoso_cn']) > 0) ? json_encode($this->data['Hoso']['hoso_cn']) : json_encode(array());
            $data_hoso_en = (isset($this->data['Hoso']['hoso_en']) && is_array($this->data['Hoso']['hoso_en']) && count($this->data['Hoso']['hoso_en']) > 0) ? json_encode($this->data['Hoso']['hoso_en']) : json_encode(array());

            if(isset($data['hosomau']))
                $data['hosomau'] = $this->remove_hostname($data['hosomau']);

            $data['hoso'] = $data_hoso;
            $data['hoso_cn'] = $data_hoso_cn;
            $data['data_hoso_en'] = $data_hoso_en;

            $data['yeucau'] = $data_yeucau;
            $data['yeucau_cn'] = $data_yeucau_cn;
            $data['yeucau_en'] = $data_yeucau_en;

            $data['thongtin'] = $data_thongtin;
            $data['thongtin_cn'] = $data_thongtin_cn;
            $data['thongtin_en'] = $data_thongtin_en;

            $data['modified'] = time();

// pr($data); 
// pr($this->data); 
// pr($data_yeucau); 
// die;

            $this->Job->id = $id;
            $this->Job->save($data);

            $this->Session->setFlash('Đã sửa', 'success');
            $this->redirect($this->get_redirect('job', 'edit', $id)); die;
        }

        $this->data = $this->Job->findById($id);

        // $this->data = $this->Job->find('first', array(
        //     'joins'=>array(
        //         array(
        //             'table'=>'nodes',
        //             'alias'=>'Node',
        //             'type'=>'INNER',
        //             'conditions'=>array('Node.id = Job.node_id')
        //         )
        //     ),
        //     'conditions'=>array(
        //         'Node.id'=>$id
        //     ),
        //     'fields'=>array('Node.*', 'Job.*')
        // ));

        // $cats = $this->CategoryLinked->find('all', array(
        //     'conditions'=>array(
        //         'CategoryLinked.node_id' => $id
        //     ),
        //     'fields'=>'category_id'
        // ));

        // $buff = array();

        // if(is_array($cats) && count($cats) > 0)
        // {
        //     foreach($cats as $v)
        //     {
        //         $buff[] = $v['CategoryLinked']['category_id'];
        //     }
        // }

        // $this->set('cat_selected', $buff);
    }

    public function save_pos() {
        $vitri = $_POST['pos'];
        foreach ($vitri as $k => $v) {
            if ($v == "") {
                $v = 0;
            }
            $this->Job->updateAll(
                    array(
                'Job.pos' => $v,
                    ), array(
                'Job.id' => $k
                    )
            );
        }

        $this->redirect($this->referer());
    }

    public function job_delete($id = null) {
        $this->autoRender = false;
        $this->Job->id = $id;
        $this->Job->delete($id);
        $this->Session->setFlash('Đã xóa');
        $this->redirect($this->referer());
    }

}
