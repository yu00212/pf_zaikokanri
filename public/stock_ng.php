<?php
require_once('../login_certification/certification.php');
certification();
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<link rel = "stylesheet" href = "css/common.css">
<title>在庫管理</title>
</head>
<body>

<p>商品が選択・入力されていません。<br></p>

<form action = "list.php">
<input type = "submit" value = "戻る">
</form>

</body>
