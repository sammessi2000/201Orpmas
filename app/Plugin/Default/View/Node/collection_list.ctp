<?php
$breadcrum = $this->App->breadarray($current_category);
?>
<div class="container-fluid banner">
    <div class="row">
        <!-- <div class="wrap-1092"> -->
        <div class="wrap-1260">
            <div class="col-sm-12">
                <div class="bread">
                	<?php $i=0; $n=count($breadcrum); foreach($breadcrum as $v) : $i++; ?>
	                    <a href="<?php echo $v['link']; ?>"><?php echo $v['title']; ?></a> 
	                    <?php if($i<$n) echo '&raquo;'; ?>
                	<?php endforeach; ?>
                </div>
                <div class="page-title"><?php echo $current_category['Node']['title']; ?></div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid collect-archive page-archive">
	<div class="row">
    	<!-- <div class="wrap-1200"> -->
		<div class="wrap-1260">
			<div class="collect-wrap">

			<?php if(is_numeric($current_category['Category']['parent_id']) && $current_category['Category']['parent_id'] > 0) { ?>
				<div class="col-sm-3 sidebar hidden-xs">
					<?php echo View::element('sidebar'); ?>
				</div>
			<div class="col-sm-9">

			<?php foreach($this->data as $v) { ?>
				<div class="col-sm-6 collect-item">
					<div class="col-sm-4 np">
						<a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="<?php echo $v['Node']['title']; ?>">
							<?php echo $this->App->img($v['Collection']['image'], $v['Node']['title'], 300, 190); ?>
						</a>
					</div>
					<div class="col-sm-8">
						<a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="<?php echo $v['Node']['title']; ?>">
							<?php echo $v["Node"]['title']; ?>
						</a>
						<p>
							<?php echo $this->App->word_limiter($v["Collection"]['description'], 19); ?>
						</p>
					</div>
				</div>
			<?php } ?>

					<div class="pagination">
						<?php 
							$first = $this->Paginator->first('<<');
							$last = $this->Paginator->last('>>');

							$first = str_replace('default/node/index/', '', $first);
							$first = str_replace('/.html', '.html', $first);
							echo $first;

							$pages = $this->Paginator->numbers(array('separator'=>' '));
							$pages = str_replace('default/node/index/', '', $pages);
							$pages = str_replace('/.html', '.html', $pages);
							echo $pages;

							$last = str_replace('default/node/index/', '', $last);
							$last = str_replace('/.html', '.html', $last);
							echo $last;
						?>
					</div>
			</div>

			<?php } else { ?>

				<?php
				 	$data = $this->requestAction(DOMAIN . 'default/node/get_child_category_of/' . $current_category['Category']['id']);
				?>
				<div class="col-sm-3 sidebar hidden-xs">
					<?php echo View::element('sidebar'); ?>
				</div>
				<div class="col-sm-9">
					<div class="container-fluid">
						<div class="row">
							<?php foreach($data as $v) { ?>
								<div class="collect-item col-sm-4">
									<div class="collect-item-img">
										<a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="<?php echo $v['Node']['title']; ?>">
											<?php echo $this->App->img($v['Category']['image'], $v['Node']['title'], 270, 290); ?>
										</a>
									</div>
									<div class="collect-item-title">
										<a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="<?php echo $v['Node']['title']; ?>">
											<?php echo $v["Node"]['title']; ?>
										</a>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>

					<div class="pagination">
						<?php 
							$first = $this->Paginator->first('<<');
							$last = $this->Paginator->last('>>');

							$first = str_replace('default/node/index/', '', $first);
							$first = str_replace('/.html', '.html', $first);
							echo $first;

							$pages = $this->Paginator->numbers(array('separator'=>' '));
							$pages = str_replace('default/node/index/', '', $pages);
							$pages = str_replace('/.html', '.html', $pages);
							echo $pages;

							$last = str_replace('default/node/index/', '', $last);
							$last = str_replace('/.html', '.html', $last);
							echo $last;
						?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
