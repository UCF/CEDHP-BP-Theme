<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> itemscope itemtype="http://schema.org/CreativeWork">
	<div class="content-first">
				
		<?php
		if( class_exists( 'RWMB_Loader' ) )
		{
			if( rwmb_meta( 'business_press_hide_title' ) != 1 )
			{
			?>
				<div class="content-second">
					<h1 class="the-title entry-title" itemprop="headline"><?php the_title(); ?></h1>
				</div>
			<?php
			}
		}
		else
		{
		?>
			<div class="content-second">
				<h1 class="the-title entry-title" itemprop="headline"><?php the_title(); ?></h1>
			</div>
		<?php
		}
		?>
				
		<div class="content-third" itemprop="text">
					
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
					
			<?php
			wp_link_pages( array(
					'before'           => '<p class="pagelinks">' . esc_attr__( 'Pages:', 'business-press' ),
					'after'            => '</p>',
					'link_before'      => '<span class="pagelinksa">',
					'link_after'       => '</span>',
			) );
			?>
					
		</div>
				
	</div>
</div>
