<?php $bread_array = $this->App->breadarray($current_category); ?>

<?php /*
<div class="page-intro">
    <div class="line-breacrumb hidden-xs">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php foreach ($bread_array as $v) { ?>
                <?php if (empty($v['title'])) {     ?>
                <li class="breadcrumb-item"><a href="<?php echo DOMAIN; ?>"><?php echo 'Trang chủ'; ?></a>
                </li>
                <li class="breadcrumb-item"><a>Liên hệ</a>
                </li>
                <?php }     ?>
                <?php } ?>
            </ol>
        </nav>
    </div>
*/
?>
<?php   /*
    <div class="page-lienhe" style="background-image: url('<?php echo $this->App->t('general_text_9'); ?>'); height: 200px; background-repeat: no-repeat;">
        <div class="wrap-bannerdes">
            <div class="banner-des"><?php echo $this->App->t_a('general_text_10'); ?></div>
        </div>
    </div>
    */
?>
<div class="unit-page-background-header lazy" data-bg="<?php echo $this->App->t('general_text_9'); ?>">
    <div class="background-filter first-banner"></div>
</div>
<?php echo $this->App->adm_link('lang', 'general_text_9', 'image'); ?>

<div class="wrap600 contact-page-content">
    <div class="page-h2-box contact-page">
        <h2><?php echo $this->App->t_a('general_text_14', 'vi'); ?></h2>
    </div>

    <div class="form-contact se-form">
        <form id="contact" method="post" class="frmcontact">
            <?php echo $this->App->adm_link('lang', 'general_text_25', 'text'); ?>
            <input type="text" name="fullname" placeholder="<?php echo $this->App->t('general_text_25') ?>" id="name" class="name" required>
            <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="<?php echo $this->App->t('general_text_26') ?>" id="email" class="email" required>
            <?php echo $this->App->adm_link('lang', 'general_text_26', 'text'); ?>
            <textarea name="content" rows="6" id="message" placeholder="<?php echo $this->App->t('general_text_27') ?>" class="message" required></textarea>
            <?php echo $this->App->adm_link('lang', 'general_text_27', 'text'); ?>
            <button type="button" name="sbm" onclick=" submit_contact();//send_mes();" class="submit-btn"><?php echo $this->App->t_a('general_text_24') ?></button>
            <!-- <div class="col-sm-4">
                    <div class="form-group">
                        <label class="contact-label">Họ và Tên</label>
                        <input type="text" name="fullname" class="form-control name" required="required" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group ">
                        <label class="contact-label">Email</label>
                        <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control email" required="required" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group ">
                        <label class="contact-label">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control phone" required="required" />
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group contact-flex">
                        <label class="contact-label">Địa chỉ</label>
                        <input type="text" class="form-control address" name="address" required="required"></textarea>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group contact-flex">
                        <label class="contact-label">Nội dung</label>
                        <textarea class="form-control content" name="content" required="required"></textarea>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group send-contact">
                        <input class="contact-sbm" type="submit" name="sbm" value="GỬI ĐI" />
                    </div>
                </div> -->
        </form>
    </div>
</div>
</div>

<script>

</script>