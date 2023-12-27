<form action="<?php echo DOMAINAD; ?>admin_faq/save_pos" method="post" class="form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Danh sách ' . $form_title); ?>
<?php echo $this->Admin->admin_breadcrumb($form_title); ?>

<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
    <a href="<?php echo DOMAINAD; ?>admin_faq/faq_add" class="btn btn-large btn btn-orange pull-right">Thêm</a>
    <!-- <a href="#" onclick="document.form.submit();" class="btn btn-large btn btn-default pull-right savepos">Lưu vị trí</a> -->
</div>

<div class="box box-color box-bordered">
    <div class="box-title">
        <h3><i class="icon-table"></i>Danh sách</h3>
    </div>   

    
    <div class="box-content nopadding">
    <table class="table table-hover table-bordered">
        <tr class="text-bold warning">
            <td width="100">Ảnh đại diện</td>
            <td>Tóm tắt</td>
            <!-- <td width="180">Mục lục</td> -->
            <!-- <td width="40">Comment</td> -->
            <!-- <td width="40">Vị trí</td> -->
            <!-- <td width="40">Nổi bật</td> -->
            <td width="60">Thay đổi</td>
            <td width="40">ID</td>
            <td width="40">Copy</td>
        </tr>
        <?php foreach($this->data as $k=>$v) : ?>
        <tr>
            <td>
                <?php if($v[$tbl]['image'] == '') : ?>
                    ----
                <?php elseif(!preg_match('/http/', $v[$tbl]['image'])) : ?>
                    <img src="<?php echo DOMAIN; ?>timthumb.php?src=<?php echo DOMAIN . $v[$tbl]['image']; ?>&w=70&zc=1" />
                <?php else : ?>
                    <img src="<?php echo $v[$tbl]['image']; ?>" width="70" />
                <?php endif; ?>
            </td>
            <td>
                <?php echo $v[$tbl]['description']; ?>
            </td>
            <td>                
                <a href="<?php echo Router::url(array('plugin'=>'admin', 'controller'=>'admin_' . $type, 'action'=>$type . '_edit', $v[$tbl]['id']), true); ?>"><i class="icon icon-edit"></i></a> &nbsp;
                <a href="#" class="confirm-delete" goto="<?php echo Router::url(array('plugin'=>'admin', 'controller'=>'admin_node', 'action'=>$type . '_delete', $v[$tbl]['id']), true); ?>"><i class="icon icon-trash"></i></a>
            </td>
            <td><?php echo $v[$tbl]['id']; ?></td>
            <td>
                <a href="<?php echo DOMAINAD; ?>admin_<?php echo $type; ?>/<?php echo $type; ?>_copy/<?php echo $v[$tbl]['id']; ?>">
                    <i class="icon-share"></i>
                </a> 
            </td>
        </tr>
        <?php endforeach; ?>
    </table>    
    <div class="pagination">
        <?php echo $this->Paginator->first('<< Đầu'); ?>    
        <?php echo $this->Paginator->numbers(array('separator'=>'')); ?>    
        <?php echo $this->Paginator->last('Cuối >>'); ?>    
    </div>
     




    </div>
</div>
</div>
</div>


</form>