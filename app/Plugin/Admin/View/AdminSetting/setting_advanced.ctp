<?php
    

    if(isset($data['buildpc']) && $this->App->is_valid_json($data['buildpc']))
    {
        $pcdata = json_decode($data['buildpc']);

        foreach($pcdata as $k=>$v)
        {
            if(isset($_buildpc[$k]))
            {
                $_buildpc[$k]['cid'] = $v->cid;
            }
        }
    }
?>
<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Cấu hình nâng cao'); ?>
<?php echo $this->Admin->admin_breadcrumb('Cấu hình nâng cao'); ?>



<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
</div>

<div class="box">
<div class="box-content">

    <h4>Thiết lập chuyển trang</h4>
    <p>Sau khi bạn tạo mới / sửa 1 bản ghi, bạn muốn hệ thống chuyển tới trang nào?</p>
    <p>&nbsp;</p>

    <div class="control-group">
        <label class="control-label">Sau khi Tạo mới</label>
        <div class="controls">
            <?php 
                $options = array(
                    'add' => 'Tiếp tục Tạo mới',
                    'list' => 'Quay lại trang danh sách',
                    'edit' => 'Đi đến trang sửa dữ liệu vừa tạo',
                );

                echo $this->Form->input('add', array(
                    'options'=>$options,
                    'label'=>false,
                    'div'=>false,
                    'type'=>'select',
                    'id'=>'select_add',
                    'empty'=>'--- Chọn ---',
                    'required'=>'required',
                    'value'=>$data['add']
                ));
            ?>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Sau khi sửa</label>
        <div class="controls">
            <?php 
                $options = array(
                    'list' => 'Quay lại trang danh sách',
                    'edit' => 'Tiếp tục ở trang sửa dữ liệu vừa rồi',
                );

                echo $this->Form->input('edit', array(
                    'options'=>$options,
                    'label'=>false,
                    'div'=>false,
                    'type'=>'select',
                    'id'=>'select_edit',
                    'empty'=>'--- Chọn ---',
                    'required'=>'required',
                    'value'=>$data['edit']
                ));
            ?>
        </div>
    </div>

<?php /* ?>
    <div class="clearfix"></div>
    <p>&nbsp;</p>
    <div class="clearfix"></div>

    <h4>Thiết lập cho mục Xây dựng cấu hình</h4>
    <p>Nhập CID (tìm thấy trong danh sách mục lục) vào ô tương ứng để gán bộ lọc</p>
    <p>&nbsp;</p>

    <?php foreach($_buildpc as $k=>$v) { ?>
        <div class="control-group">
            <label class="control-label"><?php echo $v['name']; ?></label>
            <div class="controls">
                <input name="build[<?php echo $k; ?>]" id="build_<?php echo $k; ?>" value="<?php echo $v['cid']; ?>" type="text" />
            </div>
        </div>
    <?php } ?>

<?php */ ?>

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

<script type="text/javascript">
    $('#description').maxlength({
        alwaysShow: true,
        threshold: 10,
        placement: 'top',
    });

    $('#keyword').maxlength({
        alwaysShow: true,
        threshold: 10,
        placement: 'top',
    });
</script>