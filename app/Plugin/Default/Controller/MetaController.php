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

class MetaController extends AppController {

    public $uses = array('News', 'Node');
    public $helpers = array('Time');
    public $components = array('RequestHandler');

    public function sitemap() {
        $this->layout = false;

        $node_type_allowed = array(
            'news', 
            'category', 
            'product'
        );
        
        $this->RequestHandler->respondAs('xml');
        $this->data = $this->Node->find('all', array(
            'conditions'=>array(
                'Node.status'=>1,
                'Node.type'=>$node_type_allowed
            ),
            'order'=>'Node.id DESC'
        ));
    }
}