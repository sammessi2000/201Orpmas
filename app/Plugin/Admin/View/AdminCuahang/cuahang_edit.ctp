<?php 
$title = $lang != 'vi' ? 'title_' . $lang : 'title'; 
$description = $lang != 'vi' ? 'description_' . $lang : 'description'; 
$content = $lang != 'vi' ? 'content_' . $lang : 'content'; 
?>

<div class="navbar margin-none">
    <div class="navbar-inner radius-none">
        <a href="#" class="brand">Thêm mới bài viết</a>
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
        <?php /*
            <div class="control-group">
                <div class="span1 text-bold">Tiêu đề </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.title', array('label' => false, 'div' => false, 'placeholder' => 'Tiêu đề bài viết', 'class' => 'span11 news_title', 'id' => 'news_title', 'maxlength' => '70', 'required')); ?>
                    <div class="clearfix"></div>
                    <div class="msg" id="response_msg"></div>
                </div>
            </div>
*/ ?>

            <div class="control-group">
                <div class="span1 text-bold">Tên </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.name', array('label' => false, 'div' => false, 'class' => 'span6')); ?>
                </div>
            </div>
<?php /*
            <div class="control-group">
                <div class="span1 text-bold">Tuổi </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.age', array('label' => false, 'div' => false, 'class' => 'span6')); ?>
                </div>
            </div>

*/ ?>

            <div class="control-group">
                <div class="span1 text-bold">Địa chỉ </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.address', array('label' => false, 'div' => false, 'class' => 'span6')); ?>
                </div>
            </div>




<?php /*
            <div class="control-group">
                <div class="span1 text-bold">Nghề nghiệp </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.nghenghiep', array('label' => false, 'div' => false, 'class' => 'span6')); ?>
                </div>
            </div>

            */ ?>

            <?php /*
            <div class="control-group">
                <div class="span1 text-bold">Mục lục </div>
                <div class="span9">
                    <?php echo $this->Form->input('category_id', array('label' => false, 'div' => false, 'required', 'class' => 'span6', 'options' => $category_tree, 'multiple' => true, 'style'=>'height: 200px;')); ?>
                </div>
            </div>
*/ ?>

<?php /*
            <div class="control-group">
                <div class="span1 text-bold">Trạng thái </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.status', array('label' => false, 'div' => false, 'type' => 'select', 'class' => 'span3', 'options' => array('1' => 'Xuất bản', '0' => 'Tạm lưu'), 'value' => 1)); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="span1 text-bold">Avatar </div>
                <div class="span9">
                    <?php echo $this->Form->input($tbl . '.image', array('label' => false, 'div' => false, 'class' => 'span6', 'id' => 'thumbnail', 'required')); ?>
                    <input type="button" class="btn btn-info" onclick="file_manager('thumbnail');" value="Chọn ảnh">
                </div>
            </div>
            */ ?>


<?php /*
            <div class="control-group">
                <div class="span1 text-bold">Tóm tắt </div>
                <div class="span9">
                    <?php
                    echo $this->Form->input($tbl . '.description', array('type' => 'textarea', 'div' => false, 'label' => false, 'class' => 'span11 news_description', 'rows' => 3, 'cols' => false, 'required'));
                    ?>
                </div>
            </div> 
            */ ?>


<?php /*
            <div class="control-group">
                <div class="span1 text-bold">Nội dung </div>
                <div class="span9 news_content_ckeditor">
                    <?php
                    $CKEditor = new CKEditor();
                    $CKEditor->config['width'] = '740';
                    $CKEditor->config['height'] = '180';
                    CKFinder::SetupCKEditor($CKEditor);

                    $initialValue = "";
                    echo $CKEditor->editor("data[".$tbl."][content]", $initialValue, "extra");
                    ?>
                </div>
            </div> 
            */ ?>



            <?php /*
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