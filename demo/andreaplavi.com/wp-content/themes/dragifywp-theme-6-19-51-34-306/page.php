<?php

get_header();

// Start the loop.
while ( have_posts() ) : the_post();
	dragifywp_fw_page_render();
endwhile;

get_footer();
