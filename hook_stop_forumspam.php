<?php
/**
 * Copyright (C) 2013 by k0nsl (i.am@k0nsl.org)
*/

/**
 * @ignore
 */
if (!defined('IN_PHPBB'))
{
   exit;
}

/**
 * This hook queries stopforumspam.com to check if the IP is listed in their DB
 */
function hook_stop_forumspam(&$hook)
{
$req_uri = $_SERVER['REQUEST_URI'];
$reg_pattern = '/mode=register/';
if (preg_match($reg_pattern, $req_uri)) {
$addr = $_SERVER['REMOTE_ADDR'];
$response = file_get_contents('http://www.stopforumspam.com/api?ip='.$addr);
$pattern = '/<appears>yes<\/appears>/';
if (preg_match($pattern, $response)) {
/* include file, redirect, or echo? */
exit();
}
}
}

/**
 * We want it only on normal pages and not administrative ones.
 */
if (!defined('ADMIN_START'))
{
   $phpbb_hook->register(array('template', 'display'), 'hook_stop_forumspam');
}