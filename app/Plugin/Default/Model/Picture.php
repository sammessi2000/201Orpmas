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

class Picture extends AppModel
{
    public $useTable = 'categories';
    public $name = 'Picture';
    
    public function archive($node_id)
    {
      $data = $this->findById($node_id);
      return $data;
    }
}