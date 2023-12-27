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
App::uses('AppController', 'Controller');

class DefaultAppController extends AppController {

    public $category_cid_landingpage = array(85,86,87);

    //Theme đang sử dụng
    public $theme = 'default';
    
    //setting pagination
    public $product_pagination_limit = 15;
    public $news_pagination_limit = 5;
    public $collection_pagination_limit = 6;
    public $document_pagination_limit = 10;
    
    //khai báo thực hiện hàm hook cho kiểu dữ liệu đối với trang archive
    // public $hook = array();
    public $hook = array('product');

    //Danh sách components
    public $components = array('Cookie', 'Session', 'Ccontent', 'Cmodal', 'Cmeta', 'Capp', 'Clayout', 'RequestHandler', 'Upload');
    
    //Các bảng được sử dụng trong chương trình
    public $uses = array(
            'Default.Category', 
            'Default.Home', 
            'Default.Node', 
            'Default.News', 
            'Default.Product', 
            'Default.Rate', 
            // 'Default.Ketnoi',
            'Agency', 
            'Filter',
            'Hang', 
            'Faq', 
            'Tag',
            'FilterItem',
            'FilterLinked',
            'UserPost',
            'Default.Customer',
            'CustomerBanner',
            'Team'
        );
    
    public $is_mobile = false;

    //Instance của controller
    public $Controller;
    //Thiết lập ngôn ngữ mặc định
    public $default_lang = 'vi';
    public $lang = 'vi';
    //Dữ liệu lang
    public $lang_array = null;
    //Lưu các thông tin được cấu hình chung
    public $settings;
    //Dữ liệu node theo url đang truy vấn
    public $nodeData;
    //Tên modal đang sử dụng trong controller
    public $cModalName;
    //Action được ánh xạ để định nghĩa
    public $cActionName;
    //Cờ đánh dấu trang list có tham số page
    public $cFlagPage = false;
    //Mục lục đang xem
    public $currentCategory = null;
    //Mục lục con của mục lục đang xem
    public $currentCategoryChildren = null;

    public $order_price = '';

    //Định nghĩa các action mặc định cho các Node
    public $action_array = array(
        'news' => 'detail',
        'category' => 'list',
        'product' => 'detail',
        'page' => 'detail',
        'rate' => 'detail',
        'video' => 'detail',
        'faq' => 'detail',
        'sale' => 'detail',
        'tuvan' => 'detail',
        'document' => 'detail',
        'tiendo' => 'detail',
        'collection' => 'detail',
        // 'ketnoi' => 'detail',
    );
    public $cBuff = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $is_mobile = 0;


        if($this->RequestHandler->isMobile() || isset($_GET['mobile']))
        {
            $is_mobile = 1;
            // $this->theme = 'Mobile';
        }

        
        $this->set('is_mobile', $is_mobile);

        if(isset($_GET['lang']) && $_GET['lang'] != '')
        {
            $this->Session->write('lang', $_GET['lang']);
        }

        if($this->Session->check('lang'))
        {
            $this->lang = $this->Session->read('lang');
        }
        
        // $sort = array();

        // if($this->Session->check('sort'))
        //     $sort = $this->Session->read('sort');

        // $this->sort = $sort;
        // $this->set('sort', $sort);
        
        // $filter_price = array();

        // if($this->Session->check('filter_price'))
        //     $filter_price = $this->Session->read('filter_price');

        // if(isset($_GET['price']))
        // {
        //     $p = $_GET['price'];

        //     $p = preg_replace('/[^0-9\-]/', '', $p);
        //     $p = explode('-', $p);
        //     $start = $p[0];
        //     $end = $start;
        //     if(isset($p[1]))
        //         $end = $p[1];

        //     $filter_price['min'] = $start;
        //     $filter_price['max'] = $end;
        // }

        // $this->filter_price = $filter_price;
        // $this->set('filter_price', $filter_price);

        $active_editor = $this->Session->check('active_editor');

        if(!$active_editor)
        {
            Configure::write('active_editor', 0);
            $this->Session->write('active_editor', 0);
        }
        else
        {
            $active_editor_status = $this->Session->read('active_editor');
            Configure::write('active_editor', $active_editor_status);
            $this->Session->write('active_editor', $active_editor_status);
        }

        $agencys = $this->Agency->find('all');
        $agencies = array();
        foreach($agencys as $v)
        {
            $agencies[$v['Agency']['id']]['vi'] = $v['Agency']['title'];
            $agencies[$v['Agency']['id']]['en'] = $v['Agency']['title_en'];
            $agencies[$v['Agency']['id']]['image'] = $v['Agency']['image'];
        }

        $hangData = $this->Hang->find('all', array(
            // 'conditions'=>array(
            //     'Hang.featured' => 1
            // ),
            'order'=>array('Hang.pos' => 'desc', 'Hang.id'=>'desc')
        ));

        $hangs = array();

        foreach($hangData as $v)
        {
            $hangs[$v['Hang']['id']]['id'] = $v['Hang']['id'];
            $hangs[$v['Hang']['id']]['title'] = $v['Hang']['title'];
            $hangs[$v['Hang']['id']]['image'] = $v['Hang']['image'];
            $hangs[$v['Hang']['id']]['slug'] = $v['Hang']['slug'];
        }

        $this->set('hangs', $hangs);
        $this->set('agencies', $agencies);

        $this->get_lang();
        $this->settings();
        $this->categories();
        $this->banners();
        // $this->cuahang();
        // $this->support();
        $this->get_featured_products();
        // $this->get_10k_products();
    //    $this->get_new_products();
        $this->get_featured_news();
         // $this->get_home_products();

        // $this->get_comments();
        $this->get_most_read();
        $this->rate();
        $this->get_latest_news();
        // $this->get_youtube_videos();

        // $this->get_sell_off_news();

        $ref = $this->referer();

        if(!$this->Session->check('referer_source'))
            $referer_source = 'Trực tiếp';

        if(preg_match('/[\.\/]/', $ref))
        {
            $dom = parse_url($ref);
            if(isset($dom['host']))
            {
                $referer_source = $dom['host'];

                $dm = parse_url(DOMAIN);
                if(isset($dm['host']))
                    $md = $dm['host'];
                
                if($md == $referer_source)
                {
                    $referer_source = 'Trực tiếp';
                }
            }
            else
            {
                $referer_source = 'Trực tiếp';
            }
        }

        if(!$this->Session->check('referer_source'))
        {
            $this->Session->write('referer_source', $referer_source);
            $this->set('referer_source', $referer_source);
        }
        else
        {
            $sess = $this->Session->read('referer_source');

            if($referer_source == 'Trực tiếp')
                $referer_source = $sess;

            $this->Session->write('referer_source', $referer_source);
            $this->set('referer_source', $referer_source);
        }

        // echo $referer_source . '<br />';
        // echo $this->Session->read('referer_source');

        $cart_number = 0;

        // if($this->Session->check('cart'))
        // {
        //     $carts = $this->Session->read('cart');
        //     $cart_number = count($carts);
        // }
        
        $this->set('cart_number', $cart_number);

        $this->set('agencies', $this->Agency->find('all', array(
            'order' => array('Agency.id' => 'desc')
        )));


        $user = $this->Session->check('user');
        $this->user = array();

        if($user)
        {
            $this->user = $this->Session->read('user');
        }
        
        $this->set('user', $this->user);
    }

    public function rate()
    {
        $this->set('rate', $this->Rate->find('all', array(
            'conditions'=>array(
                'Rate.status' => 1
            ),
            'order'=>array('Rate.id'=>'desc')
        )));
    }

    public function cuahang()
    {
        $cuahang = $this->Cuahang->find('all', array(
            'order'=>array('Cuahang.pos'=>'desc', 'Cuahang.id'=>'desc')
        ));

        $this->set('cuahang', $cuahang);
    }
    
    public function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }   

    public function support()
    {
        $this->Support = ClassRegistry::init('Support');

        $this->set('supports', $this->Support->find('all', array(
            'limit'=>10,
            'order'=>array('Support.pos'=>'desc', 'Support.id'=>'desc')
        )));
    }

    public function get_sell_off_news()
    {
        $this->Category = ClassRegistry::init('Category');

        $sell_off_news = $this->lang_array['selloff_news_catid']['vi'];

        if(!is_numeric($sell_off_news)) 
        {
            $this->set('sell_off_news', null); return;
        }

        $check = $this->Category->findById($sell_off_news);
        $ids = array();

        $find = $this->Category->find('all', array(
            'conditions'=>array(
                'Category.lft >=' => $check['Category']['lft'],
                'Category.rght <=' => $check['Category']['rght']
            )
        ));

        foreach($find as $v)
        {
            $ids[] = $v['Category']['id'];
        }

        $data = $this->Node->find('all', array(
            'joins'=>array(
                array(
                        'table'=>'news',
                        'alias'=>'News',
                        'type'=>'INNER',
                        'conditions'=>array('News.node_id = Node.id')
                ),
                array(
                    'table'=>'category_linkeds',
                    'alias'=>'CategoryLinked',
                    'type'=>'INNER',
                    'conditions'=>array('Node.id = CategoryLinked.node_id')
                )
            ),
            'conditions'=>array(
                'Node.type'=>'news',
                'Node.status'=>1,
                'CategoryLinked.category_id'=>$ids,
            ),
            'limit'=>5,
            'fields'=>array('Node.*', 'News.*'),
            'group'=>'CategoryLinked.node_id',
            'order'=>array('Node.pos DESC', 'Node.id DESC')
        ));

        $this->set('sell_off_news', $data);
    }

    public function get_youtube_videos()
    {
        $this->set('videos', $this->Video->find('all', array(
            'conditions'=>array(
                'Video.status'=>1
            ),
            'order'=>array('Video.id'=>'desc'),
            'limit'=>5
        )));
    }

    public function get_comments()
    {
        $this->Rate = ClassRegistry::init('Rate');
        $this->set('rates', $this->Rate->find('all', array(
            'conditions'=>array(
                'Rate.status'=>1
            ),
            'order'=>array('Rate.id'=>'desc'),
            'limit'=>5
        )));
    }

    public function get_home_products()
    {
        $this->set('product_moinhat', $this->Node->find('all', array(
            'joins'=>array(
                array(
                    'table'=>'products',
                    'alias'=>'Product',
                    'conditions'=>array('Product.node_id = Node.id'),
                    'type'=>'INNER'
                )
            ),
            'conditions'=>array(
                'Node.status'=>1,
                'Product.news'=>1,
            ),
            'order'=>array('Node.id'=>'desc'),
            'limit'=>12,
            'fields'=>array('Node.*', 'Product.*')
        )));

        $this->set('product_uachuong', $this->Node->find('all', array(
            'joins'=>array(
                array(
                    'table'=>'products',
                    'alias'=>'Product',
                    'conditions'=>array('Product.node_id = Node.id'),
                    'type'=>'INNER'
                )
            ),
            'conditions'=>array(
                'Node.status'=>1,
                'Product.likes'=>1,
            ),
            'order'=>array('Node.id'=>'desc'),
            'limit'=>12,
            'fields'=>array('Node.*', 'Product.*')
        )));

        $this->set('product_khuyenmai', $this->Node->find('all', array(
            'joins'=>array(
                array(
                    'table'=>'products',
                    'alias'=>'Product',
                    'conditions'=>array('Product.node_id = Node.id'),
                    'type'=>'INNER'
                )
            ),
            'conditions'=>array(
                'Node.status'=>1,
                'Product.promotion'=>1,
            ),
            'order'=>array('Node.id'=>'desc'),
            'limit'=>10,
            'fields'=>array('Node.*', 'Product.*')
        )));

//        $this->set('product_hotnhat', $this->Node->find('all', array(
//            'joins'=>array(
//                array(
//                    'table'=>'products',
//                    'alias'=>'Product',
//                    'conditions'=>array('Product.node_id = Node.id'),
//                    'type'=>'INNER'
//                )
//            ),
//            'conditions'=>array(
//                'Node.status'=>1,
//                'Product.featured'=>1,
//            ),
//            'order'=>array('Node.id'=>'desc'),
//            'limit'=>10,
//            'fields'=>array('Node.*', 'Product.*')
//        )));
    }

    public function get_new_products()
    {
        $this->set('new_products', $this->Node->find('all', array(
            'joins'=>array(
                array(
                    'table'=>'products',
                    'alias'=>'Product',
                    'conditions'=>array('Product.node_id = Node.id'),
                    'type'=>'INNER'
                )
            ),
            'conditions'=>array(
                'Node.status'=>1,
                'Product.news'=>1
            ),
            'order'=>array('Node.id'=>'desc'),
            'limit'=>10,
            'fields'=>array('Node.*', 'Product.*')
        )));
    }

    public function get_featured_products()
    {
        $this->set('featured_products', $this->Node->find('all', array(
            'joins'=>array(
                array(
                    'table'=>'products',
                    'alias'=>'Product',
                    'conditions'=>array('Product.node_id = Node.id'),
                    'type'=>'INNER'
                )
            ),
            'conditions'=>array(
                'Node.status'=>1,
                'Product.featured'=>1
            ),
            'order'=>array('Node.pos'=>'desc','Node.id'=>'desc'),
            'limit'=>10,
            'fields'=>array('Node.*', 'Product.*')
        )));

        $this->set('newest_products', $this->Node->find('all', array(
            'joins'=>array(
                array(
                    'table'=>'products',
                    'alias'=>'Product',
                    'conditions'=>array('Product.node_id = Node.id'),
                    'type'=>'INNER'
                )
            ),
            'conditions'=>array(
                'Node.status'=>1,
                'Product.newest'=>1
            ),
            'order'=>array('Node.pos'=>'desc','Node.id'=>'desc'),
            'limit'=>10,
            'fields'=>array('Node.*', 'Product.*')
        )));
    }

     public function get_10k_products()
    {
        $this->set('thuonghieu10k', $this->Node->find('all', array(
            'joins'=>array(
                array(
                    'table'=>'products',
                    'alias'=>'Product',
                    'conditions'=>array('Product.node_id = Node.id'),
                    'type'=>'INNER'
                )
            ),
            'conditions'=>array(
                'Node.status'=>1,
                'Product.xuhuong'=>1
            ),
            'order'=>array('Node.id'=>'desc'),
            'limit'=>100,
            'fields'=>array('Node.*', 'Product.*')
        )));
    }
    
    
    public function get_featured_news()
    {
        $this->set('featured_news', $this->Node->find('all', array(
            'joins'=>array(
                array(
                    'table'=>'news',
                    'alias'=>'News',
                    'conditions'=>array('News.node_id = Node.id'),
                    'type'=>'INNER'
                )
            ),
            'conditions'=>array(
                'Node.status'=>1,
                'News.featured'=>1,
            ),
            'order'=>array('Node.pos'=>'desc', 'Node.id'=>'desc'),
            'limit'=>6,
            'fields'=>array('Node.*', 'News.*')
        )));
    }

    public function get_latest_news()
    {
        $this->set('latest_news', $this->Node->find('all', array(
            'joins'=>array(
                array(
                    'table'=>'news',
                    'alias'=>'News',
                    'conditions'=>array('News.node_id = Node.id'),
                    'type'=>'INNER'
                )
            ),
            'conditions'=>array(
                'Node.status'=>1,
                'News.featured' => 0
            ),
            'order'=>array('Node.pos'=>'desc', 'Node.id'=>'desc'),
            'limit'=>4,
            'fields'=>array('Node.*', 'News.*')
        )));
    }

    public function get_most_read()
    {
        $this->set('most_read', $this->Node->find('all', array(
            'joins'=>array(
                array(
                    'table'=>'news',
                    'alias'=>'News',
                    'conditions'=>array('News.node_id = Node.id'),
                    'type'=>'INNER'
                )
            ),
            'conditions'=>array(
                'Node.status'=>1,
                'News.featured' => 0
            ),
            'order'=>array('Node.read'=>'desc', 'Node.pos'=>'desc', 'Node.id'=>'desc'),
            'limit'=>10,
            'fields'=>array('Node.*', 'News.*')
        )));
    }
    
    public function get_lang()
    {
        $this->Lang = ClassRegistry::init('Lang');
        $data = $this->Lang->find('all');
        
        $buff = array();
        foreach($data as $v)
        {
            $key = $v['Lang']['key'];
            unset($v['Lang']['key']);
            unset($v['Lang']['id']);
            $buff[$key] = $v['Lang'];
        }
        
        Configure::write('lang', $this->lang);
        Configure::write('lang_array', $buff);

        $this->lang_array = $buff;
        
//        echo $this->Session->read('lang');
//        echo $this->lang; die;
        
        $this->set('lang', $this->lang);
        $sufix = '';
        if($this->lang != 'vi')
            $sufix = '_'.$this->lang;

        $this->set('sufix', $sufix);

        
        if(isset($buff['logo_header']['vi']) && $buff['logo_header']['vi'] != '')
            $this->pageImageLogo = $buff['logo_header']['vi'];

        if(isset($buff['pageImageLogo']['vi']) && $buff['pageImageLogo']['vi'] != '')
            $this->pageImageLogo = $buff['pageImageLogo']['vi'];
    }

    public function banners() {
        $this->Banner = ClassRegistry::init('Banner');

        $banners = $this->Banner->find('all', array(
            // 'conditions' => array(
            //     'Banner.status' => 1
            // ),
            'order' => 'Banner.pos DESC, Banner.id DESC',
        ));

        $bn = array();

        foreach ($banners as $k => $v) {
            $bn[$v['Banner']['type']][$k]['Banner']['image'] = $v['Banner']['image'];
            $bn[$v['Banner']['type']][$k]['Banner']['link'] = $v['Banner']['link'];
            $bn[$v['Banner']['type']][$k]['Banner']['title'] = $v['Banner']['title'];
            $bn[$v['Banner']['type']][$k]['Banner']['description'] = $v['Banner']['description'];
        }

        if($this->is_mobile == false)
            $logo = DOMAIN . 'theme/default/img/logo.png'; 
        else
            $logo = DOMAIN . 'theme/mobile/img/logo.png'; 

        if(isset($bn['logo']) && count($bn['logo']) > 0)
        {
            foreach ($bn['logo'] as $v) {
                $logo = $v['Banner']['image'];
            }
        }

   
        $this->banners = $bn;

        $this->set('banners', $bn);
        $this->set('logo', $logo);
    }

    public function categories() 
    {
        // $nameID = PREFIX . 'categories';

        // if(Cache::read($nameID))
        // {
        //     $data = Cache::read($nameID);
        // }
        // else 
        // {
            $data = $this->Category->find('threaded', array(
                'joins' => array(
                    array(
                        'table' => 'nodes',
                        'alias' => 'Node',
                        'type' => 'INNER',
                        'conditions' => array(
                            'Node.id = Category.node_id'
                        )
                    )
                ),
                'conditions' => array(
                    'Node.status' => 1,
                    // 'Category.parent_id' => null,
                    'Category.menu' => 1,
                ),
                'order' => 'Node.pos DESC, Node.id DESC',
                'fields' => array('Node.*', 'Category.*')
            ));

            // Cache::write($nameID, $data);
        // }

        $this->set('categories', $data);

        foreach($this->category_fields as $k=>$v)
        {
            // $nameID = PREFIX . 'categories_' . $k;
            
            // if(Cache::read($nameID) !== false)
            // {
            //     $data = Cache::read($nameID);
            // }
            // else 
            // {
                $data =  $this->Category->find('all', array(
                    'joins' => array(
                        array(
                            'table' => 'nodes',
                            'alias' => 'Node',
                            'type' => 'INNER',
                            'conditions' => array(
                                'Node.id = Category.node_id'
                            )
                        )
                    ),
                    'conditions' => array(
                        'Node.status' => 1,
                        'Category.' . $k => 1
                    ),
                    'order' => array('Node.pos'=>'desc', 'Node.id'=>'desc'),
                    'fields' => array('Node.*', 'Category.*')
                ));

                // Cache::write($nameID, $data);
            // }

            $this->set('categories_' . $k, $data);
        }
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

        // $price_range = $this->lang == 'vi' ? $settings['price_range_vi'] : $settings['price_range_en'];
        // $buff = array();

        // if($price_range != '')
        // {
        //     $price_range = nl2br($price_range);
        //     $price_range_arr = explode('<br />', $price_range);
            
        //     foreach($price_range_arr as $v)
        //     {
        //         $v = strip_tags($v);
        //         $temp = explode('|', $v);
                
        //         if(isset($temp[1]))
        //         {
        //             $val = trim($temp[0]);
        //             $key = $temp[1];
        //             $key = preg_replace('/[^0-9\-]/', '', $key);

        //             $buff[$key] = trim($val);
        //         }
        //     }
        // }

        // $this->set('price_range', $buff);

        $this->set('settings', $settings);
    }

    public function alert($str, $url = null) {
        if ($url == null) {
            $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        }
        header('Content-Type: text/html; charset=utf-8');
        echo '<script type="text/javascript">alert("' . $str . '"); document.location.href="' . $url . '";</script>';
    }
    
    public function t($name) {
        $name = strtolower($name);
        $lang = Configure::read('lang');
        $lang_array = Configure::read('lang_array');
        
        if(isset($lang_array[$name][$lang]))
            return $lang_array[$name][$lang];
        
        return '';
    }
    
    public function img($image, $alt='', $width=0, $height = 0)
    {
        $str = '<img alt="' . $alt . '" src=';
        if(preg_match('/http:\/\//', $image) || preg_match('/https:\/\//', $image))
        {
            $str .= '"'. $image .'"';
            if($width != 0) 
                $str .= ' width="'. $width .'"';
            if($height != 0)
                $str .= ' height="'. $height .'"';
        }
        else
        {
            $str .= '"' . DOMAIN . 'timthumb.php?src='. DOMAIN . trim($image, '/');
            $str .= '&zc=1&q=100';
            
            if($width != 0) 
                $str .= '&w=' . $width;
            if($height != 0)
                $str .= '&h='. $height;
            
            $str .= '"';
        }
        
        $str .= ' />';
        return $str;
    }
    
    public function word_limiter($str, $limit) {
        $str = strip_tags($str);
        $str = preg_replace('/[\r\n]/is', ' ', $str);
        $str = preg_replace('/\ +/', ' ', $str);
        $str = trim($str);

        if ($str == '')
            return $str;

        $arr = explode(' ', $str);
        if (count($arr) <= $limit)
            return $str;

        $buff = array();

        for ($i = 0; $i < $limit; $i++) {
            $buff[] = $arr[$i];
        }

        return implode(' ', $buff) . '...';
    }
    
    public function removeXss($string)
    {
        //Fix & but allow unicode
        $string = preg_replace('#&(?!\#[0-9]+;)#si', '&amp;', $string);
        $string = str_replace("<","&lt;", $string);
        $string = str_replace(">","&gt;", $string);
        $string = str_replace("\"","&quot;", $string);
        $string = str_replace("\'","&quot;", $string);
        static $preg_find    = array('#javascript#i', '#vbscript#i');
        static $preg_replace = array('java script',   'vb script');
        return preg_replace($preg_find, $preg_replace, $string);
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
    
    public function beforeRender() {
        parent::beforeRender();
        
        $this->Admin = ClassRegistry::init('Admin');
        $this->set('nodeData', $this->nodeData);
        $this->set('current_category', $this->currentCategory);
        $this->set('theme', $this->theme);
        $this->set('theme_directory', DOMAIN . 'theme/' . $this->theme . '/');

        $this->set('authors', $this->Admin->find('list', array('fields'=>array('id', 'fullname'))));

        if(is_array($this->currentCategory) && count($this->currentCategory) > 0 && isset($this->currentCategory['Category']))
        {
            $currentCategoryChildren_buff = $this->Category->find('all', array(
                'joins'=>array(
                    array(
                        'table'=>'nodes',
                        'alias'=>'Node',
                        'conditions'=>array('Node.id = Category.node_id'),
                        'type'=>'INNER'
                    )
                ),
                'conditions'=>array(
                    'Category.lft >' => $this->currentCategory['Category']['lft'],
                    'Category.rght <' => $this->currentCategory['Category']['rght']
                ),
                'fields'=>array('Node.*', 'Category.*'),
                'order'=>array('Node.pos DESC', 'Node.id DESC')
            ));

            $this->set('current_category_children', $currentCategoryChildren_buff);
        }

        $this->set('order_price', $this->order_price);

        $this->set('lang', $this->lang);
//        $lang_txt_link = $this->lang == $this->default_lang ? '' : $this->lang . '/';
        $lang_txt_link = '';
        $this->set('lang_txt_link', $lang_txt_link);
        $this->set('default_lang', $this->default_lang);
        Configure::write('lang', $this->lang);
        $this->Session->write('lang', $this->lang);
    }


    public function sweet_alert($str, $url = null)
    {
      
        if ($url == null) {
            $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        }
        header('Content-Type: text/html; charset=utf-8');
        echo' 
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "success",
                    text: "'.$str.'",
                    confirmButtonColor: "#ed6522"
                }).then(function() {
                    document.location.href="'.$url.'";
                });
            });
        </script>';
    }
}