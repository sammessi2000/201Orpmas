<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Thêm Bộ lọc'); ?>
<?php echo $this->Admin->admin_breadcrumb('Thêm Bộ lọc'); ?>

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

	<div class="control-group">
            <label class="control-label">Tên Bộ lọc</label>
            <div class="controls">
                <?php echo $this->Form->input('Filter.title', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span5')); ?>
            </div>
	</div>

    <div class="items">
    </div>

	<div class="control-group">
        <label class="control-label">&nbsp;</label>
        <div class="controls">
            <input type="submit" name="submit" value="Lưu" class="btn btn-primary" />
            <span class="btn btn-default" id="add_more">Thêm option</span>
        </div>
	</div>


    
        
</div>
</div>
</div>

</div>
</div>

</form>

<script type="text/javascript">
    var pos = 0;

    $('#add_more').click(function() {
        var item = _item();
        $('.items').append(item);
        return false;
    });

    function del(id)
    {
        $('#item-' + id).remove();
        return false;
    }

    function _item()
    {
        var item = '<div class="control-group" id="item-' + pos + '">';
            item += '<label class="control-label">&nbsp;</label>';
            item += '<div class="controls">';
            item += '<input type="text" name="data[items]['+ pos +'][name]" class="span3" placeholder="Option Bộ lọc" />';
            item += '<input type="text" name="data[items]['+ pos +'][pos]" class="span1" placeholder="Auto" />';
            item += '<a href="#" onclick="del('+ pos +'); return false;" class="btn">X</a>';
            item += '</div>';
            item += '</div>';

        pos++;

        return item;
    }
</script>