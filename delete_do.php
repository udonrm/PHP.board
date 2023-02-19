<?php 
require('dbconnect.php');

$stmt = $db->prepare('delete from messages where id=?');
if(!$stmt){
    die($db->error);
}
$id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!$id){
    echo '投稿が正しく指定されていません';
    exit(); 
}
$stmt->bind_param('i', $id);
$success = $stmt->execute();
if (!$success){
    die($db->error);
}

header('location:index.php');
exit();
?>