<?php

$templatefiles = mailster( 'templates' )->get_files( mymail_option( 'default_template' ) );

if ( isset( $templatefiles['index.html'] ) ) {
	unset( $templatefiles['index.html'] );
}

$templates = mailster_option( 'woocommerce_templates', array() );

?>

<table class="form-table">
	<tr valign="top">
		<th scope="row"><?php esc_html_e( 'Action', 'mailster-woocommerce' )?></th>
		<td>
		<?php esc_html_e( 'Add customer as subscriber when order has been ', 'mailster-woocommerce' )?>
		<select name="mailster_options[woocommerce_action]">
			<option value="created" <?php selected( mailster_option( 'woocommerce_action' ), 'created' ); ?>><?php _e( 'created', 'mailster-woocommerce' ) ?></option>
			<option value="completed" <?php selected( mailster_option( 'woocommerce_action' ), 'completed' ); ?>><?php _e( 'completed', 'mailster-woocommerce' ) ?></option>
		</select>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php esc_html_e( 'Lists', 'mailster-woocommerce' )?></th>
		<td>
		<?php esc_html_e( 'Add all customer to these lists ', 'mailster-woocommerce' )?>
		<?php mailster( 'lists' )->print_it( null, null, 'mailster_options[woocommerce_lists]', false, mailster_option( 'woocommerce_lists' ) ); ?>
		<p class="description"><?php esc_html_e( 'You can add subscribers to individual lists by defining the option on each product page', 'mailster-woocommerce' )?></p>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php esc_html_e( 'Signup Type', 'mailster-woocommerce' )?></th>
		<td>
		<?php esc_html_e( 'Customers subscribe', 'mailster-woocommerce' )?>
		<select name="mailster_options[woocommerce_type]">
			<option value="checkbox" <?php selected( mailster_option( 'woocommerce_type' ), 'checkbox' ); ?>><?php _e( 'by a checkbox on the checkout page', 'mailster-woocommerce' ) ?></option>
			<option value="auto" <?php selected( mailster_option( 'woocommerce_type' ), 'auto' ); ?>><?php _e( 'automatically without checkbox', 'mailster-woocommerce' ) ?></option>
		</select>
		<p>
		<?php esc_html_e( 'the checkbox default state is', 'mailster-woocommerce' )?>
		<select name="mailster_options[woocommerce_checkbox]">
			<option value="1" <?php selected( mailster_option( 'woocommerce_checkbox' ) ); ?>><?php _e( 'checked', 'mailster-woocommerce' ) ?></option>
			<option value="0" <?php selected( ! mailster_option( 'woocommerce_checkbox' ) ); ?>><?php _e( 'unchecked', 'mailster-woocommerce' ) ?></option>
		</select>
		</p>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php esc_html_e( 'Checkbox Label', 'mailster-woocommerce' )?></th>
		<td><p><input type="text" name="mailster_options[woocommerce_label]" value="<?php echo esc_attr( mailster_option( 'woocommerce_label' ) ) ?>" class="regular-text"></p></td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php esc_html_e( 'Double-Opt-In', 'mailster-woocommerce' )?></th>
		<td><label><input type="hidden" name="mailster_options[woocommerce-double-opt-in]" value="0"><input type="checkbox" name="mailster_options[woocommerce-double-opt-in]" value="1" <?php checked( mailster_option( 'woocommerce-double-opt-in' ) );?>> <?php esc_html_e( 'send confirmation (double-opt-in)', 'mailster-woocommerce' )?></label></td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e( 'Template Files' ,'mailster-woocommerce' ) ?>
		<p class="description">
			<?php _e( 'Define the template file used for transactional emails. Selecting "default" will use the template from the General tab' ); ?>
		</p></th>
		<td>
		<?php if ( mailster_option( 'system_mail' ) ) : ?>
		<p><label><?php _e( 'New Order' ,'mailster-woocommerce' ) ?>:</label>
		<select name="mailster_options[woocommerce_templates][new_order]" class="postform">
			<option value="0"><?php esc_html_e( 'Default', 'mailster-woocommerce' ) ?></option>

		<?php foreach ( $templatefiles as $slug => $filedata ) : ?>
			<option value="<?php echo $slug ?>"<?php selected( $slug == $templates['new_order'] ) ?>><?php echo esc_attr( $filedata['label'] )?> (<?php echo $slug ?>)</option>
		<?php endforeach; ?>

		</select>
		</p>

		<p>
		<label><?php _e( 'Canceled Order' ,'mailster-woocommerce' ) ?>:</label>
		<select name="mailster_options[woocommerce_templates][cancelled_order]" class="postform">
			<option value="0"><?php esc_html_e( 'Default', 'mailster-woocommerce' ) ?></option>

		<?php foreach ( $templatefiles as $slug => $filedata ) : ?>
			<option value="<?php echo $slug ?>"<?php selected( $slug == $templates['cancelled_order'] ) ?>><?php echo esc_attr( $filedata['label'] )?> (<?php echo $slug ?>)</option>
		<?php endforeach; ?>

		</select>
		</p>

		<p>
		<label><?php _e( 'Refunded Order' ,'mailster-woocommerce' ) ?>:</label>
		<select name="mailster_options[woocommerce_templates][refunded_order]" class="postform">
			<option value="0"><?php esc_html_e( 'Default', 'mailster-woocommerce' ) ?></option>

		<?php foreach ( $templatefiles as $slug => $filedata ) : ?>
			<option value="<?php echo $slug ?>"<?php selected( $slug == $templates['refunded_order'] ) ?>><?php echo esc_attr( $filedata['label'] )?> (<?php echo $slug ?>)</option>
		<?php endforeach; ?>

		</select>
		</p>

		<p>
		<label><?php _e( 'Processing Order' ,'mailster-woocommerce' ) ?>:</label>
		<select name="mailster_options[woocommerce_templates][processing_order]" class="postform">
			<option value="0"><?php esc_html_e( 'Default', 'mailster-woocommerce' ) ?></option>

		<?php foreach ( $templatefiles as $slug => $filedata ) : ?>
			<option value="<?php echo $slug ?>"<?php selected( $slug == $templates['processing_order'] ) ?>><?php echo esc_attr( $filedata['label'] )?> (<?php echo $slug ?>)</option>
		<?php endforeach; ?>

		</select>
		</p>

		<p>
		<label><?php _e( 'Completed Order' ,'mailster-woocommerce' ) ?>:</label>
		<select name="mailster_options[woocommerce_templates][completed_order]" class="postform">
			<option value="0"><?php esc_html_e( 'Default', 'mailster-woocommerce' ) ?></option>

		<?php foreach ( $templatefiles as $slug => $filedata ) : ?>
			<option value="<?php echo $slug ?>"<?php selected( $slug == $templates['completed_order'] ) ?>><?php echo esc_attr( $filedata['label'] )?> (<?php echo $slug ?>)</option>
		<?php endforeach; ?>

		</select>
		</p>

		<p>
		<label><?php _e( 'Customer Invoice' ,'mailster-woocommerce' ) ?>:</label>
		<select name="mailster_options[woocommerce_templates][invoice]" class="postform">
			<option value="0"><?php esc_html_e( 'Default', 'mailster-woocommerce' ) ?></option>

		<?php foreach ( $templatefiles as $slug => $filedata ) : ?>
			<option value="<?php echo $slug ?>"<?php selected( $slug == $templates['invoice'] ) ?>><?php echo esc_attr( $filedata['label'] )?> (<?php echo $slug ?>)</option>
		<?php endforeach; ?>

		</select>
		</p>

		<p>
		<label><?php _e( 'Customer Note' ,'mailster-woocommerce' ) ?>:</label>
		<select name="mailster_options[woocommerce_templates][note]" class="postform">
			<option value="0"><?php esc_html_e( 'Default', 'mailster-woocommerce' ) ?></option>

		<?php foreach ( $templatefiles as $slug => $filedata ) : ?>
			<option value="<?php echo $slug ?>"<?php selected( $slug == $templates['note'] ) ?>><?php echo esc_attr( $filedata['label'] )?> (<?php echo $slug ?>)</option>
		<?php endforeach; ?>

		</select>
		</p>

		<p>
		<label><?php _e( 'New Password' ,'mailster-woocommerce' ) ?>:</label>
		<select name="mailster_options[woocommerce_templates][reset_password]" class="postform">
			<option value="0"><?php esc_html_e( 'Default', 'mailster-woocommerce' ) ?></option>

		<?php foreach ( $templatefiles as $slug => $filedata ) : ?>
			<option value="<?php echo $slug ?>"<?php selected( $slug == $templates['reset_password'] ) ?>><?php echo esc_attr( $filedata['label'] )?> (<?php echo $slug ?>)</option>
		<?php endforeach; ?>

		</select>
		</p>

		<p>
		<label><?php _e( 'New Account' ,'mailster-woocommerce' ) ?>:</label>
		<select name="mailster_options[woocommerce_templates][new_account]" class="postform">
			<option value="0"><?php esc_html_e( 'Default', 'mailster-woocommerce' ) ?></option>

		<?php foreach ( $templatefiles as $slug => $filedata ) : ?>
			<option value="<?php echo $slug ?>"<?php selected( $slug == $templates['new_account'] ) ?>><?php echo esc_attr( $filedata['label'] )?> (<?php echo $slug ?>)</option>
		<?php endforeach; ?>

		</select>
		</p>
		<?php else : ?>
		<p class="description">
			<?php esc_html_e( 'You have to enable "System Mails" for Mailster on the General tab to define template files', 'mailster-woocommerce' ); ?>
		</p>
		<?php endif; ?>

		</td>
	</tr>

</table>
