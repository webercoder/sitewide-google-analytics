<div class="wrap">

	<div id="icon-plugins" class="icon32"><br></div>
	<h2><?php echo Sitewide_Google_Analytics::$PLUGIN_NAME; ?></h2>
	<p>This plugin will insert the same Google Analytics code across all sites.</p>

	<?php if ( isset( $data['saved'] ) ): ?>
	<div id="message" class="updated"><p>Your settings have been saved.</p></div>
	<?php endif; ?>
	
	<form method="post">

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><label for="<?php echo Sitewide_Google_Analytics::$ENABLED_KEY; ?>">Enabled</label></th>
					<td><input type="checkbox" 
							id="<?php echo Sitewide_Google_Analytics::$ENABLED_KEY; ?>" 
							name="<?php echo Sitewide_Google_Analytics::$ENABLED_KEY; ?>" 
							<?php if ($data[Sitewide_Google_Analytics::$ENABLED_KEY]): ?>
							checked="checked"
							<?php endif; ?>
							/></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="<?php echo Sitewide_Google_Analytics::$ID_KEY; ?>">Account Number (Required)</label></th>
					<td>
						<input type="text" 
							class="regular-text"
							id="<?php echo Sitewide_Google_Analytics::$ID_KEY; ?>" 
							name="<?php echo Sitewide_Google_Analytics::$ID_KEY; ?>" 
							value="<?php echo $data[Sitewide_Google_Analytics::$ID_KEY]; ?>"
							placeholder="Your Google identifier for the _setAccount variable."
							/><br>
						For more information, please read Google's documents regarding 
						<a target="_BLANK" href="https://developers.google.com/analytics/devguides/collection/gajs/methods/gaJSApiBasicConfiguration#_gat.GA_Tracker_._setAccount">_setAccount()</a>.
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="<?php echo Sitewide_Google_Analytics::$DOMAIN_KEY; ?>">Domain</label></th>
					<td>
						<input type="text" 
							class="regular-text"
							id="<?php echo Sitewide_Google_Analytics::$DOMAIN_KEY; ?>" 
							name="<?php echo Sitewide_Google_Analytics::$DOMAIN_KEY; ?>" 
							value="<?php echo $data[Sitewide_Google_Analytics::$DOMAIN_KEY]; ?>"
							placeholder="Your domain for the _setDomainName variable."
							/><br>
						For more information, please read Google's documents regarding 
						<a target="_BLANK" href="https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingSite#yourDomainName">_setDomainName('.yourDomainName')</a>.
					</td>
				</tr>
			</tbody>
		</table>

		<p class="submit"><input type="submit" name="Save" id="Save" class="button-primary" value="<?php _e('Save Options'); ?>"></p>

	</form>

</div>
