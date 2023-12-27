<?php $bread_array = $this->App->breadarray($current_category); ?>
<?php
    $cat_list = array();

    foreach($categories as $v)
    {
        if($v['Category']['type'] == 'ketnoi')
            $cat_list[$v['Category']['id']] = $v['Category']['title'];
    }

    $cities = $this->requestAction('/default/node/get_city_lst');
    $hangs = $this->requestAction('/default/node/get_hangs');
    $data = $this->requestAction('/default/node/ketnoi');
    // pr($data);
?>

<div class="main archive-product">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
                 <div id="breadcrumb" class="block-breadcrumb-mb">
                    <ol  itemscope itemtype="http://schema.org/BreadcrumbList">
                        <?php if(is_array($bread_array) && count($bread_array)>0) {  ?>
                        <?php $i=0; $n=count($bread_array); foreach($bread_array as $v) { ?>
                            <?php if($v['title'] != '') {  $i++; ?>
                                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $v['link']; ?>">
                                        <span itemprop="name"><?php echo $v['title']; ?></span>
                                    </a> 
                                    <i class="fa fa-angle-right"></i>
                                    <meta itemprop="position" content="<?php echo $i; ?>">
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </ol>
                </div>
            </div>

            <div class="col-sm-9">
                <div class="home-news-title hr-red">
                    <span><?php echo $current_category['Node']['title']; ?></span>
                </div>

                <div class="product-search ">
                    <div class="row ">
                        <div class="col-sm-4">
                            <div class="search-label">
                                Hội / hiệp hội Nữ doanh nhân tỉnh thành
                            </div>
                            <div class="search-select">
                                <select class="city">
                                    <option value="">Chọn</option>
                                    <?php foreach($cities as $k=>$v) { ?>
                                        <?php
                                            $s = isset($_GET['ctid']) && is_numeric($_GET['ctid']) && $_GET['ctid'] == $k ? 'selected="selected"'  : ''; 
                                        ?>
                                        <option value="<?php echo $k; ?>" <?php echo $s; ?>><?php echo $v; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="search-label">
                                Lĩnh vực hoạt động
                            </div>
                            <div class="search-select">
                                <select class="hang">
                                    <option value="">Chọn</option>
                                    <?php foreach($hangs as $k=>$v) { ?>
                                        <?php
                                            $s = isset($_GET['hid']) && is_numeric($_GET['hid']) && $_GET['hid'] == $k ? 'selected="selected"'  : ''; 
                                        ?>
                                        <option value="<?php echo $k; ?>" <?php echo $s; ?>><?php echo $v; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="search-label">
                                Tìm kiếm
                            </div>
                            <div class="search-select">
                                <?php
                                    $s = isset($_GET['k']) ? $_GET['k'] : ''; 
                                ?>
                                <input type="text" name="key" value="<?php echo $s; ?>" placeholder="Tìm kiếm" value="<?php echo $s; ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-list row">
                        <?php $i=0; foreach($data as $v) { $i++; ?>
                        <div class="archive-product-item col-sm-4">
                            <div class="archive-product-item-body">
                                <div class="img">
                                    <img width="270" height="150" class="lazy" src="<?php echo DOMAIN; ?>theme/default/img/blank.svg" data-src="<?php echo $this->App->img_src($v['Customer']['logo'], 270, 150); ?>" alt="" />
                                </div>
                                <div class="b_title">
                                    <span><?php echo $v['Customer']['fullname']; ?></span>
                                </div>
                                <div class="b_cat">
                                    <?php echo isset($hangs[$v['Customer']['hang_id']]) ? $hangs[$v['Customer']['hang_id']] : ''; ?>
                                    <span>
                                    </span>
                                </div>
                            </div>
                                <div class="hidden data-hover">
                                    <div class="archive-product-item-body">
                                        <div class="img">
                                            <img width="270" height="150" class="lazy" src="<?php echo DOMAIN; ?>theme/default/img/blank.svg" data-src="<?php echo $this->App->img_src($v['Customer']['logo'], 460, 256); ?>" alt="" />
                                        </div>
                                        <div class="h-title">
                                            <span><?php echo $v['Customer']['fullname']; ?></span>
                                        </div>
                                        <div class="h-des">
                                            <span><?php echo $v['Customer']['des']; ?></span>
                                        </div>
                                        <div class="h-info">
                                            <i class="hicon icon-1"></i>
                                            <span><?php echo $v['Customer']['loaihinh']; ?></span>
                                        </div>
                                        <div class="h-info">
                                            <i class="hicon icon-2"></i>
                                            <span><?php echo $v['Customer']['address']; ?></span>
                                        </div>
                                        <div class="h-info">
                                            <i class="hicon icon-3"></i>
                                            <span><?php echo $v['Customer']['phone']; ?></span>
                                        </div>
                                        <div class="h-info">
                                            <i class="hicon icon-4"></i>
                                            <span><?php echo $v['Customer']['email']; ?></span>
                                        </div>
                                        <div class="h-info">
                                            <i class="hicon icon-5"></i>
                                            <span><?php echo isset($hangs[$v['Customer']['hang_id']]) ? $hangs[$v['Customer']['hang_id']] : ''; ?></span>
                                        </div>
                                        <div class="h-info">
                                            <i class="hicon icon-6"></i>
                                            <span><?php echo $v['Customer']['nganhnghe']; ?></span>
                                        </div>

                                        <script>
<?php
$banners2 = $this->requestAction('/default/node/get_cbanner/' . $v['Customer']['id']);
// pr($banners2); die;
?>

    <?php echo 'var items_'. $v['Customer']['id'] .' = ['; ?>
<?php if(is_array($banners2) && count($banners2) > 0) { ?>
    <?php foreach($banners2 as $bn) { ?>
    <?php
        $img = $this->App->img_src($bn['CustomerBanner']['image'], 0, 500);
        // $imginfo = getimagesize($img);
        $width = 1000;
        $height = 500;

        echo '{';
        echo 'src:\'' . $img . '\',';
        echo 'w:' . $width . ',';
        echo 'h:' . $height . '';
        echo '},';
    ?>
    <?php  } ?>
    <?php } ?>
    <?php echo '];'; ?>


                                            </script>
                                        <div class="show-gallery">
                                                <span onclick="openPhotoSwipe(items_<?php echo $v['Customer']['id']; ?>);">
                                                    Xem Sản phẩm / Dịch vụ
                                                </span>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <?php } ?>

                </div>

                        <div class="paging">
                        <?php 
                            $first = $this->Paginator->first('<', array('tag' => 'span', 'separator' => ''));
                            $first = str_replace('default/node/index/', '', $first);
                            $first = str_replace('/.html', '.html', $first);

                            $last = $this->Paginator->last('>', array('tag' => 'span', 'separator' => ''));
                            $last = str_replace('default/node/index/', '', $last);
                            $last = str_replace('/.html', '.html', $last);

                            $pages = $this->Paginator->numbers(array('tag' => 'span', 'separator'=>' ', 'currentTag' => 'a'));
                            $pages = str_replace('default/node/index/', '', $pages);
                            $pages = str_replace('/.html', '.html', $pages);

                            echo $first;
                            echo $pages;
                            echo $last;
                        ?>
                        </div>
            </div>

            <div class="col-sm-3"><?php echo View::element('sidebar'); ?></div>
        </div>
    </div>
</div>


<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <div class="pswp__container">
            <!-- don't modify these 3 pswp__item elements, data is added later on -->
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

          </div>

        </div>

</div>


<link rel="stylesheet" href="<?php echo DOMAIN; ?>theme/default/css/photoswipe.css?v=<?php echo STYLE_VERSION; ?>" />
<script type="text/javascript" src="<?php echo DOMAIN; ?>theme/default/js/photoswipe.min.js?v=<?php echo STYLE_VERSION; ?>"></script>
<script type="text/javascript" src="<?php echo DOMAIN; ?>theme/default/js/photoswipe-ui-default.js?v=<?php echo STYLE_VERSION; ?>"></script>

<script type="text/javascript">
function openPhotoSwipe(items) {
    var pswpElement = document.querySelectorAll('.pswp')[0];

    <?php /*$i=0; foreach($data as $v) { $i++; ?>
    <?php echo 'var items'. $i -1 .' = ['; ?>
    <?php
        $img = DOMAIN . $v['CustomerBanner']['image'];
        $imginfo = getimagesize($img);
        $width = $imginfo[0];
        $height = $imginfo[1];

        echo '{';
        echo 'src:\'' . $img . '\',';
        echo 'w:' . $width . ',';
        echo 'h:' . $height . '';
        echo '},';
    ?>
    <?php echo '];'; ?>
    <?php }*/ ?>

    // define options (if needed)
    var options = {
       // history & focus options are disabled on CodePen        
        history: false,
        focus: false,

        showAnimationDuration: 0,
        hideAnimationDuration: 0
        
    };
    
    var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
    gallery.init();
};


    $('select.city').change(function() {
        var ctid = $('select.city').val();
        var hid = $('select.hang').val();
        var k = $('input[name=key]').val();

        document.location.href = "<?php echo DOMAIN . $current_category['Node']['slug']; ?>.html?ctid=" + ctid + "&hid=" + hid + "&k=" + k;
    });

    $('select.hang').change(function() {
        var ctid = $('select.city').val();
        var hid = $('select.hang').val();
        var k = $('input[name=key]').val();

        document.location.href = "<?php echo DOMAIN . $current_category['Node']['slug']; ?>.html?ctid=" + ctid + "&hid=" + hid + "&k=" + k;
    });

    $(document).on('keypress',function(e) {
        if(e.which == 13) {
            var ctid = $('select.city').val();
        var hid = $('select.hang').val();
        var k = $('input[name=key]').val();

        document.location.href = "<?php echo DOMAIN . $current_category['Node']['slug']; ?>.html?ctid=" + ctid + "&hid=" + hid + "&k=" + k;
        }
    });


    $('.archive-product-item').click(function() {
        $(this).find('.data-hover').removeClass('hidden');
    });

    $(document).on('click', function (e) {
        if ($(e.target).closest(".archive-product-item").length === 0) {
            $(".archive-product-item .data-hover").addClass('hidden');
        }
    });


</script>
