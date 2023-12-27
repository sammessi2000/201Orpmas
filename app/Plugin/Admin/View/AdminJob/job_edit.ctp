<?php
	$url = "";
	if(isset($_GET['copy']) && $_GET['copy'] == 1)
		$url = DOMAINAD . 'admin_job/job_add/?copy=1';


    $yeucau = $lang != 'vi' ? 'yeucau_' . $lang : 'yeucau'; 
    $thongtin = $lang != 'vi' ? 'thongtin_' . $lang : 'thongtin'; 
    $hoso = $lang != 'vi' ? 'hoso_' . $lang : 'hoso'; 

    $title = $lang != 'vi' ? 'title_' . $lang : 'title'; 
    $thoihan = $lang != 'vi' ? 'thoihan_' . $lang : 'thoihan'; 

    $att3 = $lang != 'vi' ? 'att3_' . $lang : 'att3'; 
?>
<form action="<?php echo $url; ?>" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Sửa tuyển dụng'); ?>
<?php echo $this->Admin->admin_breadcrumb('Sửa tuyển dụng'); ?>

<?php echo $this->Session->flash(); ?>

<?php if($multiple_lang == true) : ?>
    <div class="lang">
        <a href="<?php echo $url_here; ?>?lang=vi" <?php if($lang == 'vi') echo 'class="active"'; ?>><i class="icon icon-vi"></i> Tiếng Việt</a>
        <a href="<?php echo $url_here; ?>?lang=en" <?php if($lang == 'en') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Anh</a>
        <a href="<?php echo $url_here; ?>?lang=cn" <?php if($lang == 'cn') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Trung</a>

        <!--<a href="<?php echo $url_here; ?>?lang=jp" <?php if($lang == 'jp') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Nhật</a>-->
        <!--<a href="<?php echo $url_here; ?>?lang=kr" <?php if($lang == 'kr') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Hàn</a>-->
    </div>
<?php endif; ?>

<div class="box">
<div class="box-content">
    <div class="control-group">
        <label class="control-label">Tiêu đề</label>
        <div class="controls">
            <?php echo $this->Form->input('Job.' . $title, array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>

            <?php 
                if($lang != 'vi') echo $this->Form->hidden('Job.title', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); 
                if($lang != 'cn') echo $this->Form->hidden('Job.title_cn', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); 
                if($lang != 'en') echo $this->Form->hidden('Job.title_en', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); 
            ?>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Số lượng</label>
        <div class="controls">
            <?php echo $this->Form->input('Job.soluong', array('type'=>'number','label'=>false,'div'=>false, 'class'=>'span2')); ?> người
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Mức lương</label>
        <div class="controls">
            <?php echo $this->Form->input('Job.luong', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span3')); ?>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Nơi làm việc</label>
        <div class="controls">
            <?php echo $this->Form->input('Job.noi_lam_viec', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span4')); ?>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Loại công việc</label>
        <div class="controls">
            <?php echo $this->Form->input('Job.loai_cong_viec', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span4')); ?>
        </div>
    </div>

    
    <div class="control-group">
        <label class="control-label">Hồ sơ mẫu</label>
        <div class="controls">
            <?php echo $this->Form->input('Job.hosomau', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6', 'id'=>'sfile')); ?>
            <input type="button" class="btn btn-success" onclick="file_manager('sfile');" value="File">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Thời hạn</label>
        <div class="controls">
            <?php echo $this->Form->input('Job.' . $thoihan, array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>

            <?php 
                if($lang != 'vi') echo $this->Form->hidden('Job.thoihan', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); 
                if($lang != 'cn') echo $this->Form->hidden('Job.thoihan_cn', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); 
                if($lang != 'en') echo $this->Form->hidden('Job.thoihan_en', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); 
            ?>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label">Thông tin chung</label>
        <div class="controls thongtins">
            <?php
                $tt = 0; 
                $att = $this->data['Job'][$thongtin];
                $att_data=array();
                
                if($att != '' && $this->App->is_valid_json($att))
                { 
                    $att_data = json_decode($att);
            ?>

            <?php foreach($att_data as $v) { ?>
                <div class="control-group thongtin<?php echo $tt; ?>">
                    Tên: 
                    <input type="text" name="data[Thongtin][<?php echo $thongtin; ?>][<?php echo $tt; ?>][ten]" class="span3" value="<?php echo $v->ten; ?>" />
                    Giá trị: 
                    <textarea name="data[Thongtin][<?php echo $thongtin; ?>][<?php echo $tt; ?>][giatri]" class="span6"><?php echo $v->giatri; ?></textarea> 
                    &nbsp; <span class="delete_this_tt" alt=".thongtin<?php echo $tt; ?>"><em>(Xóa)</em></span>
                </div>
                
                <?php $tt++; } ?>
            <?php } ?>
        </div>
    </div>  

    <input type="hidden" name="num_thongtin" id="num_thongtin" value="<?php echo $tt; ?>" />
    
    <div class="control-group">
        <label class="control-label">&nbsp;</label>
        <div class="controls">
            <span class="btn btn-warning add-more-thongtin">Thêm thông tin</span>
        </div>
    </div>  
         

    <div class="control-group">
        <label class="control-label">Yêu cầu ứng viên</label>
        <div class="controls yeucaus">
            <?php
                $tt = 0; 
                $att = $this->data['Job'][$yeucau];
                $att_data=array();
                
                if($att != '' && $this->App->is_valid_json($att))
                { 
                    $att_data = json_decode($att);
                    // pr($att_data); die;
            ?>

            <?php foreach($att_data as $v) { ?>
                <div class="control-group yeucau<?php echo $tt; ?>">
                    Tên: 
                    <input type="text" name="data[Yeucau][<?php echo $yeucau; ?>][<?php echo $tt; ?>][ten]" class="span3" value="<?php echo $v->ten; ?>" />
                    Giá trị: 
                    <textarea name="data[Yeucau][<?php echo $yeucau; ?>][<?php echo $tt; ?>][giatri]" class="span6"><?php echo isset($v->giatri) ? $v->giatri : ""; ?></textarea> 
                    &nbsp; <span class="delete_this_tt" alt=".yeucau<?php echo $tt; ?>"><em>(Xóa)</em></span>
                </div>

                <?php $tt++; } ?>
            <?php } ?>
        </div>
    </div>  

    <input type="hidden" name="num_yeucau" id="num_yeucau" value="<?php echo $tt; ?>" />
    
    <div class="control-group">
        <label class="control-label">&nbsp;</label>
        <div class="controls">
            <span class="btn btn-warning add-more-yeucau">Thêm Yêu cầu</span>
        </div>
    </div>  

    <div class="control-group">
        <label class="control-label">Thông tin khác</label>
        <div class="controls hosos">
            <?php
                $tt = 0; 
                $att = $this->data['Job'][$hoso];
                $att_data=array();
                
                if($att != '' && $this->App->is_valid_json($att))
                { 
                    $att_data = json_decode($att);
            ?>

            <?php foreach($att_data as $v) { ?>
                <div class="control-group hoso<?php echo $tt; ?>">
                    Tên: 
                    <input type="text" name="data[Hoso][<?php echo $hoso; ?>][<?php echo $tt; ?>][ten]" class="span3" value="<?php echo $v->ten; ?>" />
                    Giá trị: 
                    <textarea name="data[Hoso][<?php echo $hoso; ?>][<?php echo $tt; ?>][giatri]" class="span6"><?php echo $v->giatri; ?></textarea> 
                    &nbsp; <span class="delete_this_tt" alt=".hoso<?php echo $tt; ?>"><em>(Xóa)</em></span>
                </div>
                
                <?php $tt++; } ?>
            <?php } ?>
        </div>
    </div>

    <input type="hidden" name="num_hoso" id="num_hoso" value="<?php echo $tt; ?>" />
    
    <div class="control-group">
        <label class="control-label">&nbsp;</label>
        <div class="controls">
            <span class="btn btn-warning add-more-hoso">Thêm thông tin</span>
        </div>
    </div>  

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




<?php
// *********************************** Yeu cau **********************************************
if($lang != 'vi')
{
    $field = 'yeucau';

    $tt = 0; 
    $att = $this->data['Job'][$field];

    if($att != '' && $this->App->is_valid_json($att))
    { 
        $att_data = json_decode($att);

        foreach($att_data as $v)
        {
            if(isset($v->ten) && isset($v->giatri))
            {
                echo '<input type="hidden" name="data[Yeucau][' . $field . '][' . $tt . '][ten]" value="' . $v->ten . '" />';
                echo '<input type="hidden" name="data[Yeucau][' . $field . '][' . $tt . '][giatri]" value="' . $v->giatri . '" />';
                $tt++;
            }
        }
    }
}

// if($lang != 'en')
// {
//     $field = 'yeucau_en';

//     $tt = 0; 
//     $att = $this->data['Job'][$field];

//     if($att != '' && $this->App->is_valid_json($att))
//     { 
//         $att_data = json_decode($att);

//         foreach($att_data as $v) 
//         {
//             if(isset($v->ten) && isset($v->giatri))
//             {
//                 echo '<input type="hidden" name="data[Yeucau][' . $field . '][' . $tt . '][ten]" value="' . $v->ten . '" />';
//                 echo '<input type="hidden" name="data[Yeucau][' . $field . '][' . $tt . '][giatri]" value="' . $v->giatri . '" />';
//                 $tt++;
//             }
//         }
//     }
// }

// if($lang != 'cn')
// {
//     $field = 'yeucau_cn';

//     $tt = 0; 
//     $att = $this->data['Job'][$field];

//     if($att != '' && $this->App->is_valid_json($att))
//     { 
//         $att_data = json_decode($att);

//         foreach($att_data as $v) 
//         {
//             if(isset($v->ten) && isset($v->giatri))
//             {
//                 echo '<input type="hidden" name="data[Yeucau][' . $field . '][' . $tt . '][ten]" value="' . $v->ten . '" />';
//                 echo '<input type="hidden" name="data[Yeucau][' . $field . '][' . $tt . '][giatri]" value="' . $v->giatri . '" />';
//                 $tt++;
//             }
//         }
//     }
// }



// *********************************** Thong tin **********************************************

if($lang != 'vi')
{
    $field = 'thongtin';

    $tt = 0; 
    $att = $this->data['Job'][$field];

    if($att != '' && $this->App->is_valid_json($att))
    { 
        $att_data = json_decode($att);

        foreach($att_data as $v)
        {
            if(isset($v->ten) && isset($v->giatri))
            {
                echo '<input type="hidden" name="data[Thongtin][' . $field . '][' . $tt . '][ten]" value="' . $v->ten . '" />';
                echo '<input type="hidden" name="data[Thongtin][' . $field . '][' . $tt . '][giatri]" value="' . $v->giatri . '" />';
                $tt++;
            }
        }
    }
}

// if($lang != 'en')
// {
//     $field = 'thongtin_en';

//     $tt = 0; 
//     $att = $this->data['Job'][$field];

//     if($att != '' && $this->App->is_valid_json($att))
//     { 
//         $att_data = json_decode($att);

//         foreach($att_data as $v) 
//         {
//             if(isset($v->ten) && isset($v->giatri))
//             {
//                 echo '<input type="hidden" name="data[Thongtin][' . $field . '][' . $tt . '][ten]" value="' . $v->ten . '" />';
//                 echo '<input type="hidden" name="data[Thongtin][' . $field . '][' . $tt . '][giatri]" value="' . $v->giatri . '" />';
//                 $tt++;
//             }
//         }
//     }
// }

// if($lang != 'cn')
// {
//     $field = 'thongtin_cn';

//     $tt = 0; 
//     $att = $this->data['Job'][$field];

//     if($att != '' && $this->App->is_valid_json($att))
//     { 
//         $att_data = json_decode($att);

//         foreach($att_data as $v) 
//         {
//             if(isset($v->ten) && isset($v->giatri))
//             {
//                 echo '<input type="hidden" name="data[Thongtin][' . $field . '][' . $tt . '][ten]" value="' . $v->ten . '" />';
//                 echo '<input type="hidden" name="data[Thongtin][' . $field . '][' . $tt . '][giatri]" value="' . $v->giatri . '" />';
//                 $tt++;
//             }
//         }
//     }
// }



// *********************************** Ho so **********************************************

if($lang != 'vi')
{
    $field = 'hoso';

    $tt = 0; 
    $att = $this->data['Job'][$field];

    if($att != '' && $this->App->is_valid_json($att))
    { 
        $att_data = json_decode($att);

        foreach($att_data as $v)
        {
            if(isset($v->ten) && isset($v->giatri))
            {
                echo '<input type="hidden" name="data[Hoso][' . $field . '][' . $tt . '][ten]" value="' . $v->ten . '" />';
                echo '<input type="hidden" name="data[Hoso][' . $field . '][' . $tt . '][giatri]" value="' . $v->giatri . '" />';
                $tt++;
            }
        }
    }
}

// if($lang != 'en')
// {
//     $field = 'hoso_en';

//     $tt = 0; 
//     $att = $this->data['Job'][$field];

//     if($att != '' && $this->App->is_valid_json($att))
//     { 
//         $att_data = json_decode($att);

//         foreach($att_data as $v) 
//         {
//             if(isset($v->ten) && isset($v->giatri))
//             {
//                 echo '<input type="hidden" name="data[Hoso][' . $field . '][' . $tt . '][ten]" value="' . $v->ten . '" />';
//                 echo '<input type="hidden" name="data[Hoso][' . $field . '][' . $tt . '][giatri]" value="' . $v->giatri . '" />';
//                 $tt++;
//             }
//         }
//     }
// }

// if($lang != 'cn')
// {
//     $field = 'hoso_cn';

//     $tt = 0; 
//     $att = $this->data['Job'][$field];

//     if($att != '' && $this->App->is_valid_json($att))
//     { 
//         $att_data = json_decode($att);

//         foreach($att_data as $v) 
//         {
//             if(isset($v->ten) && isset($v->giatri))
//             {
//                 echo '<input type="hidden" name="data[Hoso][' . $field . '][' . $tt . '][ten]" value="' . $v->ten . '" />';
//                 echo '<input type="hidden" name="data[Hoso][' . $field . '][' . $tt . '][giatri]" value="' . $v->giatri . '" />';
//                 $tt++;
//             }
//         }
//     }
// }
?>




</form>


<script type="text/javascript">
    
$('.add-more-yeucau').click(function() {
    var num = $('#num_yeucau').val();
    var str = '';
    str += '<div class="control-group yeucau' + num + '">';
    str += 'Tên: ';
    str += '<input type="text" name="data[Yeucau][<?php echo $yeucau; ?>][' + num + '][ten]" class="span3" /> ';
    str += 'Giá trị: ';
    str += '<textarea type="text" name="data[Yeucau][<?php echo $yeucau; ?>][' + num + '][giatri]" class="span6"></textarea>';
    str += ' &nbsp; <span class="delete_this_tt" alt=".yeucau' + num + '"><em>(Xóa)</em></span>';
    str += '</div>';
    
    $('#num_yeucau').val(Number(num) + 1);
    $('.yeucaus').append(str);
    $('.number').number(true, 0);
    
    $('.delete_this_tt').on('click', function() {
        var cls = $(this).attr('alt');
        $(cls).remove();
        var num = $('#num_yeucau').val();
        return false;
    });
});

    $('.delete_this_tt').on('click', function() {
        var cls = $(this).attr('alt');
        $(cls).remove();
        var num = $('#num_yeucau').val();
        return false;
    });
    
$('.add-more-thongtin').click(function() {
    var num = $('#num_thongtin').val();
    var str = '';
    str += '<div class="control-group thongtin' + num + '">';
    str += 'Tên: ';
    str += '<input type="text" name="data[Thongtin][<?php echo $thongtin; ?>][' + num + '][ten]" class="span3" /> ';
    str += 'Giá trị: ';
    str += '<textarea type="text" name="data[Thongtin][<?php echo $thongtin; ?>][' + num + '][giatri]" class="span6"></textarea>';
    str += ' &nbsp; <span class="delete_this_tt" alt=".thongtin' + num + '"><em>(Xóa)</em></span>';
    str += '</div>';
    
    $('#num_thongtin').val(Number(num) + 1);
    $('.thongtins').append(str);
    $('.number').number(true, 0);
    
    $('.delete_this_tt').on('click', function() {
        var cls = $(this).attr('alt');
        $(cls).remove();
        var num = $('#num_thongtin').val();
        return false;
    });
});

$('.add-more-hoso').click(function() {
    var num = $('#num_hoso').val();
    var str = '';
    str += '<div class="control-group hoso' + num + '">';
    str += 'Tên: ';
    str += '<input type="text" name="data[Hoso][<?php echo $hoso; ?>][' + num + '][ten]" class="span3" /> ';
    str += 'Giá trị: ';
    str += '<textarea type="text" name="data[Hoso][<?php echo $hoso; ?>][' + num + '][giatri]" class="span6"></textarea>';
    str += ' &nbsp; <span class="delete_this_tt" alt=".hoso' + num + '"><em>(Xóa)</em></span>';
    str += '</div>';
    
    $('#num_hoso').val(Number(num) + 1);
    $('.hosos').append(str);
    $('.number').number(true, 0);
    
    $('.delete_this_tt').on('click', function() {
        var cls = $(this).attr('alt');
        $(cls).remove();
        var num = $('#num_hoso').val();
        return false;
    });
});

</script>