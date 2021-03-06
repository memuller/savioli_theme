<?php get_header() ?>

<section id="featured" class="">
	<?php $banners = \Savioli\Banner::all(array('position' => 'featured', 'enabled' => true)); ?>
	<ul>
		<?php foreach ($banners as $banner): ?>
			<li>
				<a href="<?php echo $banner->url ?>">
					<img src="<?php echo $banner->image ?>">	
				</a>
			</li>
		<?php endforeach ?>
	</ul>
	
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
							<a href="<?php echo $post->permalink ?>">
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
			<nav class="more right">
				<a href="<?php echo \Savioli\ForeignPost::posts_url($i) ?>">mais artigos</a>
			</nav>
		</div>
	<?php endforeach ?>
</section>
<section id="products" class="widgets">
	<div class="header">
		<h2>Lançamentos</h2>
	</div>
	<?php $items = \Savioli\Product::all(); ?>
	<ul>
		<?php foreach ($items as $post): setup_postdata($post); ?>
			<li class='grid product'>
				<a href="<?php echo $post->url ?>">
					<img src="<?php echo $post->image ?>" title="<?php echo $post->title ?>">
					<div class="title"><?php echo $post->title ?></div>
				</a>
			</li>
		<?php endforeach ?>
	</ul>
</section>
<?php get_footer() ?>