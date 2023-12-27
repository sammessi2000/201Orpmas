<form action="<?php echo DOMAINAD; ?>admin_rate/save_pos" method="post" class="form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Danh sách ' . $form_title); ?>
<?php echo $this->Admin->admin_breadcrumb($form_title); ?>

<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
    <a href="<?php echo DOMAINAD; ?>admin_rate/rate_add" class="btn btn-large btn btn-orange pull-right">Thêm</a>
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
            <td width="280">Họ tên</td>
            <td>Nội dung</td>
            <!-- <td width="180">Mục lục</td> -->
            <!-- <td width="40">Vị trí</td> -->
            <!-- <td width="40">Nổi bật</td> -->
            <!-- <td width="80">Trạng thái</td> -->
            <td width="60">Duyệt</td>
            <td width="60">Thay đổi</td>
            <td width="40">ID</td>
            <!-- <td width="40">Copy</td> -->
        </tr>
        <?php //pr($this->data); ?>

        <?php foreach($this->data as $k=>$v) : ?>
            <?php //pr($v['customers']); die ;?>
        <tr>
            <td style="text-align: center;">
                <?php if($v['customers']['logo'] == '') : ?>
                    ----
                <?php elseif(!preg_match('/http/', $v['customers']['logo'])) : ?>
                    <img src="<?php echo DOMAIN; ?>timthumb.php?src=<?php echo DOMAIN . $v['customers']['logo']; ?>&w=70&zc=1" />
                <?php else : ?>
                    <img src="<?php echo $v['customers']['logo']; ?>" width="70" height="70" />
                <?php endif; ?>
            </td>
            <td>
                <?php //pr($v[$tbl]); ?>
                <?php echo $v['customers']['fullname']; ?>
            </td>
            <td>
                <?php echo $v[$tbl]['content']; ?>
            </td>
            <!-- <td>
                <?php //echo $this->requestAction('admin/admin_rate/get_list_category_name/' . $v['Node']['id']); ?>
            </td> -->
           <!--  <td>
                <a href="<?php echo DOMAINAD; ?>admin_comment/comment_list/<?php echo $v['Node']['id']; ?>">
                <?php //echo $this->requestAction(DOMAINAD.'admin_comment/comment_count/'.$v['Node']['id']); ?>
                </a>
            </td> -->
            <?php /*
            <td>
                <input name="sort[<?php echo $v[$tbl]['id']; ?>]" value="<?php echo $v[$tbl]['pos']; ?>" style="width: 30px;" />
            </td>
            <td>
                <a href="<?php echo DOMAINAD; ?>admin_news/update_field/featured/<?php echo $v[$tbl]['id']; ?>">
                    <?php if($v[$tbl]['featured'] == 1) : ?>
                        <i class="icon icon-ok"></i>
                    <?php else : ?>
                        <i class="icon icon-pause"></i>
                    <?php endif; ?>
                </a>
            </td>
            */ ?>
            <td>
                <a href="<?php echo DOMAINAD; ?>admin_rate/update_field/status/<?php echo $v[$tbl]['id']; ?>">
                    <?php if($v[$tbl]['status'] == 1) : ?>
                        <i class="icon icon-ok"></i>
                    <?php else : ?>
                        <i class="icon icon-pause"></i>
                    <?php endif; ?>
                </a>
            </td>
            <td>                
                <a href="<?php echo Router::url(array('plugin'=>'admin', 'controller'=>'admin_' . $type, 'action'=>$type . '_edit', $v[$tbl]['id']), true); ?>"><i class="icon icon-edit"></i></a> &nbsp;
                <a href="#" class="confirm-delete" goto="<?php echo Router::url(array('plugin'=>'admin', 'controller'=>'admin_' . $type, 'action'=>$type . '_delete', $v[$tbl]['id']), true); ?>"><i class="icon icon-trash"></i></a>
            </td>
            <td><?php echo $v[$tbl]['id']; ?></td>
           <!--  <td>
                <a href="<?php echo DOMAINAD; ?>admin_<?php echo $type; ?>/<?php echo $type; ?>_copy/<?php echo $v[$tbl]['id']; ?>">
                    <i class="icon-share"></i>
                </a> 
            </td> -->
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