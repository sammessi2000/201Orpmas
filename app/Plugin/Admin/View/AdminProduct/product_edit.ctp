<?php 
$title = $lang != 'vi' ? 'title_' . $lang : 'title'; 
$description = $lang != 'vi' ? 'description_' . $lang : 'description'; 
$content = $lang != 'vi' ? 'content_' . $lang : 'content'; 
$tenkhoahoc_lotrinh = $lang != 'vi' ? 'tenkhoahoc_lotrinh_' . $lang : 'tenkhoahoc_lotrinh'; 

$att1 = $lang != 'vi' ? 'att1_' . $lang : 'att1'; 
$att2 = $lang != 'vi' ? 'att2_' . $lang : 'att2'; 
$att3 = $lang != 'vi' ? 'att3_' . $lang : 'att3'; 

$content1 = $lang != 'vi' ? 'content1_' . $lang : 'content1'; 
$content2 = $lang != 'vi' ? 'content2_' . $lang : 'content2'; 
$content3 = $lang != 'vi' ? 'content3_' . $lang : 'content3'; 

$att1 = $lang != 'vi' ? 'att1_' . $lang : 'att1'; 
?>


<form action="" method="post" class="form-horizontal form-main">
    <div id="main">
        <div class="container-fluid">
            <?php echo $this->Admin->admin_head('Sửa sản phẩm'); ?>
            <?php echo $this->Admin->admin_breadcrumb('Sửa sản phẩm'); ?>

            <?php echo $this->Session->flash(); ?>

            <?php if($multiple_lang == true) : ?>
            <div class="lang">
                <a href="<?php echo $url_here; ?>?lang=vi" <?php if($lang == 'vi') echo 'class="active"'; ?>><i
                        class="icon icon-vi"></i> Tiếng Việt</a>
                <a href="<?php echo $url_here; ?>?lang=en" <?php if($lang == 'en') echo 'class="active"'; ?>><i
                        class="icon icon-en"></i> Tiếng Anh</a>
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
                                <a href="#tab1" class="active"><i class="icon-inbox"></i> Thông tin sản phẩm</a>
                            </li>
                            <!--       <li class="">
                <a href="#tab2"><i class="icon-lock"></i> Nâng cao</a>
            </li> -->
                        </ul>
                    </div>

                    <div id="tab1" class="tab-body">
                        <div class="control-group">
                            <label class="control-label">Tiêu đề</label>
                            <div class="controls">
                                <?php echo $this->Form->input('Node.' . $title, array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span8 news_title', 'required')); ?>
                                <div class="msg" id="response_msg"></div>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Mã sản phẩm</label>
                            <div class="controls">
                                <?php echo $this->Form->input('Product.code',array('type'=>'text','label'=>false,'div'=>false,'class'=>'span3' ,'required')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="control-label">Slug </div>
                            <div class="controls">
                                <?php echo $this->Form->input('Node.slug', array('type'=>'text', 'div'=>false, 'label'=>false, 'class'=>'custome_slug span8')); ?>
                                <span class="btn btn-warning change_is_good_slug">Cập nhật</span>
                            </div>
                        </div>

                        <script>
                            $('.change_is_good_slug').click(function(){
                                var slug = $('input[name="data[Product][code]"]').val();
                                $('input[name="data[Node][slug]"]').val('san-pham-' + slug);
                            })
                        </script>


                        <div class="control-group">
                            <label class="control-label">Mục lục</label>
                            <div class="controls">
                                <?php echo $this->Form->input('category_id', array('type'=>'select','label'=>false,'div'=>false, 'options'=>$category_tree, 'style'=>'height: 200px;', 'multiple' => true, 'required', 'selected'=>$cat_selected)); ?>
                            </div>
                        </div>

                        <!-- <div class="control-group">
                <label class="control-label">Lĩnh vực</label>
                <div class="controls">
                    <?php echo $this->Form->input('Product.agency_id', array('type'=>'select','label'=>false,'div'=>false, 'options'=>$agencies)); ?>
                </div>
            </div>  -->
            <?php /*
                        <div class="row-fluid multi-thuoctinh">
                            <?php
                $tt = 0; 
                $att = $this->data['Product'][$att1];
                $att_data=array();
                
                if($att != '' && $this->App->is_valid_json($att))
                { 
                    $att_data = json_decode($att);
            ?>


                            <?php foreach($att_data as $v) { ?>
                            <div class="control-group img<?php echo $tt; ?>">
                                <label class="control-label">Thuộc tính: </label>
                                <div class="controls">
                                    Tên:
                                    <input type="text"
                                        name="data[Thuoctinh][<?php echo $att1; ?>][<?php echo $tt; ?>][ten]"
                                        class="span3" value="<?php echo $v->ten; ?>" />
                                    Giá trị:
                                    <textarea
                                        name="data[Thuoctinh][<?php echo $att1; ?>][<?php echo $tt; ?>][giatri]"><?php echo $v->giatri; ?></textarea>
                                   
                    Giá niêm yết: 
                    <input type="text" name="data[Thuoctinh][<?php echo $att1; ?>][<?php echo $tt; ?>][niemyet]"
                                    class="span2" value="<?php echo isset($v->niemyet) ? $v->niemyet : ''; ?>" />
                                    
                                    &nbsp; <span class="delete_this_tt"
                                        alt=".img<?php echo $tt; ?>"><em>(Xóa)</em></span>
                                </div>
                            </div>
                            <?php $tt++; } ?>
                            <?php } ?>
                        </div>

                        <input type="hidden" name="flag_thuoctinh" id="flag_thuoctinh" value="<?php echo $tt; ?>" />

                        <div class="control-group">
                            <label class="control-label">&nbsp;</label>
                            <div class="controls">
                                <span class="btn btn-warning add-more-thuoctinh">Thêm Thông số kỹ thuật</span>
                            </div>
                        </div>
*/ ?>
                        <div class="control-group">
                            <label class="control-label">Ảnh đại diện</label>
                            <div class="controls">
                                <div class="thumbnail-preview thumbnail image"></div>
                                <?php echo $this->Form->input('Product.image', array('type'=>'text','label'=>false,'div'=>false, 'id'=>'image', 'class'=>'span6 image_preview')); ?>
                                <input type="button" class="btn btn-success" onclick="file_manager('image');"
                                    value="Chọn ảnh"> &nbsp;(.jpg, .gif, .png, .swf)
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <?php /*
        <div class="control-group">
            <label class="control-label">Banner đầu trang</label>
            <div class="controls">
                <div class="thumbnail-preview thumbnail image4"></div>
                <?php echo $this->Form->input('Product.image4', array('type'=>'text','label'=>false,'div'=>false, 'id'=>'image4', 'class'=>'span6 image_preview')); ?>
                        <input type="button" class="btn btn-success" onclick="file_manager('image4');" value="Chọn ảnh">
                        &nbsp;(.jpg, .gif, .png, .swf)
                    </div>
                </div>

                <div class="clearfix"></div>


                <div class="control-group">
                    <label class="control-label">Banner giới thiệu</label>
                    <div class="controls">
                        <div class="thumbnail-preview thumbnail image3"></div>
                        <?php echo $this->Form->input('Product.image3', array('type'=>'text','label'=>false,'div'=>false, 'id'=>'image3', 'class'=>'span6 image_preview')); ?>
                        <input type="button" class="btn btn-success" onclick="file_manager('image3');" value="Chọn ảnh">
                        &nbsp;(.jpg, .gif, .png, .swf)
                    </div>
                </div>

                <div class="clearfix"></div>

                <!--  <div class="control-group no-margin-bottom">
                <label class="control-label">&nbsp;</label>
                <div class="controls">
                    <div class="row-fluid multi-images">
                    <?php 
                        $num = 0;
                        if(is_array($images) && count($images) > 0)
                        {
                            foreach($images as $v)
                            {
                                $str = '';
                                $str .= '<div class="control-group multi-image-item img' . $num . '">';
                                $str .= '<div class="thumbnail-preview img' . $num . ' image"></div>';
                                $str .= '<div class="act">';
                                $str .= '<input type="text" name="data[Images][' . $num . ']" id="img' . $num . '" class="span6 image_preview" value="' . $v['Image']['image'] . '" /> ';
                                $str .= '<input type="button" class="btn btn-success" onclick="file_manager(\'img' . $num . '\');" value="Chọn ảnh">';
                                $str .= ' &nbsp; <span class="delete_this_img" alt=".img' . $num . '"><em>(Xóa)</em></span>';
                                $str .= '</div>';
                                $str .= '</div>';
                                
                                echo $str;
                                
                                $num++;
                            }
                        }
                    ?>
                    </div>
                </div>
            </div>
        
            <input type="hidden" name="flag_number" id="flag_number" value="<?php echo $num; ?>" /> 

            <div class="control-group">
                <label class="control-label">&nbsp;</label>
                <div class="controls">
                    <span class="btn btn-warning add-more-image">Thêm ảnh</span>
                </div>
            </div> -->


                <div class="control-group">
                    <label class="control-label">Tiêu đề giới thiệu</label>
                    <div class="controls">
                        <?php echo $this->Form->input('Product.tong_sobuoi', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span10')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Nội dung giới thiệu</label>
                    <div class="controls">
                        <?php
                        $CKEditor = new CKEditor();
                        $CKEditor->config['width'] = '740';
                        $CKEditor->config['height'] = '120';
                        CKFinder::SetupCKEditor($CKEditor);

                        $initialValue = $this->data['Product']['buoi_tuan'];
                        echo $CKEditor->editor("data[Product][buoi_tuan]", $initialValue, "extra");
                    ?>

                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Tiêu đề lý do</label>
                    <div class="controls">
                        <?php echo $this->Form->input('Product.hv_1lop', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span10')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Mô tả lý do</label>
                    <div class="controls">
                        <?php
                        $CKEditor = new CKEditor();
                        $CKEditor->config['width'] = '740';
                        $CKEditor->config['height'] = '120';
                        CKFinder::SetupCKEditor($CKEditor);

                        $initialValue = $this->data['Product']['buoi_gvbn'];
                        echo $CKEditor->editor("data[Product][buoi_gvbn]", $initialValue, "extra");
                    ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Nội dung lý do</label>
                    <div class="controls">
                        <?php
                        $CKEditor = new CKEditor();
                        $CKEditor->config['width'] = '740';
                        $CKEditor->config['height'] = '120';
                        CKFinder::SetupCKEditor($CKEditor);

                        $initialValue = $this->data['Product']['buoi_gvvn'];
                        echo $CKEditor->editor("data[Product][buoi_gvvn]", $initialValue, "extra");
                    ?>
                    </div>
                </div>



                <!--    <div class="control-group">
                <label class="control-label">Bảo hành</label>
                <div class="controls">
                    <?php echo $this->Form->input('Product.baohanh', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span2')); ?>
                    tháng
                </div>
            </div>
 -->
                <!-- 
            <div class="control-group">
                <label class="control-label">Tình trạng</label>
                <div class="controls">
                    <?php echo $this->Form->input('Product.status', array('type'=>'select','label'=>false,'div'=>false, 'options'=>$status)); ?>
                </div>
            </div>  -->


                <!--     <div class="control-group">
                <label class="control-label">Tiết kiệm</label>
                <div class="controls">
                    <?php echo $this->Form->input('Product.selloff', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span2')); ?> %
                </div>
            </div> 
          

                <div class="control-group">
                <label class="control-label">Giá bán</label>
                <div class="controls">
                    <?php echo $this->Form->input('Product.price', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span3 number')); ?>
                </div>
            </div> 
        
            <div class="control-group">
                <label class="control-label">Giá niêm yết</label>
                <div class="controls">
                    <?php echo $this->Form->input('Product.price_off',array('type'=>'text','label'=>false,'div'=>false,'class'=>'span3 number')); ?>
                </div>
            </div> 

                <div class="control-group">
                    <label class="control-label">Mô tả </label>
                    <div class="controls">
                        <?php
                    $CKEditor = new CKEditor();
                    $CKEditor->config['width'] = '740';
                    $CKEditor->config['height'] = '120';
                    CKFinder::SetupCKEditor($CKEditor);

                    $initialValue = $this->data['Product'][$description];
                    echo $CKEditor->editor("data[Product][".$description."]", $initialValue, "extra");
                    ?>

                    </div>
                </div>
*/ ?>

            <div class="control-group">
                <label class="control-label">Chi tiết </label>
                <div class="controls">
                    <?php
                $CKEditor = new CKEditor();
                $CKEditor->config['width'] = '740';
                $CKEditor->config['height'] = '120';
                CKFinder::SetupCKEditor($CKEditor);

                $initialValue = $this->data['Product'][$content];
                echo $CKEditor->editor("data[Product][".$content."]", $initialValue, "extra");
                ?>
                </div>
            </div>

                <!-- 
            <div class="control-group">
                <label class="control-label">Khuyến mại thêm </label>
                <div class="controls">
                    <?php echo $this->Form->input('Product.khuyenmai', array('type' => 'textarea', 'div' => false, 'label' => false, 'class' => 'span10', 'rows' => 6)); ?>
                </div>
            </div> 
 -->
                <!--  <div class="control-group">
                <label class="control-label">Tags </label>
                <div class="controls">
                    <?php
                    $str_tag = "";
                    if(is_array($data_tags) && count($data_tags) > 0)
                    {
                        foreach($data_tags as $v)
                            $str_tag .= $v['Node']['title'] . ', ';
                    }

                    $str_tag = trim($str_tag, ', ');
                    echo $this->Form->input('Product.tags', array('type' => 'textarea', 'div' => false, 'label' => false, 'class' => 'span11', 'rows' => 3, 'cols' => false, 'value'=>$str_tag));
                    ?>
                </div>
            </div>   -->

                <div class="control-group">
                    <div class="control-label">Seo Title </div>
                    <div class="controls">
                        <?php echo $this->Form->input('Product.seo_title', array('type'=>'text', 'div'=>false, 'label'=>false, 'class'=>'span10')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">SEO Keywords</label>
                    <div class="controls">
                        <?php echo $this->Form->input('Product.seo_keyword', array('type' => 'text', 'maxlength' => 120, 'div' => false, 'label' => false, 'class' => 'span10 news_keyword')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">SEO Description</label>
                    <div class="controls">
                        <?php echo $this->Form->input('Product.seo_description', array('type' => 'textarea', 'maxlength' => 120, 'div' => false, 'label' => false, 'class' => 'span10 news_description', 'rows' => 2)); ?>
                    </div>
                </div>

            </div><!-- end tab 1 -->

            <div id="tab2" class="tab-body hide">
                <?php if(count($filters) > 0) { ?>
                <?php foreach($filters as $k=>$v) { ?>
                <div class="control-group filter-group">
                    <label class="control-label"><?php echo $v['title']; ?></label>
                    <div class="controls">
                        <?php if(count($v['data']) > 0) { ?>
                        <?php foreach($v['data'] as $filter_item) { ?>
                        <div class="item">
                            <?php
                                    $value = $filter_item['id'];
                                    $checked = in_array($filter_item['id'], $filter_selected) ? 'checked="checked"' : '';
                                ?>
                            <input type="checkbox" name="filters[]" <?php echo $checked; ?>
                                value="<?php echo $value; ?>" />
                            <?php echo $filter_item['title']; ?>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
            </div>
            <!-- end tab2 -->

        </div>

        <div class="control-group">
            <label class="control-label">&nbsp;</label>
            <div class="controls">
                <input type="submit" name="submit" value="Lưu" class="btn btn-primary" />
            </div>
        </div>

    </div>
    </div>
    </div>

    </div>
    </div>
</form>

<script>
jQuery('.dated').datetimepicker({
    format: 'Y/m/d H:i',
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
    str += '<input type="text" name="data[Images][' + num + ']" id="img' + num +
        '" class="span6 image_preview" /> ';
    str += '<div class="act">';
    str += '<input type="button" class="btn btn-success" onclick="file_manager(\'img' + num +
        '\');" value="Chọn ảnh">';
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

$('.delete_this_img').on('click', function() {
    var cls = $(this).attr('alt');
    $(cls).remove();
    var num = $('#flag_number').val();
    return false;
});


$('.add-more-thuoctinh').click(function() {
    var num = $('#flag_thuoctinh').val();
    var str = '';
    str += '<div class="control-group img' + num + '">';
    str += '<label class="control-label">Thuộc tính: </label>';
    str += '<div class="controls">';
    str += 'Tên: ';
    str += '<input type="text" name="data[Thuoctinh][<?php echo $att1; ?>][' + num +
        '][ten]" class="span3" /> ';
    str += 'Giá trị: ';
    str += '<textarea name="data[Thuoctinh][<?php echo $att1; ?>][' + num +
        '][giatri]" class="span6"></textarea> ';
    // str += '<input type="text" name="data[Thuoctinh][<?php echo $att1; ?>][' + num + '][giatri]" class="span6" /> ';
    /*
    str += 'Giá niêm yết: ';
    str += '<input type="text" name="data[Thuoctinh][<?php echo $att1; ?>][' + num + '][niemyet]" class="span2 number" /> ';
    */
    str += ' &nbsp; <span class="delete_this_tt" alt=".img' + num + '"><em>(Xóa)</em></span>';
    str += '</div>';
    str += '</div>';

    $('#flag_thuoctinh').val(Number(num) + 1);

    $('.multi-thuoctinh').append(str);

    $('.number').number(true, 0);

    $('.delete_this_tt').on('click', function() {
        var cls = $(this).attr('alt');
        $(cls).remove();
        var num = $('#flag_thuoctinh').val();
        return false;
    });
});


$('.delete_this_tt').on('click', function() {
    var cls = $(this).attr('alt');
    $(cls).remove();
    var num = $('#flag_thuoctinh').val();
    return false;
});
//Kiểm tra trùng lặp tiêu đề
var is_sendding_request = false;

// setInterval(function() {
//     if (is_sendding_request == false)
//     {
//         var v = $('.node_title').val();
//         var n = v.length;
//         var ex = "<?php echo $this->data['Node']['id']; ?>";
//         var url = "<?php echo DOMAINAD; ?>admin_node/check_exits_news/" + v + "/" + ex;

//         if (n >= 4)
//         {
//             is_sendding_request = true;
//             $.ajax({
//                 url: url,
//                 cache: false,
//                 dataType: "html",
//                 success: function (data) {
//                     if (data == "1")
//                         $('#response_msg').html("<div style='color: red; font-weight: bold; margin-top: 15px;'>Tiêu đề đã tồn tại !!!</div>");
//                     else
//                         $('#response_msg').html("");

//                     is_sendding_request = false;
//                 },
//                 error: function () {
//                     is_sendding_request = false;
//                 }
//             });
//         }

//         return false;
//     }
// }, 3000);
</script>