<?php
$category_active_id = 0;
if (isset($current_category['Category']['id']))
    $category_active_id = $current_category['Category']['id'];
?>

<ul>
    <?php if (is_array($categories) && count($categories) > 0) { ?>
        <?php foreach ($categories as $v) { ?>
            <?php
            $curent_active = '';
            $hasChild = 0;
            $child_html = '';
            $child = $this->requestAction('/default/node/get_child_category_of/', array('category_data' => $v));

            if (isset($child) && is_array($child) > 0 && count($child) > 0) {
                $hasChild = 1;

                foreach ($child as $ch) {
                    if ($category_active_id == $ch['Category']['id'])
                        $curent_active = 'focus-category';

                    $child_html .= '<li class="child-categories" >';
                    $child_html .= '<a href="' . $this->App->get_category_link($ch) . '" rel="nofollow">' . $this->App->t('title', $ch['Node']); //$ch['Node']['title'];
                    $child_html .= '</a>';
                    $child_html .= '</li>';
                }
            }

            if ($category_active_id == $v['Category']['id'])
                $curent_active = 'focus-category';
            ?>

            <li class="categories-menu <?php echo $curent_active; ?>" id="<?php echo $v['Category']['id']; ?>">
                <a class="nav-default <?php //echo $hasChild == 1 ? 'nav-dropdown' : 'nav-default'; 
                                        ?>" href="<?php echo $this->App->get_category_link($v); ?>" title="menu">
                    <?php echo $this->App->t('title', $v['Node']); ?>
                    <div class="border-hover"></div>
                </a>

                <?php /*if ($hasChild == 1) { ?>
        <ul class="child-product">
            <?php echo $child_html; ?>
        </ul>
        <?php }*/ ?>
            </li>
        <?php } ?>
    <?php } ?>
    <?php $lang = Configure::read('lang');
    $vie = "<div class='lang lang-vi'>" .
        "<svg width='22' height='15' viewBox='0 0 22 15' fill='none' xmlns='http://www.w3.org/2000/svg'>" .
        "<g clip-path='url(#clip0_226_2)'>" .
        "<path d='M21.4286 0H0V15H21.4286V0Z' fill='#DA251D' />" .
        "<path d='M10.7143 3L8.19289 11.1375L14.7929 6.1125H6.63574L13.2357 11.1375L10.7143 3Z' fill='#FFFF00' />" .
        "</g>" .
        "<defs>" .
        "<clipPath id='clip0_226_2'>" .
        "<rect width='21.4286' height='15' fill='white' />" .
        "</clipPath>" .
        "</defs>" .
        "</svg>" .
        "Tiếng Việt" .
        "</div>";
    $eng = "<div class='lang lang-en'>
     <svg width='22' height='15' viewBox='0 0 22 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
         <mask id='mask0_93_184' style='mask-type:alpha' maskUnits='userSpaceOnUse' x='0' y='0' width='22' height='15'>
             <path d='M22 0H0V15H22V0Z' fill='#DE2910'></path>
         </mask>
         <g mask='url(#mask0_93_184)'>
             <path d='M-1.50342 -0.140625V15.0247H23.5193V-0.140625H-1.50342Z' fill='#012169'></path>
             <path d='M-1.50342 -0.140625L23.5193 15.0247L-1.50342 -0.140625ZM23.5193 -0.140625L-1.50342 15.0233L23.5193 -0.140625Z' fill='black'></path>
             <path d='M22.9602 16.3806L11.008 9.13611L-0.944167 16.3806L-2.0625 13.6653L8.2099 7.44028L-2.0625 1.21528L-0.944167 -1.5L11.008 5.74444L22.9602 -1.5L24.0785 1.21528L13.8061 7.44028L24.0785 13.6653L22.9602 16.3806Z' fill='white'></path>
             <path d='M-1.50342 -0.140625L23.5193 15.0247L-1.50342 -0.140625ZM23.5193 -0.140625L-1.50342 15.0233L23.5193 -0.140625Z' fill='black'></path>
             <path d='M23.1458 15.9281L11.0079 8.56979L-1.12987 15.9281L-1.87695 14.1184L9.14367 7.44062L-1.87695 0.762847L-1.12987 -1.04688L11.0079 6.31146L23.1458 -1.04688L23.8928 0.762847L12.8722 7.44062L23.8928 14.1184L23.1458 15.9281Z' fill='#C8102E'></path>
             <path d='M11.0079 -0.140625V15.0247V-0.140625ZM-1.50342 7.44132H23.5193H-1.50342Z' fill='black'></path>
             <path d='M13.0933 15.0233H8.92252V9.9691H-1.50342V4.91354H8.92252V-0.140625H13.0933V4.91354H23.5193V9.9691H13.0933V15.0233Z' fill='white'></path>
             <path d='M11.0079 -0.140625V15.0247V-0.140625ZM-1.50342 7.44132H23.5193H-1.50342Z' fill='black'></path>
             <path d='M12.2592 15.0233H9.75668V8.95799H-1.50342V5.92465H9.75668V-0.140625H12.2592V5.92465H23.5193V8.95799H12.2592V15.0233Z' fill='#C8102E'></path>
         </g>
     </svg>
     English
 </div>";

    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = "https://";
    else
        $url = "http://";
    // Append the host(domain name, ip) to the URL.   
    $url .= $_SERVER['HTTP_HOST'];

    // Append the requested resource location to the URL   
    $url .= $_SERVER['REQUEST_URI'];

    $strPos = strpos($url, '?');
    $url_sub = ($strPos != 0) ? substr($url, 0, $strPos - strlen($url)) : $url;  // returns ""; prior to PHP 8.0.0, false was returned


    ?>

    <li class="categories-menu language_of_page">
        <a href="javascript:;" class="choose-lang nav-default">

            <?php $crr_lg = ($lang == 'en') ? $eng : $vie; ?>
            <?php echo $crr_lg; ?>

            <svg class="down" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none" stroke="#333333" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down" style="stroke: white;">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
            <div class="border-hover"></div>
        </a>
        
        <div class="language-dropdown-item-box">
            <a href="<?php echo $url_sub . '?lang=vi' ?>" class=" nav-default language-item">
                <?php echo $vie ?>
            </a>

            <a href="<?php echo $url_sub . '?lang=en' ?>" class="nav-default language-item">
                <?php echo $eng ?>

            </a>
        </div>
    </li>
</ul>