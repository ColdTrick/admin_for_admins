<?php
	global $CONFIG;
	
	// Make sure we're logged in (send us to the front page if not)
	admin_gatekeeper();

	// Make sure action is secure
	action_gatekeeper();

	// Get input data
	$id = get_input('metaID');
	$userName = get_input('userName');
	$metaObject = get_metadata($id);
	
	if($metaObject instanceof ElggMetadata && $metaObject->canEdit() && !empty($userName)){
		$result = $metaObject->delete();
		if($result){
			system_message($userName . " " . elgg_echo('admin4admins:delete:success'));
		} else {
			register_error(elgg_echo('admin4admins:delete:error:remove') . " " . $userName);
		}
	} else {
		register_error(elgg_echo('admin4admins:delete:error:input'));
	}
	
	forward($_SERVER['HTTP_REFERER']);
	
?>