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
class HomeController extends DefaultAppController
{

    public $uses = array('TudienAnhViet', 'TudienVietAnh');
    public function beforeFilter()
    {
        parent::beforeFilter();
    }

    public function beforeRender()
    {
        parent::beforeRender();

        if (isset($this->intro)) {
            $this->layout = 'intro';
            $this->set('is_intro', 1);
        }

        if (isset($this->blank)) {
            $this->layout = 'blank';
        }
    }

    public function style()
    {
        header("Content-type: text/css; charset: UTF-8");

        $this->blank = 1;
        $this->render('style');
    }

    public function get_title($txt)
    {
        preg_match_all('/@([^\/]+)\//', $txt, $buff);
        if (isset($buff['1'][0]))
            return strtolower($buff['1']['0']);

        return $txt;
    }

    public function get_alpha($txt)
    {
        $txt = preg_replace('/[^a-z]/i', '', $txt);
        $arr = str_split($txt);

        return $arr[0];
    }

    public function get_phonetic($txt)
    {
        preg_match_all('/\/([^\/]+)\//', $txt, $buff);
        if (isset($buff['1'][0]))
            return '/' . $buff['1']['0'] . '/';

        return '';
    }

    function convert_vi_to_en($str)
    {
        if (!$str) return false;

        // Bảng dịch ký tự không dấu bao gồm 2 bảng mã cho unicode và windows cp 1258 
        $trans = array(
            'à' => 'a', 'á' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a', 'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ẫ' => 'a', 'ẩ' => 'a', 'ậ' => 'a', 'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u', 'à' => 'a', 'á' => 'a', 'ô' => 'o', 'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o', 'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o', 'ê' => 'e', 'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e', 'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i', 'ơ' => 'o', 'ớ' => 'o', 'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o', 'ư' => 'u', 'ừ' => 'u', 'ứ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u', 'đ' => 'd', 'À' => 'A', 'Á' => 'A', 'Ả' => 'A', 'Ã' => 'A', 'Ạ' => 'A', 'Â' => 'A', 'Ấ' => 'A', 'À' => 'A', 'Ẫ' => 'A', 'Ẩ' => 'A', 'Ậ' => 'A', 'Ú' => 'U', 'Ù' => 'U', 'Ủ' => 'U', 'Ũ' => 'U', 'Ụ' => 'U', 'Ô' => 'O', 'Ố' => 'O', 'Ồ' => 'O', 'Ổ' => 'O', 'Ỗ' => 'O', 'Ộ' => 'O',
            'Ê' => 'E', 'Ế' => 'E', 'Ề' => 'E', 'Ể' => 'E', 'Ễ' => 'E', 'Ệ' => 'E', 'Í' => 'I', 'Ì' => 'I', 'Ỉ' => 'I', 'Ĩ' => 'I', 'Ị' => 'I', 'Ơ' => 'O', 'Ớ' => 'O', 'Ờ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O', 'Ợ' => 'O', 'Ư' => 'U', 'Ừ' => 'U', 'Ứ' => 'U', 'Ử' => 'U', 'Ữ' => 'U', 'Ự' => 'U', 'Đ' => 'D', 'Ý' => 'Y', 'Ỳ' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y', 'Ỵ' => 'Y',
            'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a', 'ă' => 'a', 'ắ' => 'a', 'ằ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a', 'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a', 'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u', 'ư' => 'u', 'ứ' => 'u', 'ừ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u', 'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i', 'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o', 'ô' => 'o', 'ố' => 'o', 'ồ' => 'ô', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o', 'ơ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o', 'đ' => 'd', 'Đ' => 'D', 'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y', 'Á' => 'A', 'À' => 'A', 'Ả' => 'A', 'Ã' => 'A', 'Ạ' => 'A', 'Ă' => 'A', 'Ắ' => 'A', 'Ẳ' => 'A', 'Ẵ' => 'A', 'Ặ' => 'A', 'Â' => 'A', 'Ấ' => 'A', 'Ẩ' => 'A', 'Ẫ' => 'A', 'Ậ' => 'A', 'É' => 'E', 'È' => 'E', 'Ẻ' => 'E', 'Ẽ' => 'E', 'Ẹ' => 'E', 'Ế' => 'E', 'Ề' => 'E', 'Ể' => 'E', 'Ễ' => 'E', 'Ệ' => 'E', 'Ú' => 'U', 'Ù' => 'U', 'Ủ' => 'U', 'Ũ' => 'U', 'Ụ' => 'U', 'Ư' => 'U', 'Ứ' => 'U', 'Ừ' => 'U', 'Ử' => 'U', 'Ữ' => 'U', 'Ự' => 'U', 'Í' => 'I', 'Ì' => 'I', 'Ỉ' => 'I', 'Ĩ' => 'I', 'Ị' => 'I', 'Ó' => 'O', 'Ò' => 'O', 'Ỏ' => 'O', 'Õ' => 'O', 'Ọ' => 'O', 'Ô' => 'O', 'Ố' => 'O', 'Ổ' => 'O', 'Ỗ' => 'O', 'Ộ' => 'O', 'Ơ' => 'O', 'Ớ' => 'O', 'Ờ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O', 'Ợ' => 'O', 'Ý' => 'Y', 'Ỳ' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y', 'Ỵ' => 'Y'
        );

        foreach ($trans as $k => $v) {
            $str = str_replace($k, $v, $str);
        }

        return $str;
    }

    public function home_index($lang = 'vi')
    {
        // if(!isset($_GET['dev']) || ($_GET['dev']) != 1)
        // {
        //     $this->autoRender = false;
        //     echo $this->baotri(); die;
        // }
        $this->nodeData['Node']['id'] = 0;
        $this->nodeData['Node']['title'] = $this->settings['title'];


        //    if(isset($_GET['lang']))
        //    {
        //        $this->Session->write('lang', $_GET['lang']);

        //        if($this->referer() != "")
        //            $this->redirect($this->referer());
        //        else
        //            $this->redirect(DOMAIN);
        //    }
        // if (isset($_GET['lang'])) {
            // $this->Session->write('lang', $lang);
            // $this->set('lang',$lang);

        //     if ($this->referer() != "")
        //         $this->redirect($this->referer());
        //     else
        //         $this->redirect(DOMAIN);
        // }

        if (isset($_GET['sort'])) {
            $sort = array();

            $s = $_GET['sort'];

            switch ($s) {
                case 'created-desc':
                    $sort['Node.created'] = 'desc';
                    break;
                case 'price-asc':
                    $sort['Product.price'] = 'asc';
                    break;
                case 'price-desc':
                    $sort['Product.price'] = 'desc';
                    break;
                default:
                    break;
            }

            $this->Session->write('sort', $sort);

            if ($this->referer() != "")
                $this->redirect($this->referer());
            else
                $this->redirect(DOMAIN);
        }

        if (isset($_GET['price'])) {
            $filter_price = array();

            $p = $_GET['price'];

            $p = preg_replace('/[^0-9\-]/', '', $p);
            $p = explode('-', $p);
            $start = $p[0];
            $end = $start;
            if (isset($p[1]))
                $end = $p[1];

            $filter_price['min'] = $start;
            $filter_price['max'] = $end;

            $this->Session->write('filter_price', $filter_price);

            if ($this->referer() != "")
                $this->redirect($this->referer());
            else
                $this->redirect(DOMAIN);
        }


        $this->data = $this->Ccontent->getContent('home');
    }



    public function intro($lang = 'vi')
    {
        // if(!isset($_GET['dev']) || ($_GET['dev']) != 1)
        // {
        //     $this->autoRender = false;
        //     echo $this->baotri(); die;
        // }

        $this->nodeData['Node']['id'] = 0;
        $this->nodeData['Node']['title'] = $this->settings['title'];


        if (isset($_GET['lang'])) {
            $this->Session->write('lang', $_GET['lang']);

            if ($this->referer() != "")
                $this->redirect($this->referer());
            else
                $this->redirect(DOMAIN);
        }

        if (isset($_GET['sort'])) {
            $sort = array();

            $s = $_GET['sort'];

            switch ($s) {
                case 'created-desc':
                    $sort['Node.created'] = 'desc';
                    break;
                case 'price-asc':
                    $sort['Product.price'] = 'asc';
                    break;
                case 'price-desc':
                    $sort['Product.price'] = 'desc';
                    break;
                default:
                    break;
            }

            $this->Session->write('sort', $sort);

            if ($this->referer() != "")
                $this->redirect($this->referer());
            else
                $this->redirect(DOMAIN);
        }

        if (isset($_GET['price'])) {
            $filter_price = array();

            $p = $_GET['price'];

            $p = preg_replace('/[^0-9\-]/', '', $p);
            $p = explode('-', $p);
            $start = $p[0];
            $end = $start;
            if (isset($p[1]))
                $end = $p[1];

            $filter_price['min'] = $start;
            $filter_price['max'] = $end;

            $this->Session->write('filter_price', $filter_price);

            if ($this->referer() != "")
                $this->redirect($this->referer());
            else
                $this->redirect(DOMAIN);
        }

        $this->intro = 1;
        $this->data = $this->Ccontent->getContent('home');
        $this->render('intro');
    }

    public function change_active_editor()
    {
        $this->autoRender = false;
        $active_editor = $this->Session->read('active_editor');
        $change = 1;

        if ($active_editor == 1)
            $change = 0;

        $active_editor = Configure::write('active_editor', $change);
        $this->Session->write('active_editor', $change);

        $this->redirect($this->referer());
    }

    public function baotri()
    {
        $str = "
            <html>
                <head>
                    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

                    <title>
                        Website bảo trì
                    </title>

                    <style>
                    * { background:#fff; padding: 0; margin: 0; }
                    body {background: url('./bao-tri.jpg') no-repeat 50%; width: 100%; height: 100%;}

                    </style>
                </head>
                <body>
                </body>
            </html>
        ";

        return $str;
    }
}
