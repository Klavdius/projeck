<?php
	session_destroy();
	session_start();
	include "connectBD.php";
	
	if(!empty($_POST)){
		$verifName = $_POST['user_name'];
		$verifPass = $_POST['pass_user'];
		
		$Chek = $db->query("SELECT * FROM `users`");
		while($ChekArr = $Chek->fetch_assoc())
		{
			if($verifName != $ChekArr['username'])
			{
				echo "не верное имя";
			}else
			{	if($verifPass != $ChekArr['password'])
				{
					echo "Не верный пароль";
				}else
				{
					$realId = $ChekArr['id'];
					$_SESSION['IdUser'] = $realId;
					$_SESSION['UserName'] = $verifName;
					$_SESSION['Password'] = $verifPass;
					header("Location: http://127.0.0.1/MainPost.php/");
				}
			}
		}
	}
?>

<form method='POST' action='welcom.php'>
	<label> Введите имя </label><br/><br/>
	<input type=text name='user_name'><br/><br/>
	<label> Введите пароль</label><br/><br/>
	<input type=password name='pass_user'><br/><br/>
	<input type=submit value='Зайти'>
	<a href='http://127.0.0.1/addUser.php'>Зарегистрироваться </a>
</form>