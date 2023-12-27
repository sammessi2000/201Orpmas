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

<div class="main-wrap page page-tintuyendung">
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
                        <?php echo $this->App->t_a('tuyendung'); ?>
                    </h1>

                    <div class="clearfix"></div>

                    <div class="container-fluid no-padding">
                        <div class="row">
                            <div class="col-sm-12 ">
                                <div class="bodycontent">

                                    <div class="dated">
                                        <?php echo date('d/m/Y h:i', $this->data['Job']['modified']); ?>
                                    </div>
                                    <h1>
                                        <?php echo $this->App->t_a('tbtuyendung'); ?>
                                    </h1>
                                    <div class="tuyendung-des">
                                        <?php echo $this->App->t_a('tuyendungdes'); ?>
                                    </div>
                                    <div class="tuyendung-title">
                                        <?php echo $this->App->t('title', $this->data['Job']); ?>
                                        <?php echo $this->App->adm_link('tuyendung', $this->data['Job']['id']); ?>
                                    </div>
                                    <div class="tuyendung-item">
                                        <div class="tdlabel">
                                            <?php echo $this->App->t_a('soluong'); ?>
                                        </div>

                                        <div class="tdcontent">
                                            <?php echo $this->data['Job']['soluong']; ?>
                                            <?php echo $this->App->t_a('nguoi'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="clearfix"></div>

                                    <?php 
                                        $field = $lang == 'vi' ? 'yeucau' : 'yeucau_' . $lang;
                                        $data_yeucau = array();

                                        $att = $this->data['Job'][$field];

                                        if($att != '' && $this->App->is_valid_json($att))
                                        { 
                                            $att_data = json_decode($att);

                                            foreach($att_data as $v)
                                            {
                                                if(isset($v->ten) && isset($v->giatri))
                                                {
                                                    $item = array();
                                                    $item['title'] = $v->ten;
                                                    $item['content'] = $v->giatri;
                                                    $data_yeucau[] = $item;
                                                }
                                            }
                                        }
                                    ?>

                                    <?php if(count($data_yeucau) > 0) { ?>
                                    <h2><?php echo $this->App->t_a('yeucau'); ?></h2>
                                    <div class="yeucaubody">
                                    <?php foreach($data_yeucau as $v) { ?>
                                    <div class="tuyendung-item">
                                        <div class="tdlabel">
                                            <?php echo $v['title']; ?>
                                        </div>

                                        <div class="tdcontent">
                                            <?php echo $v['content']; ?>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    </div>
                                    <?php } ?>
                                    
                                    <div class="clearfix"></div>

                                    <?php 
                                        $field = $lang == 'vi' ? 'thongtin' : 'thongtin_' . $lang;
                                        $data_thongtin = array();

                                        $att = $this->data['Job'][$field];

                                        if($att != '' && $this->App->is_valid_json($att))
                                        { 
                                            $att_data = json_decode($att);

                                            foreach($att_data as $v)
                                            {
                                                if(isset($v->ten) && isset($v->giatri))
                                                {
                                                    $item = array();
                                                    $item['title'] = $v->ten;
                                                    $item['content'] = $v->giatri;
                                                    $data_thongtin[] = $item;
                                                }
                                            }
                                        }
                                    ?>

                                    <?php if(count($data_thongtin) > 0) { ?>
                                    <h2><?php echo $this->App->t_a('thongtinchung'); ?></h2>
                                    <div class="thongtinbody">
                                    <?php foreach($data_thongtin as $v) { ?>
                                    <div class="tuyendung-item">
                                        <div class="tdlabel">
                                            <?php echo $v['title']; ?>
                                        </div>

                                        <div class="tdcontent">
                                            <?php echo $v['content']; ?>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    </div>
                                    <?php } ?>

                                    
                                    <div class="clearfix"></div>


                                    <?php 
                                        $field = $lang == 'vi' ? 'hoso' : 'hoso_' . $lang;
                                        $data_hoso = array();

                                        $att = $this->data['Job'][$field];

                                        if($att != '' && $this->App->is_valid_json($att))
                                        { 
                                            $att_data = json_decode($att);

                                            foreach($att_data as $v)
                                            {
                                                if(isset($v->ten) && isset($v->giatri))
                                                {
                                                    $item = array();
                                                    $item['title'] = $v->ten;
                                                    $item['content'] = $v->giatri;
                                                    $data_hoso[] = $item;
                                                }
                                            }
                                        }
                                    ?>

                                    <?php if(count($data_hoso) > 0) { ?>
                                    <div class="hosobody hsxinviecg">
                                        <div class="tuyendung-item">
                                            <div class="tdlabel">
                                                &nbsp;
                                            </div>
                                            <div class="tdcontent">
                                                <div class="tdc-hr"></div>

                                                <strong><?php echo $this->App->t_a('hosogom'); ?></strong>
                                                <span class="td-btn td-btn-1">
                                                    <a href="<?php echo DOMAIN . $this->data['Job']['hosomau']; ?>">
                                                        <i></i>
                                                        <?php echo $this->App->t('downhsmau'); ?>
                                                    </a>
                                                    <?php echo $this->App->adm_link('lang', 'downhsmau'); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="clearfix"></div>

                                    <div class="hosobody hsxinviecg">
                                        <div class="tuyendung-item">
                                            <div class="tdlabel">
                                                &nbsp;
                                            </div>
                                            <div class="tdcontent">
                                            <ul>
                                            <?php foreach($data_hoso as $v) { ?>
                                            <li> 
                                                <?php echo $i; ?>.
                                                <?php echo $v['content']; ?>
                                            </li>
                                            <?php } ?>
                                            </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                    <div class="clearfix"></div>

                                    <div class="hosobody hsxinviecg">
                                        <div class="tuyendung-item">
                                            <div class="tdlabel">
                                                &nbsp;
                                            </div>
                                            <div class="tdcontent">
                                                <div class="tdc-hr"></div>
                                                <strong><?php echo $this->App->t_a('hosoguive'); ?></strong>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="clearfix"></div>

                                    <div class="hosobody hsxinviecg">
                                        <div class="tuyendung-item">
                                            <div class="tdlabel">
                                                &nbsp;
                                            </div>
                                            <div class="tdcontent">
                                                <div class="tdcontent-flex">
                                                    <div class="tdcontent-item">
                                                        <div class="icon-hs1"></div>
                                                        <div class="item-td">
                                                            <?php echo $this->App->t_a('c1'); ?>
                                                            <div class="clearfix"></div>
                                                            <?php echo $this->App->t_a('c2'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="tdcontent-item">
                                                        <div class="icon-hs2"></div>
                                                        <div class="item-td">
                                                            <?php echo $this->App->t_a('c3'); ?>
                                                            <div class="clearfix"></div>
                                                            <?php echo $this->App->t_a('c4'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="tdcontent-item">
                                                        <div class="icon-hs3"></div>
                                                        <div class="item-td">
                                                            <?php echo $this->App->t_a('c5'); ?>
                                                            <div class="clearfix"></div>
                                                            <?php echo $this->App->t_a('c6'); ?>
                                                        </div>

                                                        <div class="clearfix"></div>

                                                        <div class="icon-hs4"></div>
                                                        <div class="item-td">
                                                            <?php echo $this->App->t_a('c7'); ?>
                                                            <div class="clearfix"></div>
                                                            <?php echo $this->App->t_a('c8'); ?>
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="clearfix"></div>

                                    <div class="hosobody hsxinviecg">
                                        <div class="tuyendung-item">
                                            <div class="tdlabel">
                                                &nbsp;
                                            </div>
                                            <div class="tdcontent">
                                                <div class="tdc-hr"></div>
                                                <strong><?php echo $this->App->t_a('thoihanhs'); ?></strong>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="clearfix"></div>

                                    <div class="hosobody hsxinviecg">
                                        <div class="tuyendung-item">
                                            <div class="tdlabel">
                                                &nbsp;
                                            </div>
                                            <div class="tdcontent">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <span class="icon-hs5"></span>
                                                        <?php echo $this->App->t('thoihan', $this->data['Job']); ?>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <?php echo $this->App->t_a('ghichuhs', 'editor'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="clearfix"></div>

                                    <div class="hosobody">
                                        <span class="td-btn td-btn-2">
                                            <a href="mailto:<?php echo $settings['email']; ?>">
                                                <i></i>
                                                <?php echo $this->App->t('nophsxv'); ?>
                                            </a>
                                            <?php echo $this->App->adm_link('lang', 'nophsxv'); ?>
                                        </span>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="related-hr"></div>
                                    
                                    <div class="clearfix"></div>

                                    <div class="related-tuyendung">
                                        <div class="related-tuyendung-body">
                                            <div class="related-tuyendung-title">
                                                <?php echo $this->App->t_a('tintdkhac'); ?>
                                            </div>
                                            <div class="related-tuyendung-content">
                                                <?php if(is_array($related) && count($related) > 0) { ?>
                                            <div class="row">
                                                <?php foreach($related as $v) { ?>
                                                <div class="related-item col-sm-4">
                                                <div class="related-item-body">
                                                    <div class="related-item-title">
                                                        <a href="<?php echo DOMAIN . 'job/' . $v['Job']['id']; ?>">
                                                        <?php echo $this->App->t('title', $v['Job']); ?>
                                                        </a>
                                                    </div>
                                                    <div class="related-item-detail">
                                                        <div class="lft">
                                                            <?php echo date('d/m/Y h:i', $v['Job']['modified']); ?>
                                                        </div>

                                                        <div class="rght">
                                                            <?php if($v['Job']['status'] == 1) {  ?>
                                                            <span class="active">
                                                                <?php echo $this->App->t_a('tdactive'); ?>
                                                            </span>
                                                            <?php } else { ?>
                                                            <span class="">
                                                                <?php echo $this->App->t_a('tddeactive'); ?>
                                                            </span>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>



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

