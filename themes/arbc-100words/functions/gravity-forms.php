<?php

// Added custom validation for minimum word count
add_filter( 'gform_field_validation_1_1', 'validate_word_count', 10, 4 );

function validate_word_count( $result, $value, $form, $field ) {
	if ( str_word_count( $value ) > 50 ) {
		$result['is_valid'] = false;
		$result['message']  = 'Please enter 50 words or less.';
	}
	return $result;
}
