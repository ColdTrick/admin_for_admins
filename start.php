<?php
	/**
	 * Initialise and set up the menus.
	 *
	 */
	function admin_for_admins_init()	{
		global $CONFIG;
		
		// Extend CSS
		extend_view('css','admin_for_admins/css');
		
		if (isadminloggedin()){
			add_menu(elgg_echo("admin4admins"), $CONFIG->wwwroot . "pg/admin_for_admins/");
		}
		
		// Register a page handler, so we can have nice URLs
		register_page_handler('admin_for_admins','admin_for_admins_page_handler');
		
	}
	
	function admin_for_admins_page_handler($page){
		global $CONFIG;
		
		// only interested in one page for now
		include($CONFIG->pluginspath . "admin_for_admins/index.php"); 
		//echo $CONFIG->pluginspath. "advanced_statistics/index.php";
	}
	
	/**
	 * Adding to the admin menu
	 */
	function admin_for_admins_pagesetup(){
		if (get_context() == 'admin' && isadminloggedin()){
			global $CONFIG;
			add_submenu_item(elgg_echo('admin4admins'), $CONFIG->wwwroot . 'pg/admin_for_admins/');
		}
	}
	
	// Make sure the admin4admins initialisation function is called on initialisation
	register_elgg_event_handler('init','system','admin_for_admins_init');
	register_elgg_event_handler('pagesetup','system','admin_for_admins_pagesetup');
	
	// Register actions
	global $CONFIG;
	register_action("admin_for_admins/delete", false, $CONFIG->pluginspath . "admin_for_admins/actions/delete.php");
	register_action("admin_for_admins/add", false, $CONFIG->pluginspath . "admin_for_admins/actions/add.php");
?>