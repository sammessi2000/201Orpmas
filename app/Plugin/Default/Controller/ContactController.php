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
App::import('Vendor', 'phpmailer', array('file' => 'phpmailer' . DS . 'PHPMailerAutoload.php'));

class ContactController extends DefaultAppController
{

    public $uses = array('Product', 'Default.Category', 'Node', 'Banner', 'Email', 'Contact');

    public function beforeRender()
    {
        parent::beforeRender();
        $this->set('category_root_id', 0);
    }
    public function thanks()
    {
        $this->render('contact_thanks');
    }

    public function tienanh()
    {
        $this->autoRender = false;

        $file = ROOT . DS . 'app/webroot/uploads/files/Basic-Hacker-IELTS-Mua-Sach.jpg';

        $this->send_smtp_mail('id60119@gmail.com', 'test', 'cam.....', $file);
        echo $file;

        die;
    }

    public function recover()
    {
        $this->autoRender = false;
        $rl = DOMAIN . 'recover';

        if ($this->data) {
            $data = $this->data;

            $email = isset($data['email']) ? $this->removeXss($data['email']) : '';
            $check = $this->Customer->findByEmail($email);

            if (is_array($check) && count($check)) {
                $pass = rand(0, 100) . substr(md5(time()), 8) . rand(0, 100);

                $md5pass = md5($pass);

                $this->Customer->id = $check['Customer']['id'];
                $this->Customer->saveField('recover_password', $md5pass);

                $domain = str_replace('http://', '', DOMAIN);
                $domain = trim($domain, '/. ');

                // $content = 'Ai đó đã gửi yêu cầu lấy lại mật khẩu tại VUD';
                $content = "Chào bạn, \n";
                $content .= 'Smartlearn nhận được yêu cầu lấy lại mật khẩu từ bạn. Đây là mật khẩu mới của bạn: ' . $pass . "\n <br />";
                $link = "<a href='" . DOMAIN . 'recover?msg=3&id=' . $check['Customer']['id'] . "'>đây</a>";
                $content .= "Để xác nhận bạn thực hiện hành động này, vui lòng nhấp vào " . $link . " để hoàn thành việc đổi mật khẩu.";

                $this->send_smtp_mail($email, 'Đặt lại mật khẩu cho tài khoản trên website Smartlearn', $content);

                $this->redirect($rl . '?msg=2');
                die;
            } else {
                $this->redirect($rl . '?msg=1');
                die;
            }
        } else {
            $this->redirect($this->referer());
            die;
        }
    }


    public function dangkytuvan()
    {
        $this->autoRender = false;
        $res = 'done';
        $msg = '';
        $data = $this->data;

        if ($this->data) {
            $data = $this->data;

            $fullname = $this->removeXss($data['fullname']);
            $phone = $this->removeXss($data['phone']);
            $address = isset($data['address']) ? $this->removeXss($data['address']) : '';
            $content = isset($data['content']) ? $this->removeXss($data['content']) : '';
            $form = isset($data['form']) && is_numeric($data['form']) ? $this->removeXss($data['form']) : 1;

            // $email = "abc@gmail.com"; 
            // $email = $this->removeXss($email);

            // if($email != '')
            // {
            //     $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 

            //     if (preg_match($regex, $email)) 
            //     {
            //         $file = ROOT . DS . $this->settings['file_bogiaotrinh'];
            //         $this->send_smtp_mail($email, 'test', 'cam.....', $file);

            //         echo 1;
            //         die;
            //     } 
            //     else 
            //     { 
            //         echo 0;
            //         die;
            //     }      
            // } else{
            //     echo 0;
            //     die;
            // }

            // if($age == '')
            // {
            //     $res = 'err';
            //     $msg = 'Vui lòng chọn độ tuổi';
            // }

            $save = array(
                'res' => $res,
                'msg' => $msg,
                'fullname' => $fullname,
                'address' => $address,
                'phone' => $phone,
                'content' => $content,
                'form' => $form
            );



            $this->Contact->save($save);
            echo json_encode($save);
            die;
        }
    }


    public function tuvankiemtra()
    {
        $this->autoRender = false;
        if ($this->data) {
            $res = 'done';
            $msg = '';
            $data = $this->data;

            $fullname = $this->removeXss($data['fullname']);
            $phone = $this->removeXss($data['phone']);
            $email = isset($data['email']) ? $this->removeXss($data['email']) : '';
            $age = isset($data['age']) ? $this->removeXss($data['age']) : '';
            $content = isset($data['content']) ? $this->removeXss($data['content']) : '';
            $form = isset($data['form']) && is_numeric($data['form']) ? $this->removeXss($data['form']) : 1;

            $save = array(
                'res' => $res,
                'msg' => $msg,
                'fullname' => $fullname,
                'email' => $email,
                'phone' => $phone,
                'age' => $age,
                'form' => $form,
                'content' => $content
            );

            $this->Contact->save($save);
            echo json_encode($save);
            die;
        }
    }

    public function dangkyhocthu()
    {
        $this->autoRender = false;

        if ($this->data) {
            $res = 'done';
            $msg = '';
            $data = $this->data;

            $phone = $this->removeXss($data['phone']);
            $fullname = isset($data['email']) ? $this->removeXss($data['fullname']) : '';
            $email = isset($data['email']) ? $this->removeXss($data['email']) : '';
            $course = isset($data['course']) ? $this->removeXss($data['course']) : '';
            $form = isset($data['form']) ? $this->removeXss($data['form']) : '';


            // if($age == '')
            // {
            //     $res = 'err';
            //     $msg = 'Vui lòng chọn độ tuổi';
            // }

            $save = array(
                'res' => $res,
                'msg' => $msg,
                'fullname' => $fullname,
                'email' => $email,
                'form' => $form,
                'phone' => $phone,
                // 'course' => $course,
                'content' => $course
            );

            // $is_valid_email = (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) ? FALSE : TRUE;

            // if($email != ''){
            //     if($is_valid_email == false)
            // {
            //     $res['res'] = 'email';
            //     echo json_encode($save);
            //     die;
            // }
            // }

            $this->Contact->save($save);
            echo json_encode($save);
            die;
        }
    }

    public function contact_sml()
    {
        $this->autoRender = false;
        if ($this->data) {
            $data = $this->data;
            $res = array(
                'res' => 'err',
                'data' => ''
            );
            $fullname = isset($data['fullname']) ? $this->removeXss($data['fullname']) : '';
            $email = isset($data['email']) ? $this->removeXss($data['email']) : '';
            $phone = isset($data['phone']) ? $this->removeXss($data['phone']) : '';
            $content = isset($data['content']) ? $this->removeXss($data['content']) : '';

            $is_valid_email = (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) ? FALSE : TRUE;

            if ($is_valid_email == FALSE) {
                $res['res'] = 'email';
                echo json_encode($res);
                die;
            }


            $save = array(
                'fullname' => $fullname,
                'email' => $email,
                'phone' => $phone,
                'content' => $content
            );

            echo json_encode($res);
            die;
        }
    }


    public function submit_contact()
    {
        if ($this->data) {
            // pr($this->data);
            // die;
            $settings = $this->settings;
            $to = $settings['email'] != '' ? $settings['email'] : 'bthcong@gmail.com';

            if ($this->data) {

                if (isset($this->data['captcha'])) {
                    $captcha = $this->Session->read('captcha');
                    if ($captcha != $this->data['captcha']) {
                        $this->alert('Mã an toàn không đúng', $this->referer());
                        die;
                    }
                }

                $save = array();

                if (isset($this->data['fullname']))
                    $save['fullname'] = $this->data['fullname'];

                if (isset($this->data['address']))
                    $save['address'] = $this->data['address'];

                if (isset($this->data['phone']))
                    $save['phone'] = $this->data['phone'];

                if (isset($this->data['email']))
                    $save['email'] = $this->data['email'];

                if (isset($this->data['content']))
                    $save['content'] = $this->data['content'];

                $save = $this->Contact->save($save);

                echo 'done';
                die;
            }
        }

        // $this->data = $this->Support->find('all', array(
        //     'order'=>array('Support.pos'=>'desc', 'Support.id'=>'desc')
        // ));

    }

    public function index()
    {
        if ($this->data) {
            $settings = $this->settings;
            $to = $settings['email'] != '' ? $settings['email'] : 'bthcong@gmail.com';

            if ($this->data) {

                if (isset($this->data['captcha'])) {
                    $captcha = $this->Session->read('captcha');
                    if ($captcha != $this->data['captcha']) {
                        $this->alert('Mã an toàn không đúng', $this->referer());
                        die;
                    }
                }

                $save = array();

                if (isset($this->data['fullname']))
                    $save['fullname'] = $this->data['fullname'];

                if (isset($this->data['address']))
                    $save['address'] = $this->data['address'];

                if (isset($this->data['phone']))
                    $save['phone'] = $this->data['phone'];

                if (isset($this->data['email']))
                    $save['email'] = $this->data['email'];

                if (isset($this->data['content']))
                    $save['content'] = $this->data['content'];

                // $msg = 'Người gửi : ' . strip_tags($this->data['fullname']) . "\r\n";

                // if(isset($this->data['address']) && $this->data['address'] != "")
                //     $msg .= 'Địa chỉ : ' . strip_tags($this->data['address']) . "\r\n";

                // if(isset($this->data['phone']) && $this->data['phone'] != "")
                //     $msg .= 'Điện thoại : ' . strip_tags($this->data['phone']) . "\r\n";

                // if(isset($this->data['email']) && $this->data['email'] != "")
                //     $msg .= 'Email : ' . strip_tags($this->data['email']) . "\r\n";

                // if(isset($this->data['service']) && $this->data['service'] != "")
                //     $msg .= 'Dịch vụ đăng ký : ' . strip_tags($this->data['service']) . "\r\n";

                // if(isset($this->data['phongban']) && $this->data['phongban'] != "")
                //     $msg .= 'Phòng ban : ' . strip_tags($this->data['phongban']) . "\r\n";

                // $msg .= 'Nội dung liên hệ : ' . "\r\n";

                // if(isset($this->data['content']) && $this->data['content'] != "")
                //     $msg .= strip_tags($this->data['content']);


                // $subject_domain = str_replace('http://', '', DOMAIN);
                // $subject = 'Contact From: ' . trim($subject_domain, 't');

                // if(isset($this->data['type']) && $this->data['type'] == 'dk')
                // {
                //     $subject = 'Đăng ký dịch vụ từ website: ' . trim($subject_domain, 't');
                // }

                // $headers = 'From: ' . $to . "\r\n" .
                // 		'Reply-To: ' . $to . "\r\n" .
                // 		'X-Mailer: PHP/' . phpversion();

                // if (mail($to, $subject, $msg, $headers)) {
                //     $this->alert("Thông tin liên hệ đã được gửi tới ban Quản trị. Chúng tôi sẽ liên hệ ngay khi có thể!", $this->referer());
                //     die;
                // } else {
                //     $this->alert('Có lỗi, vui lòng thử lại sau ít phút!', $this->referer());
                //     die;
                // }

                $save = $this->Contact->save($save);


                if (isset($_GET['ajax'])) {
                    echo 1;
                    die;
                }

                // $this->redirect(DOMAIN . 'cart/success');
                $this->sweet_alert("Thông tin liên hệ đã được gửi tới ban Quản trị. Chúng tôi sẽ liên hệ ngay khi có thể!", $this->referer());
                die;
            }
        }

        // $this->data = $this->Support->find('all', array(
        //     'order'=>array('Support.pos'=>'desc', 'Support.id'=>'desc')
        // ));

        $this->set('is_contact', 1);
    }

    public function send_mail($to, $subject, $msg)
    {
        $dm = parse_url(DOMAIN);
        $domain = '';
        if (isset($dm['host']))
            $domain = $dm['host'];

        if ($domain == '') return;

        $from = 'noreply@' . $domain;

        $headers =  'From: ' . $from . "\r\n" .
            'Reply-To: ' . $to . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        return mail($to, $subject, $msg, $headers);
    }

    public function send_smtp_mail($to, $subject, $message, $file = null)
    {
        $this->autoRender = false;
        $sender = $this->settings['smtp_email'];

        $dm = parse_url(DOMAIN);
        $domain = '';
        if (isset($dm['host']))
            $domain = $dm['host'];

        if ($domain == '') return;

        $from = 'noreply@' . $domain;

        $header =  'From: ' . $from . "\r\n" .
            'Reply-To: ' . $to . "\r\n" .
            "X-Mailer: PHP/" . phpversion() . "Return-Path: $sender";

        $mail = new PHPMailer();
        $mail->charSet = 'UTF-8';
        $mail->CharSet = 'UTF-8';

        $mail->IsSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = $this->settings['smtp_host'];
        $mail->SMTPSecure = trim($this->settings['smtp_secure']) != '' ? $this->settings['smtp_secure'] : '';
        $mail->Port = $this->settings['smtp_port'];
        $mail->Username   = trim($this->settings['smtp_email']);
        $mail->Password   = trim($this->settings['smtp_pass']);

        $mail->SMTPDebug  = 0; // turn it off in production 0 or 1
        $mail->From = $sender;
        // $mail->SMTPAutoTLS = false;
        $mail->FromName = $this->settings['title'];
        $mail->FromName = $subject;
        if ($file != null)
            $mail->addAttachment($file);

        $mail->AddAddress($to);

        $mail->IsHTML(true);
        $mail->CreateHeader($header);

        $mail->Subject = $subject;
        $mail->Body    = nl2br($message);
        $mail->AltBody = nl2br($message);
        // pr($mail);

        // return an array with two keys: error & message
        if (!$mail->Send()) {
            return array('error' => true, 'message' => 'Mailer Error: ' . $mail->ErrorInfo);
        } else {
            return array('error' => false, 'message' =>  "Message sent!");
        }
    }


    public function captcha()
    {
        $md5_hash = md5(rand(0, 999));
        $security_code = substr($md5_hash, 15, 5);
        $this->Session->write('captcha', $security_code);
        $width = 80;
        $height = 30;
        $image = ImageCreate($width, $height);
        $black = ImageColorAllocate($image, 37, 170, 226);
        $white = ImageColorAllocate($image, 255, 255, 255);
        ImageFill($image, 0, 0, $black);
        ImageString($image, 5, 18, 3, $security_code, $white);
        header("Content-Type: image/jpeg");
        ImageJpeg($image);
        ImageDestroy($image);
    }
}
