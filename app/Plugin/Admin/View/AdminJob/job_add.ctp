<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Thêm tuyển dụng'); ?>
<?php echo $this->Admin->admin_breadcrumb('Thêm tuyển dụng'); ?>

<?php echo $this->Session->flash(); ?>



<div class="box">
<div class="box-content">
    <div class="control-group">
        <label class="control-label">Tiêu đề</label>
        <div class="controls">
            <?php echo $this->Form->input('Job.title', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
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
            <?php echo $this->Form->input('Job.thoihan', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label">Thông tin chung</label>
        <div class="controls thongtins">
            
        </div>
    </div>  

    <input type="hidden" name="num_thongtin" id="num_thongtin" value="0" />
    
    <div class="control-group">
        <label class="control-label">&nbsp;</label>
        <div class="controls">
            <span class="btn btn-warning add-more-thongtin">Thêm thông tin</span>
        </div>
    </div>  
         

    <div class="control-group">
        <label class="control-label">Yêu cầu ứng viên</label>
        <div class="controls yeucaus">
            
        </div>
    </div>  

    <input type="hidden" name="num_yeucau" id="num_yeucau" value="0" />
    
    <div class="control-group">
        <label class="control-label">&nbsp;</label>
        <div class="controls">
            <span class="btn btn-warning add-more-yeucau">Thêm Yêu cầu</span>
        </div>
    </div>  

    <div class="control-group">
        <label class="control-label">Thông tin khác</label>
        <div class="controls hosos">
            
        </div>
    </div>  

    <input type="hidden" name="num_hoso" id="num_hoso" value="0" />
    
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
</form>

<script type="text/javascript">
    
$('.add-more-yeucau').click(function() {
    var num = $('#num_yeucau').val();
    var str = '';
    str += '<div class="control-group yeucau' + num + '">';
    str += 'Tên: ';
    str += '<input type="text" name="data[Yeucau][' + num + '][ten]" class="span3" /> ';
    str += 'Giá trị: ';
    str += '<textarea type="text" name="data[Yeucau][' + num + '][giatri]" class="span6"></textarea>';
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

$('.add-more-thongtin').click(function() {
    var num = $('#num_thongtin').val();
    var str = '';
    str += '<div class="control-group thongtin' + num + '">';
    str += 'Tên: ';
    str += '<input type="text" name="data[Thongtin][' + num + '][ten]" class="span3" /> ';
    str += 'Giá trị: ';
    str += '<textarea type="text" name="data[Thongtin][' + num + '][giatri]" class="span6"></textarea>';
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
    str += '<input type="text" name="data[Hoso][' + num + '][ten]" class="span3" /> ';
    str += 'Giá trị: ';
    str += '<textarea type="text" name="data[Hoso][' + num + '][giatri]" class="span6"></textarea>';
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