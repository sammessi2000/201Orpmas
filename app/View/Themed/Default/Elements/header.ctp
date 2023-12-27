<!DOCTYPE html>
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />

    <title>
        <?php echo  $title_for_layout; ?>
    </title>


    <meta name="robots" content="noindex,nofollow" />

    <?php /*if (Configure::read('debug') == 2) : ?>
    <meta name="robots" content="noindex,nofollow" />
    <?php else : ?>
    <?php echo $robots_for_layout; ?>
    <?php endif;*/ ?>

    <?php echo $keyword_for_layout; ?>
    <?php echo $description_for_layout; ?>
    <?php echo $og_for_layout; ?>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <?php
    $css = array(
        'css/bootstrap_full.min.css',
        'css/owl.carousel.min.css',
        'css/mmenu.css',
        'css/style.css',
        'css/mmenu.css',
        'css/animate.css',
        'css/sweetalert2.css',
        // 'css/style_mb.css',
        // 'css/owl.theme.default.min.css',
        // 'font-awesome-4.7.0/css/font-awesome.min.css',
        // 'css/jquery.fancybox.min.css',
        // 'css/jquery.fancybox-buttons.css',
        // 'css/jquery.fancybox-thumbs.css',
    );



    // $scripts = array(
    //     'js/jquery-3.6.1.min.js',
    //     'js/bootstrap.bundle.min.js',
    //     'js/owl.carousel.min.js',
    //     //'js/jquery.number.min.js',
    //     // 'js/jquery.fancybox.pack.js',
    //     // 'js/jquery.fancybox-buttons.js',
    //     // 'js/jquery.fancybox-media.js',
    //     // 'js/jquery.fancybox-thumbs.js',
    //     // 'jcarousellite/demo/script/jquery.jcarousellite.js',
    // );

    $theme_directory = strtolower(DEFAULT_THEME_NAME);
    $ver = STYLE_VERSION;
    ?>

    <?php /*
    <link rel="preconnect" as="font" type="font/otf" crossorigin="anonymous"
        href="<?php echo DOMAIN; ?>theme/<?php echo $theme_directory; ?>/fonts/SanFranciscoDisplay-Regular.ttf" />
    <link rel="preconnect" as="font" type="font/otf" crossorigin="anonymous"
        href="<?php echo DOMAIN; ?>theme/<?php echo $theme_directory; ?>/fonts/SanFranciscoDisplay-Bold.ttf" />
    <link rel="preconnect" as="font" type="font/otf" crossorigin="anonymous"
        href="<?php echo DOMAIN; ?>theme/<?php echo $theme_directory; ?>/fonts/SanFranciscoDisplay-Medium.ttf" />
    <link rel="preconnect" as="font" type="font/otf" crossorigin="anonymous"
        href="<?php echo DOMAIN; ?>theme/<?php echo $theme_directory; ?>/fonts/SF-Pro-Display-Medium.ttf" />
    <link rel="preconnect" as="font" type="font/otf" crossorigin="anonymous"
        href="<?php echo DOMAIN; ?>theme/<?php echo $theme_directory; ?>/fonts/SanFranciscoDisplay-Regular.woff" />
    <link rel="preconnect" as="font" type="font/otf" crossorigin="anonymous"
        href="<?php echo DOMAIN; ?>theme/<?php echo $theme_directory; ?>/fonts/SanFranciscoDisplay-Bold.woff" />
    <link rel="preconnect" as="font" type="font/otf" crossorigin="anonymous"
        href="<?php echo DOMAIN; ?>theme/<?php echo $theme_directory; ?>/fonts/SanFranciscoDisplay-Medium.woff" />
    <link rel="preconnect" as="font" type="font/otf" crossorigin="anonymous"
        href="<?php echo DOMAIN; ?>theme/<?php echo $theme_directory; ?>/fonts/SF-Pro-Display-Medium.woff" />
    */ ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700"> -->
    <?php foreach ($css as $v) : ?>
        <link rel="stylesheet" href="<?php echo DOMAIN; ?>theme/<?php echo $theme_directory; ?>/<?php echo $v; ?>?v=<?php echo STYLE_VERSION; ?>">
    <?php endforeach; ?>

    <?php /*foreach ($scripts as $v) : ?>
    <script async
        src="<?php echo DOMAIN; ?>theme/<?php echo $theme_directory; ?>/<?php echo $v; ?>?=<?php echo $ver ?>"></script>
    <?php endforeach;*/ ?>

    <link rel="icon" type="image/png" href="<?php echo DOMAIN; ?>app/webroot/uploads/images/img/favicon.png" />

    <?php
    $body = isset($is_mobile) && $is_mobile == 1 ? 'mb' : 'pc';

    if (isset($is_news)) $body .= ' news';
    if (isset($is_product)) $body .= ' product';
    if (isset($is_page)) $body .= ' page';
    if (isset($is_cart)) $body .= ' cart';
    if (isset($is_home)) $body .= ' home';
    if (isset($is_single)) $body .= ' single';

    if ($this->Session->check('admin')) $body .= ' admin';
    ?>
    <?php if (isset($is_cart)) {    ?>
        <script src="<?php echo DOMAIN; ?>theme/<?php echo $theme_directory; ?>/js/jquery.number.min.js"></script>
    <?php }     ?>
    <?php
    $hotline = $this->App->t('company_hotline');
    $hotline_number = preg_replace('/[^0-9]/', '', $hotline);
    ?>
    <script>
        const DOMAIN = "<?php echo DOMAIN; ?>";
        const prev = "<?php echo DOMAIN; ?>uploads/images/img/prev.svg";
        const next = "<?php echo DOMAIN; ?>uploads/images/img/next.svg";
        const prev_agency_home =
            "<?php echo DOMAIN; ?>uploads/images/img/Chevron1.svg";
        const next_agency_home =
            "<?php echo DOMAIN; ?>uploads/images/img/Chevron2.svg";

        <?php
        echo (isset($is_home)) ? 'const IS_HOME = 1;' : 'const IS_HOME = 0;' . "\n";
        echo (isset($is_mobile) && $is_mobile == 1) ? 'const IS_MOBILE = 1;' : 'const IS_MOBILE = 0;';
        ?>
    </script>
    <?php echo $settings['headerscript']; ?>
</head>

<body class="<?php echo $body; ?>">
    <?php
    $adm_logged = false;

    if ($this->Session->check('admin') && $is_mobile == 0) {
        $adm_logged = true;
        $str = Configure::read('active_editor') == 1 ? 'Tắt chế độ sửa' : 'Bật chế độ sửa';
    }
    ?>
    <?php if ($adm_logged == true) : ?>
        <a href="<?php echo DOMAIN; ?>default/home/change_active_editor" class="hidden-xs" title="change mode">
            <span class="btn btn-primary" style="position: fixed; top: 0; right: 5px; z-index: 999998;"><?php echo $str; ?></span>
        </a>
    <?php endif; ?>

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
        "</svg>";
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
 </svg>";

    $lang_vie = ($lang == 'vi') ? "Tiếng Việt </div>" :  "Vietnamese </div>";
    $lang_eng = ($lang == 'en') ? "English </div>" : "Tiếng Anh </div>";


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

    <div class="header">
        <div class="header-lang">
            <a href="javascript:;" class="choose-lang ">

                <?php $crr_lg = ($lang == 'en') ? $eng : $vie; ?>
                <?php echo $crr_lg . "</div>"; ?>

                <svg class="down" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none" stroke="#FFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </a>

            <div class="language-dropdown-item-box">
                <a href="<?php echo $url_sub . '?lang=vi' ?>" class="  language-item">
                    <?php echo $vie . $lang_vie ?>
                </a>

                <a href="<?php echo $url_sub . '?lang=en' ?>" class="language-item">
                    <?php echo $eng . $lang_eng ?>

                </a>
            </div>
        </div>

        <div class="logo">
            <a href="<?php echo DOMAIN; ?>" title="logo" class="logo-img">
                <img class="logo-image" src="<?php echo DOMAIN . $this->App->t('logo_header', array(), 'vi'); ?>" alt="logo">
            </a>
            <?php echo $this->App->adm_link('lang', 'logo_header', 'image'); ?>
        </div>

        <div class="btn-menu">
            <a title="btn-menu" class="btn-menu-a" href="javascript:;" id="btn-menu-open">
                <svg class="svg-menu" width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line y1="1" x2="24" y2="1" stroke="white" stroke-width="2" />
                    <line y1="17" x2="24" y2="17" stroke="white" stroke-width="2" />
                    <line y1="9" x2="24" y2="9" stroke="white" stroke-width="2" />
                </svg>

                <svg class="svg-close" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="26.3986" y1="26.6348" x2="8.72094" y2="8.95717" stroke="white" stroke-width="2" />
                    <line x1="8.72087" y1="26.3984" x2="26.3985" y2="8.72069" stroke="white" stroke-width="2" />
                </svg>

            </a>
        </div>

        <nav class="menu" id="menu">
            <?php echo $this->element('menu'); ?>
        </nav>
    </div>

    <?php /*
    <div class="top-head" data-spy="affix" data-offset-top="205">
        <div class="wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="header-info">
                            <div class="company-info">
                                <span class="info-item-2"><?php echo $this->App->t_a('company_name'); ?></span>
                            </div>
                            <div class="company-info">
                                <span>Văn phòng đại diện</span>
                                <span class="info-item"><?php echo $this->App->t_a('company_address'); ?></span>
                            </div>
                            <div class="company-info">
                                <a href="tel:<?php echo $this->App->t_a('company_phone'); ?>">
                                    <span>Tel</span>
                                    <span class="info-item"><?php echo $this->App->t_a('company_phone'); ?></span>
                                </a>
                            </div>
                            <div class="company-info">
                                <a href="mailto:<?php echo $this->App->t_a('company_email'); ?>">
                                    <span>Email</span>
                                    <span class="info-item"><?php echo $this->App->t_a('company_email'); ?></span>
                                </a>
                            </div>
                        </div>
                        <div id="google_translate_element2" class="hidden"></div>
                        <div class="header-language">
                            <div class="language">
                                <div data-toggle="dropdown" id="contry">
                                    <div class="country vi">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="9" cy="9" r="9" fill="#FA1010" />
                                            <path
                                                d="M9 3.37488L10.587 6.81553L14.3497 7.26166L11.5679 9.83422L12.3063 13.5506L9 11.6999L5.69371 13.5506L6.43215 9.83422L3.65031 7.26166L7.41298 6.81553L9 3.37488Z"
                                                fill="#FFE710" />
                                        </svg>

                                        <span class="lang-text">Việt Nam</span>

                                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.70256 5.13547L0.956329 1.24623C0.792308 1.07557 0.792308 0.799081 0.956329 0.627993C1.12035 0.457336 1.38676 0.457336 1.55079 0.627993L4.99977 4.20875L8.44876 0.628424C8.61278 0.457767 8.87919 0.457767 9.04363 0.628424C9.20765 0.799081 9.20765 1.076 9.04363 1.24666L5.2974 5.1359C5.13507 5.30398 4.86447 5.30398 4.70256 5.13547Z"
                                                fill="#666666" stroke="#666666" stroke-width="0.7" />
                                        </svg>

                                    </div>
                                    <div class="country en hidden">
                                        <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <mask id="mask0_93_184" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                                x="0" y="0" width="22" height="15">
                                                <path d="M22 0H0V15H22V0Z" fill="#DE2910" />
                                            </mask>
                                            <g mask="url(#mask0_93_184)">
                                                <path d="M-1.50342 -0.140625V15.0247H23.5193V-0.140625H-1.50342Z"
                                                    fill="#012169" />
                                                <path
                                                    d="M-1.50342 -0.140625L23.5193 15.0247L-1.50342 -0.140625ZM23.5193 -0.140625L-1.50342 15.0233L23.5193 -0.140625Z"
                                                    fill="black" />
                                                <path
                                                    d="M22.9602 16.3806L11.008 9.13611L-0.944167 16.3806L-2.0625 13.6653L8.2099 7.44028L-2.0625 1.21528L-0.944167 -1.5L11.008 5.74444L22.9602 -1.5L24.0785 1.21528L13.8061 7.44028L24.0785 13.6653L22.9602 16.3806Z"
                                                    fill="white" />
                                                <path
                                                    d="M-1.50342 -0.140625L23.5193 15.0247L-1.50342 -0.140625ZM23.5193 -0.140625L-1.50342 15.0233L23.5193 -0.140625Z"
                                                    fill="black" />
                                                <path
                                                    d="M23.1458 15.9281L11.0079 8.56979L-1.12987 15.9281L-1.87695 14.1184L9.14367 7.44062L-1.87695 0.762847L-1.12987 -1.04688L11.0079 6.31146L23.1458 -1.04688L23.8928 0.762847L12.8722 7.44062L23.8928 14.1184L23.1458 15.9281Z"
                                                    fill="#C8102E" />
                                                <path
                                                    d="M11.0079 -0.140625V15.0247V-0.140625ZM-1.50342 7.44132H23.5193H-1.50342Z"
                                                    fill="black" />
                                                <path
                                                    d="M13.0933 15.0233H8.92252V9.9691H-1.50342V4.91354H8.92252V-0.140625H13.0933V4.91354H23.5193V9.9691H13.0933V15.0233Z"
                                                    fill="white" />
                                                <path
                                                    d="M11.0079 -0.140625V15.0247V-0.140625ZM-1.50342 7.44132H23.5193H-1.50342Z"
                                                    fill="black" />
                                                <path
                                                    d="M12.2592 15.0233H9.75668V8.95799H-1.50342V5.92465H9.75668V-0.140625H12.2592V5.92465H23.5193V8.95799H12.2592V15.0233Z"
                                                    fill="#C8102E" />
                                            </g>
                                        </svg>
                                        <span class="lang-text">English</span>

                                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.70256 5.13547L0.956329 1.24623C0.792308 1.07557 0.792308 0.799081 0.956329 0.627993C1.12035 0.457336 1.38676 0.457336 1.55079 0.627993L4.99977 4.20875L8.44876 0.628424C8.61278 0.457767 8.87919 0.457767 9.04363 0.628424C9.20765 0.799081 9.20765 1.076 9.04363 1.24666L5.2974 5.1359C5.13507 5.30398 4.86447 5.30398 4.70256 5.13547Z"
                                                fill="#666666" stroke="#666666" stroke-width="0.7" />
                                        </svg>
                                    </div>
                                    <div class="country ja hidden">
                                        <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect x="0.05" y="0.05" width="21.9" height="14.9" fill="white"
                                                stroke="#3D3A3A" stroke-width="0.1" />
                                            <path
                                                d="M10.5 12C12.9853 12 15 9.98528 15 7.5C15 5.01472 12.9853 3 10.5 3C8.01472 3 6 5.01472 6 7.5C6 9.98528 8.01472 12 10.5 12Z"
                                                fill="#CD0026" />
                                        </svg>



                                        <span class="lang-text">Nhật Bản</span>

                                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.70256 5.13547L0.956329 1.24623C0.792308 1.07557 0.792308 0.799081 0.956329 0.627993C1.12035 0.457336 1.38676 0.457336 1.55079 0.627993L4.99977 4.20875L8.44876 0.628424C8.61278 0.457767 8.87919 0.457767 9.04363 0.628424C9.20765 0.799081 9.20765 1.076 9.04363 1.24666L5.2974 5.1359C5.13507 5.30398 4.86447 5.30398 4.70256 5.13547Z"
                                                fill="#666666" stroke="#666666" stroke-width="0.7" />
                                        </svg>
                                    </div>
                                    <?php /*
                                    <div class="country zh-CN hidden">
                                        <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22 0H0V15H22V0Z" fill="#DA251D" />
                                            <path
                                                d="M10.9998 3L8.41117 11.1375L15.1872 6.1125H6.8125L13.5885 11.1375L10.9998 3Z"
                                                fill="#FFFF00" />
                                            <path d="M22 0H0V12.6562H22V0Z" fill="#DE2910" />
                                            <path
                                                d="M3.09385 1.26562L4.18469 4.69922L1.32812 2.57813H4.85958L2.00302 4.70039L3.09385 1.26562Z"
                                                fill="#FFDE00" />
                                            <path
                                                d="M6.4292 0.683594L6.32607 1.88125L5.71993 0.85L6.80274 1.31992L5.65576 1.58945L6.4292 0.683594Z"
                                                fill="#FFDE00" />
                                            <path
                                                d="M7.86832 2.09082L7.31717 3.15371L7.14988 1.96191L7.96915 2.82676L6.80957 2.62051L7.86832 2.09082Z"
                                                fill="#FFDE00" />
                                            <path
                                                d="M8.00715 4.2127L7.08132 4.95567L7.40559 3.79785L7.81006 4.92871L6.83496 4.25606L8.00715 4.2127Z"
                                                fill="#FFDE00" />
                                            <path
                                                d="M6.40635 5.10254L6.3525 6.30488L5.7051 5.29824L6.80625 5.72246L5.67188 6.04121L6.40635 5.10254Z"
                                                fill="#FFDE00" />
                                        </svg>

                                        <span class="lang-text">China</span>

                                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.70256 5.13547L0.956329 1.24623C0.792308 1.07557 0.792308 0.799081 0.956329 0.627993C1.12035 0.457336 1.38676 0.457336 1.55079 0.627993L4.99977 4.20875L8.44876 0.628424C8.61278 0.457767 8.87919 0.457767 9.04363 0.628424C9.20765 0.799081 9.20765 1.076 9.04363 1.24666L5.2974 5.1359C5.13507 5.30398 4.86447 5.30398 4.70256 5.13547Z"
                                                fill="#666666" stroke="#666666" stroke-width="0.7" />
                                        </svg>
                                    </div>
                                    <div class="country it hidden">
                                        <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22 0H0V15H22V0Z" fill="#009246" />
                                            <path d="M22.0002 0H7.3335V15H22.0002V0Z" fill="white" />
                                            <path d="M21.9998 0H14.6665V15H21.9998V0Z" fill="#CE2B37" />
                                        </svg>
                                        <span class="lang-text">Italiana</span>

                                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.70256 5.13547L0.956329 1.24623C0.792308 1.07557 0.792308 0.799081 0.956329 0.627993C1.12035 0.457336 1.38676 0.457336 1.55079 0.627993L4.99977 4.20875L8.44876 0.628424C8.61278 0.457767 8.87919 0.457767 9.04363 0.628424C9.20765 0.799081 9.20765 1.076 9.04363 1.24666L5.2974 5.1359C5.13507 5.30398 4.86447 5.30398 4.70256 5.13547Z"
                                                fill="#666666" stroke="#666666" stroke-width="0.7" />
                                        </svg>
                                    </div>
                                    * / ?>
                                </div>
                                <div class="country-list" aria-labelledby="contry">
                                    <div class="country-wrap" id="select-language">
                                        <div class="country" onclick="changeGTLanguage('vi|vi', this);return false;"
                                            data-key="vi">
                                            <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22 0H0V14.6667H22V0Z" fill="#DA251D" />
                                                <path
                                                    d="M11 2.93359L8.41135 10.8903L15.1874 5.97693H6.81268L13.5887 10.8903L11 2.93359Z"
                                                    fill="#FFFF00" />
                                            </svg>
                                            <span class="lang-text">Việt Nam</span>
                                        </div>
                                        <div class="country" onclick="changeGTLanguage('vi|en', this);return false;"
                                            data-key="en">
                                            <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <mask id="mask0_93_184" style="mask-type:alpha"
                                                    maskUnits="userSpaceOnUse" x="0" y="0" width="22" height="15">
                                                    <path d="M22 0H0V15H22V0Z" fill="#DE2910" />
                                                </mask>
                                                <g mask="url(#mask0_93_184)">
                                                    <path d="M-1.50342 -0.140625V15.0247H23.5193V-0.140625H-1.50342Z"
                                                        fill="#012169" />
                                                    <path
                                                        d="M-1.50342 -0.140625L23.5193 15.0247L-1.50342 -0.140625ZM23.5193 -0.140625L-1.50342 15.0233L23.5193 -0.140625Z"
                                                        fill="black" />
                                                    <path
                                                        d="M22.9602 16.3806L11.008 9.13611L-0.944167 16.3806L-2.0625 13.6653L8.2099 7.44028L-2.0625 1.21528L-0.944167 -1.5L11.008 5.74444L22.9602 -1.5L24.0785 1.21528L13.8061 7.44028L24.0785 13.6653L22.9602 16.3806Z"
                                                        fill="white" />
                                                    <path
                                                        d="M-1.50342 -0.140625L23.5193 15.0247L-1.50342 -0.140625ZM23.5193 -0.140625L-1.50342 15.0233L23.5193 -0.140625Z"
                                                        fill="black" />
                                                    <path
                                                        d="M23.1458 15.9281L11.0079 8.56979L-1.12987 15.9281L-1.87695 14.1184L9.14367 7.44062L-1.87695 0.762847L-1.12987 -1.04688L11.0079 6.31146L23.1458 -1.04688L23.8928 0.762847L12.8722 7.44062L23.8928 14.1184L23.1458 15.9281Z"
                                                        fill="#C8102E" />
                                                    <path
                                                        d="M11.0079 -0.140625V15.0247V-0.140625ZM-1.50342 7.44132H23.5193H-1.50342Z"
                                                        fill="black" />
                                                    <path
                                                        d="M13.0933 15.0233H8.92252V9.9691H-1.50342V4.91354H8.92252V-0.140625H13.0933V4.91354H23.5193V9.9691H13.0933V15.0233Z"
                                                        fill="white" />
                                                    <path
                                                        d="M11.0079 -0.140625V15.0247V-0.140625ZM-1.50342 7.44132H23.5193H-1.50342Z"
                                                        fill="black" />
                                                    <path
                                                        d="M12.2592 15.0233H9.75668V8.95799H-1.50342V5.92465H9.75668V-0.140625H12.2592V5.92465H23.5193V8.95799H12.2592V15.0233Z"
                                                        fill="#C8102E" />
                                                </g>
                                            </svg>
                                            <span class="lang-text">English</span>
                                        </div>
                                        <div class="country" onclick="changeGTLanguage('vi|ja', this);return false;"
                                            data-key="ja">
                                            <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.05" y="0.05" width="21.9" height="14.9" fill="white"
                                                    stroke="#3D3A3A" stroke-width="0.1" />
                                                <path
                                                    d="M10.5 12C12.9853 12 15 9.98528 15 7.5C15 5.01472 12.9853 3 10.5 3C8.01472 3 6 5.01472 6 7.5C6 9.98528 8.01472 12 10.5 12Z"
                                                    fill="#CD0026" />
                                            </svg>



                                            <span class="lang-text">Nhật Bản</span>
                                        </div>
                                        <?php /*
                                        <div class="country" onclick="changeGTLanguage('vi|zh-CN', this);return false;"
                                            data-key="zh-CN">
                                            <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22 0H0V15H22V0Z" fill="#DA251D" />
                                                <path
                                                    d="M10.9998 3L8.41117 11.1375L15.1872 6.1125H6.8125L13.5885 11.1375L10.9998 3Z"
                                                    fill="#FFFF00" />
                                                <path d="M22 0H0V12.6562H22V0Z" fill="#DE2910" />
                                                <path
                                                    d="M3.09385 1.26562L4.18469 4.69922L1.32812 2.57813H4.85958L2.00302 4.70039L3.09385 1.26562Z"
                                                    fill="#FFDE00" />
                                                <path
                                                    d="M6.4292 0.683594L6.32607 1.88125L5.71993 0.85L6.80274 1.31992L5.65576 1.58945L6.4292 0.683594Z"
                                                    fill="#FFDE00" />
                                                <path
                                                    d="M7.86832 2.09082L7.31717 3.15371L7.14988 1.96191L7.96915 2.82676L6.80957 2.62051L7.86832 2.09082Z"
                                                    fill="#FFDE00" />
                                                <path
                                                    d="M8.00715 4.2127L7.08132 4.95567L7.40559 3.79785L7.81006 4.92871L6.83496 4.25606L8.00715 4.2127Z"
                                                    fill="#FFDE00" />
                                                <path
                                                    d="M6.40635 5.10254L6.3525 6.30488L5.7051 5.29824L6.80625 5.72246L5.67188 6.04121L6.40635 5.10254Z"
                                                    fill="#FFDE00" />
                                            </svg>

                                            <span class="lang-text">China</span>
                                        </div>
                                        <div class="country" onclick="changeGTLanguage('vi|it', this);return false;"
                                            data-key="it">
                                            <svg width="22" height="15" viewBox="0 0 22 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22 0H0V15H22V0Z" fill="#009246" />
                                                <path d="M22.0002 0H7.3335V15H22.0002V0Z" fill="white" />
                                                <path d="M21.9998 0H14.6665V15H21.9998V0Z" fill="#CE2B37" />
                                            </svg>
                                            <span class="lang-text">Italiana</span>
                                        </div>
                                        * / ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="logo">
                            <a href="<?php echo DOMAIN; ?>" title="" class="logo-img">
                                <img src="<?php echo DOMAIN . $this->App->t('logo_header', array(), 'vi'); ?>" alt="">
                            </a>
                            <?php echo $this->App->adm_link('lang', 'logo_header', 'image'); ?>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="navbar-frame">
                            <?php echo View::element('menu'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    */ ?>