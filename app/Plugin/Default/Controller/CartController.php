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

App::import('Vendor', 'phpmailer', array('file' => 'phpmailer'.DS.'PHPMailerAutoload.php'));
class CartController extends DefaultAppController
{
	public $uses = array('Product', 'Node', 'Customer', 'Order', 'Server', 'Hosting', 'Domain', 'Email', 'Adv', 'Colo', 'Cloud');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->set('current_category', array('Category'=>array('title'=>'Giỏ hàng')));
	}

	public function beforeRender()
	{
		parent::beforeRender();
		$this->layout = 'cart';
	}

	public function cart_add_multiple()
	{
		$this->autoRender=false;
		$node_id = isset($_GET['ids']) ? $_GET['ids'] : "";

		if($node_id != "")
		{
			$ids = explode(',', $node_id);
			$ids = array_unique($ids);

			foreach($ids as $id)
			{
				$id = (int)$id;

				if($id > 0)
				{
					$this->cart_add($id, 2);
				}
			}
		}
		
		$this->redirect(DOMAIN . 'cart/list');
	}

	public function cart_add($node_id = 0, $ajax = "")
	{
		$this->autoRender=false;

		$node_id = isset($_GET['id']) ? $_GET['id'] : $node_id;
		$extra = isset($_GET['str']) ? $_GET['str'] : '';
		$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;

		$node = $this->Node->findById($node_id);
		if(!is_array($node) || count($node) <=0) die;

		$type = $node['Node']['type'];
		$tbl = $type . 's';
		$alias = ucfirst($type);

		$check = $this->{$alias}->findByNodeId($node_id);


		$product = array();
		$product['Node'] = $node['Node'];
		$product[$alias] = $check[$alias];
		$product['info'] = array(
			'tbl'=>$tbl,
			'alias'=>$alias
		);

		$quycach = array();

		if($extra != '')
		{
			$buff = explode(',', $extra);

			if(is_array($buff) && count($buff) > 0)
			{
				foreach($buff as $v)
				{
					$v = preg_replace('/[^a-z0-9]/i', '', $v);
					$quycach[] = 'id' . $node_id . '-' . $v;
				}
			}
		}

		if($this->Session->check('cart'))
		{
			$cart = $this->Session->read('cart');

			// $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;

			if(count($quycach) > 0)
			{
				foreach($quycach as $pkey)
				{
					$node_id = $pkey;

					if(isset($cart[$node_id]))
					{
						$cart[$node_id]['quantity'] += $quantity;
					}
					else
					{
						$cart[$node_id]['title'] = $product['Node']['title'];
						$cart[$node_id]['quantity'] = $quantity;
						if(isset($product[$alias]['image']))
							$cart[$node_id]['image'] = $product[$alias]['image'];

						$cart[$node_id]['price'] = isset($_GET['price']) && $_GET['price'] != 0 ? preg_replace('/[^0-9]/', '', $_GET['price']) : $product[$alias]['price'];
						
							$cart[$node_id]['size'] = isset($_GET['size']) ? $_GET['size'] : '';
						$cart[$node_id]['type'] = $type;
						$cart[$node_id]['tbl'] = $tbl;
						$cart[$node_id]['alias'] = $alias;
						$cart[$node_id]['id'] = $node_id;
						$cart[$node_id]['extra'] = $extra;

						if(isset($product[$alias]['code']))
							$cart[$node_id]['code'] = $product[$alias]['code'];
					}
				}
			}
			else
			{
				if(isset($cart[$node_id]))
				{
					$cart[$node_id]['quantity'] += $quantity;
				}
				else
				{
					$cart[$node_id]['title'] = $product['Node']['title'];
					$cart[$node_id]['quantity'] = $quantity;
					if(isset($product[$alias]['image']))
						$cart[$node_id]['image'] = $product[$alias]['image'];

					$cart[$node_id]['price'] = isset($_GET['price']) && $_GET['price'] != 0 ? preg_replace('/[^0-9]/', '', $_GET['price']) : $product[$alias]['price'];
					
						$cart[$node_id]['size'] = isset($_GET['size']) ? $_GET['size'] : '';
					$cart[$node_id]['type'] = $type;
					$cart[$node_id]['tbl'] = $tbl;
					$cart[$node_id]['alias'] = $alias;
					$cart[$node_id]['id'] = $node_id;
					$cart[$node_id]['extra'] = $extra;

					if(isset($product[$alias]['code']))
						$cart[$node_id]['code'] = $product[$alias]['code'];
				}
			}

			$this->Session->write('cart', $cart);
		}
		else
		{
			if(count($quycach) > 0)
			{
				foreach($quycach as $pkey)
				{
					$node_id = $pkey;
					
					$cart = array();
					$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;

					$cart[$node_id]['title'] = $product['Node']['title'];
					$cart[$node_id]['quantity'] = $quantity;
					if(isset($product[$alias]['image']))
						$cart[$node_id]['image'] = $product[$alias]['image'];
						
					$cart[$node_id]['price'] = isset($_GET['price']) && $_GET['price'] != 0 ? preg_replace('/[^0-9]/', '', $_GET['price']) : $product[$alias]['price'];
					$cart[$node_id]['size'] = isset($_GET['size']) ? $_GET['size'] : '';
					$cart[$node_id]['type'] = $type;
					$cart[$node_id]['tbl'] = $tbl;
					$cart[$node_id]['alias'] = $alias;
					$cart[$node_id]['id'] = $node_id;
					$cart[$node_id]['extra'] = $extra;

					if(isset($product[$alias]['code']))
						$cart[$node_id]['code'] = $product[$alias]['code'];
				}
			}
			else
			{
				$cart = array();
				$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;

				$cart[$node_id]['title'] = $product['Node']['title'];
				$cart[$node_id]['quantity'] = $quantity;
				if(isset($product[$alias]['image']))
					$cart[$node_id]['image'] = $product[$alias]['image'];
					
				$cart[$node_id]['price'] = isset($_GET['price']) && $_GET['price'] != 0 ? preg_replace('/[^0-9]/', '', $_GET['price']) : $product[$alias]['price'];
				$cart[$node_id]['size'] = isset($_GET['size']) ? $_GET['size'] : '';
				$cart[$node_id]['type'] = $type;
				$cart[$node_id]['tbl'] = $tbl;
				$cart[$node_id]['alias'] = $alias;
				$cart[$node_id]['id'] = $node_id;
				$cart[$node_id]['extra'] = $extra;

				if(isset($product[$alias]['code']))
					$cart[$node_id]['code'] = $product[$alias]['code'];
			}

			$this->Session->write('cart', $cart);
		}

		if($ajax == 2)
		{
			//Fix cho trường hợp add nhiều node_id vào giỏ hàng (hàm cart_add_multiple)
		}
		else
		{
			$ajx = ($ajax != "" || isset($_GET['ajax'])) ? 1 : 0;
			$num = count($cart);

			if($ajx == 1) 
			{
				$arr = array(
					'num_cart'=> $num
				);

				echo json_encode($arr); 
				die;
			}
			else
			{
				$this->redirect(DOMAIN . 'cart/list');
			}
		}
	}

	public function cart_list()
	{
		// $this->Session->delete('cart');
		if(isset($_GET['coupon']) && $_GET['coupon'] != '')
		{
			$coupon = $this->removeXss($_GET['coupon']);
			$this->Session->write('coupon', $coupon);

			$this->redirect($this->referer());
		}

		if(!$this->Session->check('cart') || count($this->Session->read('cart')) <=0)
		{
			$this->set('error', 'Chưa có sản phẩm nào trong giỏ hàng');
		}
		else
		{
			$this->data = $this->Session->read('cart');
		}


		$coupon = '';

		if($this->Session->check('coupon'))
		{
			$coupon = $this->Session->read('coupon');

			$check = $this->Coupon->find('first', array(
				'conditions'=>array(
					'Coupon.code'=>$coupon,
					'Coupon.status'=>0
				)
			));

			if(is_array($check) && count($check) > 0)
			{
				$this->set('coupon_done', $check['Coupon']['price']);
			}
			else
			{
				$this->set('coupon_err', 1);
			}
		}
			
		$this->set('coupon', $coupon);

		$this->set('is_cart', 1);

		if($this->is_mobile == 1)
			$this->render('cart_list_m');
		else
			$this->render('cart_list');
	}

	public function cart_delete($node_id)
	{
		$this->autoRender = false;

		if($this->Session->check('cart'))
		{
			$cart = $this->Session->read('cart');

			if(isset($cart[$node_id]))
			{
				unset($cart[$node_id]);
			}
			$this->Session->write('cart', $cart);
		}

		$this->redirect($this->referer());
	}

	public function cart_update()
	{
		$this->autoRender = false;
		
		if($this->Session->check('cart'))
		{
			$data = isset($_GET['data']) ? $_GET['data'] : '';
			$data = trim($data, ';');
			$cart = $this->Session->read('cart');
			$arr = array();
			if($data != '')
			{
				$buff = explode(';', $data);

				foreach($buff as $value)
				{
					$val = explode('.', $value);
					$k = $val[0];
					$v = $val[1];
					$arr[$k] = $v;
				}
			}


			foreach($arr as $k=>$v)
			{
				if(is_numeric($v)) $cart[$k]['quantity'] = $v;
			}
			$this->Session->write('cart', $cart);
		}

		// $total = 0;
		// foreach($cart as $v)
		// {
		// 	$tong = $v['quantity'] * $v['price'];
		// 	$total += $tong;
		// }

		// echo number_format($total);
		if(isset($_GET['ajx']) && $_GET['ajx'] == 1)
		{
			echo 'done'; 
			die;
		}
		
		$this->redirect($this->referer());
	}

	public function cart_payment()
	{
		if($this->data)
		{
			$data = $this->data;

			if(!isset($data['phone']) || trim($data['phone']) == "")
			{
				$this->alert("Vui lòng nhập số điện thoại", $this->referer());
				die;
			}

			$user = null;

			if($this->Session->check('user'))
				$user = $this->Session->read('user');

			// pr($user);
			// pr($data); 
			// die;

			// if($user == null)
			// 	$this->alert("Vui lòng đăng nhập trước khi sử dụng chức năng này!", $this->referer());

			// pr($data); die;
			
			$settings = $this->settings;
	        $to = $settings['email'] != '' ? $settings['email'] : 'bthcong@gmail.com';
	        
            // $security_code = $this->Session->read('security_code');
            // $captcha = $this->data['Contact']['captcha'];

            // if($security_code != $captcha)
            // {
            //     $this->Session->setFlash('Mã Captcha không đúng!');
            //     $this->redirect($this->referer()); die;
            // }

	        $cart = $this->Session->read('cart');
	  //       $sp = '<table width="100%" cellpadding="3" cellspacing="1" style="background: #ccc;">';
	  //       $tong = 0;

	  //       $sp .= '<tr style="background: #fff; font-weight: bold;">';
	  //       $sp .= '<td>Tên sản phẩm</td>';
	  //       $sp .= '<td>Mã SP</td>';
	  //       $sp .= '<td>Số lượng</td>';
	  //       $sp .= '<td>Thành tiền</td>';
	  //       $sp .= '</tr>';

			// foreach($cart as $k=>$v)
			// {
			// 	$tien = $v['quantity'] * $v['price'];
			// 	$sp .= '<tr style="background: #fff;">';
			// 	$sp .= '<td>' . $v['title'] . '</td>';

			// 	// if(isset($v['code']))
			// 	$sp .= '<td>';
				
			// 	if(isset($v['code']))
			// 		$sp .= $v['code'];
			// 	$sp .= '</td>';

			// 	$sp .= '<td>' . $v['quantity'] . '</td>';
			// 	$sp .= '<td>' . number_format($tien) . '</td>';
			// 	$sp .= '</tr>';
			// 	$tong = $tong + $tien;
			// }
			// $sp .= '<tr style="background: #fff; font-weight: bold; color: #ff0000;"><td colspan="3" align="right">Tổng : </td><td>'.number_format($tong).'</td></tr>';
			// $sp .= '</table>';

			// // $msg = 'Người gửi : ' . strip_tags($this->data['fullname']) . "\r\n";
			// // $msg .= 'Địa chỉ : ' . strip_tags($this->data['address']) . "\r\n";
			// // $msg .= 'Email : ' . strip_tags($this->data['email']) . "\r\n";
			// // $msg .= 'Điện thoại : ' . strip_tags($this->data['phone']) . "\r\n";

			// $msg = 'Người gửi : ' . $user['fullname'] . "\r\n";
			// $msg .= 'Địa chỉ : ' . $user['address'] . "\r\n";
			// $msg .= 'Email : ' . $user['email'] . "\r\n";
			// $msg .= 'Điện thoại : ' . $user['phone'] . "\r\n";

			// // $msg .= 'Nội dung liên hệ : ' . "\r\n";
			// // $msg .= strip_tags($this->data['content']);
			// $msg .=  "\r\n"  . "\r\n";

			// $msg .= $sp;

			// $headers = 'From: ' . $to . "\r\n" .
			// 			'Reply-To: ' . $to . "\r\n" .
			// 			'X-Mailer: PHP/' . phpversion();
						
			// $subject = str_replace('http://', '', DOMAIN);
			// $subject = trim($subject, '/');

			// $this->send_mail($to, $subject, $msg);

    		// $customer_id = $user['id'];


			$check = $this->Customer->findByPhone($this->data['phone']);
			
			if(is_array($check) && count($check) > 0)
        	{
        		$customer_id = $check['Customer']['id'];
        	}
        	else
        	{
        		$this->Customer->save($this->data);
        		$customer_id = $this->Customer->getLastInsertID();
			}

			// if(is_array($user) && count($user) > 0)
			// {
			// 	$customer_id = $user['id'];
			// }
   //      	else if(is_array($check) && count($check) > 0)
   //      	{
   //      		$check = $this->Customer->findByPhone($this->data['phone']);
   //      		$customer_id = $check['Customer']['id'];
   //      	}
   //      	else
   //      	{
   //      		$this->Customer->save($this->data);
   //      		$customer_id = $this->Customer->getLastInsertID();
			// }
			
			$fullname_nhan = isset($this->data['fullname_nhan']) ? $this->data['fullname_nhan'] : '';
			$phone_nhan = isset($this->data['phone_nhan']) ? $this->data['phone_nhan'] : '';
			$thanhtoan = isset($this->data['thanhtoan']) ? $this->data['thanhtoan'] : '1';
			$hoadon = isset($this->data['hoadon']) ? 1 : 0;
			$address = isset($this->data['address']) ? $this->data['address'] : '';
			$address_nhan = isset($this->data['address_nhan']) ? $this->data['address_nhan'] : '';
			$codegg = isset($this->data['codegg']) ? $this->data['codegg'] : '';
			$code = isset($this->data['code']) ? $this->data['code'] : '';

			$coupon = '';
			$coupon_price= 0;

			if($this->Session->check('coupon'))
			{
				$coupon = $this->Session->read('coupon');

				$checkc = $this->Coupon->find('first', array(
					'conditions'=>array(
						'Coupon.code'=>$coupon,
						'Coupon.status'=>0
					)
				));

				if(is_array($checkc) && count($checkc) > 0)
				{
					$this->Coupon->id = $checkc['Coupon']['id'];
					$this->Coupon->saveField('status', 1);

					$coupon_price = $checkc['Coupon']['price'];
				}

				$this->Session->delete('coupon');
			}

        	foreach($cart as $k=>$v) 
        	{
    			$save = array(
            		'customer_id' => $customer_id,
            		'node_id' => $v['id'],
            		'quanity' => $v['quantity'],
            		'price' => $v['price'],
            		'size' => $v['size'],
            		'title' => $v['title'],
            		'extra' => $v['extra'],
            		'fullname_nhan' => $fullname_nhan,
            		'phone_nhan' => $phone_nhan,
            		'address_nhan'=>$address_nhan,
            		'thanhtoan' => $thanhtoan,
            		'hoadon'=>$hoadon,
            		'coupon' => $code,
            		'code' => $code,
            		'coupon_price'=>$coupon_price,
            		'codegg'=>$codegg
            	);

            	if(isset($v['thoigian']))
            		$save['thoigian'] = $v['thoigian'];

            	if(isset($v['image']))
            		$save['image'] = $v['image'];

            	if(isset($this->data['content']))
            		$save['content'] = strip_tags($this->data['content']);

            	// if(isset($data['referer_source']))
            	// 	$save['referer_source'] = $data['referer_source'];

            	// if(isset($v['code']))
            	// 	$save['code'] = $v['code'];

            	$this->Order->create();
            	$this->Order->save($save);

            	$inserted_id = $this->Order->getLastInsertID();
        	}

        	$this->Session->delete('cart');

        	// $msg = $this->lang == 'vi' ? 'Thông tin đã được gửi đến ban quản trị. Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất.' : 'Thank you! Your message has been successfully sent. We will get back to you shortly!';
            // $this->alert($msg, DOMAIN . 'cart/success'); die;
            $this->redirect(DOMAIN . 'cart/success');
		}
	}

    public function send_mail($to, $subject, $msg, $cc='')
    {
    	$dm = parse_url(DOMAIN);
    	$domain = '';
    	if(isset($dm['host']))
    		$domain = $dm['host'];

    	if($domain == '') return;

    	$from = 'noreply@' . $domain;

        $headers =  'From: ' . $from . "\r\n";

        if($cc != '')
        	$headers .= 'Cc: '.$cc.'\r\n';

        $headers .= 'Reply-To: ' . $to . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        return mail($to, $subject, $msg, $headers);                    
    }

    public function send_smtp_mail($to, $subject, $message) {
        $this->autoRender = false;
        $sender = $this->settings['smtp_email']; 

        $dm = parse_url(DOMAIN);
    	$domain = '';
    	if(isset($dm['host']))
    		$domain = $dm['host'];

    	if($domain == '') return;

    	$from = 'noreply@' . $domain;
     
        $header =  'From: ' . $from . "\r\n" .
                    'Reply-To: ' . $to . "\r\n" .
                    "X-Mailer: PHP/".phpversion() . "Return-Path: $sender";
     
        $mail = new PHPMailer();
        $mail->charSet = 'UTF-8';
        $mail->CharSet = 'UTF-8';
     
        $mail->IsSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = $this->settings['smtp_host']; 
        $mail->SMTPSecure = trim($this->settings['smtp_secure']) == 1 ? 'ssl' : '';
        $mail->Port = $this->settings['smtp_port'];
        $mail->Username   = trim($this->settings['smtp_email']);  
        $mail->Password   = trim($this->settings['smtp_pass']);

        $mail->SMTPDebug  = 0; // turn it off in production 0 or 1
        $mail->From = $sender;
        $mail->FromName = $this->settings['title'];
        $mail->FromName = $subject;
     
        $mail->AddAddress($to);
     
        $mail->IsHTML(true);
        $mail->CreateHeader($header);
     
        $mail->Subject = $subject;
        $mail->Body    = nl2br($message);
        $mail->AltBody = nl2br($message);
     
        // return an array with two keys: error & message
        if(!$mail->Send()) {
          return array('error' => true, 'message' => 'Mailer Error: ' . $mail->ErrorInfo);
        } else {
          return array('error' => false, 'message' =>  "Message sent!");
        }
    }

	public function get_cart_code($inserted_id = 0, $cart_code = '')
	{
		if($inserted_id == 0 || $cart_code == '')
		{
			return '';
		}

		//Lấy mã vùng
		$cart_code = explode(' ', $cart_code);
		
		$first_array = str_split($cart_code[0]);
		$first = $first_array[0];

		$second_arr = str_split($cart_code[1]);
		$second = $second_arr[0];

		$cart_str = $first . $second;

		return $cart_str . ' ' . $inserted_id;
	}

	public function cart_success()
	{
		$this->set('is_cart', 1);

		if($this->is_mobile == 1)
			$this->render('cart_success_m');
		else
			$this->render('cart_success');
	}
}