<?php

require_once '../login_certification/certification.php';
certification();

require_once '../db_connect/db_connect.php';
require_once '../common/input_check.php';

try
{
    list($user_data, $err) = validateUser($post);

    $sql = 'UPDATE users SET name = :name, email = :email, password = :pass WHERE id = :user_id';
    $stmt = connect()->prepare($sql);

    if (isset($user_data['user_id'])) {
        $data[':user_id'] = (int) $user_data['user_id'];
    }

    if (isset($user_data['name'])) {
        $data[':name'] = $user_data['name'];
    }

    if (isset($user_data['email'])) {
        $data[':email'] = $user_data['email'];
    }

    if (isset($user_data['pass'])) {
        $data[':pass'] = $user_data['pass'];
    }

    $stmt->execute($data);
    $dbh = null;
} catch (Exception $e) {
    $err['exception'] = $e->getMessage();
}

$smarty->assign('err', $err);

if (isset($err['name']) == false && isset($err['email']) == false && isset($err['pass']) == false && isset($err['pass2']) == false && isset($err['exception']) == false) {
    $smarty->display('../smarty/templates/user/user_edit_done.tpl');
} else {
    $smarty->display('../smarty/templates/err.tpl');
}
