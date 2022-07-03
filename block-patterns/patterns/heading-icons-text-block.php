<?php
/**
 * Two columns text block with heading title and subtitle with icons
 */
return array(
    'title'      => __('Two columns text block with heading title and subtitle with icons', 'nxt-toolkit'),
    'categories' => array( 'nxp_patterns' ),
    'content'    => '<!-- wp:group {"className":"nxt-wrap nxt-headining-text-block"} -->
		<div class="wp-block-group nxt-wrap nxt-headining-text-block"><!-- wp:heading -->
		<h2>Header title</h2>
		<!-- /wp:heading -->
		
		<!-- wp:columns {"className":"nxt-headining-text-block__columns"} -->
		<div class="wp-block-columns nxt-headining-text-block__columns"><!-- wp:column {"width":"33.33%"} -->
		<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:paragraph -->
		<p>Additional subheader title</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"width":"66.66%"} -->
		<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:paragraph -->
		<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate tenetur commodi necessitatibus architecto veniam officia expedita non velit molestiae pariatur! Deleniti fuga ea, dicta in maiores odio totam omnis dolorem.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id quis nemo, quisquam possimus, praesentium fuga temporibus reiciendis ullam sed ratione a impedit, exercitationem minus! Vero consequuntur accusamus quidem reiciendis ipsum!</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis optio nulla pariatur, dolore voluptas, sunt dolorem necessitatibus animi, quos quidem minus. Recusandae, aperiam. Nam delectus fugiat aut ut reprehenderit repellat.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p><a href="/" data-type="page">Some Page</a></p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div>
		<!-- /wp:group -->',
);
