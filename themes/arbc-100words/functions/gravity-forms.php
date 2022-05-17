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

// ADDS A SPAN TAG AFTER THE GRAVITY FORMS BUTTON
// aria-hidden is added for accessibility (hides the icon from screen readers)
add_filter( 'gform_submit_button', 'arbc_add_span_tags', 10, 2 );
function arbc_add_span_tags ( $button, $form ) {

	return $button .= "<span aria-hidden='true'></span>";

}
