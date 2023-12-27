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

class LinkInline extends AppModel
{
    public $useTable = null;
    public $name = 'LinkInline';
    
    public function link_detail($category_id = null)
    {
        $this->Category = ClassRegistry::init('Category');
        $this->Node = ClassRegistry::init('Node');
        
        $category = $this->Category->findById($category_id);
        $linked_node_id = $category['Category']['link_inline'];

        $node = $this->Node->findById($linked_node_id);

        $data = null;

        switch ($node['Node']['type']) {
            case 'news':
                $data['data_type'] = 'news';
                $data['node_id'] = $node['Node']['id'];
                break;

            case 'product':
                $data['data_type'] = 'product';
                $data['node_id'] = $node['Node']['id'];
                break;

            case 'tuvan':
                $data['data_type'] = 'tuvan';
                $data['node_id'] = $node['Node']['id'];
                break;
            
            default:
                break;
        }
        
        return $data;
    }
}