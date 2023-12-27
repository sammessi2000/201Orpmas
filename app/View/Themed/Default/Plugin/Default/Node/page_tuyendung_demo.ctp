<?php $bread_array = $this->App->breadarray($current_category); ?>
<?php

?>

<div class="navbar-info">
    <div class="wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 nvdata">
                    <span><?php echo $this->App->get_date(time(), $lang); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-wrap page page-thongbao">
    <div class="wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 sidebar">
                    <div class="sidebar-menu">
                        <div class="navsidebar">
                            <span class="lft"></span>
                            <span class="rght"></span>
                        </div>

                        <div class="clearfix"></div>

                        <img src="<?php echo DOMAIN . $this->App->t('tdungimg'); ?>" />
                        <?php echo $this->App->adm_link('lang', 'tdungimg', 'image'); ?>
                    </div>
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

                    <h1>
                        <?php echo $this->App->t('title', $current_category['Node']); ?>
                        <?php echo $this->App->adm_link('category', $this->data['Node']['id']); ?>
                    </h1>

                    <div class="clearfix"></div>

                    <div class="container-fluid no-padding">
                        <div class="row">
                            <div class="col-sm-12 ">
                                <div class="bodycontent">

                    <h1>
                        <?php echo $this->data['Category']['page_title']; ?>
                        <?php echo $this->App->adm_link('category', $this->data['Node']['id']); ?>
                    </h1>

                                    <?php echo $this->App->t('content', $this->data['Category']); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

