<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/common.css">
<title>在庫登録</title>
</head>
<body>

<?php

require_once('../sanitize/sanitize.php');
$post=sanitize($_POST);

$stock_purchase_date=$_POST['purchase_date'];
$stock_deadline=$_POST['deadline'];
$stock_name=$_POST['stock_name'];
$stock_price=$_POST['price'];
$stock_number=$_POST['number'];

//HTMLとPHPで分けれるか調査
list($year, $month, $day) = explode("-", $stock_purchase_date);
if (checkdate($month, $day, $year))
{
  print '購入日　：';
  print $stock_purchase_date;
  print '<br />';
}
else
{
  print '購入日をきちんと入力してください。<br />';
}

list($year, $month, $day) = explode("-", $stock_deadline);
if (checkdate($month, $day, $year))
{
  print '消費期限：';
  print $stock_deadline;
  print '<br />';
}
else
{
  print '消費期限をきちんと入力してください。<br />';
}

if($stock_name == '')
{
  print '商品名をきちんと入力してください。';
}
else
{
  print '商品名　：';
  print $stock_name;
  print '<br />';
}

if(preg_match('/\A[0-9]+\z/',$stock_price)==0)
{
  print '値段をきちんと入力してください。<br />';
}
else
{
  print '値段　　：';
  print $stock_price;
  print '<br />';
}

if(preg_match('/\A[0-9]+\z/',$stock_number)==0)
{
  print '数量をきちんと入力してください。<br />';
}
else
{
  print '数量　　：';
  print $stock_number;
  print '<br />';
  print '<br />';
}

if($stock_purchase_date == false || $stock_deadline == false || $stock_name == '' || preg_match('/\A[0-9]+\z/',$stock_price) == 0 || preg_match('/\A[0-9]+\z/',$stock_number) == 0)
{
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '</form>';
}
else
{
  print '上記の商品を追加します。<br />';
  print '問題なければOKを押してください。<br />';
  print '<form method="post" action="stock_register_done.php">';
  print '<input type="hidden" name="purchase_date" value="'.$stock_purchase_date.'">';
  print '<input type="hidden" name="deadline" value="'.$stock_deadline.'">';
  print '<input type="hidden" name="stock_name" value="'.$stock_name.'">';
  print '<input type="hidden" name="price" value="'.$stock_price.'">';
  print '<input type="hidden" name="number" value="'.$stock_number.'">';
  print '<br />';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '<input type="submit" value="ＯＫ">';
  print '</form>';
}

?>
</body>
</html>
