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


class Tag extends AppModel
{
    public $useTable = 'tags';
    
    public function compile_tags($tags)
    {
        $tags = trim($tags);
        if($tags == '') return $tags;
        
        $tags = explode(',', $tags);
        $return = array();
        
        foreach($tags as $v)
        {
            $slug = Inflector::slug(strtolower($v), '-');
            $check = $this->findBySlug($slug);
            
            if(is_array($check) && count($check) > 0)
            {
                $return[] = $check['Tag']['id'];
            }
            else
            {
                $save = array(  
                    'title' => $v,
                    'slug'=> $slug
                );
                
                $this->create();
                $this->save($save);
                $return[] = $this->getLastInsertID();
            }
        }
        
        return $return;
    }
    
    
    public function  get_tags($news_id)
    {
        $this->TagsNews = ClassRegistry::init('Admin.TagsNews');
        
        $data = $this->TagsNews->find('all', array(
            'joins'=>array(
                array(
                    'table'=>'tags',
                    'alias'=>'Tag',
                    'conditions'=>array(
                        'Tag.id = TagsNews.tag_id'
                    ),
                    'type'=>'INNER'
                )
            ),
            'conditions'=>array(
                'news_id'=>$news_id
            ),
            'fields'=>array('Tag.*, TagsNews.*')
        ));
        
        $tags = '';
        
        foreach($data as $v)
        {
            $tags .= $v['Tag']['title'] . ', ';
        }
        
        $tags = trim($tags, '\ ,');
        
        return $tags;
    }
}