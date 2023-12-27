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
App::import('Vendor', 'Pagination', array('file' => 'Pagination.class.php'));

class NodeController extends DefaultAppController
{
    public function beforeRender()
    {
        parent::beforeRender();
        $category_root_id = 0;

        if (isset($this->custom_layout))
            $this->layout = $this->custom_layout;

        if (isset($this->currentCategory['Category']['id'])) {
            $category_root_id = $this->find_root_category($this->currentCategory['Category']['id']);
        }

        $this->set('category_root_id', $category_root_id);
        $this->category_root_id = $category_root_id;
    }

    public function get_giaovien_rate_num($id_gv)
    {
        $this->autoRender = false;
        return 100;
    }

    public function get_chungthuc_counts($id_customer)
    {
        $this->autoRender = false;
        return 30;
    }

    public function get_featured_giaovien()
    {
        $this->autoRender = false;

        return $this->Team->find('first', array(
            'conditions' => array(
                'Team.featured' => 1
            ),
            'limit' => 10
        ));
    }

    public function get_lanhdao($cid)
    {
        //1: lãnh đạo
        //2: ban chuyên môn
        //3: hội viên

        $this->Team = ClassRegistry::init('Team');

        $data = $this->Team->find('all', array(
            // 'conditions' => array(
            //     'Team.category_id' => $cid
            // ),
            'order' => array('Team.pos' => 'desc', 'Team.id' => 'desc')
        ));

        return $data;
    }

    public function get_hocvien_tieubieu()
    {
        $this->autoRender = false;
        $data = $this->Customer->find('all', array(
            'conditions' => array(
                'Customer.featured' => 1
            )
        ));

        // pr($data);
        return $data;
    }

    public function buildpc()
    {
        if ($this->is_mobile == 1)
            $this->render('build_pc_m');
        else
            $this->render('build_pc');
    }

    public function whois()
    {
        $this->render('whois');
    }


    public function partner($slug_ori = null)
    {
        $slug = str_replace('.html', '', $slug_ori);
        $slug_arr = explode('-', $slug);
        $id = end($slug_arr);
        $check = array();
        $related = array();
        $node = array(
            'Node' => array(
                'id' => -1,
                'title' => '',
                'description' => '',
                'slug' => $slug_ori,
            )
        );

        if (is_numeric($id) && $id > 0) {
            $check = $this->Hangxe->findById($id);

            if (!is_array($check) || count($check) <= 0) {
                $this->redirect(DOMAIN, 301);
                die;
            }

            $tlang = $this->lang == 'vi' ? '' : 'en';

            $title = $check['Hangxe']['title' . $tlang];
            $description = $check['Hangxe']['description' . $tlang];


            $node['Node']['id'] = -1;
            $node['Node']['title'] = $title;
            $node['Node']['description'] = $description;

            $related = $this->Product->find('all', array(
                'joins' => array(
                    array(
                        'table' => 'nodes',
                        'alias' => 'Node',
                        'type' => 'INNER',
                        'conditions' => array('Product.node_id = Node.id')
                    ),
                ),
                'conditions' => array(
                    'Node.status' => 1,
                    'Product.hang_id' => $id
                ),
                'limit' => 8,
                'fields' => array('Node.*', 'Product.*'),
                'order' => array('Node.pos DESC', 'Node.id DESC')
            ));
        } else {
            $this->redirect(DOMAIN, 301);
            die;
        }


        $this->nodeData = $node;
        $this->data = $node;

        $this->set('data', $check);
        $this->set('related', $related);
        $this->render('partner_detail');
    }

    public function partners()
    {
        $data = $this->Hangxe->find('all');

        $this->set('data', $data);
        $this->render('partners');
    }



    public function get_tag_from_post_node_id($node_id)
    {
        $data = $this->Tag->find('all', array(
            'joins' => array(
                array(
                    'table' => 'nodes',
                    'alias' => 'Node',
                    'conditions' => array('Node.id=Tag.node_tag_id'),
                    'type' => 'INNER',
                )
            ),
            'conditions' => array(
                'Tag.node_id' => $node_id,
            ),
            'group' => 'Tag.node_tag_id',
            'fields' => array('Node.*', 'Tag.*')
        ));

        return $data;
    }


    public function get_agency($limit = 20, $mien = null, $city = null, $key = null)
    {
        $this->Agency = ClassRegistry::init('Agency');

        $gmien = (isset($_GET['mien']) && is_numeric($_GET['mien'])) ? $_GET['mien'] : '';
        $gcity = (isset($_GET['city']) && is_numeric($_GET['city'])) ? $_GET['city'] : '';
        $gkey = isset($_GET['key']) ? $_GET['key'] : '';

        $gkey = Inflector::slug($gkey, ' ');
        $gkey = $this->removeXss($gkey);

        $conditions = array();

        if ($gmien != '')
            $conditions['Agency.mien_id'] = $gmien;

        if ($gcity != '')
            $conditions['Agency.city_id'] = $gcity;

        $conditions['OR']['Agency.title LIKE'] = '%' . $gkey . '%';
        $conditions['OR']['Agency.title_en LIKE'] = '%' . $gkey . '%';
        $conditions['OR']['Agency.address LIKE'] = '%' . $gkey . '%';
        $conditions['OR']['Agency.address_en LIKE'] = '%' . $gkey . '%';

        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $data['pagination'] = '';

        $data['data'] = $this->Agency->find('all', array(
            'conditions' => $conditions,
            'limit' => $limit,
            'offset' => $offset,
        ));

        if (is_array($data['data']) && count($data['data']) > 0) {
            $total = $this->Agency->find('count', array('conditions' => $conditions));

            $pagination = new Pagination($limit);
            $pagination->setCurrent($page);
            $pagination->setTotal($total);
            $markup = $pagination->parse();

            $data['pagination'] = $markup;
        }

        return $data;
    }

    public function get_jobs()
    {
        $this->autoRender = false;
        $search = isset($this->params['s']) ? $this->params['s'] : '';

        $this->Job = ClassRegistry::init('Job');

        if ($search != '') {
            $search = $this->removeXss($search);

            $jobs = $this->Job->find('all', array(
                'conditions' => array(
                    'Job.title LIKE' => '%' . $search . '%'
                ),
                'order' => array('Job.pos' => 'desc', 'Job.id' => 'desc')
            ));
        } else {
            $jobs = $this->Job->find('all', array(
                'order' => array('Job.pos' => 'desc', 'Job.id' => 'desc')
            ));
        }

        return $jobs;
    }

    public function tuyendung_list($id = null)
    {

        $this->Job = ClassRegistry::init('Job');

        $search = isset($_GET['s']) ? $_GET['s'] : '';

        if ($search != '') {
            $search = $this->removeXss($search);

            // $jobs = $this->Job->find('all', array(
            //     'conditions' => array(
            //         'Job.title LIKE' => '%' . $search . '%'
            //     ),
            //     'order' => array('Job.pos' => 'desc', 'Job.id' => 'desc')
            // ));

            $this->paginate = array(
                'conditions' => array(
                    'Job.title LIKE' => '%' . $search . '%'
                ),
                'order' => array('Job.pos' => 'desc', 'Job.id' => 'desc'),
                'limit' => 3
            );
        } else {

            $this->paginate = array(
                'order' => array('Job.pos' => 'desc', 'Job.id' => 'desc'),
                'limit' => 3
            );
            // $jobs = $this->Job->find('all', array(
            //     'order' => array('Job.pos' => 'desc', 'Job.id' => 'desc')
            // ));
        }


        // $this->paginate = array(
        //     'order'=> array('Job.pos' => 'desc', 'Job.id' => 'desc'),
        //     'limit'=>3
        // );
        $this->data = $this->paginate('Job');
        $this->render('job_list');
    }


    public function tuyendung_detail($id = null)
    {
        if (!is_numeric($id)) die;


        $this->Job = ClassRegistry::init('Job');
        $data = $this->Job->findById($id);
        $other = $this->Job->find('all', array(
            'conditions' => array(
                'NOT' => array(
                    'Job.id' => $id
                )
            ),
            'limit' => 20
        ));

        $this->set('related', $other);
        $this->data = $data;

        $this->render('job_detail');
    }

    public function get_city_lst()
    {
        $this->City = ClassRegistry::init('City');
        $d = $this->City->find('all', array(
            'order' => array('City.pos' => 'desc', 'City.id' => 'desc')
        ));

        $lst = array();

        foreach ($d as $v) {
            $lst[$v['City']['id']] = $v['City']['title'];
        }

        return $lst;
    }

    public function get_cities_html()
    {
        $this->autoRender = false;
        $id = (isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : 0;
        $gcity = isset($_GET['gcity']) ? $_GET['gcity'] : "";

        if ($id == 0) {
            echo '';
            die;
        }

        $city = $this->get_cities($id);

        $str = '';

        foreach ($city as $k => $v) {
            $select = $gcity == $k ? 'selected' : '';
            $str .= '<option value="' . $k . '"' . $select . '>' . $v . '</option>';
        }

        echo $str;
    }

    public function get_cities($mien_id = 0)
    {
        $mien_id = (int) $mien_id;

        $this->City = ClassRegistry::init('City');
        $field = $this->lang == 'vi' ? 'title' : 'title_' . $this->lang;

        $cities = $this->City->find('list', array('fields' => array('id', $field)));

        if ($mien_id > 0) {
            $cities = $this->City->find(
                'list',
                array(
                    'conditions' => array(
                        'City.mien_id' => $mien_id
                    ),
                    'fields' => array('id', $field)
                )
            );
        }

        return $cities;
    }
    public function get_mien()
    {
        $this->Mien = ClassRegistry::init('Mien');
        $field = $this->lang == 'vi' ? 'title' : 'title_' . $this->lang;
        $mien = $this->Mien->find('list', array('fields' => array('id', $field)));

        return $mien;
    }

    public function add_subcriber()
    {
        $this->autoRender = false;
        $mail = isset($_GET['mail']) && $_GET['mail'] != '' ? $_GET['mail'] : '';

        if ($mail != '') {
            $this->Subcriber = ClassRegistry::init('Subcriber');
            $check = $this->Subcriber->findByEmail($mail);

            if (is_array($check) && count($check) > 0) {
                echo '0';
                die;
            } else {
                $time = time();

                $this->Subcriber->save(array(
                    'email' => $mail,
                    'created' => $time
                ));

                echo '1';
                die;
            }
        }
    }

    public function get_cat_customize($node_id, $alias = 'Server', $tbl = 'servers')
    {
        $node = $this->Node->find('first', array(
            'joins' => array(
                array(
                    'table' => $tbl,
                    'alias' => $alias,
                    'type' => 'INNER',
                    'conditions' => array($alias . '.node_id = Node.id')
                )
            ),
            'conditions' => array(
                'Node.id' => $node_id
            ),
            'fields' => array('Node.*', $alias . '.*')
        ));

        // echo $tbl;
        // echo $alias;
        // echo $node_id;
        // pr($node);

        $type = $node['Node']['type'];
        $catfield = $type . '_category';
        $catid = $node[$alias][$catfield];
        $catroot_id = $this->find_root_category($catid);

        $cat = $this->Node->find('first', array(
            'joins' => array(
                array(
                    'table' => 'categories',
                    'alias' => 'Category',
                    'type' => 'INNER',
                    'conditions' => array('Category.node_id = Node.id')
                )
            ),
            'conditions' => array(
                'Category.id' => $catroot_id
            ),
            'fields' => array('Node.*', 'Category.*')
        ));

        $data = array();
        $data['node'] = $node;
        $data['category'] = $cat;

        return $data;
    }

    public function tucauhinh()
    {
        $node_id = $_GET['i'];
        $node = $this->Node->findById($node_id);
        $alias = $node['Node']['type'];
        $tbl = $alias . 's';

        $data =  $this->Node->find('first', array(
            'joins' => array(
                array(
                    'table' => $tbl,
                    'alias' => $alias,
                    'type' => 'INNER',
                    'conditions' => array($alias . '.node_id = Node.id')
                )
            ),
            'conditions' => array(
                'Node.id' => $node_id
            ),
            'fields' => array('Node.*', $alias . '.*')
        ));

        $this->set('alias', $alias);
        $this->set('tbl', $tbl);
        $this->data = $data;
        $this->render('tucauhinh');
    }

    public function getdomain($all = null)
    {
        if ($all != null) {
            $data = $this->Node->find('all', array(
                'joins' => array(
                    array(
                        'table' => 'domains',
                        'alias' => 'Domain',
                        'type' => 'INNER',
                        'conditions' => array('Domain.node_id = Node.id')
                    )
                ),
                'conditions' => array(
                    'Node.type' => 'domain',
                    'Node.status' => 1,
                ),
                'fields' => array('Node.*', 'Domain.*'),
                'order' => array('Node.pos' => 'desc', 'Node.id' => 'desc')
            ));
        } else {
            $data = $this->Node->find('all', array(
                'joins' => array(
                    array(
                        'table' => 'domains',
                        'alias' => 'Domain',
                        'type' => 'INNER',
                        'conditions' => array('Domain.node_id = Node.id')
                    )
                ),
                'conditions' => array(
                    'Node.type' => 'domain',
                    'Node.status' => 1,
                ),
                'limit' => 8,
                'fields' => array('Node.*', 'Domain.*'),
                'order' => array('Node.pos' => 'desc', 'Node.id' => 'desc')
            ));
        }

        return $data;
    }


    public function get_hangs()
    {
        $d = $this->Hang->find('all', array(
            'order' => array('Hang.pos' => 'desc', 'Hang.id' => 'desc')
        ));

        $lst = array();

        foreach ($d as $v) {
            $lst[$v['Hang']['id']] = $v['Hang']['title'];
        }

        return $lst;
    }

    public function upload_image()
    {
        $this->autoRender = false;


        $files = $_FILES;

        if (isset($_FILES['upload']['name'])) {
            $img = '';
            if (isset($_FILES['upload']['type']) && strpos($_FILES['upload']['type'], 'image') !== false) {
                $new_upload = array(
                    'name' => $_FILES['upload']['name'],
                    'type' => $_FILES['upload']['type'],
                    'tmp_name' => $_FILES['upload']['tmp_name'],
                    'error' => $_FILES['upload']['error'],
                    'size' => $_FILES['upload']['size'],
                );

                $img_name = time() . rand(0, 10) . rand(0, 10);

                $this->Upload->name = $img_name;
                $this->Upload->new = $new_upload;
                @$img = $this->Upload->Process();
            }

            $function_number = $_GET['CKEditorFuncNum'];
            $url = DOMAIN . 'app/webroot/uploads/images/' . $img;
            $message = '';
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
        }

        die;
    }

    public function user_change_pass()
    {
        $this->Customer = ClassRegistry::init('Customer');
        $this->User = ClassRegistry::init('User');

        if ($this->Session->check('user')) {
            $this->autoRender = false;

            $res = array(
                'res' => 'err',
                'msg' => ''
            );
            $user = $this->Session->read('user');

            if ($this->data) {
                $data = $this->data;
                $pass = $this->removeXss($data['pass']);
                $repass = $this->removeXss($data['repass']);

                if ($pass == "" || $repass == "") {
                    $this->alert("Vui lòng nhập đủ thông tin", $this->referer());
                    die;
                }

                if ($pass != $repass) {
                    echo json_encode($res);
                    die;
                }

                $pass = md5($pass);

                $this->Customer->id = $user['id'];
                $this->Customer->saveField('password', $pass);

                // $this->alert("Đã cập nhật mật khẩu. Vui lòng đăng nhập lại!", DOMAIN . 'logout');
                $res['res'] = 'done';
                echo json_encode($res);
                die;
            }

            $this->render('user_change_pass');
        } else {
            $this->redirect(DOMAIN);
            die;
        }
    }

    public function recover()
    {
        $msg = isset($_GET['msg']) && $_GET['msg'] == 3 ? $_GET['msg'] : '';
        $uid = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : '';

        if ($msg != '' && $uid != '') {
            $check = $this->Customer->findById($uid);
            $r = $check['Customer']['recover_password'];

            $this->Customer->id = $uid;
            $this->Customer->saveField('password', $r);
        }

        $this->render('user_recover');
    }


    public function user_account()
    {
        $this->Customer = ClassRegistry::init('Customer');
        $this->User = ClassRegistry::init('User');

        if ($this->Session->check('user')) {
            $user = $this->Session->read('user');

            if ($this->data) {
                $data = $this->data;
                $fullname = $this->removeXss($data['fullname']);
                // $hang_id = implode(',', $data['hid']);
                // $hang_id = $this->removeXss($hang_id);
                // $hang_id = ',' . $hang_id . ',';
                $address = $this->removeXss($data['address']);
                $city_id = $this->removeXss($data['city_id']);
                $phone = $this->removeXss($data['phone']);
                $email = $this->removeXss($data['email']);
                // $nganhnghe = $this->removeXss($data['nganhnghe']);
                // $loaihinh = $this->removeXss($data['loaihinh']);
                $image = $this->removeXss($data['image']);


                $save = array(
                    'fullname' => $fullname,
                    // 'hang_id' => $hang_id, 
                    'address' => $address,
                    'city_id' => $city_id,
                    'phone' => $phone,
                    'email' => $email,
                    // 'nganhnghe' => $nganhnghe, 
                    // 'loaihinh' => $loaihinh, 
                    'logo' => $image,
                    'duyet_thongtin' => 0,
                );

                $this->Customer->id = $user['id'];
                $this->Customer->save($save);

                // foreach($save as $k=>$v)
                // {
                //     if(isset($user[$k]))
                //         $user[$k] = $v;
                // }

                $check = $this->Customer->findById($user['id']);

                $this->Session->write('user', $check['Customer']);

                $this->redirect(DOMAIN . 'user/account');
            }
            $this->render('user_account');
        } else {
            $this->redirect(DOMAIN);
            die;
        }
    }

    public function user_banner_list()
    {
        if ($this->Session->check('user')) {
            $user = $this->Session->read('user');
            $this->CustomerBanner = ClassRegistry::init('CustomerBanner');
            $data = $this->CustomerBanner->find('all', array(
                'conditions' => array(
                    'CustomerBanner.customer_id' => $user['id']
                ),
                'order' => array('CustomerBanner.id' => 'desc')
            ));

            $this->data = $data;
            $this->render('user_banner_list');
        } else {
            $this->redirect(DOMAIN);
            die;
        }
    }

    public function user_banner_delete($id)
    {
        $this->autoRender = false;

        if ($this->Session->check('user')) {
            $user = $this->Session->read('user');
            $this->CustomerBanner = ClassRegistry::init('CustomerBanner');
            $check = $this->CustomerBanner->findById($id);
            if (isset($check['CustomerBanner']['customer_id']) && $check['CustomerBanner']['customer_id'] == $user['id']) {
                $this->CustomerBanner->delete($id);
                $this->redirect(DOMAIN . 'user/banner');
                die;
            }

            $this->render('user_banner_add');
        }
    }
    public function user_banner_add()
    {
        if ($this->Session->check('user')) {
            $user = $this->Session->read('user');
            if ($this->data) {
                $data = $this->data;
                $title = $this->removeXss($data['title']);
                $image = $this->removeXss($data['image']);
                $description = $this->removeXss($data['description']);

                $save = array(
                    'title' => $title,
                    'image' => $image,
                    'description' => $description,
                    'customer_id' => $user['id'],
                    'status' => 0
                );

                $this->CustomerBanner = ClassRegistry::init('CustomerBanner');
                $this->CustomerBanner->create();
                $this->CustomerBanner->save($save);

                $this->redirect(DOMAIN . 'user/banner');
            }

            $this->render('user_banner_add');
        } else {
            $this->redirect(DOMAIN);
            die;
        }
    }

    public function user_banner_edit($ub_id)
    {
        if ($this->Session->check('user')) {
            $user = $this->Session->read('user');
            $data = $this->UserPost->find('all', array(
                'conditions' => array(
                    'UserPost.customer_id' => $user['id']
                ),
                'order' => array('UserPost.id' => 'desc')
            ));

            $this->data = $data;
            $this->render('user_banner_edit');
        } else {
            $this->redirect(DOMAIN);
            die;
        }
    }

    public function user_post_add()
    {
        if ($this->Session->check('user')) {
            $user = $this->Session->read('user');

            if ($this->data) {
                $data = $this->data;
                $title = $this->removeXss($data['title']);
                $description = $this->removeXss($data['description']);
                $image = $this->removeXss($data['image']);
                $content = $this->removeXss($data['content']);
                $category_id = $this->removeXss($data['category']);

                $save = array(
                    'customer_id' => $user['id'],
                    'title' => $title,
                    'image' => $image,
                    'description' => $description,
                    'content' => $content,
                    'category_id' => $category_id,
                );

                $this->UserPost->create();
                $this->UserPost->save($save);

                $this->redirect(DOMAIN . 'user/thanks');
            }

            $this->render('user_post_add');
        } else {
            $this->redirect(DOMAIN);
            die;
        }
    }

    public function user_history()
    {
        $this->render('user_history');
    }

    public function user_thanks()
    {
        $this->render('user_thanks');
    }

    public function user_refs()
    {
        if ($this->Session->check('user')) {
            $user = $this->Session->read('user');
            $data = $this->Customer->find('all', array(
                'conditions' => array(
                    'Customer.parent_id' => $user['id']
                ),
                'order' => array('Customer.id' => 'desc')
            ));

            $this->data = $data;
        } else {
            $this->redirect(DOMAIN);
            die;
        }

        $this->render('user_refs');
    }


    public function user_dashboard()
    {
        if ($this->Session->check('user')) {
            $user = $this->Session->read('user');
            $data = $this->UserPost->find('all', array(
                'conditions' => array(
                    'UserPost.customer_id' => $user['id']
                ),
                'order' => array('UserPost.id' => 'desc')
            ));

            $this->data = $data;
            $this->render('user_account');
        } else {
            $this->redirect(DOMAIN);
            die;
        }
    }

    public function get_customer_detail($cid)
    {
        $this->autoRender = false;
        $d = $this->Customer->findById($cid);

        return $d;
    }

    public function vote($news_id)
    {
        $this->autoRender = false;

        $this->Vote = ClassRegistry::init('Vote');
        $ip = $this->getUserIP();

        $check = $this->Vote->find('first', array(
            'conditions' => array(
                'Vote.ip' => $ip,
                'Vote.news_id' => $news_id
            )
        ));

        if (is_array($check) && count($check) > 0) {
            echo 'Bạn chỉ được Vote 1 lần với mỗi phần dự thi!';
            die;
        }

        $this->Vote->save(array(
            'news_id' => $news_id,
            'ip' => $ip
        ));


        $news = $this->News->findById($news_id);
        $vote = $news['News']['vote'] + 1;

        $this->News->id = $news_id;
        $this->News->saveField('vote', $vote);

        echo 'Bạn đã Vote phần dự thi này!';
        die;
    }

    public function logout()
    {
        if ($this->Session->check('user'))
            $this->Session->delete('user');

        $this->redirect(DOMAIN);
    }

    public function login()
    {
        $this->Customer = ClassRegistry::init('Customer');

        if ($this->Session->check('user'))
            $this->redirect(DOMAIN . 'user/dashboard');

        if ($this->data) {
            $this->autoRender = false;
            $res = array(
                'res' => 'err',
                'msg' => '',
            );
            $data = $this->data;
            $username = $data['username'];
            $pass = $data['password'];

            if ($username == '' || $pass == '') {
                $this->alert('Vui lòng nhập đủ thông tin', $this->referer());
                die;
            }

            $username = $this->removeXss($username);
            $pass = md5($pass);

            $check = $this->Customer->find('first', array(
                'conditions' => array(
                    'Customer.username' => $username,
                    'Customer.password' => $pass
                )
            ));

            if (is_array($check) && count($check) > 0) {
                $this->autoRender = false;
                $this->Session->write('user', $check['Customer']);

                // $redirect = DOMAIN . 'user/dashboard';
                // if(isset($_GET['r']))
                //     $redirect = $_GET['r'];

                // $this->redirect($redirect);

                // $this->redirect($this->referer());
                $res['res'] = 'done';
                $res['msg'] = $username;
                echo json_encode($res);

                die;
            }

            echo json_encode($res);
            die;

            // $this->alert('Email / Password không đúng', $this->referer());

        }
        $this->render('user_login');
    }




    public function register_ajax()
    {
        // $this->Customer = ClassRegistry::init('Customer');
        $parent_id = isset($_GET['r']) && is_numeric($_GET['r']) ? $_GET['r'] : "";


        $this->autoRender = false;
        $res = array(
            'res' => 'err',
            'msg' => '',
            'data' => ''
        );


        if ($this->data) {
            $data = $this->data;

            // $email = $this->removeXss($data['email']);
            $username = $this->removeXss($data['username']);
            $pass = $data['password'];

            if ($pass == '' || $username == '') {
                $res['msg'] = 'Vui lòng nhập đủ thông tin';
                echo json_encode($res);
                die;
            }

            $check = $this->Customer->find('first', array(
                'conditions' => array(
                    'Customer.username' => $username,
                    'OR' => array(
                        // 'Customer.email'=>$email
                    )
                )
            ));

            if (is_array($check) && count($check) > 0) {
                $res['res'] = 'false';
                echo json_encode($res);
                die;
            }

            $pass = md5($pass);

            $save = array(
                'password' => $pass,
                'username' => $username,
                'parent_id' => $parent_id,
            );

            $this->Customer->create();
            $this->Customer->save($save);

            $res['res'] = 'done';
            echo json_encode($res);
            die;
        }
    }


    public function register()
    {
        // $this->Customer = ClassRegistry::init('Customer');
        $parent_id = isset($_GET['r']) && is_numeric($_GET['r']) ? $_GET['r'] : "";

        if ($this->data) {
            $data = $this->data;

            // $email = $this->removeXss($data['email']);
            // $phone = $this->removeXss($data['phone']);
            // $fullname = $this->removeXss($data['fullname']);
            // $address = $this->removeXss($data['address']);
            $username = $this->removeXss($data['username']);
            // $role = $this->removeXss($data['role']);
            // $fullnamebtk = $this->removeXss($data['fullnamebtk']);
            // $emailbtk = $this->removeXss($data['emailbtk']);
            // $phonebtk = $this->removeXss($data['phonebtk']);
            // $content = $this->removeXss($data['content']);
            $pass = $data['password'];

            // if($fullname == '' || $email == '' || $pass == '' || $username == '')
            // {
            //     $this->alert('Vui lòng nhập đủ thông tin', $this->referer());
            //     die;
            // }

            if ($pass == '' || $username == '') {
                $this->alert('Vui lòng nhập đủ thông tin', $this->referer());
                die;
            }

            $check = $this->Customer->find('first', array(
                'conditions' => array(
                    'OR' => array(
                        'Customer.username' => $username,
                        // 'Customer.email'=>$email
                    )
                )
            ));

            if (is_array($check) && count($check) > 0) {
                $this->alert('Thông tin đã được đăng ký. Vui lòng lựa chọn Tên đăng nhập và Email khác!', $this->referer());
                die;
            }

            $password = md5($pass);


            $save = array(
                // 'fullname'=>$fullname,
                'password' => $password,
                // 'phone'=>$phone,
                // 'email'=>$email,
                // 'address'=>$address,
                'username' => $username,
                'parent_id' => $parent_id,
                // 'role'=>$role,
                // 'fullnamebtk'=>$fullnamebtk,
                // 'emailbtk'=>$emailbtk,
                // 'phonebtk'=>$phonebtk,
                // 'content'=>$content,
                // 'status'=>0,
            );

            $this->Customer->create();
            $this->Customer->save($save);

            $this->redirect(DOMAIN . 'cart/success');
            die;
        }

        $this->render('user_register');
    }

    public function videos()
    {
        $this->render('videos');
    }

    public function request_content($url)
    {
        //
    }

    public function err404($slug = null)
    {
        die('err404');
    }

    public function index($slug = null, $ext = null, $lang = 'vi')
    {

        //        if($lang != null)
        //        {
        //            // $this->Session->write('lang', $lang);
        //            $this->lang = $lang;
        //     }
    
        $slug = str_replace('.html', '', $slug);
        $this->nodeData = $this->Node->find('first', array(
            'conditions' => array(
                'Node.slug' => $slug,
                'Node.status' => 1
            )
        ));

        if (!is_array($this->nodeData) || count($this->nodeData) <= 0) {
            //fix trường hợp redirect link cũ đã index tại google chuyển hướng sang link
            // $this->autoRender = false;
            $this->custom_layout = '404';

            $this->nodeData['Node']['id'] = 0;
            $this->nodeData['Node']['type'] = '';
            // $this->currentCategory['Node ']['type'] = '';
            // $this->currentCategory['Category ']['slug'] = '';
            // $this->currentCategory['Category ']['id'] = '';
            // $this->currentCategory['Category ']['parent_id'] = '';
            // $this->nodeData['Node']['title'] = 'Page Not Found';
         // $this->data = $this->Ccontent->getContent('home');
            
            // header('HTTP/1.1 404 Not Found');
            header('HTTP/1.0 404 Not Found', true, 404);
            header('Status: 404 Not Found');
            $this->render('404');
            // $this->render('404');
            // header("Location: " . DOMAIN . '404.html', TRUE, 301);
            die();
        }
        
        // $this->nodeData = $this->Node->findBySlug($slug);
        // if (!is_array($this->nodeData) || count($this->nodeData) <= 0) die('Empty');
        $this->data = $this->Ccontent->getContent($this->nodeData['Node']['type'], $this->nodeData['Node']['id']);
    }

    public function get_dailyphanphoi()
    {
        $data = $this->Agency->find('all', array(
            'order' => 'Agency.id desc'
        ));
        return $data;
    }

    public function sidebar_menu()
    {
        $this->autoRender = false;

        $cat = $this->Category->find('all', array(
            'joins' => array(
                array(
                    'table' => 'nodes',
                    'alias' => 'Node',
                    'conditions' => array('Node.id = Category.node_id'),
                    'type' => 'INNER'
                )
            ),
            'conditions' => array(
                'Category.type' => 'product',
                'Category.parent_id' => 2
            ),
            'order' => array('Node.pos' => 'desc', 'Node.id' => 'desc')
        ));

        foreach ($cat as $v) {
            $data[$v['Category']['id']]['category'] = $v;
        }

        return $data;
    }

    public function count_items($category_id)
    {
        $this->autoRender = false;

        $data = $this->get_tree_category_start_from($category_id);

        if (is_array($data) && count($data) > 0) {
            $arr = array();

            foreach ($data as $v) {
                $arr[] = $v["Category"]['id'];
            }
        } else {
            $arr = $category_id;
        }

        $count = $this->Node->find('count', array(
            'joins' => array(
                array(
                    'table' => 'category_linkeds',
                    'alias' => 'CategoryLinked',
                    'type' => 'INNER',
                    'conditions' => array('CategoryLinked.node_id = Node.id')
                )
            ),
            'conditions' => array(
                'CategoryLinked.category_id' => $arr
            ),
        ));

        return $count;
    }

    public function img($image, $alt = '', $width = 0, $height = 0, $other = '')
    {
        if (trim($image) == "") return $image;

        $str = '<img alt="' . $alt . '" src=';
        if (preg_match('/http:\/\//', $image) || preg_match('/https:\/\//', $image)) {
            $str .= '"' . $image . '"';
            if ($width != 0)
                $str .= ' width="' . $width . '"';
            if ($height != 0)
                $str .= ' height="' . $height . '"';
        } else {
            $d = ROOT_DIRECTORY != '' ? ROOT_DIRECTORY . '/' : '';
            $str .= '"' . DOMAIN . 'thumb/' . $width . 'x' . $height . '/' . $d . trim($image, '/');
            $str .= '"';
        }

        if ($other != '') {
            $str .= ' ' . $other;
        }

        $str .= ' />';
        return $str;
    }

    public function tags($slug = null)
    {
        $slug = str_replace('.html', '', $slug);
        $tag = strip_tags($slug);

        $check = $this->Node->findBySlug($tag);
        $this->Tag = ClassRegistry::init('Tag');

        if (is_array($check) && count($check) > 0) {
            $this->paginate = array(
                'joins' => array(
                    array(
                        'table' => 'news',
                        'alias' => 'News',
                        'type' => 'INNER',
                        'conditions' => array(
                            'Node.id = News.node_id'
                        )
                    ),
                    array(
                        'table' => 'tags',
                        'alias' => 'Tag',
                        'type' => 'INNER',
                        'conditions' => array(
                            'Node.id = Tag.node_id'
                        )
                    )
                ),
                'conditions' => array(
                    'Tag.node_tag_id' => $check['Node']['id'],
                    'Node.type' => array('news'),
                ),
                'fields' => array('Node.*, News.*'),
                'limit' => 10
            );

            $this->data = $this->paginate('Node');
        } else {
            $this->data = null;
        }

        $this->set('tags', $check);
        $this->render('tag_list');
    }

    public function get_bosuutap($bosuutap_id)
    {
        $this->autoRender = false;

        $data = $this->Banner->find('all', array(
            'conditions' => array(
                'Banner.bosuutap_id' => $bosuutap_id
            )
        ));

        if (isset($_GET['dev']))
            pr($data);
        else
            return $data;
    }

    public function gallery_detail($id)
    {
        $this->paginate = array(
            // 'joins'=>$joins,
            // 'conditions'=>$conditions,
            // 'order'=>$order,
            // 'fields'=>array('Node.*', $alias . '.*'),
            'conditions' => array(
                'Banner.type' => 'album',
                'Banner.bosuutap_id' => $id
            ),
            'limit' => 100
        );

        $this->data = $this->paginate('Banner');

        $this->Bosuutap = ClassRegistry::init('Bosuutap');

        $bst = $this->Bosuutap->find('all', array(
            'conditions' => array(
                'NOT' => array(
                    'Bosuutap.id' => $id
                )
            ),
            'order' => array(
                'Bosuutap.id' => 'desc'
            )
        ));

        $detail = $this->Bosuutap->findById($id);
        $this->set('detail', $detail);
        $this->set('bst', $bst);

        // $this->data = $data;
        $this->render('gallery-detail');
    }

    public function gallery()
    {
        $this->Bosuutap = ClassRegistry::init('Bosuutap');

        $bst = $this->Bosuutap->find('all', array(
            'order' => array(
                'Bosuutap.id' => 'desc'
            )
        ));

        $data = array();

        foreach ($bst as $b) {
            $bans = $this->Banner->find('all', array(
                'conditions' => array(
                    'Banner.bosuutap_id' => $b['Bosuutap']['id']
                ),
                'order' => array('Banner.pos' => 'desc', 'Banner.id' => 'desc')
            ));

            if (is_array($bans) && count($bans)) {
                $bsttitle = $b['Bosuutap']['title'];
                if ($this->lang == 'en')
                    $bsttitle = $b['Bosuutap']['title_en'];

                $data[$bsttitle . '---' .  $b['Bosuutap']['id']] = $bans;
            }
        }

        // $this->paginate = array(
        //     // 'joins'=>$joins,
        //     // 'conditions'=>$conditions,
        //     // 'order'=>$order,
        //     // 'fields'=>array('Node.*', $alias . '.*'),
        //     'conditions'=>array(
        //         'Banner.type'=>'album'
        //     ),
        //     'limit'=>3
        // );

        // $this->data = $this->paginate('Banner');

        $this->data = $data;
        $this->render('gallery');
    }


    public function search()
    {
        $key = isset($_GET['s']) && $_GET['s'] != '' ? $_GET['s'] : "";
        $key = strip_tags($key);

        $key_search = '';

        if ($key != '') {
            $key_search = $this->Capp->convert_vi_to_en($key);
            $key_search = strtolower($key);
        }

        $this->paginate = array(
            'joins' => array(
                array(
                    'table' => 'news',
                    'alias' => 'News',
                    'type' => 'INNER',
                    'conditions' => array('Node.id = News.node_id')
                )
            ),
            'conditions' => array(
                'OR' => array(
                    'Node.title LIKE' => '%' . $key . '%',
                    'News.content_search LIKE' => '%' . $key_search . '%',
                ),
                'Node.type' => array('news')
            ),
            'order' => array('Node.pos' => 'desc', 'Node.id' => 'desc'),
            'fields' => array('Node.*', 'News.*'),
            'limit' => 12
        );

        $this->data = $this->paginate('Node');

        $this->custom_layout = 'default';
        $this->set('key', $key);
        $this->render('search');
    }

    /*
    cấu hình mức giá trong setting cấu trúc
    Mức giá | 0
    Dưới 100.000 VNĐ | 100000
    Từ 100.000 - 500.000 VNĐ | 100000-500000
    Từ 500.000 - 1 triệu | 500000-1000000
    Từ 1 triệu - 2 triệu VNĐ | 1000000-2000000
    Từ 2 triệu - 3 triệu VNĐ | 2000000-3000000
    Trên 3 triệu | 3000000
    */
    public function search_els()
    {
        $tbl = 'products';
        $alias = 'Product';
        $node_type = 'product';

        //từ khóa
        $key = isset($_GET['s']) && $_GET['s'] != '' ? $_GET['s'] : "";
        $key = $this->removeXss($key);

        //mục lục
        $c = isset($_GET['cid']) && $_GET['cid'] != '' ? $_GET['cid'] : "";
        $c = $this->removeXss($c);

        //giá
        $p = isset($_GET['p']) && $_GET['p'] != '' && $_GET['p'] != 0 ? $_GET['p'] : "";
        $p = $this->removeXss($p);

        //Loại
        $t = isset($_GET['t']) && $_GET['t'] != '' && $_GET['t'] != 0 ? $_GET['t'] : "";
        $t = $this->removeXss($t);

        //brand
        $brand = isset($_GET['brand']) && $_GET['brand'] != '' && $_GET['brand'] != 0 ? $_GET['brand'] : "";
        $brand = $this->removeXss($brand);

        if ($brand != '') {

            $conditions['Product.hang_id'] = $brand;
        }
        //Order
        $sort = isset($_GET['sort']) && $_GET['sort'] == 'asc' ? 'asc' : "desc";

        $conditions = array(
            'Node.title LIKE' => '%' . $key . '%',
            'Node.type' => array($node_type)
        );

        if ($p != '' && $p != 0) {
            $p = preg_replace('/[^0-9\-]/', '', $p);
            $p = explode('-', $p);
            $start = $p[0];
            $end = $start;
            if (isset($p[1]))
                $end = $p[1];

            $conditions['AND']['Product.price >='] = $start;
            $conditions['AND']['Product.price <='] = $end;
        }

        $joins = array(
            array(
                'table' => $tbl,
                'alias' => $alias,
                'type' => 'INNER',
                'conditions' => array($alias . '.node_id = Node.id')
            )
        );

        if ($c != '') {
            $joins = array(
                array(
                    'table' => $tbl,
                    'alias' => $alias,
                    'type' => 'INNER',
                    'conditions' => array($alias . '.node_id = Node.id')
                ),
                array(
                    'table' => 'category_linkeds',
                    'alias' => 'CategoryLinked',
                    'type' => 'INNER',
                    'conditions' => array('Node.id = CategoryLinked.node_id')
                )
            );
            $conditions['CategoryLinked.category_id'] = $c;
        }

        // $order = array(
        //     'Product.price' => 'Product.price ' . $sort,
        //     // 'Node.pos'=>'desc',
        //     // 'Node.id'=>'desc',
        // );

        $this->paginate = array(
            'joins' => $joins,
            'conditions' => $conditions,
            // 'order'=>$order,
            'fields' => array('Node.*', $alias . '.*'),
            'limit' => 12
        );

        $this->data = $this->paginate('Node');

        // pr($conditions);
        // pr($this->data);

        $currentCategory['Node']['title'] = 'Tìm kiếm';
        $currentCategory['Node']['title_en'] = 'Search Results';
        $currentCategory['Node']['slug'] = 'search';
        $currentCategory['Category']['id'] = 0;
        $currentCategory['Category']['lft'] = 0;
        $currentCategory['Category']['rght'] = 0;
        $this->currentCategory = $currentCategory;

        $this->custom_layout = 'default';
        $this->set('c', $c);
        $this->set('searching', $key);
        $this->set('is_search', 1);

        $this->set('hangs', $this->Hang->find('all', array(
            'order' => array('Hang.pos' => 'desc', 'Hang.id' => 'desc')
        )));

        if ($this->is_mobile == 1)
            $this->render('search_m');
        else
            $this->render('search');
    }

    public function comment()
    {
        $this->autoRender = FALSE;
        $this->Comment = ClassRegistry::init('Comment');

        if ($this->data) {
            $data = $this->data;

            if (!isset($data['status']) || $data['status'] != 1) {
                // if(!$this->Session->check('captcha'))
                // {
                //     $this->alert("Bạn quên nhập mã bảo mật???", $this->referer()); die;
                // }

                // if($data['captcha'] == "")
                // {
                //     $this->alert("Vui lòng nhập mã an toàn!!!", $this->referer()); die;
                // }

                // if($data['captcha'] != $this->Session->read('captcha'))
                // {
                //     $this->alert("Mã an toàn không đúng !!!", $this->referer()); die;
                // }

                if ($data['content'] == "") {
                    $this->alert("Bạn chưa nhập nội dung !!!", $this->referer());
                    die;
                }
            }

            $save = array();

            foreach ($data as $k => $v) {
                $save[$k] = strip_tags($v);
            }

            if (isset($save['sbm']))
                unset($save['sbm']);

            $save['content'] = htmlentities($data['content'], ENT_QUOTES, "UTF-8");
            $save['node_id'] = $data['node_id'];

            $this->Comment->save($save);

            if (!isset($data['status']) || $data['status'] != 1)
                $this->alert("Bình luận của bạn sẽ được chúng tôi xem xét. Xin cảm ơn đã chia sẻ!!!", $this->referer());
            else {
                $ref = $this->referer();
                $ref = trim($ref, '/') . '/#comments';
                $this->redirect($ref);
            }
        }
    }

    public function get_child_comment($comment_id)
    {
        $this->autoRender = false;

        $this->Comment = ClassRegistry::init('Comment');

        $data = $this->Comment->find('all', array(
            'conditions' => array(
                'Comment.parent_id' => $comment_id
            ),
            'order' => array('Comment.id' => 'asc')
        ));

        return $data;
    }


    public function send_rate_ajax()
    {
        $this->autoRender = false;

        $res = array(
            'res' => 'err',
            'msg' => ''
        );

        if ($this->data) {
            $data = $this->data;
            // var_dump($data);die;
            // $fullname = $this->removeXss($data['fullname']);
            $customer_id = $this->removeXss($data['cid']);
            $content = $this->removeXss($data['content']);
            $parent_id = isset($data['parent_id']) ? $this->removeXss($data['parent_id']) : 0;

            // $user = $this->Customer->find('all', array(
            //     'conditions'=>array(
            //         'Customer.id' => $customer_id
            //     ),
            //     'limit'=> 1,
            // ));
            // $fullname = $user[0]['Customer']['fullname'];

            $save = array(
                'customer_id' => $customer_id,
                'content' => $content,
                // 'fullname' => $fullname,
                'parent_id' => $parent_id,
                'status' => 0
            );

            $this->Rate->create();
            $this->Rate->save($save);

            // $this->alert("Cảm ơn bạn đã gửi chia sẻ cảm nhận tới SmartLearn !", $this->referer());
            $res['res'] = 'done';
            echo json_encode($res);
            die;
        }

        echo json_encode($res);
        die;
    }
    public function send_rate()
    {
        $this->autoRender = false;

        if ($this->data) {
            $data = $this->data;

            $customer_id = $this->removeXss($data['cid']);
            $content = $this->removeXss($data['content']);
            $parent_id = isset($data['parent_id']) ? $this->removeXss($data['parent_id']) : 0;

            $save = array(
                'customer_id' => $customer_id,
                'content' => $content,
                'parent_id' => $parent_id,
                'status' => 0
            );

            $this->Rate->create();
            $this->Rate->save($save);

            $this->alert("Cảm ơn bạn đã gửi chia sẻ cảm nhận tới SmartLearn !", $this->referer());
        }
    }


    public function addlike($cid)
    {

        $this->autoRender = false;
        $check = $this->Customer->findById($cid);
        $likes = $check['Customer']['likes'];
        $likes = $likes + 1;
        $this->Customer->id = $cid;
        $this->Customer->saveField('likes', $likes);

        echo $likes;
        die;
    }

    public function addlove($cid)
    {
        $this->autoRender = false;
        $check = $this->Customer->findById($cid);
        $loves = $check['Customer']['loves'];
        $loves = $loves + 1;
        $this->Customer->id = $cid;
        $this->Customer->saveField('loves', $loves);

        echo $loves;
        die;
    }

    public function rate_giaovien()
    {
        $this->autoRender = false;
        $res = array(
            'res' => 'err',
            'msg' => ''
        );

        $this->Star = ClassRegistry::init('Star');
        if ($this->Session->check('user') != true) {
            $res['msg'] = 'Vui lòng đăng nhập để đánh giá';
            echo json_encode($res);
            die;
        }


        $uid = isset($_GET['uid']) && is_numeric($_GET['uid']) ? $_GET['uid'] : 0;
        $star = isset($_GET['star']) && is_numeric($_GET['star']) ? $_GET['star'] : 0;
        $team_id = isset($_GET['tid']) && is_numeric($_GET['tid']) ? $_GET['tid'] : 0;

        if ($uid == 0 || $star == 0 || $team_id == 0) {
            $res['msg'] = 'Vui lòng đăng nhập để đánh giá';
            echo json_encode($res);
            die;
        }

        $check = $this->Star->find('first', array(
            'conditions' => array(
                'Star.customer_id' => $uid,
                'Star.ex_id' => $team_id
            )
        ));

        if (is_array($check) && count($check) > 0) {
            $res['msg'] = 'Bạn đã đánh giá giáo viên này!';
            echo json_encode($res);
            die;
        }

        $save = array(
            'customer_id' => $uid,
            'ex_id' => $team_id,
            'vote' => $star,
        );

        $this->Star->create();
        $this->Star->save($save);

        $sum = 5;

        $sum_data = $this->Star->find('all', array(
            'conditions' => array(
                'Star.ex_id' => $team_id
            ),
            'fields' => array('Sum(Star.vote) as total_sum')
        ));

        if (isset($sum_data[0][0]['total_sum']))
            $sum = $sum_data[0][0]['total_sum'];

        $count = $this->Star->find('count', array(
            'conditions' => array(
                'Star.ex_id' => $team_id
            ),
        ));

        // if(isset($_GET['dev']))

        if ($count > 0) {
            $stars = round($sum / $count);
            $this->Team->id = $team_id;
            $this->Team->saveField('stars', $stars);
        }

        $res['res'] = 'done';
        $res['msg'] = 'Cảm ơn bạn đã bình chọn Giáo viên!';
        echo json_encode($res);
        die;
    }

    public function get_stars($team_id)
    {
        $this->autoRender = false;

        $this->Star = ClassRegistry::init('Star');
        $sum_data = $this->Star->find('all', array(
            'conditions' => array(
                'Star.ex_id' => $team_id
            ),
            'fields' => array('Sum(Star.vote) as total_sum')
        ));

        if (isset($sum_data[0][0]['total_sum']))
            $sum = $sum_data[0][0]['total_sum'];

        $count = $this->Star->find('count', array(
            'conditions' => array(
                'Star.ex_id' => $team_id
            ),
        ));

        // if(isset($_GET['dev']))

        $stars = round($sum / $count);

        pr($sum_data);
        pr($sum);
        pr($count);
        pr($stars);
    }

    public function get_gv_stars_rate($team_id)
    {
        $this->autoRender = false;
        $this->Star = ClassRegistry::init('Star');

        $d = $this->Star->find('count', array(
            'conditions' => array(
                'Star.ex_id' => $team_id,
                'Star.status' => 1
            )
        ));

        return $d;
    }

    public function get_rate_count($customer_id)
    {
        $d = $this->Rate->find('count', array(
            'conditions' => array(
                'Rate.customer_id' => $customer_id
            )
        ));

        return $d;
    }
    public function get_rate($parent_id = 0, $limit = 4, $latest_id =  null, $is_ajax = null)
    {
        $this->autoRender = false;

        $this->Rate = ClassRegistry::init('Rate');
        $conn = array();

        if ($latest_id != null)
            $conn['Rate.id <'] = $latest_id;

        $conn['Rate.parent_id'] = $parent_id;
        $conn['Rate.status'] = 1;

        $data = $this->Rate->find('all', array(
            'conditions' => $conn,
            'limit' => $limit,
            'order' => array('Rate.id' => 'desc'),
            'fields' => array('Rate.id, Rate.image, Rate.fullname, Rate.content, Rate.customer_id')
        ));


        $r = $data;
        if (isset($_GET['dev'])) {
            pr($r);
            die;
        }
        if ($is_ajax != null) {
            $r = array();
            foreach ($data as $v) {
                $r = $v['Rate'];
            }

            echo json_encode($r);
            die;
        } else {
            return $r;
        }
    }

    public function get_comment($latest_id =  null, $is_ajax = null)
    {
        $this->autoRender = false;

        $this->Comment = ClassRegistry::init('Comment');

        if ($latest_id != null) {
            $data = $this->Comment->find('all', array(
                'conditions' => array(
                    'Comment.id <' => $latest_id
                ),
                'limit' => 4,
                'order' => array('Comment.id' => 'desc')
            ));
        } else {
            $data = $this->Comment->find('all', array(
                'limit' => 4,
                'order' => array('Comment.id' => 'desc')
            ));
        }


        $r = $data;

        if ($is_ajax != null) {
            $r = array();
            foreach ($data as $v) {
                $r = $v['Comment'];
            }

            echo json_encode($r);
            die;
        } else {
            return $r;
        }
    }

    public function get_random_nodes($category_id, $node_type = 'news', $limit = 8)
    {
        $this->autoRender = false;

        $check = $this->Category->findById($category_id);
        $cats = $this->Category->find('all', array(
            'conditions' => array(
                'Category.lft >=' => $check['Category']['lft'],
                'Category.rght <=' => $check['Category']['rght'],
                'Category.type' => $node_type
            )
        ));

        $ids = array();

        foreach ($cats as $v) {
            $ids[] = $v['Category']['id'];
        }

        $tbl = 'news';
        $alias = 'News';

        if ($node_type != 'news') {
            $tbl = $node_type . 's';
            $alias = ucfirst($node_type);
        }

        return $this->Node->find('all', array(
            'joins' => array(
                array(
                    'table' => $tbl,
                    'alias' => $alias,
                    'type' => 'INNER',
                    'conditions' => array(
                        'Node.id = ' . $alias . '.node_id'
                    )
                ),
                array(
                    'table' => 'category_linkeds',
                    'alias' => 'CategoryLinked',
                    'type' => 'INNER',
                    'conditions' => array('CategoryLinked.node_id = Node.id')
                )
            ),
            'conditions' => array(
                'CategoryLinked.category_id' => $ids
            ),
            'order' => array('Node.pos' => 'desc', 'Node.id' => 'desc'),
            'limit' => $limit,
            'fields' => array('Node.*', $alias . '.*')
        ));
    }

    public function get_node_parse($node_id)
    {
        $this->autoRender = false;

        $data = $this->get_node($node_id);

        $arr['title'] = $data['Node']['title'];
        $arr['image'] = $this->img($data['News']['image'], $data['Node']['title'], 440, 265);
        $arr['content'] = $data['News']['content'];

        echo json_encode($arr);
    }

    public function get_node($node_id)
    {
        $this->autoRender = false;

        $check = $this->Node->findById($node_id);
        if ($check['Node']['type'] == 'product') {
            $tbl = 'products';
            $alias = 'Product';
        }
        if ($check['Node']['type'] == 'news') {
            $tbl = 'news';
            $alias = 'News';
        }

        return $this->Node->find('first', array(
            'joins' => array(
                array(
                    'table' => $tbl,
                    'alias' => $alias,
                    'type' => 'INNER',
                    'conditions' => array('Node.id=' . $alias . '.node_id')
                )
            ),
            'conditions' => array(
                'Node.id' => $node_id
            ),
            'order' => array('Node.pos' => 'desc', 'Node.id' => 'desc'),
            'fields' => array('Node.*', $alias . '.*')
        ));
    }

    public function parse_html_posts($data)
    {
        if (!is_array($data) || count($data) <= 0) return '';

        $str = '';

        $i = 0;
        $n = count($data);

        foreach ($data as $v) {
            $str .= '<div class="col-sm-3 col-xs-6 product-item product-item-' . $i . '">';
            $str .= '<div class="product-wrap">';
            $str .= '<div class="product-image">';
            $str .= '<a href="' . DOMAIN . $v['Node']['slug'] . '.html" title="' . $v['Node']['title'] . '">';
            $str .= $this->img($v['Product']['image'], $v['Node']['title'], 175, 175);
            $str .= '</a>';
            $str .= '</div>';
            $str .= '<h3>';
            $str .= '<a href="' . DOMAIN . $v['Node']['slug'] . '.html" title="' . $v['Node']['title'] . '">';
            $str .= $v['Node']['title'];
            $str .= '</a>';
            $str .= '</h3>';
            $str .= '<div class="clearfix"></div>';
            $str .= '<div class="prices">';
            $str .= '<div class="price pull-left">' . number_format($v['Product']['price']) . ' vnđ</div>';

            if ($v['Product']['price_off'] > 0) {
                $str .= '<div class="price-off pull-right">' . number_format($v['Product']['price_off']) . ' vnđ</div>';
            }

            $str .= '</div>';
            $str .= '<div class="btn-buy buy-now" id="' . $v['Node']['id'] . '"><span>Mua ngay</span></div>';
            $str .= '</div>';
            $str .= '</div>';
        }

        return $str;
    }

    public function ajax_load_posts()
    {
        $this->autoRender = false;

        $category_id = isset($_GET['catid']) && is_numeric($_GET['catid']) ? $_GET['catid'] : 0;
        $node_type = isset($_GET['type']) && $_GET['type'] == 'product' ? 'product' : 'news';
        $limit = isset($_GET['limit']) && is_numeric($_GET['limit']) ? $_GET['limit'] : 10;
        $offset = isset($_GET['offset']) && is_numeric($_GET['offset']) ? $_GET['offset'] : 0;

        // pr($node_type);
        // pr($limit);
        // pr($offset);

        if ($category_id != 0) {
            $check = $this->Category->findById($category_id);
            $cats = $this->Category->find('all', array(
                'conditions' => array(
                    'Category.lft >=' => $check['Category']['lft'],
                    'Category.rght <=' => $check['Category']['rght']
                )
            ));

            $ids = array();

            foreach ($cats as $v) {
                $ids[] = $v['Category']['id'];
            }
        }

        $tbl = 'news';
        $alias = 'News';

        if ($node_type != 'news') {
            $tbl = $node_type . 's';
            $alias = ucfirst($node_type);
        }

        $conn = array(
            'Node.status' => 1
        );

        if (isset($ids) && is_array($ids) && count($ids) > 0)
            $conn['CategoryLinked.category_id'] = $ids;

        if ($category_id != 0) {
            $data = $this->Node->find('all', array(
                'joins' => array(
                    array(
                        'table' => $tbl,
                        'alias' => $alias,
                        'type' => 'INNER',
                        'conditions' => array(
                            'Node.id = ' . $alias . '.node_id'
                        )
                    ),
                    array(
                        'table' => 'category_linkeds',
                        'alias' => 'CategoryLinked',
                        'type' => 'INNER',
                        'conditions' => array('CategoryLinked.node_id = Node.id')
                    )
                ),
                'conditions' => $conn,
                'order' => array('Node.pos' => 'desc', 'Node.id' => 'desc'),
                'limit' => $limit,
                'offset' => $offset,
                'fields' => array('Node.*', $alias . '.*')
            ));
        } else {
            $data = $this->Node->find('all', array(
                'joins' => array(
                    array(
                        'table' => $tbl,
                        'alias' => $alias,
                        'type' => 'INNER',
                        'conditions' => array(
                            'Node.id = ' . $alias . '.node_id'
                        )
                    )
                ),
                'conditions' => $conn,
                'order' => array('Node.pos' => 'desc', 'Node.id' => 'desc'),
                'limit' => $limit,
                'offset' => $offset,
                'fields' => array('Node.*', $alias . '.*')
            ));
        }

        $return = $this->parse_html_posts($data);

        return $return;
    }

    public function get_images($node_id)
    {
        $this->Image = ClassRegistry::init('Image');

        $data = $this->Image->find('all', array('conditions' => array('Image.node_id' => $node_id)));
        $arr = array();

        foreach ($data as $key => $value) {
            $arr[]  = $value['Image']['image'];
        }

        return $arr;
    }

    public function get_product_prices($price, $mobile = 0)
    {
        $this->autoRender = false;
        $prices = array();

        $arr = explode('-', $price);
        $buff = array();

        foreach ($arr as $v) {
            $p = preg_replace('/[^0-9]/', '', $v);
            $buff[] = $p;
        }

        // if(isset($_GET['dev']))
        //     pr($buff);

        $data = $this->Node->find('all', array(
            'joins' => array(
                array(
                    'table' => 'products',
                    'alias' => 'Product',
                    'type' => 'INNER',
                    'conditions' => array('Node.id = Product.node_id')
                )
            ),
            'conditions' => array(
                'Node.status' => 1,
                'Node.type' => 'product',
                'Product.price' => $buff
            ),
            'order' => array('Node.pos' => 'desc', 'Node.id' => 'desc'),
            'fields' => array('Node.title', 'Node.id', 'Product.selloff', 'Product.image', 'Product.price', 'Product.price_off')
        ));

        // echo $price;
        // pr($data); die;


        $str = '<div class="product-jcarousel jcarousel max1"><ul>';

        $i = 0;
        $n = count($data);

        $items = 0;
        $max_item = 8;
        if ($mobile == 1)
            $max_item = 4;

        foreach ($data as $v) {
            $i++;
            // if(in_array($i, $end)) $str .= '</li>';
            // if($i == 1 || $i%9 == 0) $str .= '<li>';
            // if(in_array($i, $start)) $str .= '<li>';

            $items++;

            if ($items == 1)
                $str .= '<li>';


            // if($i%8==0) 
            // {
            //     $str .= '</li>';

            //     if(isset($_GET['dev']))
            //     {
            //         echo '< /li >' . "\n";
            //     }
            // }

            // if($i==1 || $i%9==0) 
            // {
            //     $str .= '<li>';

            //     if(isset($_GET['dev']))
            //     {
            //         echo '< li >' . "\n";
            //     }
            // }

            $str .= '<div class="col-sm-3 col-xs-6 pw-product-item p' . $i . '">' . "\n";
            $str .= '<div class="pw-product-thumb">  ';
            $str .= '<a href="' . DOMAIN . $v['Product']['image'] . '" class="fancybox" rel="fancybox-' . $v['Node']['id'] . '">';
            $str .= $this->img($v['Product']['image'], $v['Node']['title'], 220, 150);
            $str .= '</a>';
            $str .= '</div>';
            $str .= '<div class="pw-product-title">';
            $str .= '<a href="#">';
            $str .= $v['Node']['title'];
            $str .= '</a>';
            $str .= '</div>';
            $str .= '<div class="pw-product-price">';
            $str .= number_format($v['Product']['price']) . 'đ';
            $str .= '</div>';


            $images = $this->get_images($v['Node']['id']);
            $str_image = '<div class="hidden">';

            if (is_array($images) && count($images) > 0) {
                foreach ($images as $img) {
                    $str_image .= '<a href="' . DOMAIN . $img . '" class="fancybox" rel="fancybox-' . $v['Node']['id'] . '"></a>';
                }
            }
            $str_image .= '</div>';


            $str .= $str_image;
            $str .= '</div>' . "\n";
            if ($i % 4 == 0) $str .= "<div class='clearfix'></div>";
            if ($i % 2 == 0) $str .= "<div class='clearfix visible-xs'></div>";




            if ($items == $max_item) {
                $str .= '</li>';
                $items = 0;
            }
            // if(in_array($i, $end)) $str .= '<li>';
            // if($i%8 == 0) $str .= '</li>' . "\n";

        }

        if (!preg_match('/li\/>$/', $str))
            $str .= '</li>';

        $str .= '</ul></div>';
        $str .= '<div class="product-jcarousel-pagination jcarousel-pagination"></div>';

        //         $str .= '
        //             <script type="text/javascript">
        //                 // $(".jcarousel").jcarousel({
        //                 //     vertical: false
        //                 // }).jcarouselAutoscroll({
        //                 //     interval: 3000,
        //                 //     target: "+=1",
        //                 //     autostart: false
        //                 // });

        //                 // $("fancybox").fancybox();
        // // console.log("aaaaaa");
        //                 $(".jcarousel li").css("width", documentwidht);

        //                 // $(".jcarousel").jcarousel("reload");
        // // jcarousel.jcarousel("reload");
        //             </script>
        //         ';


        echo $str;
        // die;
    }

    public function get_product_category($catId, $catname, $mobile = 0)
    {
        $this->autoRender = false;

        $tbl = 'products';
        $alias = 'Product';

        $data = $this->Node->find('all', array(
            'joins' => array(
                array(
                    'table' => $tbl,
                    'alias' => $alias,
                    'type' => 'INNER',
                    'conditions' => array(
                        'Node.id = ' . $alias . '.node_id'
                    )
                ),
                array(
                    'table' => 'category_linkeds',
                    'alias' => 'CategoryLinked',
                    'type' => 'INNER',
                    'conditions' => array('CategoryLinked.node_id = Node.id')
                )
            ),
            'conditions' => array(
                'CategoryLinked.category_id' => $catId,
                'Node.status' => 1
            ),
            // 'group'=>'CategoryLinked.node_id',
            'order' => array('Node.pos' => 'desc', 'Node.id' => 'desc'),
            'fields' => array('Node.title', 'Node.id', $alias . '.selloff', $alias . '.image', $alias . '.price', $alias . '.price_off')
        ));





        // echo $price;
        // pr($data); die;


        // $str = '<div class="product-jcarousel jcarousel max1"><ul>';
        $str = '';

        $i = 0;
        $n = count($data);
        $items = 0;
        $max_item = 8;
        if ($mobile == 1)
            $max_item = 4;

        foreach ($data as $v) {
            $i++;

            $items++;

            if ($items == 1)
                $str .= '<li>';

            // if($i == 1 || $i%9 == 0) $str .= '<li>';

            $str .= '<div class="col-sm-3 col-xs-6 pw-product-item">';
            if ($this->is_mobile == 0)
                //$str .= '<div class="pw-gender">'.$v['Product']['gender'].'</div>';

                $str .= '<div class="pw-selloff">' . $v['Product']['selloff'] . '</div>';
            $str .= '<div class="pw-product-thumb">  ';
            $str .= '<a href="' . DOMAIN . $v['Product']['image'] . '" class="fancybox" rel="fancybox-' . $v['Node']['id'] . '">';
            $str .= $this->img($v['Product']['image'], $v['Node']['title'], 220, 150);
            $str .= '</a>';
            $str .= '</div>';
            $str .= '<div class="pw-product-title">';
            $str .= '<span>' . $catname . '</span>';
            $str .= '<a href="#">';
            $str .= $v['Node']['title'];
            $str .= '</a>';
            $str .= '</div>';
            $str .= '<div class="pw-product-price">';
            $str .= number_format($v['Product']['price']) . 'đ';
            $str .= '<span>' . number_format($v['Product']['price_off']) . 'đ</span>';
            $str .= '</div>';

            $images = $this->get_images($v['Node']['id']);
            $str_image = '<div class="hidden">';

            if (is_array($images) && count($images) > 0) {
                foreach ($images as $img) {
                    $str_image .= '<a href="' . DOMAIN . $img . '" class="fancybox" rel="fancybox-' . $v['Node']['id'] . '"></a>';
                }
            }
            $str_image .= '</div>';


            $str .= $str_image;
            $str .= '</div>';

            if ($i % 4 == 0) $str .= "<div class='clearfix'></div>";
            if ($i % 2 == 0) $str .= "<div class='clearfix visible-xs'></div>";

            // if($i%8 == 0 && $i>0) $str .= '</li>' . "\n";

            if ($items == $max_item) {
                $str .= '</li>';
                $items = 0;
            }
        }

        if (!preg_match('/li\/>$/', $str))
            $str .= '</li>';

        // $str .= '</ul></div>';
        $str .= '';

        // $str .= '<div class="product-jcarousel-pagination jcarousel-pagination"></div>';

        // $str .= '
        //     <script type="text/javascript">
        //         // $(".jcarousel").jcarousel({
        //         //     vertical: false
        //         // }).jcarouselAutoscroll({
        //         //     interval: 3000,
        //         //     target: "+=1",
        //         //     autostart: false
        //         // });

        //         // $("fancybox").fancybox();

        //         $(".jcarousel li").css("width", documentwidht);
        //     </script>
        // ';


        echo $str;
    }

    public function get_product_category_count($catId)
    {
        $this->autoRender = false;

        $tbl = 'products';
        $alias = 'Product';

        $data = $this->Node->find('count', array(
            'joins' => array(
                array(
                    'table' => 'category_linkeds',
                    'alias' => 'CategoryLinked',
                    'type' => 'INNER',
                    'conditions' => array('CategoryLinked.node_id = Node.id')
                )
            ),
            'conditions' => array(
                'CategoryLinked.category_id' => $catId,
                'Node.status' => 1
            ),
            'group' => 'CategoryLinked.node_id',
        ));

        return $data;
        // die;
    }

    public function get_dynamic_rows($category_id, $table = 'news', $alias = 'News', $catfield = 'category_id', $limit = 8)
    {
        $this->autoRender = false;

        $check = $this->Category->findById($category_id);
        $cats = $this->Category->find('all', array(
            'conditions' => array(
                'Category.lft >=' => $check['Category']['lft'],
                'Category.rght <=' => $check['Category']['rght']
            )
        ));

        $ids = array();

        foreach ($cats as $v) {
            $ids[] = $v['Category']['id'];
        }

        $tbl = $table;
        $alias = $alias;

        $data = $this->Node->find('all', array(
            'joins' => array(
                array(
                    'table' => $tbl,
                    'alias' => $alias,
                    'type' => 'INNER',
                    'conditions' => array(
                        'Node.id = ' . $alias . '.node_id'
                    )
                ),
            ),
            'conditions' => array(
                $alias . '.' . $catfield => $ids,
                'Node.status' => 1
            ),
            'order' => array('Node.pos' => 'desc', 'Node.id' => 'desc'),
            'limit' => $limit,
            'fields' => array('Node.*', $alias . '.*')
        ));

        // pr($data); die;

        return $data;
    }

    public function get_filters($filter_id)
    {
        $this->autoRender = false;

        $data = $this->FilterItem->find('all', array(
            'conditions' => array(
                'FilterItem.filter_id' => $filter_id,
            ),
            'order' => array('FilterItem.pos' => 'desc', 'FilterItem.id' => 'desc')
        ));

        return $data;
    }

    // public function get_nodes($category_data = array(), $limit = 8, $featured=null, $exclude = array())
    public function get_nodes()
    {
        $this->autoRender = false;

        $category_data = $this->params['category_data'];
        $node_type = $category_data['Category']['type'];
        $limit = $this->params['limit'] != null ? $this->params['limit'] : 8;
        $featured = $this->params['featured'] != null ? $this->params['featured'] : null;
        $exclude = $this->params['exclude'] != null ? $this->params['exclude'] : null;
        $cons = $this->params['conditions'] != null ? $this->params['conditions'] : null;

        $check = $category_data;

        if (is_array($check) && count($check) > 0) {
            $cats = $this->Category->find('all', array(
                'conditions' => array(
                    'Category.lft >=' => $check['Category']['lft'],
                    'Category.rght <=' => $check['Category']['rght']
                )
            ));
        }

        $ids = array();

        if (isset($cats) && is_array($cats) && count($cats) > 0) {
            foreach ($cats as $v) {
                $ids[] = $v['Category']['id'];
            }
        }


        $tbl = 'news';
        $alias = 'News';

        if ($node_type != 'news') {
            $tbl = $node_type . 's';
            $alias = ucfirst($node_type);
        }

        $conn = array();

        if (count($ids) > 0)
            $conn['CategoryLinked.category_id'] = $ids;

        $conn['Node.status'] = 1;

        if ($featured != null)
            $conn[$alias . '.featured'] = 1;

        if ($exclude != null) {
            // $exclude = explode(',', $exclude);
            $conn['NOT']['Node.id'] = $exclude;
        }

        if ($cons != null) {
            foreach ($cons as $k => $v) {
                $conn[$k] = $v;
            }
        }

        if (isset($_GET['dev']) && $_GET['dev'] == 1) {
            // pr($check);
            // pr($ids);
            // pr($conn);
        }

        $data = $this->Node->find('all', array(
            'joins' => array(
                array(
                    'table' => $tbl,
                    'alias' => $alias,
                    'type' => 'INNER',
                    'conditions' => array(
                        'Node.id = ' . $alias . '.node_id'
                    )
                ),
                array(
                    'table' => 'category_linkeds',
                    'alias' => 'CategoryLinked',
                    'type' => 'INNER',
                    'conditions' => array('CategoryLinked.node_id = Node.id')
                )
            ),
            'conditions' => $conn,
            'order' => array('Node.pos' => 'desc', 'Node.id' => 'desc'),
            'limit' => $limit,
            'group' => 'CategoryLinked.node_id',
            'fields' => array('Node.*', $alias . '.*', 'CategoryLinked.*')
        ));

        if (isset($_GET['dev']) && $_GET['dev'] == 1) {
            pr($data);
            die;
        } else
            return $data;
    }


    // public function get_nodes($category_data = array(), $limit = 8, $featured=null, $exclude = array())
    public function get_khoahoc($hang_id = null)
    {
        $this->autoRender = false;

        $tbl = 'products';
        $alias = 'Product';
        $conn = array();
        $conn['Node.status'] = 1;

        if ($hang_id != null) {
            $conn['Product.hang_id'] = $hang_id;
        }

        $data = $this->Node->find('all', array(
            'joins' => array(
                array(
                    'table' => $tbl,
                    'alias' => $alias,
                    'type' => 'INNER',
                    'conditions' => array(
                        'Node.id = ' . $alias . '.node_id'
                    )
                ),
                array(
                    'table' => 'category_linkeds',
                    'alias' => 'CategoryLinked',
                    'type' => 'INNER',
                    'conditions' => array('CategoryLinked.node_id = Node.id')
                )
            ),
            'conditions' => $conn,
            'order' => array('Node.pos' => 'desc', 'Node.id' => 'desc'),
            'limit' => 100,
            'group' => 'CategoryLinked.node_id',
            'fields' => array('Node.*', $alias . '.*', 'CategoryLinked.*')
        ));

        $html = '<option value="">Chọn khóa học</option>';

        if (is_array($data) && count($data) > 0) {
            foreach ($data as $v) {
                $ex = '';
                $html .= '<option value="' . DOMAIN . $v['Node']['slug'] . '.html' . $ex . '">' . $v['Node']['title'] . '</option>';
            }
        }

        echo $html;
        die;
    }


    // public function get_nodes($category_data = array(), $limit = 8, $featured=null, $exclude = array())
    public function get_khoahoc_scr($hang_id = null)
    {
        $this->autoRender = false;

        $tbl = 'products';
        $alias = 'Product';
        $conn = array();
        $conn['Node.status'] = 1;

        if ($hang_id != null) {
            $conn['Product.hang_id'] = $hang_id;
        }

        $data = $this->Node->find('all', array(
            'joins' => array(
                array(
                    'table' => $tbl,
                    'alias' => $alias,
                    'type' => 'INNER',
                    'conditions' => array(
                        'Node.id = ' . $alias . '.node_id'
                    )
                ),
                array(
                    'table' => 'category_linkeds',
                    'alias' => 'CategoryLinked',
                    'type' => 'INNER',
                    'conditions' => array('CategoryLinked.node_id = Node.id')
                )
            ),
            'conditions' => $conn,
            'order' => array('Node.pos' => 'desc', 'Node.id' => 'desc'),
            'limit' => 100,
            'group' => 'CategoryLinked.node_id',
            'fields' => array('Node.*', $alias . '.*', 'CategoryLinked.*')
        ));

        $html = '<option value="">Chọn khóa học</option>';

        if (is_array($data) && count($data) > 0) {
            foreach ($data as $v) {
                $html .= '<option value="' . DOMAIN . $v['Node']['slug'] . '.html?sr=lotrinhhoc-wrap' . '">' . $v['Node']['title'] . '</option>';
            }
        }

        echo $html;
        die;
    }


    public function tatcasp()
    {
        $conn = array();
        $conn['Node.status'] = 1;
        $conn['Node.type'] = 'product';


        $this->paginate = array(
            'joins' => array(
                array(
                    'table' => 'products',
                    'alias' => 'Product',
                    'type' => 'INNER',
                    'conditions' => array(
                        'Node.id = Product.node_id'
                    )
                ),
            ),
            'conditions' => $conn,
            'order' => array('Node.pos' => 'desc', 'Node.id' => 'desc'),
            'limit' => $this->product_pagination_limit,
            'fields' => array('Node.*', 'Product.*')
        );

        $this->data = $this->paginate('Node');
        $this->render('tatcasp');
    }

    public function get_giangvien()
    {
        return array();
    }

    public function get_category_of_node($node_id)
    {
        $this->autoRender = false;
        $this->CategoryLinked = ClassRegistry::init('CategoryLinked');

        $check = $this->CategoryLinked->find('first', array(
            'conditions' => array(
                'CategoryLinked.node_id' => $node_id
            )
        ));

        $data = $this->get_category($check['CategoryLinked']['category_id']);
        return $data;
    }

    public function get_category($category_id)
    {
        $this->autoRender = false;

        return $this->Node->find('first', array(
            'joins' => array(
                array(
                    'table' => 'categories',
                    'alias' => 'Category',
                    'type' => 'INNER',
                    'conditions' => array('Node.id=Category.node_id')
                )
            ),
            'conditions' => array(
                'Category.id' => $category_id
            ),
            'order' => array('Node.pos' => 'desc', 'Node.id' => 'desc'),
            'fields' => array('Node.*', 'Category.*')
        ));
    }

    public function ketnoi()
    {
        $city_id = isset($_GET['ctid']) && is_numeric($_GET['ctid']) ? $_GET['ctid'] : 0;
        $hang_id = isset($_GET['hid']) && is_numeric($_GET['hid']) ? $_GET['hid'] : 0;
        $key = isset($_GET['k']) && $_GET['k'] != '' ? $this->removeXss($_GET['k'])  : '';

        $con = array();
        $con['Customer.duyet_thongtin'] = 1;

        if ($key != '') {
            $con['OR']['Customer.fullname LIKE'] = '%' . $key . '%';
            $con['OR']['Customer.address LIKE'] = '%' . $key . '%';
            $con['OR']['Customer.nganhnghe LIKE'] = '%' . $key . '%';
        }

        if ($hang_id != 0)
            $con['Customer.hang_id LIKE'] = '%,' . $hang_id . ',%';

        if ($city_id != 0)
            $con['Customer.city_id'] = $city_id;


        $data = $this->Customer->find('all', array(
            'conditions' => $con,
            'order' => array('Customer.id' => 'desc')
        ));

        return $data;
    }

    public function find_root_category($category_id)
    {
        $this->autoRender = false;

        $check = $this->Category->findById($category_id);

        if (
            is_array($check)
            && count($check) > 0
            && isset($check['Category']['parent_id'])
            && $check['Category']['parent_id'] != ""
            && $check['Category']['parent_id'] != 0
        )

            return $this->find_root_category($check['Category']['parent_id']);
        return $category_id;
    }

    public function get_cbanner($cid)
    {
        $this->autoRender = false;
        $d = $this->CustomerBanner->find('all', array(
            'conditions' => array(
                'CustomerBanner.customer_id' => $cid,
                'CustomerBanner.status' => 1
            )
        ));

        return $d;
    }

    //$type override type to query
    public function get_child_category_of()
    {
        $category_data = $this->params['category_data'];
        $conditions = $this->params['conditions'];
        $type = $this->params['category_type'];

        $this->autoRender = false;
        $conn = array();
        $keystr = '';

        if ($type != null) {
            $types = $type;

            if (preg_match('/,/', $type)) {
                $types = explode(',', $type);

                foreach ($types as $v) {
                    $keystr .= '_' . $v;
                }
            } else {
                $keystr .= '_' . $types;
            }

            $conn['Category.type'] = $types;
        }

        $conn['Category.parent_id'] = $category_data['Category']['id'];
        $conn['Node.status'] = 1;

        // $keystr .= '_' . $category_data['Category']['id'];

        // if($conditions != null && count($conditions) > 0)
        // {
        //     foreach($conditions as $k=>$v)
        //     {
        //         $conn['Category.' . $k] = $v;

        //         $keystr .= '_' . $k . '_' .  $v;
        //     }
        // }

        // $key = PREFIX . '_ckey_' . $keystr;

        // if(Cache::read($key) !== false)
        // {
        //     $data = Cache::read($key);
        // }
        // else
        // {
        $data = $this->Category->find('all', array(
            'joins' => array(
                array(
                    'table' => 'nodes',
                    'alias' => 'Node',
                    'type' => 'INNER',
                    'conditions' => array('Node.id = Category.node_id')
                )
            ),
            'conditions' => $conn,
            'order' => array('Node.pos' => 'desc', 'Node.id' => 'desc'),
            'fields' => array('Node.*, Category.*')
        ));

        // Cache::write($key, $data);
        // }

        return $data;
    }

    public function get_tree_category_start_from($category_id, $exclude_id = 0)
    {
        $this->autoRender = false;
        $check = $this->Category->findById($category_id);
        $data = array();

        if (!empty($check)) {
            $con = array();
            $con['Category.lft >'] = $check['Category']['lft'];
            $con['Category.rght <'] = $check['Category']['rght'];
            // $con['Category.type'] = 'product';

            if ($exclude_id != 0) {
                $con['NOT']['Category.id'] = $exclude_id;
            }

            $data = $this->Category->find('all', array(
                'joins' => array(
                    array(
                        'table' => 'nodes',
                        'alias' => 'Node',
                        'type' => 'INNER',
                        'conditions' => array('Node.id = Category.node_id')
                    )
                ),
                'conditions' => $con,
                'order' => array('Node.pos' => 'desc', 'Node.id' => 'asc'),
                'fields' => array('Node.*, Category.*')
            ));
        }

        return $data;
    }

    public function get_list_category($lst_category_id)
    {
        $this->autoRender = false;
        $cats = explode(',', $lst_category_id);

        $data = $this->Category->find('all', array(
            'joins' => array(
                array(
                    'table' => 'nodes',
                    'alias' => 'Node',
                    'type' => 'INNER',
                    'conditions' => array('Node.id = Category.node_id')
                )
            ),
            'conditions' => array(
                'Category.id' => $cats
            ),
            'order' => array('Node.pos' => 'desc', 'Node.id' => 'desc'),
            'fields' => array('Node.*, Category.*')
        ));

        return $data;
    }


    public function get_videos()
    {
        $this->autoRender = false;

        $this->Video = ClassRegistry::init('Video');
        $data = $this->Video->find('all', array(
            'order' => array('Video.pos' => 'desc', 'Video.id' => 'desc'),
        ));

        return $data;
    }

    function create_image()
    {
        $md5_hash = md5(rand(0, 999));
        $security_code = substr($md5_hash, 15, 5);
        $this->Session->write('security_code', $security_code);
        $width = 80;
        $height = 22;
        $image = ImageCreate($width, $height);
        $black = ImageColorAllocate($image, 37, 170, 226);
        $white = ImageColorAllocate($image, 255, 255, 255);
        ImageFill($image, 0, 0, $black);
        ImageString($image, 5, 18, 3, $security_code, $white);
        header("Content-Type: image/jpeg");
        ImageJpeg($image);
        ImageDestroy($image);
        die;
    }



    public function get_pro_data($node_id)
    {

        $this->autoRender = false;

        if (isset($_GET['dev'])) {
            $node_id = 913;
        }

        $respon = array(
            'res' => '',
            'mes' => '',
            'data' => array()
        );

        $tbl = 'products';
        $alias = 'Product';


        $product = $this->Node->find('first', array(
            'joins' => array(
                array(
                    'table' => $tbl,
                    'alias' => $alias,
                    'type' => 'INNER',
                    'conditions' => array('Node.id=' . $alias . '.node_id')
                )
            ),
            'conditions' => array(
                'Node.id' => $node_id
            ),
            'fields' => array('Node.title', 'Node.title_en', $alias . '.*')
        ));

        if (is_array($product) && count($product) > 0) {
            $tmp = array();
            $tmp['title'] = $product['Node']['title'];
            $tmp['image'] = $product['Product']['image'];
            $tmp['content'] = $product['Product']['content'];
            $tmp['title_en'] = $product['Node']['title_en'];
            $tmp['content_en'] = $product['Product']['content_en'];

            $respon['data'] = $tmp;
        }

        echo json_encode($respon);
        die;
    }

    public function p404()
    {
        $this->render('page404');
    }
}
