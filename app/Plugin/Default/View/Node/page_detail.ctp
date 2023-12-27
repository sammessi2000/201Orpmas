<?php $bread_array = $this->App->breadarray($current_category); ?>
<?php
    // if(isset($_GET['dev']))
    // {
    //     pr($current_category); 
    //     die;
    //     pr($_GET);
    // }
    
    $content = $this->data['Category']['content'];

    preg_match_all('/<h[2-3][^>]*?>(.*?)<[^>]*?\/h[2-3]>/i', $content, $matches);
    $content_links = array();
    $mucluc_baiviet = '';

    if(isset($matches[0]) && count($matches[0]) > 0)
    {
        foreach($matches[0] as $v)
        {
            $content_links[] = strip_tags($v, '<h2><h3><h4><h5><h6>');
        }
    }

    $key = 0;
    $subkey = 1;
    $content_category = array();

    $i=0;
    foreach($content_links as $v)
    {
        $i++;
        $id = "#d" . $i; // . '-' . $this->data['Node']['slug'];
        $h = preg_replace('/<h([2-3])[^>]*?>/i', '<h${1}>', $v);

        $h = str_replace('<h2>', '<a class="ah2" href="' . $id . '">', $h);
        $h = str_replace('</h2>', '</a>', $h);
        $h = str_replace('<h3>', '<a class="ah3" href="' . $id . '">', $h);
        $h = str_replace('</h3>', '</a>', $h);
        
        if(strpos($v, 'h2') !== false)
        {
            $tmp = array();
            $kk = $key + 1;
            $tmp['self'] = '<span> </span>' . $h;
            // $tmp['self'] = '<span>' . $kk . ' </span>' . $h;
            $tmp['child'] = array();

            $content_category[$key] = $tmp;

            $key++;
            $subkey = 1;
        }

        if(strpos($v, 'h3') !== false)
        {
            if(isset($content_category[$key - 1]['child']))
            {
                // $content_category[$key - 1]['child'][] =  '<span>' . $key . '.' . $subkey . ' </span>'  . $h;
                $content_category[$key - 1]['child'][] =   $h;
                $subkey++;
            }
        }
    }

    //pr($buff);
    if(count($content_category) > 0) 
    {
        $lb = $this->App->t_a('cat_baiviet');
        $content = str_replace('<h2', '<h2 class="num-heading"', $content);
        $content = str_replace('<h3', '<h3 class="num-heading"', $content);

    

        $i = 0;
        foreach($content_category as $v)
        {
            $mucluc_baiviet .= '<li>' . "\n";
            $mucluc_baiviet .= $v['self'] . "\n";
            if(isset($v['child']) && is_array($v['child']) && count($v['child']) > 0)
            {
                $mucluc_baiviet .= '<ol>' . "\n";
                foreach($v['child'] as $cv)
                {
                    $mucluc_baiviet .= '<li>' . "\n";
                    $mucluc_baiviet .= $cv . "\n";
                    $mucluc_baiviet .= '</li>' . "\n";
                }
                $mucluc_baiviet .= '</ol>' . "\n";
            }
            $mucluc_baiviet .= '</li>' . "\n";
        }
    }
 
?>

<div class="main-wrap">
    <div class="wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 sidebar">
                    <?php echo View::element('sidebar-news', array('mucluc' => $mucluc_baiviet)); ?>
                </div>
                <div class="col-sm-9 main">
                    <div id="breadcrumb">
                        <ol  itemscope itemtype="http://schema.org/BreadcrumbList">
                            <?php if(is_array($bread_array) && count($bread_array)>0) {  ?>
                            <?php $i=0; $n=count($bread_array); foreach($bread_array as $v) { ?>
                                <?php if($v['title'] != '') {  $i++; ?>
                                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                        <a itemprop="item" href="<?php echo $v['link']; ?>">
                                          <span itemprop="name"><?php echo $v['title']; ?></span>
                                        </a> 
                                        <meta itemprop="position" content="<?php echo $i; ?>">
                                    </li>
                                <?php } ?>
                            <?php } ?>
                            <?php } ?>
                        </ol>
                    </div>


                    <h2 class="single-h2">
                        <?php echo $this->App->t('title', $this->data['Node']); ?>
                        <?php echo $this->App->adm_link('category', $this->data['Node']['id']); ?>
                    </h2>

                    <div class="clearfix"></div>

                    <div class="container-fluid no-padding">
                        <div class="row">
                        <div class="col-sm-12 news-single-content">
                            
                      <p>
                          <br />
                      </p>

                       
                            <?php echo $content; ?>
                            <?php //echo $this->App->t('content', $this->data['News']); ?>


                        </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>


<script type="text/javascript">

$('.list-news .owl-carousel').owlCarousel({
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    nav: false,
    // navText: ["<img src='images/prev.png'>","<img src='images/next.png'>"],
    loop:true,
    margin:30,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
            nav:false
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:4,
            nav:false,
        }
    }
});

$('.related-news-title .navi-next').click(function() {
    $('.other-news .owl-next').click();
    return false;
});
$('.related-news-title .navi-prev').click(function() {
    $('.other-news .owl-prev').click();
    return false;
});
</script>

    <script type="text/javascript">

    $('.sidebar li a').on('click', function() {

        var el = $(this).attr('href');
        var elnum = el.replace('#d', '') - 1;

            // console.log(el);

        var offset = $('.news-single-content .num-heading').eq(elnum).offset().top;
            offset = offset - 50;
            
        $('body, html').animate({scrollTop: offset}, 500);

        return false;
    });

    </script>