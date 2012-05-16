<div class="wrap">
	
	<div id="icon-options-general" class="icon32"><br></div>
	<h2><?php echo Msw_Google_Analytics::$PLUGIN_NAME; ?></h2>
	<p>This plugin will insert the same Google Analytics code across all sites.</p>

	<?php if ( isset( $data['saved'] ) ): ?>
	<div id="message" class="updated"><p>Your settings have been saved.</p></div>
	<?php endif; ?>

	<form method="post">

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><label for="<?php echo Msw_Google_Analytics::$ENABLED_KEY; ?>">Enabled</label></th>
					<td><input type="checkbox" 
							id="<?php echo Msw_Google_Analytics::$ENABLED_KEY; ?>" 
							name="<?php echo Msw_Google_Analytics::$ENABLED_KEY; ?>" 
							<?php if ($data[Msw_Google_Analytics::$ENABLED_KEY]): ?>
							checked="checked"
							<?php endif; ?>
							/></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="<?php echo Msw_Google_Analytics::$ID_KEY; ?>">Identifier</label></th>
					<td><input type="text" 
							id="<?php echo Msw_Google_Analytics::$ID_KEY; ?>" 
							name="<?php echo Msw_Google_Analytics::$ID_KEY; ?>" 
							value="<?php echo $data[Msw_Google_Analytics::$ID_KEY]; ?>"
							placeholder="This is the Google identifier for the _setAccount variable."
							/></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="<?php echo Msw_Google_Analytics::$DOMAIN_KEY; ?>">Domain</label></th>
					<td><input type="text" 
							id="<?php echo Msw_Google_Analytics::$DOMAIN_KEY; ?>" 
							name="<?php echo Msw_Google_Analytics::$DOMAIN_KEY; ?>" 
							value="<?php echo $data[Msw_Google_Analytics::$DOMAIN_KEY]; ?>"
							placeholder="This is the domain for the _setDomainName variable."
							/></td>
				</tr>
			</tbody>
		</table>

		<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes"></p>

	</form>

</div>

