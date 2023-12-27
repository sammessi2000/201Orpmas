<?php
    $key = '';
    $pass = $this->params['pass'];
    if(isset($pass['0'])) 
        $key = $pass['0'];
?>

<form action="<?php echo DOMAINAD . 'admin_node/update_pos'; ?>" method="post" class="form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Quản lý danh mục'); ?>
<?php echo $this->Admin->admin_breadcrumb('Danh mục tin'); ?>

<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
    <?php
        $ref = $ref_add = "";

        if($key != "")
        {
            $ref = "?r=" . DOMAINAD  . 'admin_category/category_list/' . $key;
            $ref_add = "?parent_id=" .$key . "&r=" . DOMAINAD  . 'admin_category/category_list/' . $key;
        }
    ?>
    <a href="<?php echo DOMAINAD; ?>admin_category/category_add<?php echo $ref_add; ?>" class="btn btn-large btn btn-orange pull-right">Thêm</a>
    <a href="#" onclick="document.form.submit();" class="btn btn-large btn btn-default pull-right savepos">Lưu vị trí</a>
</div>

<div class="box box-color box-bordered">
    <div class="box-title">
        <h3><i class="icon-table"></i>Danh sách</h3>
    </div>      

    <div class="box-content nopadding">
        <div class="row-fluid" style="padding-top: 14px;">
            <div class="category-select offset2 filter-item">
                <strong class="span2 filter-label">Lọc danh mục</strong>
                <select id="list_category">
                    <option value=""> --- Tất cả mục lục --- </option>
                    <?php foreach($category_tree as $k=>$v) : ?>
                    <option value="<?php echo $k; ?>" <?php if($k==$key) echo 'selected'; ?>><?php echo $v; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

                
        <table class="table table-hover table-nomargin dataTable table-bordered advertiseTable">
        <thead>
            <tr class="text-bold warning">
            <th width="40">STT</th>
                <!-- <th width="100">Ảnh đại diện</th> -->
                <th width="180">Tên mục lục</th>
                <th width="80">Dạng m.lục</th>
                <th width="40">Vị trí</th>
                <th width="40" style="text-align:center;">Menu chính</th>
                <?php if(count($category_fields) > 0) { ?>
                <?php foreach($category_fields as $kf=>$vf) { ?>
                <th width="40" style="text-align:center;"><?php echo $vf; ?></th>
                <?php } ?>
                <?php } ?>
                <th width="40" style="text-align:center;">Tr.thái</th>
                <th width="40" style="text-align: center;">Sửa</th>
                <th width="40" style="text-align: center;">Xóa</th>
                <th width="40" style="text-align: center;">CID</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($this->data as $k=>$v) { ?>
            <tr>
                <td><?php echo $k+1; ?></td>
                <!-- <td>
                    <?php $img = $this->App->_icon($v['Category']['image'], ''); ?>
                    <?php echo $img; ?>
                </td> -->
                <td>
                    <a href="<?php echo DOMAINAD; ?>admin_category/category_list/<?php echo $v['Category']['id']; ?>">
                        <?php echo $v['Node']['title']; ?>
                    </a>
                </td>
                <td>
                    <?php if(isset($category_type[$v['Category']['type']])) echo $category_type[$v['Category']['type']]; ?>
                </td>
                <td>
                    <input name="sort[<?php echo $v['Node']['id']; ?>]" value="<?php echo $v['Node']['pos']; ?>" style="width: 30px;" />
                </td>

                <td style="text-align: center;">
                    <a href="<?php echo DOMAINAD; ?>admin_category/update_field/menu/<?php echo $v['Category']['id'] ?>">
                        <?php if($v['Category']['menu'] == 1) : ?>
                            <i class="icon icon-ok"></i>
                        <?php else : ?>
                            <i class="icon icon-pause"></i>
                        <?php endif; ?>
                    </a>
                </td>

                <?php if(count($category_fields) > 0) { ?>
                <?php foreach($category_fields as $kf=>$vf) { ?>
                <td style="text-align: center;">
                    <a href="<?php echo DOMAINAD; ?>admin_category/update_field/<?php echo $kf; ?>/<?php echo $v['Category']['id'] ?>">
                        <?php if($v['Category'][$kf] == 1) : ?>
                            <i class="icon icon-ok"></i>
                        <?php else : ?>
                            <i class="icon icon-pause"></i>
                        <?php endif; ?>
                    </a>
                </td>
                <?php } ?>
                <?php } ?>

                <td style="text-align: center;">
                    <a href="<?php echo DOMAINAD; ?>admin_node/update_status/<?php echo $v['Node']['id'] ?>">
                        <?php if($v['Node']['status'] == 1) : ?>
                            <i class="icon icon-ok"></i>
                        <?php else : ?>
                            <i class="icon icon-pause"></i>
                        <?php endif; ?>
                    </a>
                </td>
                <td style="text-align: center;">                
                    <a href="<?php echo DOMAINAD . 'admin_category/category_edit/' .  $v['Node']['id'] . $ref; ?>"><i class="icon icon-edit"></i></a> &nbsp;
                </td>
                <td style="text-align: center;">
                    <a href="#" class="confirm-delete" goto="<?php echo DOMAINAD . 'admin_node/node_delete/' . $v['Node']['id']; ?>?rp=<?php echo $key; ?>"><i class="icon icon-trash"></i></a>
                </td>
                <td style="text-align: center;"><?php echo $v['Category']['id']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
        </table>    
    </div>
</div>

</div>
</div>
</form>

<script type="text/javascript">
    $('#list_category').change(function() {
        var v = $(this).val();
        document.location.href = "<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_category','action'=>'category_list'), TRUE); ?>/"+v;
    });

    $('.savepos').click(function() {
        $('form.form-main').submit();
    });
</script>