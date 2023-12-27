<?php // $bread_array = $this->App->breadarray($current_category); 
?>
<?php //$root = $this->requestAction('/default/node/find_root_category/' . $current_category['Category']['id']);
//$parent = $this->requestAction('/default/node/get_category/' . $root);

//pr($parent); 
?>
<div class="page-404">
    <div class="img-404">
        <img class="lazy" src="<?php echo BLANK_IMAGE; ?>" data-src="<?php echo $this->App->t('general_text_23'); ?>" alt="404-image">
        <?php echo $this->App->adm_link('lang', 'general_text_23', 'image'); ?>
    </div>
</div>