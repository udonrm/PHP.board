<?php
$message = filter_input(INPUT_POST, 'message',FILTER_SANITIZE_SPECIAL_CHARS);
$name = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_SPECIAL_CHARS);

require('dbconnect.php');

$stmt= $db->prepare('insert into messages(message,name) values(?,?)');
if(!$stmt){
  die($db->error);
}
$stmt->bind_param('ss',$message,$name);
$ret = $stmt->execute();

if($ret){
  echo '登録されました';
  echo '<br>';
  echo '<a href="index.php">投稿一覧へ戻る</a>';
}else{
  echo $db->error;
}
?>
