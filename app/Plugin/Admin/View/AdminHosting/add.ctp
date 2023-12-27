<?php 
$title = $lang != 'vi' ? 'title_' . $lang : 'title'; 
$description = $lang != 'vi' ? 'description_' . $lang : 'description'; 
$content = $lang != 'vi' ? 'content_' . $lang : 'content'; 

?>

<div class="navbar margin-none">
    <div class="navbar-inner radius-none">
        <a href="#" class="brand">Thêm mới <?php echo $form_title; ?></a>
    </div>
    <?php if($multiple_lang == true) : ?>
        <div class="lang">
            <a href="<?php echo $url_here; ?>?lang=vi" <?php if($lang == 'vi') echo 'class="active"'; ?>><i class="icon icon-vi"></i> Tiếng Việt</a>
            <a href="<?php echo $url_here; ?>?lang=en" <?php if($lang == 'en') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Anh</a>
        </div>
    <?php endif; ?>
</div>

<div class="clearfix"></div>

<div class="well bg-white radius-none">
    <?php echo $this->Session->flash(); ?>
    <form action="" method="post" class="form-horizontal">
        <div class="row-fluid news_content_workspace">
            <div class="control-group">
                <div class="span1 text-bold">Tên gói </div>
                <div class="span9">
                    <?php echo $this->Form->input('Node.title', array('label' => false, 'div' => false, 'class' => 'span6')); ?>
                </div>
            </div>
            
            <div class="control-group">
                <div class="span1 text-bold">Mục lục </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.hosting_category', array('label' => false, 'div' => false, 'required', 'class' => 'span6', 'options' => $category_tree, 'empty' => 'Chọn mục lục')); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="span1 text-bold">Dung lượng </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.space', array('label' => false, 'div' => false, 'class' => 'span6')); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="span1 text-bold">Băng thông </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.banwidth', array('label' => false, 'div' => false, 'class' => 'span6')); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="span1 text-bold">Địa chỉ Email </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.email', array('type'=>'text', 'label' => false, 'div' => false, 'class' => 'span6')); ?>
                </div>
            </div>


            <div class="control-group">
                <div class="span1 text-bold">Tài khoản FTP </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.ftp', array('label' => false, 'div' => false, 'class' => 'span6')); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="span1 text-bold">Subdomain </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.subdomain', array('label' => false, 'div' => false, 'class' => 'span6')); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="span1 text-bold">Pardeddomain </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.parked', array('label' => false, 'div' => false, 'class' => 'span6')); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="span1 text-bold">My SQL </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.mysql', array('label' => false, 'div' => false, 'class' => 'span6')); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="span1 text-bold">MSSQL Server </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.mssql', array('label' => false, 'div' => false, 'class' => 'span6')); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="span1 text-bold">Addon Domain </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.addon', array('label' => false, 'div' => false, 'class' => 'span6')); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="span1 text-bold">Backup </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.backup', array('label' => false, 'div' => false, 'class' => 'span6')); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="span1 text-bold">IP </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.ip', array('label' => false, 'div' => false, 'class' => 'span6')); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="span1 text-bold">Giá 1 năm </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.price', array('type'=>'text', 'label' => false, 'div' => false, 'class' => 'span6 number')); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="span1 text-bold">Giá 2 năm</div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.price2y', array('type'=>'text', 'label' => false, 'div' => false, 'class' => 'span6 number')); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="span1 text-bold">Giá 3 năm </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.price3y', array('type'=>'text', 'label' => false, 'div' => false, 'class' => 'span6 number')); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="span1 text-bold">Giá 4 năm </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.price4y', array('type'=>'text', 'label' => false, 'div' => false, 'class' => 'span6 number')); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="span1 text-bold">Giá 5 năm </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.price5y', array('type'=>'text', 'label' => false, 'div' => false, 'class' => 'span6 number')); ?>
                </div>
            </div>


            <div class="control-group">
                <div class="span1 text-bold">Trạng thái </div>
                <div class="span9">
                    <?php echo $this->Form->input('Node.status', array('label' => false, 'div' => false, 'type' => 'select', 'class' => 'span3', 'options' => array('1' => 'Xuất bản', '0' => 'Tạm lưu'), 'value' => 1)); ?>
                </div>
            </div>

      <?php /*    
            <div class="control-group">
                <div class="span1 text-bold">Nội dung </div>
                <div class="span9 news_content_ckeditor">
                    <?php
                    $CKEditor = new CKEditor();
                    $CKEditor->config['width'] = '740';
                    $CKEditor->config['height'] = '180';
                    CKFinder::SetupCKEditor($CKEditor);

                    $initialValue = $this->data[$tbl]['content'];
                    echo $CKEditor->editor("data[".$tbl."][content]", $initialValue, "extra");
                    ?>
                </div>
            </div>   
            <div class="control-group">
                <div class="span1 text-bold">SEO Title </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.seo_title', array('type'=>'text', 'div'=>false, 'label'=>false, 'class'=>'span10')); ?>
                </div>
            </div> 

            <div class="control-group">
                <div class="span1 text-bold">SEO Keywords</div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.seo_keyword', array('type' => 'text', 'maxlength' => 120, 'div' => false, 'label' => false, 'class' => 'span11 news_keyword')); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="span1 text-bold">SEO Description</div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.seo_description', array('type' => 'textarea', 'maxlength' => 120, 'div' => false, 'label' => false, 'class' => 'span9 news_description', 'rows' => 2)); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="span1 text-bold">Focus Keywords</div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.focus_keyword', array('type' => 'text', 'maxlength' => 120, 'div' => false, 'label' => false, 'class' => 'span3 forcus_key')); ?>
                    <span class="SeoStatus">
                        <span>Thông tin chuẩn SEO : </span>
                        <span class="SeoStatusTitle">Tiêu đề</span>,
                        <span class="SeoStatusDescription  text-center">Mô tả</span>,
                        <span class="SeoStatusContent  text-center">Nội dung</span>
                    </span>
                </div>
            </div>
*/ ?>
            <div class="control-group">
                <div class="span1 text-bold">&nbsp;</div>
                <div class="span8">
                    <input type="submit" name="submit" value="Hoàn tất" class="btn btn-primary" />
                    <input type="reset" name="reset" value="Làm lại" class="btn" />
                </div>
            </div>  
        </div>
    </form>
</div>
<?php /*
<script type="text/javascript">
    $('.change_slug').click(function() {
        var name = $('.node_title').val();
        $.ajax({
            url: "<?php echo DOMAINAD; ?>admin_node/get_slug/?t=" + name,
            type: 'GET',
            dataType: 'html',
            cache: false,
            success: function(data) {
                $('.custome_slug').val(data);
            },
            error: function() {}
        });
    });

    $('.dated').datepicker({format: 'yyyy-mm-dd'});

    check();
    $('.forcus_key').keyup(function () {
        check();
    });

    function check()
    {
        var v = $('.forcus_key').val();
        var arr = new Array();
        arr = v.split(' ');
        if (arr.length < 2)
            return false;

        var title = $('.node_title').val();
        var des = $('.news_description').val();
        var content = CKEDITOR.instances["data[News][content]"].getData();

        if (searchText(v, title) == 1)
            $('.SeoStatusTitle').addClass('valid-seo');
        else
            $('.SeoStatusTitle').removeClass('valid-seo');


        if (searchText(v, des) == 1)
            $('.SeoStatusDescription').addClass('valid-seo');
        else
            $('.SeoStatusDescription').removeClass('valid-seo');


        if (searchText(v, content) == 1)
            $('.SeoStatusContent').addClass('valid-seo');
        else
            $('.SeoStatusContent').removeClass('valid-seo');
    }

    function searchText(key, text)
    {
        if (key.length <= 0 || text.length <= 0)
            return 0;

        var regExp = new RegExp(key, 'i');

        if (regExp.test(text))
        {
            return 1;
        }

        return 0;
    }

    //Kiểm tra độ dài text
    $('.node_title').maxlength({
        alwaysShow: true,
        threshold: 10,
        warningClass: "label label-info",
        limitReachedClass: "label label-warning",
        placement: 'top',
        message: 'Đã dùng %charsTyped% / %charsTotal% ký tự.'
    });

    $('.news_keyword').maxlength({
        alwaysShow: true,
        threshold: 10,
        warningClass: "label label-info",
        limitReachedClass: "label label-warning",
        placement: 'top',
        message: 'Đã dùng %charsTyped% / %charsTotal% ký tự.'
    });


    //Kiểm tra trùng lặp tiêu đề
    var is_sendding_request = false;

    setInterval(function() {
        check();
        if (is_sendding_request == false)
        {
            var v = $('.node_title').val();
            var n = v.length;
            var url = "<?php echo DOMAINAD; ?>admin_node/check_exits_news/" + v + "/" + <?php echo $this->data['Node']['id'] ?>;

            if (n >= 4)
            {
//            alert('data');
                is_sendding_request = true;
                $.ajax({
                    url: url,
                    cache: false,
                    dataType: "html",
                    success: function (data) {
                        if (data == "1")
                            $('#response_msg').html("<div style='color: red; font-weight: bold; margin-top: 15px;'>Tiêu đề đã tồn tại !!!</div>");
                        else
                            $('#response_msg').html("");
                        
                        is_sendding_request = false;
                    },
                    error: function () {
                        is_sendding_request = false;
                    }
                });
            }
            
            return false;
        }
    }, 3000);
</script>*/ ?>