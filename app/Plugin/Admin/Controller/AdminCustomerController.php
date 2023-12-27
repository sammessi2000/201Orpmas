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

App::import('Vendor', 'phpexcel');
class AdminCustomerController extends AdminAppController
{
    public $uses = array('Customer', 'Admin');
    
    public function customer_list()
    {
        $this->_role('customer_list');
        $this->paginate = array(
            'limit' => 10,
            'order' => 'Customer.id DESC'
        );

        $this->data = $this->paginate('Customer');
    }

    public function export_excel()
    {
        $this->autoRender = false;

        $objPHPExcel = new PHPExcel(); 
        $objPHPExcel->setActiveSheetIndex(0); 

        $i = 1;
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i,'Username');
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$i,'Email');
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i,'Họ Tên');
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i,'Điện Thoại');
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i,'Địa chỉ');
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i,'Khóa Học');
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i,'Level');
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i,'Score');
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i,'Vị trí');

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);


        $check = $this->Customer->find('all', array(
            'order' => array('Customer.id' => 'desc')
        ));

        foreach($check as $v)
        {
            $i++;

            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, $v['Customer']['username']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$i, $v['Customer']['email']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $v['Customer']['fullname']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $v['Customer']['phone']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $v['Customer']['address']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $v['Customer']['khoahoc']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, $v['Customer']['level']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, $v['Customer']['score']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, $v['Customer']['role']);
        } 

$time = time();
$d = date('d-m-Y', $time);
$filename = 'data-user-' . $d . '.xls';

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");;
header("Content-Disposition: attachment;filename=" . $filename);
header("Content-Transfer-Encoding: binary ");

$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
// $objWriter->save('some_excel_file.xlsx'); 
$objWriter->save('php://output');

    }

    public function customer_add() {
        // $this->check_permission('account');
        if ($this->data) {
            $data = $this->data['Customer'];
            $data['password'] = md5($data['password']);
            // $data['role'] = (is_array($this->data['role']) && count($this->data['role']) > 0) ? implode(',', $this->data['role']) : '';
            
            $data['type'] = 'ship';

            $this->Customer->save($data);

            $this->Session->setFlash('Đã thêm mới', 'success');
            $this->redirect($this->referer());
        }
    }

    public function customer_edit($id = null) {
        // $this->check_permission('account');
        if ($this->data) {
            $data = $this->data['Customer'];
            if($data['password'] != '')
                $data['password'] = md5($data['password']);
            else
                unset($data['password']);
            
            // $data['role'] = (is_array($this->data['role']) && count($this->data['role']) > 0) ? implode(',', $this->data['role']) : '';

            $this->Customer->id = $id;
            $this->Customer->save($data);

            $this->Session->setFlash('Đã sửa', 'success');
            $this->redirect($this->referer());
        }

        $this->data = $this->Customer->findById($id);
    }

    public function customer_delete($id = null) {
        $this->_role('customer_delete');
        $this->autoRender = false;
        
        $this->Admin->id = $id;
        $this->Admin->delete($id);

        $this->News->updateAll(
            array('News.admin_id' => 1),
            array('News.admin_id' => $id)
        );

        $this->Product->updateAll(
            array('Product.admin_id' => 1),
            array('Product.admin_id' => $id)
        );

        $this->Session->setFlash('Đã xóa');
        $this->redirect($this->referer());
    }
    
    public function customer_profile(){
        $u = $this->Session->read('admin');

        if ($this->data) {
            $data = $this->data['Admin'];
            $current_pass = $data['current_password'];
            $new_pass = $data['new_password'];

            if(trim($new_pass) != '')
            {
                $current_pass = md5($current_pass);
                
                if ($current_pass != $u['password']) {
                    $this->Session->setFlash('Mật khẩu hiện tại không đúng');
                    $this->redirect($this->referer());
                    die;
                }
                else
                {
                    $data['password'] = md5($data['new_password']);
                    $this->Admin->id = $u['id'];
                        $this->Admin->saveField('password', $data['password']);
                }
            }
            else
            {
                unset($data['current_password']);
                unset($data['new_password']);
            }

            foreach ($data as $k => $v) {
                $u[$k] = $v;
            }

            $this->Session->write('admin', $u);
            $this->Session->setFlash('Cập nhật thành công','success');
            $this->redirect($this->referer());
            die;
        }

        $this->data = $this->Admin->findById($u['id']);
    }

    public function change_field($field, $news_id)
    {
        $change = 0;
        $data = $this->Customer->findById($news_id);
        if($data['Customer'][$field] == 0)
            $change = 1;
        
        $this->Customer->id = $news_id;
        $this->Customer->saveField($field, $change);
        $this->Session->setFlash('Đã cập nhật', 'success');
        $this->redirect($this->referer());
    }
}