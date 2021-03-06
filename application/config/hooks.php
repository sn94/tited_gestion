<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['post_controller_constructor'][] = array(
    'class'    => 'Check_Session',
    'function' => 'is_logged_in',
    'filename' => 'check_session.php',
    'filepath' => 'hooks',
    'params'   => ""
);

/*
$hook['post_controller_constructor'][] = array(
    'class'    => 'Check_Permission',
    'function' => 'grant_access',
    'filename' => 'check_permission.php',
    'filepath' => 'hooks',
    'params'   => ""
);*/
