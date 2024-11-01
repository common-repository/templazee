<?php
/**
 * 
 * Render Callback For Breadcrumb
 * 
 */

function templazee_block_breadcrumb_render( $attributes ) {

	add_action('wp_enqueue_scripts', function() use ($attributes) {

        $custom_css = "
			#templazee-breadcrumb-block.".esc_attr( $attributes['blockId'] )."{
		";
		
		if(! empty( $attributes['textColor'] ) ){
			$custom_css .= "color:".esc_attr( $attributes['textColor'] ).";";
		}

		if(! empty( $attributes['textAlign'] ) ){
			$custom_css .= "text-align:".esc_attr( $attributes['textAlign'] ).";";
		}

		if(! empty( $attributes['textSize'] ) ){
			$custom_css .= "font-size:".esc_attr( $attributes['textSize'] )."px;";
		}

		$custom_css .= "}";

		if(! empty( $attributes['linkColor'] ) ){
			$custom_css .= "
				#templazee-breadcrumb-block.".esc_attr( $attributes['blockId'] )." a{
			";
				
			$custom_css .= "color:".esc_attr( $attributes['linkColor'] ).";";
				
			$custom_css .= "}";
		}
		
		if(! empty( $attributes['separatorColor'] ) ){
			$custom_css .= "
				#templazee-breadcrumb-block.".esc_attr( $attributes['blockId'] )." .trail-items li.trail-item::after{
			";
				
			$custom_css .= "color:".esc_attr( $attributes['separatorColor'] ).";";
				
			$custom_css .= "}";
		}

		wp_register_style('templazee-breadcrumb-dynamic-styles', false); // 'false' means no file is associated
	
		wp_enqueue_style('templazee-breadcrumb-dynamic-styles');
	
		wp_add_inline_style('templazee-breadcrumb-dynamic-styles', $custom_css);

	});


	ob_start();

?>
	<div id="templazee-breadcrumb-block" class="templazee-wrapper <?php echo esc_attr( $attributes['blockId'] );?>">
        <?php
			if( function_exists('templazee_breadcrumb_trail') ){
				templazee_breadcrumb_trail(); 
			} 			
		?>
	</div>
	<?php
	$html = ob_get_clean();

	return $html;
}
