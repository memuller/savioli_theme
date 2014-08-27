<?php get_header() ?>

<section id="featured" class="">
	<?php $banners = \Savioli\Banner::all(array('position' => 'featured', 'enabled' => true)); ?>
	<?php foreach ($banners as $banner): ?>
		<img src="<?php echo $banner->image ?>">	
	<?php endforeach ?>
	
</section>

<section id="external" class="widgets clearfix">
	<div class="header">
		<h2>Últimos Artigos</h2>
	</div>
	<?php foreach (array(1,2) as $i): ?>
		<?php $items = \Savioli\ForeignPost::all($i) ?>
		<div class="grid col-half <?php if($i == 2) echo 'fit' ?>">
			<?php foreach ($items as $post): setup_postdata($post);?>
				<article>
					<?php echo get_avatar($post->post_author); ?>
					<div class="wrap">
						<summary>
							<a href="<?php the_permalink() ?>">
								<h2><?php the_title() ?></h2>
								<?php the_excerpt(); ?>
							</a>
							<div class="details">
								<span class="time">
									Publicado em <time><?php the_date('d/m/y') ?></time> - 		
								</span>
								<span class="comments">
									<?php comments_number() ?>
								</span>
							</div>
						</summary>	
					</div>
				</article>
			<?php endforeach ?>
		</div>
	<?php endforeach ?>
</section>
<section id="products" class="widgets">
	<div class="header">
		<h2>Lançamentos</h2>
	</div>
	<?php $options = get_option('clinica-savioli_options');
		$banner = \Savioli\Banner::first(array('position' => 'store', 'enabled' => true));
		$items = \Savioli\MagentoProduct::all($options['magento_url'], 
			$banner ? $options['magento_num_posts'] : $options['magento_num_posts'] + 1
		); 
	?>
	<ul>
		<?php foreach ($items as $item): ?>
			<li class='grid product'>
				<a href="<?php echo $item->url ?>">
					<img src="<?php echo $item->image ?>" title="<?php echo $item->name ?>">
					<div class="title"><?php echo $item->name ?></div>
				</a>
			</li>
		<?php endforeach ?>
		<?php if($banner): ?>
			<li class="grid more">
				<a href="<?php echo $banner->url ?>">
					<img src="<?php echo $banner->image ?>">
					<div class="title"><?php echo "conheça mais..." ?></div>
				</a>
			</li>
		<?php endif ?>
	</ul>
</section>
<?php get_footer() ?>