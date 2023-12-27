<div class="container-fluid breadcrumb">
<div class="row wrap">
    <span>
        <?php echo $this->App->breadcrumb($current_category, null, null, '/'); ?>
    </span>
</div>
</div>

<div class="container-fluid main-content">
    <div class="row wrap">
        <div class="col-md-3 col-sm-3 hidden-xs">
            <?php echo View::element('sidebar'); ?>
        </div>

        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="product-list-header">
                <div class="col-sm-6 product-list-title">
                    <?php echo isset($searching) ? 'Kết quả tìm kiếm "'.$searching.'"' : $current_category['Node']['title']; ?>
                </div>
                <div class="col-sm-6 product-list-filter">
                    Sắp xếp theo: 
                    <select id="filter">
                        <option value="asc">Sản phẩm cũ -&gt; mới</option>
                        <option value="desc">Sản phẩm mới -&gt; cũ</option>
                    </select>
                </div>
            </div>
            


            
<div class="container-fluid">
    <div class="row">
        <div class="wrap">
            <div class="sanpham-content">
            <?php $i=0; $n=count($this->data); foreach($this->data as $v) { $i++;  ?>
            <div class="col-sm-3 sanpham-item first-row <?php if($n==$i || $i%4==0) echo 'last'; ?>">
                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="<?php echo $v['Node']['title']; ?>">
                    <?php echo $this->App->img($v['Product']['image'], $v['Node']['title'], 295, 230); ?>
                </a>
                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="<?php echo $v['Node']['title']; ?>">
                    <?php echo $this->App->word_limiter($v["Node"]['title'], 6); ?>
                </a>
                <div class="price">
                    <?php echo number_format($v['Product']['price']); ?> VND
                    <a href="#" class="buy-now" id="<?php echo $v['Node']['id']; ?>">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                    </a>
                </div>
            </div>
            <?php } ?>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="wrap">
        <div class="home-loadmore">
            <span class="loadme-more">Xem thêm</div>
        </div>
        </div>
    </div>
</div>
            
            
        </div>
    </div>
</div>

<script type="text/javascript">
    var loading = false;
    var loadmore = $('.loadme-more');
    var off = 12;
    
    loadmore.click(function() {
        if(loading == true) return;
        loading = true;

        $.ajax({
            url: "<?php echo DOMAIN; ?>default/node/ajax_load_posts/?type=product&limit=4&offset=" + off + "&catid=<?php echo $current_category['Category']['id']; ?>",
            cache: false,
            dataType: 'html',
            type: 'GET',
            success: function(data) {
                loading = false;

                if(data == '')
                {
                    loadmore.html('Không còn dữ liệu');
                    loading = true;
                }
                else
                {
                    $('.sanpham-content').append(data);
                }
            },
            error: function() {alert('err');}
        });

        off = off + 4;

        return false;
    });
</script>