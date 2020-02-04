<?php
var_dump($_poST);

//未入力の場合のエラー処理
/*if (
!isset($_POST['content']) || $_POST['content']) {
exit('ParamError');
}*/

$content = $_POST['content'];

//DB接続
$dbn ='mysql:dbname=project00;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = 'root';
try {
$pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
exit('dbError:'.$e->getMessage());
}

//SQL作成&実行
$sql ='INSERT INTO table1(id, content)
VALUES(NULL, :a1,)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1' , $content , PDO::PARAM_STAR);
$status = $stmt->execute(); 

//失敗時にエラー出力し、成功時は'main.php'に戻る
if($status==fales){
    $error = $stmt->errorInfo();
    exit('sqlError:'.$error[2]);
}else{
    header('Location: main.php');
}

