<?php $bread_array = $this->App->breadarray($current_category); ?>
<?php 
    $hotline = $this->App->t('hotline');
    $hotline_number = preg_replace('/[^0-9]/', '', $hotline);
?>


<section>
    <div class="wrap">
        <div class="w-pd-body single-news-body">
            <div class="w-pd-bl single-body">
                <h1 class="titledetail"><?php echo $this->data['Node']['title']; ?> <?php echo $this->App->adm_link('news', $this->data['Node']['id']); ?></h1>
            
                <div class="article_content">
                    <?php echo $this->data['News']['content']; ?>
                    
                    <div class="fb-comments" data-numposts="5" data-width="100%" src="<?php echo DOMAIN . $this->data['Node']['slug']; ?>.html"></div>
                </div>
            </div>

            <div class="cl"></div>
        </div>
    </div>
</section>


<div class="clearfix"></div>





