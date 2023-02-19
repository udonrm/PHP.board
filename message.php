<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿の詳細</title>
</head>
<body>
    <?php
    require ('dbconnect.php');
    $stmt = $db->prepare('select * from messages where id=?');
    if (!$stmt){
        die($db->error);
    }
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if(!$id){
        echo '表示する投稿を選択してください';
        exit();
    }
    $stmt->bind_param('i',$id);
    $stmt->execute();

    $stmt->bind_result($id,$name,$message,$creatted);
    $stmt->fetch();
    ?>

    <div>
        <h1>編集が完了しました</h1>

        <p><a href ="/tech-base">投稿一覧へ戻る</a></p>
    </div>
</body>
</html>