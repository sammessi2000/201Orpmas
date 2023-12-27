<div class="container-fluid page-banner hidden-xs">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
            <?php if(isset($banners['page'])) { ?>
                <?php foreach($banners['page'] as $v) { ?>
                    <img src="<?php echo DOMAIN . $v['Banner']['image']; ?>" alt="<?php echo $v['Banner']['title']; ?>" />
                <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php $bread_array = $this->App->breadarray($current_category); ?>
<div class="container-fluid bread">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
                <ul>
                    <?php if(is_array($bread_array) && count($bread_array)>0) { ?>
                    <?php $i=0; $n=count($bread_array); foreach($bread_array as $v) { $i++; ?>
                    <li <?php if($i==$n) echo 'class="li-last"'; ?>><a href="<?php echo $v['link']; ?>"><?php echo $v['title']; ?></a></li>
                    <?php } ?>
                    <li class="li-last"><?php echo $this->App->t('contact'); ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="container-fluid">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
                <div class="site-tab tab-blue">
                    <span><?php echo $this->App->t('contact'); ?></span>
                    <?php echo $this->App->adm_link('lang', 'contact'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="container-fluid page-contact">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-6 contact-form">
                <div class="form-title">
                    <?php echo $this->App->t('form-title'); ?>
                    <?php echo $this->App->adm_link('lang', 'form-title'); ?>
                </div>

                <div class="clearfix"></div>
                <form action="<?php echo DOMAIN; ?>default/contact" method="post" class="form-horizontal frmcontact">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <p><b><?php echo $this->App->t('fullname'); ?><span> *</span></b></p>
                            <?php echo $this->App->adm_link('lang', 'fullname'); ?>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="fullname" class="form-control" placeholder="<?php echo $this->App->t('fullname'); ?>" required="required" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3">
                            <p><b>Email<span> *</span></b></p>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="email" class="form-control" placeholder="Email" required="required" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3">
                            <p><b><?php echo $this->App->t('phone'); ?></b></p>
                            <?php echo $this->App->adm_link('lang', 'phone'); ?>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="phone" class="form-control" placeholder="<?php echo $this->App->t('phone'); ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3">
                            <p><b><?php echo $this->App->t('title'); ?></b></p>
                            <?php echo $this->App->adm_link('lang', 'title'); ?>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="title" class="form-control" placeholder="<?php echo $this->App->t('title'); ?>" />
                        </div>
                    </div>


                    <?php /*
                    <div class="form-group">
                        <div class="col-sm-12">
                            <p><b><?php echo $this->App->t('phongban'); ?> <?php echo $this->App->adm_link('lang', 'phongban'); ?></b></p>
                            <?php $pb = explode(',', $settings['phongban']); ?>
                            <select name="phongban" class="form-control">
                                <?php foreach($pb as $v) : ?>
                                <option value="<?php echo $v; ?>"><?php echo $v; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    */ ?>

                    <div class="form-group">
                        <div class="col-sm-3">
                            <p><b><?php echo $this->App->t('content'); ?><span> *</span></b></p>
                            <?php echo $this->App->adm_link('lang', 'content'); ?>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="content" rows="6" cols="12" placeholder="<?php echo $this->App->t('content'); ?>" required="required"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3">
                            &nbsp;
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="captcha" value="" required="required" class="captcha-input" />
                            <img src="<?php echo DOMAIN . 'default/contact/captcha'; ?>" class="captcha-img" />
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-3">
                            &nbsp;
                        </div>
                        <div class="col-sm-9">
                            <input type="submit" name="sbm" class="btn btn-default" value="<?php echo $this->App->t('send'); ?>" />
                            <?php echo $this->App->adm_link('lang', 'send'); ?>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-sm-6 contact-info">

                <div class="form-title">
                    <span><?php echo $this->App->t('contact-ttlh'); ?></span>
                    <?php echo $this->App->adm_link('lang', 'contact-ttlh'); ?>
                </div>

                <div class="contact-tab">
                    <span><?php echo $this->App->t('company_name'); ?></span>
                    <?php echo $this->App->adm_link('lang', 'company_name'); ?>
                </div>

                <div class="clearfix"></div>

                <?php echo $this->App->t('company_about'); ?>
                <?php echo $this->App->adm_link('lang', 'contact-ttlh-cnt', 'editor'); ?>
<?php /*
                <div class="clearfix"></div>

                <div class="news-list-tab news-list-tab-2">
                    <span><?php echo $this->App->t('contact-cn'); ?></span>
                    <?php echo $this->App->adm_link('lang', 'contact-cn'); ?>
                </div>

                <div class="clearfix"></div>

                <?php echo $this->App->t('contact-cn-cnt'); ?>
                <?php echo $this->App->adm_link('lang', 'contact-cn-cnt', 'editor'); ?>
                */ ?>
            </div>
        </div>
    </div>
</div>

           

<?php //pr($this->data); ?>
<?php /*
<div class="contact-support-list">
<?php foreach($this->data as $v) { ?>
    <div class="col-sm-4">
        <div class="contact-support-item">
            <strong><?php echo $v['Support']['title']; ?></strong>
            <p>
                <span class="lbl">Skype:</span>
                <a href="skype:<?php echo $v['Support']['skype']; ?>?chat"><?php echo $v['Support']['skype']; ?></a>
            </p>
            <p>
                <span class="lbl">Phone:</span>
                <?php echo $v['Support']['phone']; ?>
            </p>
            <p>
                <span class="lbl">Email:</span>
                <?php echo $v['Support']['email']; ?>
            </p>
        </div>
    </div>
<?php } ?>
</div>
*/ ?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&key=AIzaSyB-dgNXvvl_r_PW-KOuFbcUQf6oTm06HWY"></script>
<script src="<?php echo DOMAIN; ?>theme/default/js/map.js"></script>
<?php 
    $gm = explode(',', $settings['google_map']);
    $l = $gm[0];
    $s = $gm[1];
?>
<script type="text/javascript">

    var myLatlng = new google.maps.LatLng(<?php echo $l; ?>, <?php echo $s; ?>);
    var label = '';
    var mapOptions = {
        zoom: 16,
        center: myLatlng
    };
    var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);

    
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map
    });

    

    // var mapLabel = new MapLabel({
    //     text: label,
    //     position: myLatlng,
    //     map: map,
    //     fontSize: 12,
    //     align: 'center'
    // });

    
    marker.setMap(map);

    var move_map = 0;

</script>
