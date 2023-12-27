
<style>
    .hidden-content {display: none;}
</style>

<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Thêm danh mục'); ?>
<?php echo $this->Admin->admin_breadcrumb('Thêm danh mục'); ?>

<?php echo $this->Session->flash(); ?>

<?php if($multiple_lang == true) : ?>
    <div class="lang">
        <a href="<?php echo $url_here; ?>?lang=vi" <?php if($lang == 'vi') echo 'class="active"'; ?>><i class="icon icon-vi"></i> Tiếng Việt</a>
        <a href="<?php echo $url_here; ?>?lang=en" <?php if($lang == 'en') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Anh</a>
        <!--<a href="<?php echo $url_here; ?>?lang=jp" <?php if($lang == 'jp') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Nhật</a>-->
        <!-- <a href="<?php echo $url_here; ?>?lang=cn" <?php if($lang == 'cn') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Trung</a> -->
        <!--<a href="<?php echo $url_here; ?>?lang=kr" <?php if($lang == 'kr') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Hàn</a>-->
    </div>
<?php endif; ?>

<div class="box">
<div class="box-content">
    <div class="tabs tab-list">
        <ul>
            <li>
                <a href="#tab1"  class="active"><i class="icon-inbox"></i> Thông tin chính</a>
            </li>
       <!--      <li class="">
                <a href="#tab2"><i class="icon-lock"></i> Gắn bộ lọc</a>
            </li> -->
        </ul>
    </div>

    <div id="tab1" class="tab-body">
        <div class="control-group">
            <label class="control-label text-error">Tên mục lục </label>
            <div class="controls">
                <?php echo $this->Form->input('Node.title', array('type' => 'text', 'label' => false, 'div' => false, 'required'=>'required', 'class'=>'news_title')); ?>
                <div class="clearfix"></div>
                <div class="msg" id="response_msg"></div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label text-error">Mục lục cha </label>
            <div class="controls">
                <?php
                    $value = isset($_GET['parent_id']) ? $_GET['parent_id'] : '';
                    echo $this->Form->input('Category.parent_id', array(
                        'options' => $category_tree,
                        'label' => false,
                        'div' => false,
                        'type' => 'select',
                        'empty' => '---Mục lục gốc---',
                        'value'=>$value
                    ));
                ?>
            </div>
        </div>
            
        <div class="control-group">
            <label class="control-label text-error">Kiểu mục lục </label>
            <div class="controls">
                <?php
                    $value = isset($_GET['type']) ? $_GET['type'] : '';
                    echo $this->Form->input('Category.type', array(
                        'options' => $category_type,
                        'label' => false,
                        'div' => false,
                        'type' => 'select',
                        'id'=>'select_type',
                        'empty' => '---Chọn kiểu mục lục---',
                        'required'=>'required',
                        'value'=>$value
                    ));
                ?>
            </div>
        </div>

        <div class="hidden-content content-link_inline">
            <div class="control-group">
                <label class="control-label">Bài viết cần link</label>
                <div class="controls">
                    <?php echo $this->Form->input('Category.link_inline', array('type' => 'text', 'label' => false, 'div' => false, 'class'=>'span8')); ?>
                    <br />
                    <em><i>Copy URL (link bài viết) vào ô bên trên hoặc mở Danh sách bài viết nhập ID bài viết (cột ID)</i></em>
                </div>
            </div>
        </div>
        
        <div class="hidden-content content-link">
            <div class="control-group">
                <label class="control-label">Nhập link </label>
                <div class="controls">
                    <?php echo $this->Form->input('Category.link', array('type' => 'text', 'label' => false, 'div' => false, 'class'=>'span5')); ?>
                </div>
            </div>
        </div>

        <div class="hidden-content content-page content-country_page">
            <div class="control-group">
                <label class="control-label">Mẫu giao diện page </label>
                <div class="controls">
                    <?php
                    echo $this->Form->input('Category.template', array(
                        'options' => $page_template,
                        'label' => false,
                        'div' => false,
                        'type' => 'select',
                        'id'=>'select_type',
                        'empty' => '---Mặc định---',
                    ));
                    ?>
                </div>
            </div>


            <div class="control-group">
                <label class="control-label">Tiêu đề Page</label>
                <div class="controls">
                    <?php echo $this->Form->input('Category.page_title', array('label' => false, 'div' => false, 'class'=>'span5')); ?>
                </div>
            </div>
                
            <div class="control-group">
                <label class="control-label">Nội dung Page</label>
                <div class="controls">
                    <?php
                    $CKEditor = new CKEditor();
                    $CKEditor->config['width'] = '600';
                    $CKEditor->config['height'] = '280';
                    CKFinder::SetupCKEditor($CKEditor);

                    $initialValue = '';
                    echo $CKEditor->editor("data[Category][content]", $initialValue, "extra");
                    ?>
                </div>
            </div> 
        </div>

        <div class="control-group">
            <label class="control-label">Trạng thái </label>
            <div class="controls">
                <lable class="radio inline">
                    <input type="radio" name="data[Node][status]" value="1" checked="checked" /> Hoàn thiện
                </lable>
                <lable class="radio inline">
                    <input type="radio" name="data[Node][status]" value="0" /> Tạm lưu
                </lable>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Hiển thị thanh menu </label>
            <div class="controls">
                <lable class="radio inline">
                    <input type="radio" name="data[Category][menu]" value="1"  checked="checked" /> Hiển thị
                </lable>
                <lable class="radio inline">
                    <input type="radio" name="data[Category][menu]" value="0" /> Không hiển thị
                </lable>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Hình ảnh</label>
            <div class="controls">
                    <div class="thumbnail-preview ss image"></div>
                    <?php echo $this->Form->input('Category.image', array('type'=>'text','label'=>false,'div'=>false, 'id'=>'ss', 'class'=>'span6 image_preview')); ?>
                    <input type="button" class="btn btn-success" onclick="file_manager('ss');" value="Chọn ảnh"> &nbsp;(.jpg, .gif, .png, .swf) 
            </div>
        </div>
    
        <div class="clearfix"></div>

        <div class="control-group no-margin-bottom">
            <label class="control-label">&nbsp;</label>
            <div class="controls">
                <div class="row-fluid multi-images">
                </div>
            </div>
        </div>
        
        <input type="hidden" name="flag_number" id="flag_number" value="0" />

        <div class="control-group">
            <label class="control-label">&nbsp;</label>
            <div class="controls">
                <span class="btn btn-warning add-more-image">Thêm ảnh</span>            
                <em><small>( Thêm ảnh Slider phía trên <strong>Danh sách</strong> sản phẩm )</small></em>
            </div>
        </div>
        
        <div class="clearfix"></div>

        <div class="control-group des">
            <label class="control-label">Chi tiết</label>
            <div class="controls">
                <?php
                $CKEditor = new CKEditor();
                $CKEditor->config['width'] = '600';
                $CKEditor->config['height'] = '80';
                CKFinder::SetupCKEditor($CKEditor);

                $initialValue = '';
                echo $CKEditor->editor("data[Category][description]", $initialValue, "extra");
                ?>
            </div>
        </div> 
                    
        <div class="control-group">
            <label class="control-label">SEO Title </label>
            <div class="controls">
                <?php echo $this->Form->input('Category.seo_title', array('type'=>'text', 'div'=>false, 'label'=>false, 'class'=>'span10')); ?>
            </div>
        </div> 

        <div class="control-group">
            <label class="control-label">SEO Keyword</label>
            <div class="controls">
                <?php
                echo $this->Form->input('Category.seo_keyword', array(
                    'label' => FALSE,
                    'div' => FALSE,
                    'type' => 'textarea',
                    'class' => 'span8 seo_description',
                    'cols' => FALSE,
                    'rows' => FALSE,
                ));
                ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">SEO Description</label>
            <div class="controls">
                <?php
                echo $this->Form->input('Category.seo_description', array(
                    'label' => FALSE,
                    'div' => FALSE,
                    'type' => 'textarea',
                    'class' => 'span8',
                    'cols' => FALSE,
                    'rows' => 4,
                ));
                ?>
            </div>
        </div>
    </div>
    <!-- end tab 1 -->

    <div id="tab2" class="tab-body hide">
    <div class="control-group">
            <label class="control-label"><strong>Liên kết Hãng</strong></label>
            <div class="controls setboloc">
                <ul>
                <?php $i = 0; foreach($hang_list as $hid=>$htitle) { $i++; ?>
                    <li>
                        <input type="checkbox"  name="lkHang[<?php echo $i; ?>]" value="<?php echo $hid; ?>" /> 
                        <span><?php echo $htitle; ?></span>
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><strong>Liên kết Bộ lọc</strong></label>
            <div class="controls setboloc">
                <ul>
                <?php $i = 0; foreach($filter_list as $fid=>$ftitle) { $i++; ?>
                    <li>
                        <input type="checkbox" name="lkBoloc[<?php echo $i; ?>]" value="<?php echo $fid; ?>" /> 
                        <span><?php echo $ftitle; ?></span>
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><strong>Bộ lọc Giá</strong></label>
            <div class="controls setboloc-noscroll">
                <textarea name="data[Product][filter_price]"></textarea>
            </div>
        </div>
    </div>
    <!-- end tab2 -->

    <div class="control-group">
        <label class="control-label">&nbsp;</label>
        <div class="controls">
            <input type="submit" name="submit" value="Xác nhận" class="btn btn-primary" />
        </div>
    </div>   

</div>
</div>
</div>

</div>
</div>

</form>

<script>
    $('.tab-list a').click(function() {
        var tab = $(this).attr('href');

        $('.tab-body').addClass('hide');
        $(tab).removeClass('hide');

        $('.tab-list li a').removeClass('active');
        $(this).addClass('active');

        return false;
    });

    $('.change_slug').click(function() {
        var name = $('.news_title').val();
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

    $('.add-more-image').click(function() {
        var num = $('#flag_number').val();
        var str = '';
            str += '<div class="control-group multi-image-item img' + num + '">';
            str += '<div class="thumbnail-preview img' + num + ' image"></div>';
            str += '<input type="text" name="data[Images][' + num + ']" id="img' + num + '" class="span6 image_preview" /> ';
            str += '<div class="act">';
            str += '<input type="button" class="btn btn-success" onclick="file_manager(\'img' + num + '\');" value="Chọn ảnh" />';
            str += '<span class="delete_this_img" alt=".img' + num + '"><em>(Xóa)</em></span>';
            str += '</div>';
            str += '</div>';
            
            
        $('#flag_number').val(Number(num) + 1);
        
        $('.multi-images').append(str);
           $('.delete_this_img').on('click', function() {
            var cls = $(this).attr('alt');
            $(cls).remove();
            var num = $('#flag_number').val();
            return false;
        });
    });
$('#select_type').change(function() {
        var v=$(this).val();
        droppage(v);
    });
    
    function droppage(v)
    {
        if(v=='product')
        {
            $('.custom-fields').removeClass('hide'); 

            var fields_as_root = 0;
            $('.fields_as_root').each(function() {
                if($(this).is(':checked'))
                    fields_as_root = $(this).val();
            });

//            console.log(fields_as_root);

            if(fields_as_root == '2')
                $('.custom-fields-data').removeClass('hide');
        }
        else
        {
            $('.custom-fields').addClass('hide'); 
            $('.custom-fields-data').addClass('hide');
        }

        if(v=='page')
        {
            $('.hidden-content').hide();
            $('.des').hide();
            $('.content-page').fadeIn(); 
            return false;
        }

        if(v=='news')
        {
            $('.des').show();
            return false;
        }

        if(v=='module')
        {
            $('.hidden-content').hide();
            $('.des').hide();
            $('.content-module').fadeIn(); 
            return false;
        }

        if(v=='link')
        {
            $('.hidden-content').hide();
            $('.des').hide();
            $('.content-link').fadeIn(); 
            return false;
        }

        if(v!='link' && v!='page' && v!= 'link_inline')
        {
            $('.hidden-content').fadeOut();
            return false;
        }
    }
    

    // check();
    // $('.forcus_key').keyup(function () {
    //     check();
    // });

    function check()
    {
        var v = $('.forcus_key').val();
        var arr = new Array();
        arr = v.split(' ');
        if (arr.length < 2)
            return false;

        var title = $('.news_title').val();
        var des = $('.seo_description').val();
        var content = CKEDITOR.instances["data[Category][description]"].getData();

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
    $('#select_type').change(function() {
        var v=$(this).val();
        
        if(v=='page')
        {
            $('.hidden-content').hide();
            $('.content-page').fadeIn(); 
            return false;
        }
        
        if(v=='link')
        {
            $('.hidden-content').hide();
            $('.content-link').fadeIn(); 
            return false;
        }
        
        if(v=='link_inline')
        {
            $('.hidden-content').hide();
            $('.content-link_inline').fadeIn(); 
            return false;
        }
        
        if(v!='link' && v!='page' && v!= 'link_inline')
        {
            $('.hidden-content').fadeOut();
            return false;
        }
    });

    //Kiểm tra trùng lặp tiêu đề
    var is_sendding_request = false;

    setInterval(function() {
        if (is_sendding_request == false)
        {
            var v = $('.news_title').val();
            var n = v.length;
            var url = "<?php echo DOMAINAD; ?>admin_node/check_exits_news/" + v + "/";

            if (n >= 4)
            {
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
</script>