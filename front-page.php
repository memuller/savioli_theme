<?php get_header() ?>
<section id="external" class="widgets clearfix">
	<div class="header">
		<h2>Últimos Artigos</h2>
	</div>
	<?php foreach (array(1,2) as $i): ?>
		<?php $items = \ClinicaSavioli\ForeignPost::all($i) ?>
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
	<?php $items = \ClinicaSavioli\MagentoProduct::all() ?>
	<div>
		<?php foreach ($items as $item): ?>
			<article class='grid'>
				<a href="<?php echo $item->url ?>">
					<img src="<?php echo $item->image ?>" title="<?php echo $item->name ?>">
				</a>
			</article>
		<?php endforeach ?>
		<div class="grid more">
			<img src="<?php echo get_stylesheet_directory_uri().'/assets/images/banners/gioli.png'?>">
		</div>
	</div>
</section>
<?php get_footer() ?>