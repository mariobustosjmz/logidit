<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/mariobustosjmz
 * @since      1.0.0
 *
 * @package    Logidit
 * @subpackage Logidit/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->


<div class="wrap logidit">

	<h2><?php echo esc_html(get_admin_page_title()); ?></h2>

	<form method="post" name="logidit_options" action="options.php">

		<?php

		$options = get_option($this->plugin_name);
 
	    // New Login customization vars
		$login_logo_id = $options['login_logo_id'];
		$login_logo = wp_get_attachment_image_src( $login_logo_id, 'thumbnail' );

	    //print_r($login_logo);
		$login_logo_url = $login_logo[0];
		$login_background_color = $options['login_background_color'];
		$login_button_primary_color = $options['login_button_primary_color'];

		?>

		<?php
		settings_fields($this->plugin_name);
		do_settings_sections($this->plugin_name);
		?> 

		<!-- Login page customizations -->

		<h2 class="nav-tab-wrapper"><?php _e('Edicion Login', $this->plugin_name);?></h2>

		<p><?php _e('Agregue un  logo para el formulario de Login y cambiel el color de fondo y botones', $this->plugin_name);?></p>

		<!-- add your logo to login -->
		<fieldset>
			<legend class="screen-reader-text"><span><?php esc_attr_e('Login Logo', $this->plugin_name);?></span></legend>
			<label for="<?php echo $this->plugin_name;?>-login_logo">
				<input type="hidden" id="login_logo_id" name="<?php echo $this->plugin_name;?>[login_logo_id]" value="<?php echo $login_logo_id; ?>" />
				<input id="upload_login_logo_button" type="button" class="button" value="<?php _e( 'Subir Logo', $this->plugin_name); ?>" />
				<span><?php esc_attr_e('Login Logo', $this->plugin_name);?></span>
			</label>
			<div id="upload_logo_preview" class="logidit-upload-preview <?php if(empty($login_logo_id)) echo 'hidden'?>">
				<img src="<?php echo $login_logo_url; ?>" />
				<button id="logidit-delete_logo_button" class="logidit-delete-image"><i class="fa fa-trash fa-2x"></i></button>
			</div>
		</fieldset>
		<br>
		<!-- login background color-->
		<fieldset class="logidit-admin-colors">
			<legend class="screen-reader-text"><span><?php _e(' Background Color', $this->plugin_name);?></span></legend>
			<label for="<?php echo $this->plugin_name;?>-login_background_color">
				<input type="text" class="<?php echo $this->plugin_name;?>-color-picker" id="<?php echo $this->plugin_name;?>-login_background_color" name="<?php echo $this->plugin_name;?>[login_background_color]" value="<?php echo $login_background_color;?>" />
				<span><?php esc_attr_e(' Background Color', $this->plugin_name);?></span>
			</label>
		</fieldset>
		<br>
		<!-- login buttons and links primary color-->
		<fieldset class="logidit-admin-colors">
			<legend class="screen-reader-text"><span><?php _e('Color Botones y Links ', $this->plugin_name);?></span></legend>
			<label for="<?php echo $this->plugin_name;?>-login_button_primary_color">
				<input type="text" class="<?php echo $this->plugin_name;?>-color-picker"  id=" <?php echo $this->plugin_name;?>  -login_button_primary_color" name="<?php echo $this->plugin_name;?>[login_button_primary_color]" value="<?php echo $login_button_primary_color;?>" />
				<span><?php esc_attr_e('Color Botones y Links', $this->plugin_name);?></span>
			</label>
		</fieldset>


		<?php submit_button(__('Guardar Camios', $this->plugin_name), 'primary','submit', TRUE); ?>

	</form>

</div>