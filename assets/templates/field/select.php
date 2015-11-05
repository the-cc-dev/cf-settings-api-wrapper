<?php

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }

if ( ! $args['options'] ) {
	$args['missing_fields'] = array(
		'options'
	);
	$do_template = D23_Membership_Config::field_type_callback( 'invalid_args' );
	$do_template( $args );
}
else {
?>

<div>
	<?php if ( $args['in_group'] ) : ?>
	<label class="grouped-label" for="<?php echo esc_attr( $args['name'] ); ?>">
		<?php echo $args['label']; ?>
	</label>
	<?php endif; ?>
	<select
		id="<?php echo esc_attr( $args['name'] ); ?>"
		name="<?php echo esc_attr( $args['name'] ); ?>"
		value="<?php echo esc_attr( $args['value'] ); ?>"
	>
	<?php foreach ( $args['options'] as $option => $option_value ) :
			?>
		<option value="<?php echo $option;?>" <?php selected( $option, $args['value'] );?>"><?php echo $option_value; ?></option>
			<?php
		endforeach;
	?>
	</select>
<?php if ( isset( $args['description'] ) ): ?>
	<p class="description"><?php echo wp_kses( $args['description'], $allowed_tags ); ?></p>
<?php endif; ?>
</div>
<?php
}
