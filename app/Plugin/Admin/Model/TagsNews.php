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

class TagsNews extends AppModel
{
    public $useTable = 'tags_news';
    
    function save_tags($data, $news_id)
    {
        if(is_array($data) && count($data) > 0)
        {
            foreach($data as $v)
            {
                $this->create();
                $this->save(
                    array(
                        'tag_id'=>$v,
                        'news_id' => $news_id
                    )
                );
            }
        }
    }
}