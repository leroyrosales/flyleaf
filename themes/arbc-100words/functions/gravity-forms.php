<?php

// Added custom validation for minimum word count
add_filter( 'gform_field_validation_1_1', 'validate_word_count', 10, 4 );

function validate_word_count( $result, $value, $form, $field ) {
	if ( str_word_count( $value ) > 110 ) {
		$result['is_valid'] = false;
		$result['message']  = 'Please enter 110 words or less.';
	}
	return $result;
}

/* Gravity Forms Word Count Script */
function els_load_scripts() {
	wp_enqueue_script( 'gravity-forms-word-count', get_template_directory_uri() . '/assets/dist/gravity_word_count.js', array('jquery'), '0.1', true );
}
add_action( 'wp_enqueue_scripts', 'els_load_scripts' );

add_filter( 'gform_submit_button', 'arbc_add_span_tags', 10, 2 );
function arbc_add_span_tags( $button, $form ) {

	return $button .= "<span aria-hidden='true'></span>";

}

add_filter( 'acf/format_value/type=text', 'do_shortcode' );


add_filter( 'gform_confirmation', 'arbc_custom_confirmation', 10, 4 );
function arbc_custom_confirmation( $confirmation, $form, $entry, $ajax ) {



	$confirmation = '<section class="one-hundred-form_wrapper">
	<h2>Thank you for sharing your story!</h2>
	<p><em>Your story will be posted after our review.</em></p>
	<a href="#">Share another story</a> <span class="pen-nav-item"><a href="/stories">View Stories</a></span>
</section>';

	return $confirmation;
}
