<!DOCTYPE html>
<html lang = "ja">
{include file = "../head.tpl" title=$title}
<link rel = "stylesheet" href = "../public/css/list.css">
</head>

<body>

	<h4>アカウント一覧</h4>

	<form method = "post" action = "user_branch.php">
		{foreach $user as $s}
		<input type = "radio" name = "user_id" value = "{$s[0]}">
		{$s[1]}<br>
		{/foreach}

    <br>
    <input type = "submit" name = "disp" value = "参照">
    <input type = "submit" name = "edit" value = "修正">
    <input type = "submit" name = "delete" value = "削除">
    <input type = "submit" name = "add" value = "追加">
	</form>

	<br>
	<form action = "../public/list.php">
		<input type = "submit" value = "在庫一覧へ">
	</form>

</body>
</html>
