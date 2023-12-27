<style type="text/css">
.main {background: #fff;}
</style>
<h2 class="home-title" style="margin-bottom: 40px;">
	Thông tin liên hệ
</h2>

<?php echo $this->Session->flash(); ?>

<form action="" method="post">
    <div class="contact-content">
        <div class="row-fluid">
            <div class="span3"><span>Họ và tên</span></div>
            <div class="span9">
                <input type="text" name="fullname" />
            </div>
        </div>

        <div class="row-fluid">
            <div class="span3"><span>Điện thoại</span></div>
            <div class="span9">
                <input type="text" name="mobile" />
            </div>
        </div>

        <div class="row-fluid">
            <div class="span3"><span>Email</span></div>
            <div class="span9">
                <input type="text" name="email" />
            </div>
        </div>

        <div class="row-fluid">
            <div class="span3"><span>Nội dung</span></div>
            <div class="span9">
                <textarea name="content" class="span11" style="height: 170px;"></textarea>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span3">&nbsp;</div>
            <div class="span9">
                <input type="submit" name="submit" class="btn-cvin" value="Gửi đi" />
            </div>
        </div>
    </div>
</form>
