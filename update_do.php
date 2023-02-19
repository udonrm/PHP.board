<?php
require('dbconnect.php');
$stmt = $db->prepare('update messages set name=?, message=? where id=?');
if(!$stmt){
    die($db->error);
}
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

$stmt->bind_param('ssi', $name, $message, $id);
$success = $stmt->execute();
if(!$success){
    die($db->error);
}
header('location:message.php?id=' .$id);
?>