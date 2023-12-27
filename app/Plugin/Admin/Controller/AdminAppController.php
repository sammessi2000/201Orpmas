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


class AdminAppController extends AppController {

    public $theme = 'Admin';
    public $node_required = array(
    );


    public $components = array('Cookie', 'Session', 'Capp', 'RequestHandler', 'Upload');

    public $multiple_lang = true;
    public $has_order = false;

    public $default_theme_modules = array(
        'filter_price' => false,
        'filter_company' => false,
        'filter_color' => false,
        'filter_size' => false,
        'filter_material' => false,
        'filter_status' => false,
        'post_type_product' => false,
    );

    public $sidebar = array(
        'Nội dung' => array(
            // 'icon'=> 'icon icon-list',
            'Mục lục' => 'admin_category/category_list',
            // 'Quản lý Quiz' => 'admin_category/category_list',
            // 'Đối tác' => 'admin_hang/hang_list',
            'Sản phẩm' => 'admin_product/product_list',
            // 'FAQ' => 'admin_faq/faq_list',
            // 'Dịch vụ' => 'admin_product/product_list',
            // 'Tuyển dụng' => 'admin_job/job_list',
            // 'Giảng viên' => 'admin_team/team_list',
            // 'Cảm nghĩ' => 'admin_rate/rate_list',
            // 'Vote Sao' => 'admin_star/star_list',
            // '------------' => 'admin_hang/hang_list',
           // 'Coupon' => 'admin_coupon/coupon_list',
            // 'Tỉnh thành' => 'admin_city/city_list',
            
            // 'Đối tác' => 'admin_hangxe/hangxe_list',
            

            // 'Độ tuổi' => 'admin_hang/hang_list',
            
            // 'Bộ lọc' => 'admin_filter/filter_list',
            // 'Lọc Giá' => 'admin_price/price_list',
            // 'Màu sắc' => 'admin_color/color_list',
            // 'Size' => 'admin_size/size_list',
            // 'Đại lý' => 'admin_agency/agency_list',
            // 'Kết nối' => 'admin_ketnoi/ketnoi_list',
            // 'Link hữu ích' => 'admin_agency/agency_list',
            // 'Lĩnh vực' => 'admin_agency/agency_list',
            // 'Tag' => 'admin_tag/tag_list',
            // 'Videos' => 'admin_video/video_list',
            // 'Khuyến mãi' => 'admin_sale/sale_list',
            // 'Tư vấn' => 'admin_tuvan/tuvan_list',
            // 'Cửa hàng' => 'admin_cuahang/cuahang_list',
            // 'Tài liệu' => 'admin_document/document_list',
            // 'Tiến độ' => 'admin_tiendo/tiendo_list',
            'Bài viết' => 'admin_news/news_list',
            // 'Tiện ích' => 'admin_benefit/benefit_list',
            // 'Bộ sưu tập' => 'admin_collection/collection_list'
//            'Hosting' => 'admin_hosting/index',
//            'Domain' => 'admin_domain/index',
//            'Email' => 'admin_email/index',
//            'Quảng cáo' => 'admin_adv/index',
//            'Server' => 'admin_server/index',
//            'Colocation' => 'admin_colo/index',
//            'VPS Cloud' => 'admin_cloud/index',
//            'Dịch vụ' => 'admin_service/index',
        ),
        'Media' => array(
            // 'icon'=> 'icon icon-film',
            // 'Bộ sưu tập' => 'admin_bosuutap/bosuutap_list',
            'Danh sách hình ảnh' => 'admin_banner/banner_list',
            // 'Danh sách videos' => 'admin_video/video_list',
            // 'Gửi mail' => 'admin_email/email_list',
        ),
        // 'Báo cáo' => array(
        //     // 'icon'=> 'icon icon-film',
        //     // 'Bộ sưu tập' => 'admin_bosuutap/bosuutap_list',
        //     'Báo cáo Học viên' => 'admin_banner/banner_list',
        //     'Báo cáo Giảng viên' => 'admin_banner/banner_list',
        //     'Báo cáo CTV' => 'admin_banner/banner_list',
        //     'Báo cáo doanh thu' => 'admin_banner/banner_list',
        //     // 'Danh sách videos' => 'admin_video/video_list',
        //     // 'Gửi mail' => 'admin_email/email_list',
        // ),
        // 'Tài khoản' => array(
            // 'icon'=> 'icon icon-user',
            // 'Thông tin cá nhân' => 'admin_account/account_profile',
            // 'Tài khoản quản trị' => 'admin_account/account_list',
            // 'Tài khoản CTV' => 'admin_customer/customer_list',
            // 'TK học viên' => 'admin_customer/customer_list',
          // 'Hỗ trợ trực tuyến' => 'admin_support/support_list',
          // 'Subcriber' => 'admin_subcriber/index',
        // ),
        'Thiết lập' => array(
            // 'icon'=> 'icon icon-cog',
//            'CPU theo gói cước (Server)' => 'admin_settingserver/settingserver_index',
//            'CPU theo gói cước (VPS)' => 'admin_settingserver/settingserver_index2',
//            'Ram theo gói cước (Server)' => 'admin_settingserver/settingram_index',
//            'Ram theo gói cước (VPS)' => 'admin_settingserver/settingram_index2',
//            'HDD theo gói cước (Server)' => 'admin_settingserver/settinghdd_index',
//            'HDD theo gói cước (VPS)' => 'admin_settingserver/settinghdd_index2',
            'Cấu hình chung' => 'admin_setting/setting_index',
            // 'Quản lý tài khoản' => 'admin_account/account_profile',
            'Nâng cao' => 'admin_setting/setting_advanced',
            // 'Bảng giá' => 'admin_hang/hang_list',
            // 'Thiết lập ngôn ngữ' => 'admin_lang/lang_list'
        )
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'default';

        // pr($_SESSION);

        $this->check_logged();
        $this->get_categories();
        // $this->check_orders();
        $this->check_posts();
        $this->settings();
        $this->check_contacts();
        // $this->check_rpcontacts();
        // $this->check_binhluan();


        $buff = array();

        foreach($this->sidebar as $k=>$v)
        {
            foreach($v as $ky=>$val )
            {
                if($ky == 'Cảm nghĩ')
                {
                    $new_key = $ky . ' (<span class="text-notify">' . $this->num_rates . '</span>)';
                    $buff[$k][$new_key] = $val;
                }
                else if($ky == 'Vote Sao')
                {
                    $new_key = $ky . ' (<span class="text-notify">' . $this->num_stars . '</span>)';
                    $buff[$k][$new_key] = $val;
                }
                else
                {
                    $buff[$k][$ky] = $val;
                }
            }
        }

        $this->sidebar = $buff;

        $url_here = $this->remove_hostname($_SERVER['REQUEST_URI']);
        $this->set('url_here', DOMAIN . $url_here);
        
        $role = array();
        if($this->Session->check('admin'))
        {
        	$admin = $this->Session->read('admin');
        	$this->admin = $admin;

        	$role = explode(',', $this->admin['role']);
        }

        $this->role = $role;

        if(isset($_GET['lang']))
            $this->set('lang', $_GET['lang']);
        else
            $this->set('lang', 'vi');


        $add_redirect = 'add';
        $edit_redirect = 'add';
        $list_redirect = 'list';

        foreach($this->settings as $k=>$v)
        {
            if($k == 'continueAdd')
                $add_redirect = $v;

            if($k == 'continueEdit')
                $edit_redirect = $v;
        }

        $this->add_redirect = $add_redirect;
        $this->edit_redirect = $edit_redirect;
        $this->list_redirect = $list_redirect;

        // $theme_config = DEFAULT_CONFIG_FILE;

        // if(file_exists($theme_config))
        // {
        //     include $theme_config;

        //     if(isset($callback_theme_modules))
        //     {
        //         $this->default_theme_modules['filter_price'] = isset($callback_theme_modules['filter_price']) ? $callback_theme_modules['filter_price'] : false;
        //         $this->default_theme_modules['filter_company'] = isset($callback_theme_modules['filter_company']) ? $callback_theme_modules['filter_company'] : false;
        //         $this->default_theme_modules['filter_color'] = isset($callback_theme_modules['filter_color']) ? $callback_theme_modules['filter_color'] : false;
        //         $this->default_theme_modules['filter_material'] = isset($callback_theme_modules['filter_material']) ? $callback_theme_modules['filter_material'] : false;
        //         $this->default_theme_modules['filter_size'] = isset($callback_theme_modules['filter_size']) ? $callback_theme_modules['filter_size'] : false;
        //         $this->default_theme_modules['filter_status'] = isset($callback_theme_modules['filter_status']) ? $callback_theme_modules['filter_status'] : false;
        //         $this->default_theme_modules['filter_status'] = isset($callback_theme_modules['filter_status']) ? $callback_theme_modules['filter_status'] : false;
        //     }
        // }

        // if($this->default_theme_modules['filter_price'] == false)
        //     unset($this->sidebar['Nội dung']['Lọc Giá']);

        // if($this->default_theme_modules['filter_company'] == false)
        //     unset($this->sidebar['Nội dung']['Hãng']);

        // if($this->default_theme_modules['filter_color'] == false)
        //     unset($this->sidebar['Nội dung']['Màu sắc']);

        // if($this->default_theme_modules['filter_material'] == false) {}
        //     // unset($this->sidebar['Nội dung']['Chất liệu']);

        // if($this->default_theme_modules['filter_size'] == false) {}
        //     // unset($this->sidebar['Nội dung']['Size']);

        // if($this->default_theme_modules['filter_status'] == false) {}
        //     // unset($this->sidebar['Nội dung']['Màu sắc']);

        // if($this->default_theme_modules['post_type_product'] == false)
        //     unset($this->sidebar['Nội dung']['Sản phẩm']);

        // pr('DEFAULT_CONFIG_FILE');
        // pr(DEFAULT_CONFIG_FILE);
        // pr($this->default_theme_modules);
        // pr($this->sidebar);
    }
       
    public function beforeRender() {
        parent::beforeRender();
        $this->set('sidebar', $this->sidebar);
        $this->set('multiple_lang', $this->multiple_lang);
        $this->set('has_order', $this->has_order);
        $this->set('category_fields', $this->category_fields);
    }

    public function _role($act)
    {
    	if(!isset($this->admin['id'])) 
    	{
	        $this->redirect(DOMAINAD);
	        die;
    	}

        if($this->admin['id'] == 1) return true;
        if($this->admin['type'] == 1) return true;
        if(in_array($act, $this->role)) return true;

        $this->redirect(DOMAINAD);
        die;

        return false;
    } 

    public function get_redirect($node_type, $node_action, $node_id)
    {
        if(!in_array($node_action, array('edit', 'add')))
            return DOMAINAD . 'admin_' . $node_type . '/' . $node_type . '_list';

        $type_request = $node_action . '_redirect';

        if($this->{$type_request} == 'edit')
            $redirect = DOMAINAD . 'admin_' . $node_type . '/' . $node_type . '_edit/' .$node_id;
            
        if($this->{$type_request} == 'add')
            $redirect = DOMAINAD . 'admin_' . $node_type . '/' . $node_type . '_add/';

        if($this->{$type_request} == 'list')
        {
            $redirect = DOMAINAD . 'admin_' . $node_type . '/' . $node_type . '_list';

            if(isset($_GET['r']) && trim($_GET['r']) != '') 
                $redirect = $_GET['r'];
        }
        return $redirect;
    }

    public function is_valid_json($str)
    {
        if($str == '') 
        return false;

        json_decode($str);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    public function settings() {
        $this->Setting = ClassRegistry::init('Setting');

        $setting = $this->Setting->find('all', array('fields' => array('Setting.name, Setting.value')));
        $settings = array();
        foreach ($setting as $v) {
            $settings[$v['Setting']['name']] = $v['Setting']['value'];
        }

        $this->settings = $settings;

        $this->title_for_layout = $settings['title'];
        $this->keyword_for_layout = $settings['keyword'];
        $this->description_for_layout = $settings['description'];

        $this->set('settings', $settings);
    }

    public function alert($str, $url = null) {
        if ($url == null) {
            $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        }
        header('Content-Type: text/html; charset=utf-8');
        echo '<script type="text/javascript">alert("' . $str . '"); document.location.href="' . $url . '";</script>';
    }

    public function check_logged() {
        if ($this->params['action'] != 'dashboard_login' && $this->params['action'] != 'dashboard_recover' && $this->params['action'] != 'dashboard_logout') {
            if (!$this->Session->check('admin')) {
                $this->redirect(Router::url(array(
                            'plugin' => 'admin',
                            'controller' => 'admin_dashboard',
                            'action' => 'dashboard_logout',
                                ), true));
            } else {
                $this->admin = $this->Session->read('admin');
                $this->set('admin', $this->admin);
            }
        }
    }


    public function remove_hostname($image = null) {
        $url = parse_url($image);
        if(isset($url['path']))
        {
            $img = trim($url['path'], '/');
            $arr = explode('/', $img);
            if($arr[0] == ROOT_DIRECTORY)
                unset($arr[0]);
            
            return implode('/', $arr);
        }
        return null; 
        
        if ($image) {
            $domain = trim(DOMAIN, '/');
            $domain = str_replace('http://', '', $domain);
            $domain = str_replace('www.', '', $domain);
            $domain = trim($domain, '/');
            $domain = explode('/', $domain);

            $image = trim($image, '/');
            $image_arr = explode('/', $image);

            $flag = false;
            $key = 0;

            foreach ($image_arr as $k => $v) {
                if ($v == ROOT_DIRECTORY) {
                    $flag = true;
                    $key = $k;
                    break;
                }

                if (in_array($v, $domain)) {
                    $flag = true;
                    $key = $k;
                    break;
                }
            }

            if ($flag == true) {
                for ($i = 0; $i <= $key; $i++) {
                    unset($image_arr[$i]);
                }
            }

            return implode('/', $image_arr);
        }
    }

    public function check_binhluan() {
        $this->Rate = ClassRegistry::init('Rate');

        $num = $this->Rate->find('count', array(
            'conditions' => array(
                'Rate.status' => 0,
            ),
        ));

        $this->set('num_rates', $num);
        $this->num_rates = $num;


        $this->Star = ClassRegistry::init('Star');

        $num = $this->Star->find('count', array(
            'conditions' => array(
                'Star.status' => 0,
            ),
        ));

        $this->set('num_stars', $num);
        $this->num_stars = $num;
    }

    public function check_contacts() {
        $this->Contact = ClassRegistry::init('Contact');

        $num = $this->Contact->find('count', array(
            'conditions' => array(
                'Contact.status' => 0,
                // 'Contact.form' => 0
            ),
        ));

        $this->set('num_contacts', $num);
    }

    public function check_rpcontacts() {
        $this->Contact = ClassRegistry::init('Contact');

        $num = $this->Contact->find('count', array(
            'conditions' => array(
                'Contact.status' => 0,
                'Contact.form >' => 0
            ),
        ));

        $this->set('num_rpcontacts', $num);
    }

    public function check_posts() {
        // $this->UserPost = ClassRegistry::init('UserPost');

        // $num = $this->UserPost->find('count', array(
        //     'conditions' => array(
        //         'UserPost.status' => 0,
        //     ),
        // ));

        // $this->set('num_orders', $num);
    }

    public function check_orders() {
        $this->Order = ClassRegistry::init('Order');

        $num = $this->Order->find('count', array(
            'conditions' => array(
                'Order.status' => 0,
            ),
        ));

        $this->set('num_orders', $num);
    }
    
    public function get_categories($conditions = null)
    {
        $this->Category = ClassRegistry::init('Admin.Category');
        $category_tree = $this->Category->generateTreeList(null, null, null, '--');
        if($conditions != null)
            $category_tree = $this->Category->generateTreeList($conditions, null, null, '--');
        $this->category_tree = $category_tree;
        $this->set('category_tree', $category_tree);
    }
}