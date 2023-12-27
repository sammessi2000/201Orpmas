<?php 
    $category_active_id = 0;
    if(isset($current_category['Category']['id']))
        $category_active_id = $current_category['Category']['id'];
?>
<div id="menu_mobile">
    <div class="menu_mobile-wrap">
        <div class="menu-close">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L15 14.9943" stroke="white" stroke-width="1.4" stroke-miterlimit="10"
                    stroke-linecap="round"></path>
                <path d="M1 14.9943L15 1" stroke="white" stroke-width="1.4" stroke-miterlimit="10"
                    stroke-linecap="round"></path>
            </svg>
        </div>
        <ul>
            <li class="categories-menu" id="homepage">
                <a href="<?php echo DOMAIN; ?>">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="24" r="23" fill="#0060A6" stroke="white" stroke-width="2"></circle>
                        <path
                            d="M31.1339 34.7683H16.8685C16.501 34.7687 16.137 34.6966 15.7974 34.5561C15.4577 34.4157 15.1491 34.2097 14.8891 33.95C14.6291 33.6902 14.4228 33.3818 14.2821 33.0423C14.1414 32.7027 14.069 32.3388 14.069 31.9713V20.9145C14.0691 20.4978 14.1623 20.0863 14.3416 19.7101C14.5209 19.3339 14.7818 19.0025 15.1055 18.7399L22.1427 13.0367C22.6367 12.6371 23.252 12.4175 23.8874 12.4139C24.5228 12.4103 25.1405 12.6229 25.639 13.0169L32.8672 18.72C33.1987 18.9818 33.4666 19.3152 33.6508 19.6953C33.8351 20.0753 33.9308 20.4922 33.931 20.9145V31.9515C33.9336 32.3204 33.8632 32.6863 33.7238 33.0279C33.5844 33.3696 33.3788 33.6803 33.1188 33.9421C32.8588 34.2039 32.5495 34.4117 32.2089 34.5535C31.8682 34.6953 31.5029 34.7683 31.1339 34.7683Z"
                            stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"></path>
                        <path d="M19.0779 30.069H28.8973" stroke="white" stroke-width="2" stroke-miterlimit="10"
                            stroke-linecap="round"></path>
                    </svg>
                </a>
            </li>
            <?php if (is_array($categories) && count($categories) > 0) { ?>
            <?php foreach ($categories as $v) { ?>
            <?php 
            $curent_active = '';
            $hasChild = 0;
            $child_html = '';
            $child = $this->requestAction('/default/node/get_child_category_of/', array('category_data' => $v));

            if (isset($child) && is_array($child) > 0 && count($child) > 0) 
            {
                $hasChild = 1;

                foreach ($child as $ch) 
                {
                    if($category_active_id == $ch['Category']['id'])
                        $curent_active = 'focus-category';

                    $child_html .= '<li class="child-categories-m" >';
                    $child_html .= '<a href="' . $this->App->get_category_link($ch) . '" rel="nofollow">' . $ch['Node']['title'];
                    $child_html .= '</a>';
                    $child_html .= '</li>';
                }
            }

            if($category_active_id == $v['Category']['id'])
                $curent_active = 'focus-category';
        ?>

            <li class="categories-menu-m <?php echo $curent_active; ?> <?php if($hasChild == 1) echo 'hasc' ?: ''; ?>"
                id="<?php echo $v['Category']['id']; ?>">
                <a class="<?php echo ($hasChild == 1) ? 'hasca' : 'hfgh'; ?>"
                    href="<?php echo ($hasChild == 1) ? 'javascript:;' : $v['Node']['slug'].'.html'; ?>">
                    <?php echo $v['Node']['title']; ?>
                </a>

                <span></span>

                <?php if ($hasChild == 1) { ?>
                <ul class="child-product-m">
                    <?php echo $child_html; ?>
                </ul>
                <?php } ?>
            </li>
            <?php } ?>
            <?php } ?>
        </ul>
    </div>
</div>