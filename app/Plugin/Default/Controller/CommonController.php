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

class CommonController extends DefaultAppController {

    public $uses = array('Fs_products_filter');

    public function convert()
    {
        $table = $this->Fs_products_filter->find('all', array(
            'order' => array('Fs_products_filter.id' => 'desc'),
            'group' => array('Fs_products_filter.tablename')
        ));

        $data_table = array();

        foreach($table as $v)
        {
            $data_table[] = $v['Fs_products_filter']['tablename'];
        }

        //pr($table);

        $minh_can_dien_cid_o_day = array();
        $str = '$minh_can_dien_cid_o_day = array(' . "\n";
            
        foreach($data_table as $v)
        {
            // $minh_can_dien_cid_o_day[$v] = '';
            $str .= "\t'" . $v .  "' => ''," . "\n";
        }

        $str .= ');';
        // echo $str;

        // die;


$minh_can_dien_cid_o_day = array(
    'fs_products_nhom_binh_khi' => '256',
    'fs_products_dung_cu_bao_ho_vo_thuat' => '255',
    'fs_products_dung_cu_tap_luyen_vo_thuat' => '254',
    'fs_products_phu_kien_cau_long' => '212',
    'fs_products_cuoc_vot_cau_long' => '210',
    'fs_products_may_chay_bo' => '195',
    'fs_products_may_ban_bong_chuyen' => '247',
    'fs_products_phu_kien_vo_thuat' => '220',
    'fs_products_tham_vo_thuat' => '219',
    'fs_products_gang_tay_boxing' => '216',
    'fs_products_bao_boxing' => '218',
    'fs_products_thiet_bi_truong_hoc' => '198',
    'fs_products_may_tap_chan' => '194',
    'fs_products_thiet_bi_phuc_hoi_chuc_nang' => '252',
    'fs_products_phu_kien_gym' => '189',
    'fs_products_long_tap_golf' => '215',
    'fs_products_phu_kien_tap_golf' => '208',
    'fs_products_phu_kien_tennis' => '243',
    'fs_products_bong_tennis' => '203',
    'fs_products_balo_tennis' => '204',
    'fs_products_may_ban_bong_ro' => '248',
    'fs_products_gay_tap_golf' => '253',
    'fs_products_tru_luoi_bong_chuyen' => '167',
    'fs_products_giay_bong_chuyen' => '199',
    'fs_products_may_ban_bong_tennis' => '242',
    'fs_products_may_cang_vot_cau_long' => '213',
    'fs_products_tham_tap_golf' => '',
    'fs_products_giay_golf' => '228',
    'fs_products_xe_dap_the_duc' => '196',
    'fs_products_may_tap_co_bung' => '192',
    'fs_products_ghe_tap_bung' => '188',
    'fs_products_gian_ta' => '249',
    'fs_products_ta_tay_ta_don_don_ta' => '186',
    'fs_products_ghe_tap_ta' => '32',
    'fs_products_xa_don_xa_kep' => '187',
    'fs_products_don_ta_banh_ta' => '209',
    'fs_products_tru_luoi_tennis' => '211',
    'fs_products_tru_luoi_cau_long' => '200',
    'fs_products_may_ban_cau_long' => '246',
    'fs_products_qua_cau_long' => '180',
    'fs_products_giay_tennis' => '162',
    'fs_products_vot_tennis' => '177',
    'fs_products_phu_kien_bong_da' => '239,56,57,59,60',
    'fs_products_giay_bong_ban' => '202',
    'fs_products_quan_ao_bong_ban' => '231',
    'fs_products_cot_vot_bong_ban' => '181',
    'fs_products_quan_ao_chay_bo' => '226',
    'fs_products_giay_chay_bo' => '179',
    'fs_products_giay_cau_long' => '178',
    'fs_products_mat_vot_bong_ban' => '182',
    'fs_products_tham_cau_long' => '43',
    'fs_products_may_ban_bong_ban' => '176',
    'fs_products_chieu_sang' => '55',
    'fs_products_den_cao_ap' => '',
    'fs_products_giay_bong_ro' => '174',
    'fs_products_tham_pvc' => '15,152,95,154,158,159',
    'fs_products_qua_bong_chuyen' => '163',
    'fs_products_phu_kien_bong_ro' => '175',
    'fs_products_tru_bong_ro' => '164',
    'fs_products_phu_kien_bong_ban' => '233,173,234,235,236,237',
    'fs_products_vot_bong_ban' => '172',
    'fs_products_qua_bong_ban1' => '171',
    'fs_products_khung_thanh' => '44',
    'fs_products_luoi_the_thao' => '68',
    'fs_products_qua_bongro' => '21',
    'fs_products_ban_bong_ban' => '14',
    'fs_products_qua_bong_da' => '3',
    'fs_products_vot_cau_long' => '9',
    'fs_products_san_bong_da' => '48',
    'fs_products_gang_tay_thu_mon' => '58',
    'fs_products_co_nhan_tao' => '42,25,153,258',
    'fs_products_giay_bong_da' => '2',
    'fs_products' => '1,6,221,11,17,38,184,69,185,157',
);


        $return = array();

        foreach($data_table as $v)
        {
            $row = $this->Fs_products_filter->find('all', array(
                'conditions' => array(
                    'Fs_products_filter.tablename' => $v
                )
            ));

            $return[$v] = array();
            $return[$v]['cid'] = '';
            $return[$v]['filters'] = array();

            foreach($row as $r)
            {
                $return[$v]['filters'][] = $r['Fs_products_filter'];
            }
        }


        //Build dữ liệu

        echo '$arr = array(' . "\n";

            $i=0;
            foreach($return as $k=>$items)
            {
                echo "\t'" . $k . "' => array(" . "\n";

                foreach($items as $key=>$val)
                {
                    if($key == 'cid')
                    {
                        $cid_value = isset($minh_can_dien_cid_o_day[$k]) ?  $minh_can_dien_cid_o_day[$k] : '';
                        echo "\t\t'cid' => '" . $cid_value .  "'," . "\n";
                    }
                    else 
                    {
                        echo "\t\t'fillter' => array(" . "\n";
// [filter_show] => Việt Nam
// [tablename] => fs_products_nhom_binh_khi
// [field_name] => xuat_xu
// [field_show] => Xuất xứ
// [field_ordering] => 5
// [alias] => viet-nam
// [calculator] => 14
// [calculator_show] => 
// [filter_value] => 235
// [published] => 1
// [is_common] => 0
// [is_condition] => 0
// [seo_title] => Danh sách các sản phẩm có xuất xứ từ Việt Nam
// [seo_meta_key] => 
// [seo_meta_des] => 
// [ordering] => 235
// [description] => 
// [description_cat] => 
// [is_seo] => 0
// [is_home] => 0
// [image] => 
                        foreach($val as $kk=>$vv)
                        {
                            // pr($vv);die;
                            echo "\t\t\t" . 'array(' . "\n";
                            echo "\t\t\t\t'id' => '" . $vv['id']. "'," . "\n";
                            echo "\t\t\t\t'tablename' => '" . $vv['tablename']. "'," . "\n";
                            echo "\t\t\t\t'field_name' => '" . $vv['field_name']. "'," . "\n";
                            echo "\t\t\t\t'field_show' => '" . $vv['field_show']. "'," . "\n";
                            echo "\t\t\t\t'filter_show' => '" . $vv['filter_show']. "'," . "\n";
                            echo "\t\t\t\t'field_ordering' => '" . $vv['field_ordering']. "'," . "\n";
                            echo "\t\t\t\t'alias' => '" . $vv['alias']. "'," . "\n";
                            echo "\t\t\t\t'calculator' => '" . $vv['calculator']. "'," . "\n";
                            echo "\t\t\t\t'calculator_show' => '" . $vv['calculator_show']. "'," . "\n";
                            echo "\t\t\t\t'filter_value' => '" . $vv['filter_value']. "'," . "\n";
                            echo "\t\t\t\t'published' => '" . $vv['published']. "'," . "\n";
                            echo "\t\t\t\t'is_common' => '" . $vv['is_common']. "'," . "\n";
                            echo "\t\t\t\t'is_condition' => '" . $vv['is_condition']. "'," . "\n";
                            echo "\t\t\t\t'seo_title' => '" . $vv['seo_title']. "'," . "\n";
                            echo "\t\t\t\t'seo_meta_key' => '" . $vv['seo_meta_key']. "'," . "\n";
                            echo "\t\t\t\t'seo_meta_des' => '" . $vv['seo_meta_des']. "'," . "\n";
                            echo "\t\t\t\t'ordering' => '" . $vv['ordering']. "'," . "\n";
                            echo "\t\t\t\t'description' => '" . $vv['description']. "'," . "\n";
                            echo "\t\t\t\t'description_cat' => '" . $vv['description_cat']. "'," . "\n";
                            echo "\t\t\t\t'is_seo' => '" . $vv['is_seo']. "'," . "\n";
                            echo "\t\t\t\t'is_home' => '" . $vv['is_home']. "'," . "\n";
                            echo "\t\t\t\t'image' => '" . $vv['image']. "'," . "\n";
                            echo "\t\t\t" . '),' . "\n";
                        }

                        echo "\t\t" . '),' . "\n";
                    }
                   
                }
                echo "\t" . '),' . "\n";

                // if($k != 'fs_products_nhom_binh_khi') break;
            }

        echo ');' . "\n";

        die;
    }

   
}
