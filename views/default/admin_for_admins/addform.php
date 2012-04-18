<?php 
	global $CONFIG;
	
	// forumlier maken
	$formBody = elgg_view('input/text', array('internalname' => 'username'));
	$formBody .= elgg_view('input/submit', array('internalname' => 'addAdmin', 'value' => 'Add'));
	
	$addForm = elgg_view('input/form', array('body' => $formBody, 'method' => 'post', 'action' => $vars['url'] . "action/admin_for_admins/add"));

?>
<div>
<h3><?php echo elgg_echo('admin4admins:addForm'); ?></h3>
<?php echo elgg_echo('admin4admins:addForm:intro'); ?>

<?php echo $addForm; ?>
</div>
