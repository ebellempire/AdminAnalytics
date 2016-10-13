<?php
class AdminAnalyticsPlugin extends Omeka_Plugin_AbstractPlugin
{

	protected $_hooks = array(
		'install',
		'uninstall',
		'config_form',
		'config',
		'admin_footer',
	);


	protected $_options = array(
		'ga_id'=>null,
	);


	/*
    ** Plugin options
    */

	public function hookConfigForm()
	{
		require dirname(__FILE__) . '/config_form.php';
	}

	public function hookConfig()
	{
		set_option('ga_id', $_POST['ga_id']);
	}

	/*
	** Public display
	*/

	public function hookAdminFooter()
	{

		echo adminGoogleAnalytics(get_option('ga_id'));

	}

	/**
	 * Install the plugin.
	 */
	public function hookInstall()
	{
		$this->_installOptions();

	}

	/**
	 * Uninstall the plugin.
	 */
	public function hookUninstall()
	{
		$this->_uninstallOptions();

	}
}

function adminGoogleAnalytics($propertyID){
	$u = current_user();
	$userID = isset($u) ? 'User_'.$u['id'] : 'Unknown';
	
	?>
	<script>
		document.addEventListener("DOMContentLoaded", function(event){	
		<?php if($propertyID){ ?>
			// Tracking code
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
			ga('create', '<?php echo $propertyID;?>', 'auto', {
			  userId: '<?php echo $userID;?>'
			});
			ga('send', 'pageview');
			//console.log('<?php echo 'Tracking '.$userID;?>');
		
			// Add ids to users table for cross-referencing with analytics
			var usersTable=jQuery('table#users');
			if(usersTable.length){
				jQuery('table#users a.edit').each(function(){
					var id = this.href.substr(this.href.lastIndexOf('/') + 1);
					jQuery(this).parents('ul').before('<span style="opacity:.5">('+id+')</span>');
				});
			};
			
			// TODO: Add notice
			// jQuery('body').append('<div>You are being watched. Learn more.</div>');
			
		<?php }	?>
		});
	</script>
	<?php		
}