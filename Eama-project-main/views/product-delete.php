<?php

require '../config/function.php';

$pararesult = checkparamid('id');
if (is_numeric($pararesult)) {
    $userid = validate($pararesult);
    $user = getbyid('products', $userid);
    if ($user['status'] == 200) {
        $userdelete = deleteQuery('products', $userid);
        if ($userdelete) {
            redirect('products.php', 'deleting done ');
        } else {
            redirect('products.php', 'something went wrong');
        }
    } else {
        redirect('products.php', $user['message']);
    }
} else {
    redirect('products.php', $pararesult);
}
