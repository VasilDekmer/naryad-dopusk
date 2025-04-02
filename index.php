<!DOCTYPE html>
<?php 
require $_SERVER['DOCUMENT_ROOT'].'/db/db.php';

?>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="Cache-control" content="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<!--  СКРИПТЫ  -->
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="bootstrap/js/jquery-3.7.1.min.js"></script>
	<script type="text/javascript" src="js/common.js"></script>
	<title><?php echo $mainheader; ?> - «Авторизация»</title>
</head>

<body>
	<div class="glow-main-header-div-wraper">
		<div class="glow-main-header-div-index">
			<h3 class="glow-main-header"><?php echo $mainheader; ?></h3>
		</div>
	</div>
	<form action="login/validate_login.php" method="POST">
		<div class="login-box">
			<div class="row align-items-start">
				<h3 style="letter-spacing: 0;">Авторизация</h3>
				<div>
					<h6 class="div-header" style="margin: 20px 0px 0px 0px;">&nbsp;Пользователь&nbsp;</h6>
					<?php 
						echo '<select class="form-select" id="login" name="login" style="margin-top: 3px; margin-bottom: 15px; height: 36px; font-size: 17px; cursor: pointer;">';
						echo '<option disabled selected>&nbsp;&nbsp;</option>';
						$users = R::findAll('users',' ORDER BY login ASC');
						foreach ($users as $user)	{echo '<option>' . $user->login . '</option>';}
						echo'</select>';
					?>
				</div>
				<div>
					<h6 class="div-header" style="margin: 0px 0px 3px 0px;">&nbsp;Пароль&nbsp;</h6>
					<input type="password" class="form-control" id="passwrd" name="passwrd" style="height: 36px; font-size: 18px; margin-bottom: 20px; font-weight: 900; cursor: pointer;" autocomplete="off" maxlength="30">
				</div>
				<div class="d-grid gap-2 col-2 mx-auto">
					<button type='submit' class="btn btn-outline-primary" style="margin-left: -8px; text-transform: uppercase !important; font-weight: 600;">Вход</button>
				</div>
			</div>
		</div>
	</form>
	<div class="modal" id="myModal" style="z-index: 1500;" tabindex="-1" data-bs-backdrop="static">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #dbe0ed;">
					<h5 class="modal-title" id="modal-title" style="margin: -10px 0px 0px -9px !important;height: 26px;padding: 2px;">«Наряд-допуск для работ в электроустановках»</h5>
				</div>
				<div id="modal-body" class="modal-body hyphens-myclass" style="line-height: 20px !important; letter-spacing: 0;"></div>
				<div class="modal-footer" style="background-color: #fff;">
					<button id="okBtn" type="button" class="btn anymbtn btn-primary" onclick="myModal.hide()" style="text-transform: none;"><img style="margin: -3px 0px 0px -5px;" src="/images/ok.svg" border="0">&nbsp;&nbsp;Все ясно. Продолжить…</button>
				</div>
			</div>
		</div>
	</div>
	<script>
		del_Cookie('nardop_decline');
		var myModal = new bootstrap.Modal(document.getElementById('myModal'));
		document.querySelector("select").addEventListener('change', function(e) {
			document.getElementById('passwrd').value = '';
			document.getElementById('passwrd').focus();
		});
		if (getBrowserName(navigator.userAgent) !== 'YaBrowser') ShowPopupWindow('Ваш браузер :  <b>' + getBrowserName(navigator.userAgent) + '</b><br><br>В данном браузере работа программы может быть некорректной !<br><br>Программа отлажена под <b><a href="https://browser.yandex.ru/" target="_blank">Яндекс Браузер</a></b>.');
	</script>
</body>

</html>
