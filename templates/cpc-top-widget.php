<?php
$args      = array(
	'posts_per_page' => 5,
);
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		?>
	<div class="cpc_topwidget_block">
		<div class="cpc_topwidget_thumbnail">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'large', array( 'class' => 'cpc_topwidget_thumbnail_image' ) );
			} else {
				echo '<img src="' . plugin_dir_path() . 'images/logo.jpg" class="cpc_topwidget_thumbnail_image" alt="画像: ダミーサムネイル画像">';
			}
			?>
		</div>
		<div class="cpc_topwidget_content_block">
			<a href="<?php echo get_the_permalink(); ?>">
				<h3 class="cpc_topwidget_title">
					<?php the_title(); ?>
				</h3>
			</a>
			<div class="cpc_topwidget_date">
				<?php the_date(); ?>
			</div>
			<div class="cpc_topwidget_content">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div>
		<?php
	}
} else {
	echo '記事はありませんでした';
}
