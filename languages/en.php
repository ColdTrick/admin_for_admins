<?php
	$english = array(
	
	/**
	 * Menu items and titles
	 */
	
	'admin4admins' => 'Admin 4 Admins',
	'admin4admins:title' => 'Admin 4 Admins',
	
	// Intro
	'admin4admins:intro:description' => 'This plug-in allows you to add and more importantly <b>remove</b> Site Administrators. To remove a Site Administrator simply click on the button in front of the User in the List of Site Administrators.<br>The initial Site Administrator and yourself cannot be removed.',
	
	// AddForm
	'admin4admins:addForm' => 'Add Site Administrator',
	'admin4admins:addForm:intro' => 'To add an Administrator to the site please provide a username of an existing user.',
	
	// Add
	'admin4admins:add:success' => 'has succesfully been promoted to a Site Administrator',
	'admin4admins:add:error:unknown' => 'could not be added to the Site Administrators',
	'admin4admins:add:error:already' => 'is already a Site Administrator',
	'admin4admins:add:error:invalidusername' => 'Incorrect username provided',
	'admin4admins:add:error:nousername' => 'No username provided',
	
	// Delete
	'admin4admins:delete:success' => 'is no longer an Site Administrator',
	'admin4admins:delete:error:remove' => 'Could not remove Administrator privileges for user',
	'admin4admins:delete:error:input' => 'Incorrect input provided',
	
	// List
	'admin4admins:list' => 'List of Site Administrators',
	'admin4admins:list:timeformat' => 'j F Y G:i',
	'admin4admins:list:initialadmin' => 'The initial Site Administrator is',
	'admin4admins:list:delete:alt' => 'Delete',
	'admin4admins:list:nologin' => 'never logged on',
	'admin4admins:list:admin' => 'Administrator',
	'admin4admins:list:lastlogon' => 'Last logged on',
	'admin4admins:list:since' => 'Admin since',
	'admin4admins:list:by' => 'Promoted by',
	
	);
	
	add_translation("en", $english);
?>