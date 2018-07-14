<?php
if (isset($_GET['turnOnUnderConstructionMode']))
{
	update_option('theme_uc_ActivationStatus', 1);

}

if (isset($_GET['turnOffUnderConstructionMode']))
{
	update_option('theme_uc_ActivationStatus', 0);

}

// ======================================
// 		process display options
// ======================================

if (isset($_POST['display_options']))
{
	if ($_POST['display_options'] == 0) //they want to just use the default
	{
		update_option('theme_uc_DisplayOption', 0);
	}

	if ($_POST['display_options'] == 1) //they want to use the default with custom text
	{
		$values = array('pageTitle'=>'', 'headerText'=>'', 'bodyText'=>'');

		if (isset($_POST['pageTitle']))
		{
			$values['pageTitle'] = esc_attr($_POST['pageTitle']);
		}

		if (isset($_POST['headerText']))
		{
			$values['headerText'] = esc_attr($_POST['headerText']);
		}
		if (isset($_POST['headerImage']))
		{
			$values['headerImage'] = esc_attr($_POST['headerImage']);
		}

		if (isset($_POST['bodyText']))
		{
			$values['bodyText'] = esc_attr($_POST['bodyText']);
		}


		update_option('theme_uc_CustomText', $values);
		update_option('theme_uc_DisplayOption', 1);
	}

	if ($_POST['display_options'] == 2) //they want to use their own HTML
	{
		if (isset($_POST['ucHTML']))
		{
			update_option('theme_uc_HTML',esc_attr($_POST['ucHTML']));
			update_option('theme_uc_DisplayOption', 2);
		}
	}
}

// ======================================
// 		process http status codes
// ======================================
if (isset($_POST['activate']))
{
	if ($_POST['activate'] == 0)
	{
		update_option('theme_uc_ActivationStatus', 0);
	}

	if ($_POST['activate'] == 1)
	{
		update_option('theme_uc_ActivationStatus', 1);
	}
}




?>
<noscript>
	<div class='updated' id='javascriptWarn'>
		<p>JavaScript appears to be disabled in your browser. For this plugin
			to work correctly, please enable JavaScript or switch to a more
			modern browser</p>
	</div>
</noscript>
<div class="wrap">
	<div id="icon-options-general" class="icon32">
		<br />
	</div>
	<form method="post" action="" id="ucoptions">
		<h2>Under Construction</h2>
        <?php
			$ucIsActive 					= get_option('theme_uc_ActivationStatus');
			$theme_uc_displayStatusCodeIs 	= get_option('theme_uc_DisplayOption');
			
			$theme_uc_CustomText			= get_option('theme_uc_CustomText');
			
			$theme_uc_getCustomPageTitle	= $theme_uc_CustomText['pageTitle'];
			$theme_uc_getCustomHeaderText	= $theme_uc_CustomText['headerText'];
			$theme_uc_getCustomHeaderImage	= $theme_uc_CustomText['headerImage'];
			$theme_uc_getCustomBodyText		= html_entity_decode(stripslashes($theme_uc_CustomText['bodyText']));
			
			$theme_uc_HTML					= html_entity_decode(stripslashes(get_option('theme_uc_HTML')));
			
			
		
		?>
		<table>
			<tr>
				<td>
					<h3>Activate or Deactivate</h3>
				</td>
			</tr>
			<tr>
				<td>
                	
					<fieldset>
						<legend class="screen-reader-text">
							<span> Activate or Deactivate </span>
						</legend>
						<label title="activate"> <input type="radio" name="activate" value="1" <?php if ($ucIsActive==1) { echo ' checked="checked"'; } ?>> on </label> <br /> 
                        <label title="deactivate"> <input type="radio" name="activate" value="0" <?php if ($ucIsActive==0) { echo ' checked="checked"'; } ?>>off </label>
					</fieldset>
				</td>
			</tr>
			<tr>
			

			<tr>
				<td>
					<h3>Display Options</h3>
				</td>
			</tr>
			<tr>
				<td>
					<fieldset>
						<legend class="screen-reader-text">
							<span> Display Options </span>
						</legend>
						<label title="defaultPage">
                        <input type="radio" name="display_options" value="0" id="displayOption0" <?php if ($theme_uc_displayStatusCodeIs==0) { echo ' checked="checked"'; } ?>>
							Display the default under construction page </label> <br /> 
                        <label title="HTTP503"> 
                            <input type="radio" name="display_options" value="1" id="displayOption1" <?php if ($theme_uc_displayStatusCodeIs==1) { echo ' checked="checked"'; } ?>>
							Display the default under construction page , but use custom text
						</label> <br /> <label title="HTTP503">
                        	<input type="radio" name="display_options" value="2" id="displayOption2" <?php if ($theme_uc_displayStatusCodeIs==2) { echo ' checked="checked"'; } ?>>
							Display a custom page using your own HTML </label>
					</fieldset>
				</td>
			</tr>
		</table>
		<div id="customText"
		<?php if (!($theme_uc_displayStatusCodeIs==1)) { echo ' style="display: none;"'; } ?>>
			<h3>Display Custom Text</h3>
			<p>The text here will replace the text on the default page</p>
			<table>
				<tr valign="top">
					<th scope="row"><label for="pageTitle"> Page Title </label>
					</th>
					<td><input name="pageTitle" type="text" id="pageTitle"
						value="<?php echo $theme_uc_getCustomPageTitle; ?>"
						class="regular-text" size="50">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="headerText"> Header Text </label>
					</th>
					<td><input name="headerText" type="text" id="headerText"
						value="<?php echo $theme_uc_getCustomHeaderText; ?>"
						class="regular-text" size="50">
					</td>
				</tr>
                	<tr valign="top">
					<th scope="row"><label for="headerImage"> Header Logo </label>
					</th>
					<td><input name="headerImage" type="text" id="headerText"
						value="<?php echo $theme_uc_getCustomHeaderImage; ?>"
						class="regular-text" size="50">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="bodyText"> Body Text </label>
					</th>
					<td><?php echo '<textarea rows="5" cols="75" name="bodyText" id="bodyText" class="regular-text">'.esc_textarea($theme_uc_getCustomBodyText).'</textarea>'; ?>
					</td>
				</tr>
			</table>
		</div>
		<div id="customHTML"
		<?php if (!($theme_uc_displayStatusCodeIs == 2)) { echo ' style="display: none;"'; } ?>>
			<h3>Under Construction Page HTML</h3>
			<p>Put in this area the HTML you want to show up on your front page</p>
			<?php echo '<textarea id="ucHTML" name="ucHTML" rows="15" cols="100">'. $theme_uc_HTML.'</textarea>'; ?>
            <style type="text/css">
				#ucHTML{ width:100%;}
			</style>
		</div>
		<p class="submit">
			<input type="submit" name="Submit" class="button-primary"
				value="Save Changes" id="submitChangesToUnderConstructionPlugin" />
		</p>
	</form>
</div>
