<?php
require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

admin_gatekeeper();
set_context('admin');
// Set admin user for user block
set_page_owner($_SESSION['guid']);

$title = elgg_view_title(elgg_echo('admin4admins:title'));
$intro = elgg_view('admin_for_admins/intro');
$add = elgg_view('admin_for_admins/addform');
$list = elgg_view('admin_for_admins/list');

$page_data = $title . $intro . $add . $list;
// Display main admin menu
page_draw(elgg_echo('admin4admins'), elgg_view_layout("two_column_left_sidebar", '', $page_data));

?>
