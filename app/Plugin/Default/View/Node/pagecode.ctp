<?php echo View::element('searchbox_domain'); ?> 


<div class="container-fluid page-content page-end">
    <div class="row">
        <div class="wrap-1200">
          <div class="post page-post">
              <h1 class="title">
                    <?php echo $this->App->t('title', $this->data['Node']); ?>
                    <?php echo $this->App->adm_link('category', $this->data['Node']['id']); ?>
                </h1>  
             <?php echo $this->App->t('description', $this->data['Category']); ?>
             <?php echo $this->App->t('htm', $this->data['Category']); ?>
             <?php echo $this->App->t('content', $this->data['Category']); ?>
          </div>

        </div>
    </div>
</div> 

<?php /*
<div class="container-fluid page">
    <div class="row">
        <div class="wrap">
            <div class="sidebar-title bread">
                <ul>
                    <li>
                        <a href="<?php echo DOMAIN . $lang_txt_link; ?>">
                            <?php echo $this->App->t('home'); ?>
                        </a>
                    </li>
                    <li>&gt;</li>
                    <li>
                        <?php echo $this->App->t('title', $current_category['Node']); ?>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12">    
            	<h1>
            		<?php echo $this->App->t('title', $this->data['Node']); ?>
            		<?php echo $this->App->adm_link('category', $this->data['Node']['id']); ?>
            	</h1>   
        		
        		<?php echo $this->App->t('content', $this->data['Category']); ?>
            </div>
        </div>
    </div>
</div>
*/ ?>