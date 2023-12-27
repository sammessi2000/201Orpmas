<?php
    $root = $this->requestAction('/default/node/find_root_category/' . $current_category['Category']['id']);
    $category = $this->requestAction('/default/node/get_category/' . $root);
    $cat_child = $this->requestAction('/default/node/get_child_category_of/', array('category_data' => $category) );
    $img = $this->requestAction('/default/node/get_images/'. $current_category['Category']['id']);
    //pr($root);
    //pr($cat_child);
    //pr($img);
    //pr($current_category['Category']['images']);
?>

<?php //pr($img); ?>

<ul>
    <li class="prd-sidebar">
        <a href="<?php echo $category['Node']['slug']; ?>.html">
            <?php echo $category['Node']['title']; ?>
        </a>
    </li>
    <?php if(isset($cat_child) && count($cat_child)){ ?>
    <?php foreach($cat_child as $v){ ?>
    <?php //pr($v['Category']['images']);
        $data = $v['Category']['images'];
        $json = explode(',', $data);
        //pr($json);
    ?>
    <li
        class="<?php echo $v['Category']['id'] == $current_category['Category']['id'] ? 'active' : ''; ?> prd-sidebar-item">
        <a href="<?php echo $this->App->get_category_link($v); ?>">
            <?php if($v['Category']['images'] == ''){ ?>
            <span></span>
            <?php }else { ?>
            <img class="src-active-img" src="<?php echo $json[1] ?>" alt="">
            <img class="src-notactive-img" src="<?php echo $json[2] ?>" alt="">
            <?php } ?>
            <?php echo $v['Node']['title']; ?>
        </a>
    </li>
    <?php } ?>
    <?php } ?>
</ul>