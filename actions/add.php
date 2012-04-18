<?php
	global $CONFIG;
	
	// Make sure we're logged in (send us to the front page if not)
	admin_gatekeeper();

	// Make sure action is secure
	action_gatekeeper();

	// Get input data
	$username = get_input('username');
	
	if(!empty($username)){
		$userObject = get_user_by_username($username);
		
		if($userObject != false && $userObject instanceof ElggUser && $userObject->canEdit()){
			$metaObjects = get_metadata_for_entity($userObject->guid);
			$found = false;
			
			foreach($metaObjects as $metaObject){
				if($metaObject->name == "admin" && ($metaObject->value == "yes" || $metaObject->value == "1")){
					$found = true;
				}
			}
			
			if(!$found){
				$result = $userObject->admin = "yes";
				if($result){
					system_message($userObject->name . " " .elgg_echo('admin4admins:add:success'));
				} else {
					register_error($userObject->name . " " . elgg_echo('admin4admins:add:error:unknown'));
				}
			} else {
				register_error($userObject->name . " " . elgg_echo('admin4admins:add:error:already'));
			}
		} else {
			register_error(elgg_echo('admin4admins:add:error:invalidusername'));
		}
	} else {
		register_error(elgg_echo('admin4admins:add:error:nousername'));
	}
	
	forward($_SERVER['HTTP_REFERER']);
?>