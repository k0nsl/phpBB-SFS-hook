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
/* empty */
}

/**
 * We want it only on normal pages and not administrative ones.
 */
if (!defined('ADMIN_START'))
{
   $phpbb_hook->register(array('template', 'display'), 'hook_stop_forumspam');
}