<?php
// Contains functions to render partial views
$options = dragifywp_fw_get_options();

function dragifywp_fw_single_post_info_render($author_id) {
	?>
	<header class="dragifywp-singlePost__header">
		<div class="dragifywp-singlePost__avatar-wrap">
			<?php
			$href = get_author_posts_url($author_id);
			$url = get_avatar_url($author_id);
			echo dragifywp_fw_get_avatar($href, $url, ['dragifywp-singlePost__avatar']);
			?>
		</div>
		<div class="dragifywp-singlePost__info">
			<a href="<?php echo get_author_posts_url($author_id); ?>" class="dragifywp-singlePost__author lc-p dragifywp--mBold"><?php the_author(); ?></a>
			<div class="dragifywp-singlePost__date lc-d"><?php echo _e('on', 'dragifywp') ?> <?php the_date('M d, Y'); ?></div>
		</div>
	</header>
	<?php
}

function dragifywp_fw_single_post_hero_render($options, $author_id) {
	?>
	<div class="dragifywp-singlePost__hero<?php if(!empty($options['single_post_hero_parallax'])) echo ' dragifywp-singlePost__hero--parallax';?>">
		<?php
		if(has_post_thumbnail()):
		?>
		<div class="dragifywp-hero__background">
			<?php echo dragifywp_fw_get_post_feature_lazy_image(); ?>
		</div>
		<?php
		endif;
		?>

		<div class="dragifywp-singlePost__hero__overlay"></div>
		<div class="dragifywp-singlePost__hero__content">
			<div class="dragifywp-singlePost__hero__content__wrap">
				<div class="dragifywp-container">
					<div class="dragifywp-singlePost__hero__cats dragifywp--bold"><?php echo dragifywp_fw_get_category_list_html(get_the_category()); ?></div>
					<h1 class="dragifywp-singlePost__hero__title"><?php the_title(); ?></h1>
					<div class="dragifywp-singlePost__hero__info">
						<?php
						$href = get_author_posts_url($author_id);
						$url = get_avatar_url($author_id);
						echo dragifywp_fw_get_avatar($href, $url, ['dragifywp-singlePost__hero__avatar']);
						?>
						<div class="dragifywp-singlePost__hero__author dragifywp--marginTop5"><a href="<?php echo get_author_posts_url($author_id); ?>" class="dragifywp--eBold"><?php the_author(); ?></a></div>
						<div class="dragifywp-singlePost__hero__date"><?php _e('on','dragifywp') ?> <?php the_date('M d, Y'); ?></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}

function dragifywp_fw_single_post_tags_render() {
	$tags = get_the_tags();

	if (!empty($tags)):
		$tags_html = array();

		foreach ($tags as $tag) {
			$tags_html[] = '<a href="' . get_tag_link($tag->term_id) . '" class="dragifywp-singlePost__tag dragifywp-link">' . $tag->name . '</a>';
		}
		?>
		<div class="dragifywp-singlePost__tags">
			<?php echo implode('', $tags_html); ?>
		</div><!-- post tags -->
	<?php endif;
}

function dragifywp_fw_single_post_share_render($options) {
	?>
	<div class="dragifywp-singlePost__share">
		<span><?php _e('Share to', 'dragifywp')?>:</span>
		<?php

		if(!empty($options['single_twitter_enable'])){
			echo '<a class="dragifywp-singlePost__share__twitter" target="_blank" href="http://twitter.com/share?text='.get_the_title().'&url='.get_the_permalink().'"><span class="fa fa-twitter"></a>';
		}

		if(!empty($options['single_facebook_enable'])){
			echo '<a class="dragifywp-singlePost__share__facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'"><span class="fa fa-facebook"></a>';
		}

		if(!empty($options['single_linkedin_enable'])){
			echo '<a class="dragifywp-singlePost__share__linkedin" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink() . '&source=LinkedIn">
						<span class="fa fa-linkedin"></span>
					</a>';
		}

		if(!empty($options['single_pinterest_enable']) && has_post_thumbnail()){
			echo '<a class="dragifywp-singlePost__share__pinterest" href="http://pinterest.com/pin/create/button/?url=' . get_the_permalink() . '&media=' . get_the_post_thumbnail_url() . '&description=' . get_the_title() . '" count-layout="horizontal" target="_blank">
						<span class="fa fa-pinterest"></span>
					</a>';
		}

		if(!empty($options['single_email_enable'])){
			echo '<a class="dragifywp-singlePost__share__email" href="mailto:" target="_blank"><span class="fa fa-envelope"></span></a>';
		}
		?>
	</div>
	<?php
}

function dragifywp_fw_single_post_author_summary_render($author_id, $options) {
	?>
	<div class="dragifywp-authorSummary lc-b">
		<div class="dragifywp-media dragifywp-media--top">
			<div class="dragifywp-media__image">
				<?php
				$url = get_avatar_url($author_id);
				echo dragifywp_fw_get_avatar('', $url, ['dragifywp-authorSummary__avatar']);
				?>
			</div>
			<div class="dragifywp-media__content dragifywp-authorSummary__detail">
				<h6 class="dragifywp-authorSummary__name lc-h dragifywp--eBold"><?php the_author(); ?></h6>
				<p class="dragifywp-authorSummary__bio">
					<?php echo get_user_meta($author_id, 'description', true); ?>
				</p>
				<a href="<?php echo get_author_posts_url($author_id); ?>" class="dragifywp-authorSummary__visitLink lc-h-p dragifywp--eBold"><?php _e("All author posts", 'dragifywp'); ?> »</a>
			</div>
		</div>
	</div><!-- single post author summary -->
	<?php
}

function dragifywp_fw_single_post_nav_render() {
	$previous_post = get_previous_post();
	$next_post = get_next_post();
	if(!empty($previous_post) || !empty($next_post)):
	?>
		<div class="dragifywp-postNav lc-b lcs-d-h">
			<?php
			if (!empty($previous_post)) :
				?>
				<div class="dragifywp--floatLeft">
					<a href="<?php echo get_permalink($previous_post->ID); ?>">« <?php _e('Previous post','dragifywp') ?></a>
				</div>
				<?php
			endif;

			if (!empty($next_post)) :
				?>
				<div class="dragifywp--floatRight">
					<a href="<?php echo get_permalink($next_post->ID); ?>"><?php _e('Next post','dragifywp'); ?> »</a>
				</div>
				<?php
			endif;
			?>
		</div><!-- single post navigation -->
	<?php
	endif;
}

function dragifywp_fw_load_more_button_render($args = array(), $echo = true) {
	$args = array_merge(array(
		'settings' => array(
			'limit' => 5,
			'orderby' => 'date',
			'order' => 'DESC',
			'data' => json_encode(array('type' => 'posts')),
			'append_to' => '.dragifywp-blogImage__wrap',
			'text' => __('Load More','dragifywp'),
			'loading_text' => __('Loading...','dragifywp')
		),
		'custom_settings' => array(),
		'custom_class' => '',
		'before' => '',
		'after' => ''
	), $args);

	$custom_settings = !empty($args['custom_settings']) ? ' data-custom-settings="' . esc_attr(json_encode($args['custom_settings'])) . '"' : '';

	ob_start(); ?>
	<?php echo $args['before']; ?>
	<div class="dragifywp-loadMoreBtn__wrap">
		<button class="dragifywp-loadMoreBtn dragifywp--eBold<?php echo !empty($args['custom_class']) ? ' '.$args['custom_class'] : ''; ?>"
				data-settings="<?php echo esc_attr(json_encode($args['settings']));?>"<?php echo $custom_settings; ?>>
			<span class="dragifywp-loadMoreBtn__icon"></span><span class="dragifywp-loadMoreBtn__text"><?php echo $args['settings']['text']; ?></span>
		</button>
	</div>
	<?php
	echo $args['after'];
	$html = ob_get_clean();

	if ($echo) {
		echo $html;
	} else {
		return $html;
	}
}

function dragifywp_fw_infinite_scroller_render($args = array(), $echo = true) {
	$args = array_merge(array(
		'settings' => array(
			'limit' => 5,
			'orderby' => 'date',
			'order' => 'DESC',
			'data' => json_encode(array('type' => 'posts')),
			'append_to' => '.dragifywp-blogImage__wrap',
			'load_all_text' => __('No more posts to load','dragifywp'),
		),
		'custom_settings' => array(),
		'custom_class' => ''
	), $args);

	$custom_settings = !empty($args['custom_settings']) ? ' data-custom-settings="' . esc_attr(json_encode($args['custom_settings'])) . '"' : '';

	ob_start() ?>
	<div class="dragifywp-infiniteScroller<?php if(!empty($args['custom_class'])) echo ' '.$args['custom_class']; ?>"
		 data-settings="<?php echo esc_attr(json_encode($args['settings'])); ?>"<?php echo $custom_settings ?>></div>
	<?php
	$html = ob_get_clean();

	if ($echo) {
		echo $html;
	} else {
		return $html;
	}
}

function dragifywp_fw_module_is_enabled($module, $frontend = true) {
	$options = dragifywp_fw_get_options();

	if(!is_array($options['exclude_modules'])){
		return false;
	}

	if ($frontend) {
		return !in_array($module, $options['exclude_modules']) && !empty($options[$module.'_enable']);
	} else {
		return !in_array($module, $options['exclude_modules']);
	}
}

function dragifywp_fw_classic_post_item_render($args, $custom_class = array(), $echo = true) {
	global $options;
	$id = get_the_ID();
	$settings = dragifywp_fw_get_settings($id);
	$short_info = !empty($args['info']);
	$custom_class[] = 'dragifywp-blogClassic__item lc-b';

	if(!empty($options['blog_classic_scroll_effect']) && $options['blog_classic_scroll_effect'] != 'none'){
		$custom_class[] = 'dragifywp-sa';
		$custom_class[] = $options['blog_classic_scroll_effect'];
	}

	ob_start();
	?>
	<article <?php post_class(implode(' ', $custom_class)); ?>>
		<div class="dragifywp-bci__wrap">
			<?php if ($short_info) : ?>
				<div class="dragifywp-bci__lookup">
					<div class="dragifywp-bci__avatar-wrap dragifywp--paddingRight10">
						<?php
						$author_id = get_the_author_meta('ID');
						$href = get_author_posts_url($author_id);
						$url = get_avatar_url($author_id);
						echo dragifywp_fw_get_avatar($href, $url, ['dragifywp-bci__avatar']);
						?>
					</div>

					<div class="dragifywp-bci__info">
						<a href="<?php echo get_author_posts_url($author_id); ?>" class="dragifywp-bci__author lc-p dragifywp--bold"><?php the_author(); ?></a>
						<div class="dragifywp-bci__date lc-d">
							<?php echo get_the_date('M d, Y'); ?>
						</div>
					</div>
				</div><!-- lookup-->
			<?php endif; ?>

			<div class="dragifywp-bci__content">
				<?php
				if (!empty($settings['feature']['url'])) :
					$urls = !empty($settings['feature']['sizes']) ? $settings['feature']['sizes'] : array();
					?>
					<div class="dragifywp-bci__media">
						<figure class="dragifywp-bci__image">
						<?php
						echo dragifywp_fw_get_lazy_image($settings['feature']['url'], $urls, array('600', '900', '1200', 'full'));
						?>
						</figure>
					</div>
				<?php
				elseif(has_post_thumbnail()):
				?>
					<div class="dragifywp-bci__media">
						<figure class="dragifywp-bci__image">
							<?php
							echo dragifywp_fw_get_post_feature_lazy_image();;
							?>
						</figure>
					</div>
				<?php endif; ?>

				<h3 class="dragifywp-bci__title lcs-h-p"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php
				if(has_excerpt()){
					echo '<div class="dragifywp-bci__excerpt">' . dragifywp_fw_trim_excerpt(get_the_excerpt(), 30) . '</div>';
				}
				?>
			</div>

			<a class="dragifywp-bci__readMore lc-d-h" href="<?php the_permalink(); ?>"><?php _e('Read more', 'dragifywp'); ?>...</a>
		</div>
	</article>
	<?php
	$html = ob_get_clean();

	if ($echo) {
		echo $html;
	} else {
		return $html;
	}
}

function dragifywp_fw_classic_grid_post_item_render($args, $custom_class = array(), $echo = true) {
	$ID = get_the_ID();
	$custom_class[] = 'dragifywp-bcgi dragifywp-gCol';

	ob_start();
	?>
	<article <?php post_class(implode(' ', $custom_class)); ?>>
		<div class="dragifywp-bcgi__wrap">
			<?php
			if (has_post_thumbnail()):
				echo '<a class="dragifywp-bcgi__img" href="'.get_the_permalink().'">'.dragifywp_fw_get_post_feature_lazy_image().'</a>';
			endif; ?>
			<div class="dragifywp-bcgi__content">
				<div class="dragifywp-bcgi__cats dragifywp--bold">
					<?php echo dragifywp_fw_get_category_list_html(get_the_category()); ?>
				</div>
				<h6 class="dragifywp-bcgi__title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h6>
				<?php if ($args['excerpt_enable'] && has_excerpt($ID)) : ?>
					<div class="dragifywp-bcgi__excerpt"><?php echo dragifywp_fw_trim_excerpt(get_the_excerpt($ID), 25); ?></div>
				<?php endif; ?>

				<footer class="dragifywp-bcgi__footer">
					<?php
					$author_id = get_the_author_meta('ID');
					$href = get_author_posts_url($author_id);
					$url = get_avatar_url($author_id);
					echo dragifywp_fw_get_avatar($href, $url, ['dragifywp-bcgi__avatar']);
					?>
					<a href="<?php echo get_author_posts_url($author_id); ?>" class="dragifywp-bcgi__author dragifywp--bold"><?php echo get_the_author_meta('display_name', $author_id); ?></a>
				</footer>
			</div>
		</div>
	</article>
	<?php
	$html = ob_get_clean();

	if ($echo) {
		echo $html;
	} else {
		return $html;
	}
}

function dragifywp_fw_search_item_render($custom_class = array(), $echo = true) {
	global $options;


	ob_start(); ?>
	<div class="dragifywp-search__item">
		<?php
		$post_type = get_post_type();
		$id = get_the_ID();
		if (in_array($post_type, array('post', 'page', 'portfolio'))) :
			$settings = dragifywp_fw_get_settings($id);

			?>

			<a class="dragifywp-search__image lc-d" href="<?php the_permalink(); ?>">
			<?php
			if (has_post_thumbnail($id)):
				echo dragifywp_fw_get_post_feature_lazy_image($id, array('medium'));
			else: ;
				echo '<div class="dragifywp-search__thumb"></div>';
			endif;
			?>
			</a>
		<?php
		endif;
		?>
		<div class="dragifywp-search__content lc-b">
			<h6 class="dragifywp-search__title dragifywp--eBold lcs-h-p"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
			<?php if (has_excerpt()) : ?>
				<p class="dragifywp-search__excerpt"><?php echo dragifywp_fw_trim_excerpt(get_the_excerpt(), 30); ?></p>
			<?php endif; ?>
		</div>
	</div>
	<?php
	$html = ob_get_clean();

	if ($echo) {
		echo $html;
	} else {
		return $html;
	}
}

function dragifywp_fw_thumbnail_generate($size, $url) {
	if (has_post_thumbnail()) {
		the_post_thumbnail($size);
	} else { ?>
		<img src="<?php echo $url; ?>" alt="<?php the_title(); ?>" />
	<?php }
}

function dragifywp_fw_metro_post_item_render($args, $custom_class, $echo = true) {
	$custom_class[] = 'dragifywp-blogMetro__item';

	if(!empty($args['scroll_effect']) && $args['scroll_effect'] != 'none'){
		$custom_class[] = 'dragifywp-sa';
		$custom_class[] = $args['scroll_effect'];
	}

	ob_start(); ?>
	<article <?php post_class(implode(' ', $custom_class)); ?>>
		<a href="<?php echo get_the_permalink(); ?>" class="dragifywp-bmi__wrap">
			<?php
			if(has_post_thumbnail()):
				echo dragifywp_fw_get_post_feature_lazy_image();
			endif;?>
			<div class="dragifywp-bmi__overlay"></div>

			<div class="dragifywp-bmi__content">
				<header class="dragifywp-bmi__header">
					<div class="dragifywp-media dragifywp-media--top">
						<div class="dragifywp-media__image dragifywp--paddingRight10">
							<?php
							$author_id = get_the_author_meta('ID');
							$url = get_avatar_url($author_id);
							echo dragifywp_fw_get_avatar('', $url, ['dragifywp-bmi__avatar']);
							?>
						</div>
						<div class="dragifywp-media__content dragifywp-bmi__info">
							<div class="dragifywp-bmi__author dragifywp--eBold"><?php the_author(); ?></div>
							<div class="dragifywp-bmi__date"><?php echo get_the_date(); ?></div>
						</div>
					</div>
					<h4 class="dragifywp-bmi__title"><?php the_title(); ?></h4>
				</header>

				<footer class="dragifywp-bmi__footer dragifywp--bold">
					<?php
					$categories = get_the_category();
					foreach ($categories as $category) {
						echo '<span>' . $category->name . '</span>';
					}
					?>
				</footer>
			</div>
		</a>
	</article>
	<?php
	$html = ob_get_clean();
	if ($echo) {
		echo $html;
	} else {
		return $html;
	}
}

function dragifywp_fw_fullwidth_page_render($content, $content_class = '', $wrap_class = '') {
	?>
	<div class="dragifywp-page <?php echo $wrap_class; ?>">
		<div class="dragifywp-container">
			<div class="dragifywp-row">
				<div class="dragifywp-page__content dragifywp-page__column <?php echo $content_class; ?>">
					<?php echo $content; ?>
				</div>
			</div>
		</div>
	</div>
	<?php
}

function dragifywp_fw_page_render() {
	$ID = get_the_ID();
	$setting = dragifywp_fw_get_settings($ID);
	$options = dragifywp_fw_get_options();
	$has_border = !empty($options['page_has_border']);

	if(!empty($setting['addition']['before'])){
		echo do_shortcode($setting['addition']['before']);
	}

	// Render Hero Feature Image
	if(!empty($setting['layout']['feature_image'])){
		dragifywp_fw_get_page_hero_section($options);
	}

	// Render Page Breadcrumb
	if(!empty($setting['layout']['breadcrumb'])){
		dragifywp_fw_get_page_breadcrumb();
	}

	// Render Page Content
	$type = !empty($setting['layout']['type']) ? $setting['layout']['type'] : 'blank';
	ob_start();
	the_content();
	$content = ob_get_clean();
	$sidebar = !empty($setting['layout']['sidebar']) ? $setting['layout']['sidebar'] : '';

	$page_content_layout = new DragifyWPPageLayout(array(
		'sidebar' => $sidebar,
		'type' => $type,
		'content' => $content,
		'content_class' => 'dragifywp-entry',
		'has_border' => $has_border
	));

	$page_content_layout->render();

	if(!empty($setting['addition']['after'])){
		echo do_shortcode($setting['addition']['after']);
	}
}

function dragifywp_fw_slideshow_post_render($slide_settings, $post_params){
	$posts = get_posts($post_params);

	ob_start();
	if (!empty($posts)) :
		?>
		<div class="dragifywp-heroSlider owl-carousel" data-settings="<?php echo esc_attr(json_encode($slide_settings)); ?>">
			<?php foreach ($posts as $post) :
				$lazy_bg = '';
				if(has_post_thumbnail($post->ID)){
					$lazy_bg = dragifywp_fw_get_post_feature_lazy_image($post->ID, array('full', 'large', 'medium_large'));
				}
				?>
				<div class="dragifywp-heroSlider__slide">
					<?php echo $lazy_bg; ?>
					<div class="dragifywp-heroSlider__overlay"></div>
					<div class="dragifywp-heroSlider__content">
						<div class="dragifywp-container">
							<div class="dragifywp-heroSlider__info">
								<?php
								$href = get_author_posts_url($post->post_author);
								$url = get_avatar_url($post->post_author);
								echo dragifywp_fw_get_avatar($href, $url, ['dragifywp-heroSlider__avatar']);
								?>
								<div class="dragifywp-heroSlider__author"><?php echo '<a href="'.$href.'" class="dragifywp--eBold">'.get_the_author_meta('display_name',$post->post_author).'</a>'; ?></div>
							</div>
							<h3 class="dragifywp-heroSlider__title"><?php echo get_the_title($post->ID); ?></h3>
							<?php if(has_excerpt($post->ID)) :?>
							<p class="dragifywp-heroSlider__desc"><?php echo dragifywp_fw_trim_excerpt(get_the_excerpt($post->ID), 30); ?></p>
							<?php endif; ?>
							<a class="dragifywp-heroSlider__link dragifywp--eBold" href="<?php echo get_the_permalink($post->ID); ?>"><?php _e('Read more','dragifywp') ?></a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php
	endif;

	return ob_get_clean();
}