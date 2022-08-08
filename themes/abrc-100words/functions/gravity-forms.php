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


// add_filter( 'gform_confirmation', 'arbc_custom_confirmation', 10, 4 );
// function arbc_custom_confirmation( $confirmation, $form, $entry, $ajax ) {

// 	$confirmation = '<section class="one-hundred-form_wrapper">
// 	<h2 class="text-4xl">Thank you for sharing your story!</h2>
// 	<p><em>Your story will be posted after our review, and you will receive an email confirmation once it is live.</em></p>
// 	<div class="flex flex-row justify-between pt-12 items-center">
// 		<a href="' . get_site_url() . '" class="text-black share-more-stories uppercase">Share another story</a> <span class="pen-nav-item"><a href="' . get_site_url() . '/stories" class="text-black uppercase">View Stories</a></span>
// 	</div></section>';

// 	return $confirmation;

// }

add_filter( 'gform_field_validation_3_4', 'arbc_custom_name_validation', 10, 4 );
function arbc_custom_name_validation( $result, $value, $form, $field ) {

	if ( ! $result['is_valid'] ) {
		$result['message'] = 'This field is required unless you select to remain anonymous.';
	}
	return $result;

}

// Placing this for future use

// <h2>Thank you for sharing your story!</h2>
// <em>Your story will be posted after our review, and you will receive an email confirmation once it is live. This is to confirm this is the right confirmation.</em>
// <div class="flex flex-row justify-between pt-12 items-center"><a href="https://100wordstories.org/" class="text-black share-more-stories uppercase">Share another story</a> <span class="pen-nav-item"><a href="https://100wordstories.org//stories" class="text-black uppercase">View Stories</a></span></div>