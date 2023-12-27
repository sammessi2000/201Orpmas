<div class="bo-product">
    <figure class="d-flex align-items-center justify-content-center">
        <a href="<?php echo DOMAIN . $product['Node']['slug']; ?>.html" aria-label="<?php echo $product['Node']['title'] ?>">
            <?php //echo $this->App->img($product['Product']['image'], $product['Node']['title'], 208, 208); 
            ?>
            <img class="lazy" src="<?php echo DOMAIN . 'theme/banhang247/img/blank.svg' ?>" data-src="<?php echo $product['Product']['image'] ?>" alt="" width="170" height="170">
        </a>

        <?php if (!empty($product['Product']['price_off']) &&  $product['Product']['price_off'] > 0) { ?>
            <?php /* 	?>
                                            <span class="san-bold span-sale-ab"><?php echo $product['Product']['khuyenmai']; ?> %</span>
                                            */ ?>
            <span class="san-bold span-sale-ab">
                <?php
                echo round((($product['Product']['price_off'] - $product['Product']['price']) / $product['Product']['price_off']) * 100) . '%';
                ?>
            </span>
        <?php } ?>
        <a href="<?php echo DOMAIN . $product['Node']['slug']; ?>.html" class="overlay" aria-label="<?php echo $product['Node']['title'] ?>"></a>
    </figure>
    <h3 class="name-list-gd san-bold">
        <a href="<?php echo DOMAIN . $product['Node']['slug']; ?>.html" aria-label="<?php echo $product['Node']['title'] ?>">
            <?php echo $this->App->t('title', $product['Node']); ?>
        </a>
    </h3>
    <?php if ($product['Product']['price'] != 0) { ?>
        <p class="pricehome_pro">
            <?php echo number_format($product['Product']['price']); ?> đ
        </p>
    <?php } ?>

    <?php if ($product['Product']['price_off'] != 0) { ?>
        <p class="priceold-home_pro">
            <del><?php echo number_format($product['Product']['price_off']); ?> đ</del>
        </p>
    <?php } else { ?>
        <p class="priceold-home_pro">
            &nbsp;
        </p>
    <?php } ?>
</div>