<?php
	global $CONFIG;
	$currentUser = get_loggedin_user();
	
	$initialAdmin = get_entities_from_metadata('admin', '1', 'user');;
	
	if(count($initialAdmin) >= 1){
		$initialAdmin = $initialAdmin[0];
	}
	
	$adminTable = "";
	$adminUserObjects = get_entities_from_metadata('admin', 'yes', 'user');
	
	foreach($adminUserObjects as $admin){
		$adminMetaObjects = get_metadata_for_entity($admin->guid);;
		$adminMetaObject = null;
		$adminCreator = null;
		
		foreach($adminMetaObjects as $metaObject){
			if($metaObject->name == 'admin'){
				$adminMetaObject = $metaObject;
				$adminCreator = get_user($adminMetaObject->owner_guid);
			}
		}
		
		// delete knop maken
		if($admin->guid != $currentUser->guid){
			$deleteBody = "<a href='#' title='" . elgg_echo('admin4admins:list:delete:alt') . "' onclick='document.deleteForm" . $adminMetaObject->id . ".submit();'><img src='" . $vars['url'] . "_graphics/icon_customise_remove.gif' alt='" . elgg_echo('admin4admins:list:delete:alt') . "'></a>";
			$deleteBody .= elgg_view('input/hidden',array('internalname' => 'metaID','value' => $adminMetaObject->id));
			$deleteBody .= elgg_view('input/hidden',array('internalname' => 'userName','value' => $admin->name));
			
			$deleteForm = elgg_view('input/form', array('internalname' => "deleteForm{$adminMetaObject->id}", 'method' => "post", 'action' => "{$vars['url']}action/admin_for_admins/delete", 'body' => $deleteBody));
		} else {
			$deleteForm = "&nbsp;";
		}
		
		// tijden leesbaar maken
		$timeFormat = elgg_echo('admin4admins:list:timeformat');
		$lastLogin = "";
		
		if($admin->last_login > 0){
			$lastLogin = date($timeFormat, $admin->last_login);
		} else {
			$lastLogin = elg_echo('admin4admins:list:nologin');
		}
		
		$adminSince = date($timeFormat, $adminMetaObject->time_created);
		
		// tabel vullen
		$adminTable .= "<tr>";
		$adminTable .= "<td>" . $deleteForm . "</td>";
		$adminTable .= "<td><a href='" . $admin->getUrl() . "'>" . $admin->name . "</a></td>";
		$adminTable .= "<td>" . $lastLogin . "</td>";
		$adminTable .= "<td>" . $adminSince . "</td>";
		$adminTable .= "<td><a href='" . $adminCreator->getUrl() . "'>" . $adminCreator->name . "</a></td>";
		$adminTable .= "</tr>";
	}
?>
<h3><?php echo elgg_echo('admin4admins:list'); ?></h3>
<div>
	<p>
		<?php echo elgg_echo('admin4admins:list:initialadmin'); ?> <a href='<?php echo $initialAdmin->getUrl(); ?>'><?php echo $initialAdmin->name; ?></a>
	</p>
    <table class="admin4adminsTable">
    	<tr>
			<td>&nbsp;</td>
            <th><?php echo elgg_echo('admin4admins:list:admin'); ?></th>
			<th><?php echo elgg_echo('admin4admins:list:lastlogon'); ?></th>
            <th><?php echo elgg_echo('admin4admins:list:since'); ?></th>
            <th><?php echo elgg_echo('admin4admins:list:by'); ?></th>
        </tr>
		<?php echo $adminTable; ?>
    </table> 
</div>