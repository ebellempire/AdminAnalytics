<style>
	.helper{font-size:.85em;}
</style>
<?php $u = current_user();?>

<h2><?php echo __('Step 1: Account Configuration'); ?></h2>
<p><?php echo __('Configure your Google Analytics account per instructions at %s', '<a target="_blank" href="https://support.google.com/analytics/answer/3123666" title="Set up the User ID @ Google Analytics Help">support.google.com</a>');?>.</p>

<h2><?php echo __('Step 2: Plugin Configuration'); ?></h2>

<fieldset id="account">

	<div class="field">
	    <div class="two columns alpha">
	        <label for="ga_id"><?php echo __('Property Tracking ID'); ?></label>
	    </div>

	    <div class="inputs five columns omega">
	        <p class="explanation"><?php echo __("Enter the tracking ID for the property"); ?></p>

	        <div class="input-block">
	            <input type="text" class="textinput" name="ga_id" value="<?php echo get_option('ga_id'); ?>">
	            <p class="helper"><?php echo __('Example: UA-1234567-8');?></p>
	        </div>
	    </div>
	</div>

</fieldset>


<h2><?php echo __('Usage Information'); ?></h2>
<p><?php echo __('Users are logged in Google Analytics with their Omeka user ID. For example, an Omeka user with the id of '.$u['id'].' (<em>that\'s you, '.$u['username'].'!</em>) on Omeka will be logged as "User_'.$u['id'].'" in Google Analytics. To cross-reference users, visit <a href="'.WEB_ROOT.'/admin/users">the Users section of your Omeka site</a>, where user id numbers have been appended to the users table.');?></p>
<p><?php echo __('You might be wondering why the plugin doesn\'t just log users with a plain old username. Well, that would be rude, potentially dangerous, and above all, against <a href="https://developers.google.com/analytics/devguides/collection/protocol/policy">Google\'s User ID Policy</a>, which you should read yourself to ensure that you are in compliance.');?></p>