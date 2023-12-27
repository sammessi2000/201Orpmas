<?php 
$title = $lang != 'vi' ? 'title_' . $lang : 'title'; 
$description = $lang != 'vi' ? 'description_' . $lang : 'description'; 
$content = $lang != 'vi' ? 'content_' . $lang : 'content'; 
?>


<div class="navbar margin-none">
    <div class="navbar-inner radius-none">
        <a class="brand" href="#">Sửa thông tin sản phẩm</a>
    </div>
    <?php if($multiple_lang == true) : ?>
        <div class="lang">
            <a href="<?php echo $url_here; ?>?lang=vi" <?php if($lang == 'vi') echo 'class="active"'; ?>><i class="icon icon-vi"></i> Tiếng Việt</a>
            <a href="<?php echo $url_here; ?>?lang=en" <?php if($lang == 'en') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Anh</a>
            <a href="<?php echo $url_here; ?>?lang=jp" <?php if($lang == 'jp') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Nhật</a>
        </div>
    <?php endif; ?>
</div>

<div class="clearfix"></div>

<div class="well bg-white radius-none">    

    <span class="text-error"><h4><?php echo $this->Session->flash(); ?></h4></span>
    <form action="" method="post" class="form-horizontal">
       <div class="control-group">
          <label class="control-label">Tiêu đề</label>
          <div class="controls">
            <?php echo $this->Form->hidden('Node.title'); ?>
            <?php echo $this->Form->input('Node.' . $title, array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span8 node_title')); ?>
            <?php echo $this->Form->hidden('Node.id'); ?>
             <div class="msg" id="response_msg"></div>
         </div>
     </div>
            

            
        <div class="control-group">
            <div class="control-label">Slug </div>
            <div class="controls">
                <?php echo $this->Form->input('Node.slug', array('type'=>'text', 'div'=>false, 'label'=>false, 'class'=>'custome_slug span8')); ?>
                <span class="btn btn-warning change_slug">Cập nhật</span>
            </div>
        </div> 

<div class="control-group">
  <label class="control-label">Mục lục</label>
  <div class="controls">
    <?php echo $this->Form->input('category_id', array('type'=>'select','label'=>false,'div'=>false, 'options'=>$category_tree, 'style'=>'height: 200px;', 'multiple' => true, 'selected' => $cat_selected)); ?>
</div>
</div>

<div class="row-fluid multi-images">
    <div class="control-group">
        <label class="control-label">Ảnh đại diện</label>
        <div class="controls">
            <?php echo $this->Form->input('Collection.image', array('type'=>'text','label'=>false,'div'=>false, 'id'=>'ss', 'class'=>'span6')); ?>
            <input type="button" class="btn btn-success" onclick="file_manager('ss');" value="Chọn ảnh"> &nbsp;(.jpg, .gif, .png, .swf) 
        </div>
    </div>

    <?php 
    $num = 0;
    if(isset($images) && is_array($images) && count($images) > 0)
    {
        foreach($images as $v)
        {
            $str = '';
            if($v != '')
            {
                $str .= '<div class="control-group img' . $num . '">';
                $str .= '<label class="control-label">&nbsp;</label>';
                $str .= '<div class="controls">';
                $str .= '<input type="text" name="data[Images][' . $num . ']" id="img' . $num . '" class="span6" value="' . $v . '" /> ';
                $str .= '<input type="button" class="btn btn-success" onclick="file_manager(\'img' . $num . '\');" value="Chọn ảnh">';
                $str .= ' &nbsp; <span class="delete_this_img" alt=".img' . $num . '"><em>(Xóa)</em></span>';
                $str .= '</div>';
                $str .= '</div>';

                $num++;
            }

            echo $str;

        }
    } 
    ?>
</div>



<input type="hidden" name="flag_number" id="flag_number" value="<?php echo $num; ?>" />

<div class="control-group">
    <label class="control-label">&nbsp;</label>
    <div class="controls">
        <span class="btn btn-warning add-more-image">Thêm ảnh khác</span>            
        <em><small>(Hình ảnh được thêm sẽ hiển thị dạng Slider trong trang sản phẩm)</small></em>
    </div>
</div>

<div class="control-group">
    <label class="control-label">Chủ đầu tư</label>
    <div class="controls">
        <?php echo $this->Form->input('Collection.chudautu', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
    </div>
</div>

<div class="control-group">
    <label class="control-label">Loại hình</label>
    <div class="controls">
        <?php echo $this->Form->input('Collection.loaihinh', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
    </div>
</div>

<div class="control-group">
    <label class="control-label">Mặt tiền</label>
    <div class="controls">
        <?php echo $this->Form->input('Collection.mattien', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
    </div>
</div>

<div class="control-group">
    <label class="control-label">Công năng</label>
    <div class="controls">
        <?php echo $this->Form->input('Collection.congnang', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
    </div>
</div>

<div class="control-group">
    <label class="control-label">Đơn vị thiết kế</label>
    <div class="controls">
        <?php echo $this->Form->input('Collection.donvitk', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
    </div>
</div>

<div class="control-group">
    <label class="control-label">Năm thực hiện</label>
    <div class="controls">
        <?php echo $this->Form->input('Collection.namthuchien', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
    </div>
</div>

<div class="control-group">
    <label class="control-label">Địa chỉ</label>
    <div class="controls">
        <?php echo $this->Form->input('Collection.diachi', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
    </div>
</div>

<div class="control-group">
    <label class="control-label">Số tầng</label>
    <div class="controls">
        <?php echo $this->Form->input('Collection.sotang', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
    </div>
</div>

<div class="control-group">
    <label class="control-label">Diện tích</label>
    <div class="controls">
        <?php echo $this->Form->input('Collection.dientich', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
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

        $initialValue = $this->data['Collection'][$description];
        echo $CKEditor->editor("data[Collection][".$description."]", $initialValue, "extra");
        ?>
    </div>
</div> 

<div class="control-group">
    <label class="control-label">Nội dung</label>
    <div class="controls news_content_ckeditor">
        <?php
        $CKEditor = new CKEditor();
        $CKEditor->config['width'] = '740';
        $CKEditor->config['height'] = '200';
        CKFinder::SetupCKEditor($CKEditor);

        $initialValue = $this->data['Collection'][$content];
                    echo $CKEditor->editor("data[Collection][".$content."]", $initialValue, "extra");
        ?>
    </div>
</div>
        
        
<div class="control-group">
        <div class="control-label">Seo Title </div>
        <div class="controls">
            <?php echo $this->Form->input('Collection.seo_title', array('type'=>'text', 'div'=>false, 'label'=>false, 'class'=>'span10')); ?>
        </div>
    </div>
        
<div class="control-group">
    <label class="control-label">SEO Keywords</label>
    <div class="controls">
        <?php echo $this->Form->input('Collection.seo_keyword', array('type' => 'text', 'maxlength' => 120, 'div' => false, 'label' => false, 'class' => 'span10 news_keyword')); ?>
    </div>
</div>

<div class="control-group">
    <label class="control-label">SEO Description</label>
    <div class="controls">
        <?php echo $this->Form->input('Collection.seo_description', array('type' => 'textarea', 'maxlength' => 120, 'div' => false, 'label' => false, 'class' => 'span10 news_description', 'rows' => 2)); ?>
    </div>
</div>

<div class="control-group">
  <label class="control-label">&nbsp;</label>
  <div class="controls">
     <input type="submit" name="submit" value="Xác nhận" class="btn btn-primary" />
 </div>
</div>
</form>
</div>

<script>
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
$('.add-more-image').click(function() {
    var num = $('#flag_number').val();
    var str = '';
    str += '<div class="control-group img' + num + '">';
    str += '<label class="control-label">&nbsp;</label>';
    str += '<div class="controls">';
    str += '<input type="text" name="data[Images][' + num + ']" id="img' + num + '" class="span6" /> ';
    str += '<input type="button" class="btn btn-success" onclick="file_manager(\'img' + num + '\');" value="Chọn ảnh">';
    str += ' &nbsp; <span class="delete_this_img" alt=".img' + num + '"><em>(Xóa)</em></span>';
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




$('.add-more-size').click(function() {
    var num = $('#flag_number_size').val();
    var str = '';
    str += '<div class="control-group size'+num+'">';
    str += '<label class="control-label">Size</label>';
    str += '<div class="controls">';
    str += '<input type="text" name="data[Size]['+num+']" value="" class="span1" required="required" />';
    str += '&nbsp; &nbsp; ';
    str += 'Giá: ';
    str += '<input type="text" name="data[Price]['+num+']" value="" class="number span3" required="required" />';
    str += ' &nbsp; <span class="delete_this_size" alt=".size' + num + '"><em>(Xóa)</em></span>';
    str += '</div>';
    str += '</div>';
    
    $('#flag_number_size').val(Number(num) + 1);
    
    $('.multi-sizes').append(str);
    $('.number').number(true, 0);

    $('.delete_this_size').on('click', function() {
        var cls = $(this).attr('alt');
        $(cls).remove();
        var num = $('#flag_number_size').val();
        return false;
    });
});

$('.delete_this_size').on('click', function() {
        var cls = $(this).attr('alt');
        $(cls).remove();
        var num = $('#flag_number_size').val();
        return false;
    });


    //Kiểm tra trùng lặp tiêu đề
    var is_sendding_request = false;

//     setInterval(function() {
//         if (is_sendding_request == false)
//         {
//             var v = $('.node_title').val();
//             var n = v.length;
//             var ex = "<?php echo $this->data['Node']['id']; ?>";
//             var url = "<?php echo DOMAINAD; ?>admin_node/check_exits_news/" + v + "/" + ex;
// console.log(url);
//             if (n >= 4)
//             {
//                 is_sendding_request = true;
//                 $.ajax({
//                     url: url,
//                     cache: false,
//                     dataType: "html",
//                     success: function (data) {
//                         if (data == "1")
//                             $('#response_msg').html("<div style='color: red; font-weight: bold; margin-top: 15px;'>Tiêu đề đã tồn tại !!!</div>");
//                         else
//                             $('#response_msg').html("");
                        
//                         is_sendding_request = false;
//                     },
//                     error: function () {
//                         is_sendding_request = false;
//                     }
//                 });
//             }
            
//             return false;
//         }
//     }, 3000);
</script>