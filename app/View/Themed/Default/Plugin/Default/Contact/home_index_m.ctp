<?php $bread_array = $this->App->breadarray($current_category); ?>

<div class="page-intro">
    <div class="line-breacrumb hidden-xs">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php foreach ($bread_array as $v) { ?>
                <?php if (empty($v['title'])) {     ?>
                <li class="breadcrumb-item"><a href="<?php echo DOMAIN; ?>"><?php echo 'Trang chủ'; ?></a>
                </li>
                <?php } else {     ?>
                <li class="breadcrumb-item"><a href="<?php echo $v['link']; ?>"><?php echo $v['title']; ?></a>
                </li>
                <?php }     ?>
                <?php } ?>
            </ol>
        </nav>
    </div>
    <div class="page-banner page-lienhe">
        <img src="<?php echo $this->App->t('general_text_9'); ?>" alt="">
        <div class="wrap-bannerdes">
            <div class="banner-des"><?php echo $this->App->t_a('general_text_10'); ?></div>
        </div>
    </div>
    <?php echo $this->App->adm_link('lang','general_text_9','image'); ?>

    <div class="wrap-page page-lienhe-content">
        <div class="container-fluid">
            <div class="row form-contact">
                <span class="contact-title"><?php echo $this->App->t_a('general_text_11','editor'); ?></span>
                <form id="contact" action="<?php echo DOMAIN; ?>default/contact" method="post" class="frmcontact">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="contact-label">Họ và Tên</label>
                            <input type="text" name="fullname" class="uk-input form-control" required="required" />
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group ">
                            <label class="contact-label">Email</label>
                            <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="uk-input form-control" required="required" />
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group ">
                            <label class="contact-label">Số điện thoại</label>
                            <input type="text" name="phone" class="uk-input form-control" required="required" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group contact-flex">
                            <label class="contact-label">Địa chỉ</label>
                            <input class="form-control" name="address" required="required"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group contact-flex">
                            <label class="contact-label">Nội dung</label>
                            <textarea class="form-control" name="content" required="required"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group send-contact">
                            <input class="contact-sbm" type="submit" name="sbm" value="Gửi đi" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>