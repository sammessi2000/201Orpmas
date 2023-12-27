<form action="<?php echo DOMAINAD . 'admin_node/update_pos'; ?>" method="post" class="form-main">
    <div id="main">
        <div class="container-fluid">
            <?php echo $this->Admin->admin_head('Quản lý bài viết'); ?>
            <?php echo $this->Admin->admin_breadcrumb('Quản lý bài viết'); ?>

            <div style="margin:10px 0 10px;" class="row-fluid">
                <?php echo $this->Session->flash(); ?>
                <a href="<?php echo DOMAINAD; ?>admin_news/news_add"
                    class="btn btn-large btn btn-orange pull-right">Thêm</a>
                <a href="#" onclick="document.form.submit();"
                    class="btn btn-large btn btn-default pull-right savepos">Lưu vị trí</a>
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
                                <option value="">Tất cả mục lục</option>
                                <?php foreach($category_tree as $k=>$v) : ?>
                                <option value="<?php echo $k; ?>" <?php if($k==$filter_category) echo 'selected'; ?>>
                                    <?php echo $v; ?></option>
                                <?php endforeach; ?>
                            </select>

                            <select id="filter_status">
                                <option value="" <?php if($filter_status == "") echo 'selected'; ?>>Tất cả trạng thái
                                </option>
                                <option value="0" <?php if($filter_status == "0") echo 'selected'; ?>>Nháp</option>
                                <option value="1" <?php if($filter_status == "1") echo 'selected'; ?>>Xuất bản</option>
                            </select>

                            <span class="btn btn-warning" id="btn-filter">Lọc</span>
                        </div>
                    </div>

                    <table class="table table-hover table-nomargin dataTable table-bordered advertiseTable">
                        <thead>
                            <tr class="text-bold warning">
                                <th width="40">STT</th>
                                <th width="100">Ảnh đại diện</th>
                                <th>Tiêu đề</th>
                                <th width="180">Mục lục</th>
                                <th width="40">Comment</th>
                                <th width="40">Vị trí</th>
                                <th width="40">Nổi bật</th>
                                <th width="60">Trạng thái</th>
                                <th width="40" style="text-align: center;">Sửa</th>
                                <th width="40" style="text-align: center;">Copy</th>
                                <th width="40" style="text-align: center;">Xóa</th>
                                <th width="40" style="text-align: center;">ID</th>
                                <!-- <th width="40">Copy</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
            // echo $this->Paginator->counter(
            //     'Page {:page} of {:pages}, showing {:current} records out of
            //      {:count} total, starting on record {:start}, ending on {:end}'
            // );

            $current_page = $this->Paginator->current(); 
            $stt = 1;
            
            $showing = $this->Paginator->counter('{:current}');
            $total_pages = $this->Paginator->counter('{:pages}');

            $redirectPage = $current_page;
            if($current_page > 1 && $current_page == $total_pages && $showing == 1)
                $redirectPage = $current_page - 1;

            if($current_page != 1)	$stt = (($current_page - 1) * $limit) + 1; 
        ?>
                            <?php foreach($this->data as $k=>$v) { ?>
                            <tr>
                                <td><?php echo $stt; $stt++; ?></td>
                                <td>
                                    <?php if($v['News']['image'] == '') : ?>
                                    ----
                                    <?php elseif(!preg_match('/http/', $v['News']['image'])) : ?>
                                    <img
                                        src="<?php echo DOMAIN; ?>timthumb.php?src=<?php echo DOMAIN . $v['News']['image']; ?>&w=70&zc=1" />
                                    <?php else : ?>
                                    <img src="<?php echo $v['News']['image']; ?>" width="70" />
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo $v['Node']['title']; ?>
                                </td>
                                <td>
                                    <?php echo $this->requestAction('admin/admin_news/get_list_category_name/' . $v['Node']['id']); ?>
                                </td>
                                <td>
                                    <a
                                        href="<?php echo DOMAINAD; ?>admin_comment/comment_list/<?php echo $v['Node']['id']; ?>">
                                        <?php //echo $this->requestAction(DOMAINAD.'admin_comment/comment_count/'.$v['Node']['id']); ?>
                                    </a>
                                </td>
                                <td>
                                    <input name="sort[<?php echo $v['Node']['id']; ?>]"
                                        value="<?php echo $v['Node']['pos']; ?>" style="width: 30px;" />
                                </td>
                                <td>
                                    <a
                                        href="<?php echo DOMAINAD; ?>admin_news/update_field/featured/<?php echo $v['News']['id']; ?>">
                                        <?php if($v['News']['featured'] == 1) : ?>
                                        <i class="icon icon-ok"></i>
                                        <?php else : ?>
                                        <i class="icon icon-pause"></i>
                                        <?php endif; ?>
                                    </a>
                                </td>
                                <td>
                                    <a
                                        href="<?php echo DOMAINAD; ?>admin_node/update_status/<?php echo $v['Node']['id']; ?>">
                                        <?php if($v['Node']['status'] == 1) : ?>
                                        <i class="icon icon-ok"></i>
                                        <?php else : ?>
                                        <i class="icon icon-pause"></i>
                                        <?php endif; ?>
                                    </a>
                                </td>
                                <td style="text-align: center;">
                                    <a
                                        href="<?php echo Router::url(array('plugin'=>'admin', 'controller'=>'admin_news', 'action'=>'news_edit', $v['Node']['id']), true); ?>"><i
                                            class="icon icon-edit"></i></a> &nbsp;
                                </td>
                                <td>
                                    <a
                                        href="<?php echo DOMAINAD; ?>admin_news/news_copy/<?php echo $v['Node']['id']; ?>">
                                        <i class="icon-share"></i>
                                    </a>
                                </td>
                                <td style="text-align: center;">
                                    <a href="#" class="confirm-delete"
                                        goto="<?php echo DOMAINAD . 'admin_node/node_delete/' . $v['Node']['id']; ?>?rp=<?php echo $redirectPage; ?>"><i
                                            class="icon icon-trash"></i></a>
                                </td>
                                <td style="text-align: center;"><?php echo $v['Node']['id']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="pagination">
                        <?php echo $this->Paginator->first('<< Đầu '); ?>
                        <?php echo $this->Paginator->numbers(array('separator'=>'')); ?>
                        <?php echo $this->Paginator->last(' Cuối >>'); ?>
                    </div>


                </div>
            </div>
        </div>

    </div>
    </div>
</form>

<script type="text/javascript">
$('#btn-filter').click(function() {
    var category = $('#list_category').val();
    var status = $('#filter_status').val();
    document.location.href =
        "<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_news','action'=>'news_list'), TRUE); ?>/?list_category=" +
        category + "&filter_status=" + status;
});

$('.savepos').click(function() {
    $('form.form-main').submit();
});
</script>