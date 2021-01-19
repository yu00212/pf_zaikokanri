<?php
require_once('../login_certification/certification.php');
certification();

require_once('../db_connect/db_connect.php');
require('../../../Smarty-master/libs/Smarty.class.php');


$smarty = new Smarty();

$smarty->template_dir = dirname( __FILE__ , 3).'/templates';
$smarty->compile_dir  = dirname( __FILE__ , 3).'/templates_c';
$smarty->config_dir   = dirname( __FILE__ , 3).'/configs';
$smarty->cache_dir    = dirname( __FILE__ , 3).'/cache';

$smarty->escape_html  = true;

$stock_purchase_date = $_POST['purchase_date'];
$stock_deadline = $_POST['deadline'];
$stock_name = $_POST['stock_name'];
$stock_price = $_POST['price'];
$stock_number = $_POST['number'];
$err[] = '';

try
{
  $sql = 'INSERT INTO stocks(purchase_date,deadline,stock_name,price,number) VALUES (?,?,?,?,?)';
  $stmt = connect()->prepare($sql);
  $data[] = $stock_purchase_date;
  $data[] = $stock_deadline;
  $data[] = $stock_name;
  $data[] = $stock_price;
  $data[] = $stock_number;
  $stmt->execute($data);
  $dbh = null;
}
catch(Exception$e)
{
  $err['exception'] = $e->getMessage();
}

$smarty->assign('stock_name', $stock_name);
$smarty->assign('err', $err);

if(isset($err['exception']) == '')
{
  $smarty->display('../smarty/templates/public/stock_register_done.tpl');
}
else
{
  $smarty->display('../smarty/templates/err.tpl');
}
?>
