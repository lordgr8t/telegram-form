<?php 

date_default_timezone_set('Europe/Moscow');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST['name']) && !empty($_POST['phone'])){
		if (isset($_POST['name'])) {
			if (!empty($_POST['name'])){
				$uname = strip_tags($_POST['name']);
				$unameFieldset = "Имя:%20";
			}
		}
		if (isset($_POST['phone'])) {
			if (!empty($_POST['phone'])){
				$uphone = strip_tags($_POST['phone']);
				$uphoneFieldset = "Связаться:%20";
			}
		}
		if (isset($_POST['about'])) {
			if (!empty($_POST['about'])){
				$about = strip_tags($_POST['about']);
				$aboutFieldset = "О Человеке:%20";
			}
		}
			
		$token = "1729618681:AAEjloL8tjQ2gKbwe94RJu--_sX1vYwja6I";
		$chat_id = "896297808";
		$arr = array(
			$unameFieldset => $uname,
			$uphoneFieldset => $uphone,		
			$aboutFieldset => $about	

		);
		foreach($arr as $key => $value) {
			$txt .= "<b>".$key."</b>".$value."%0A";
		};
		$sendToTelegram = fopen("https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chat_id."&parse_mode=html&text=".$txt,"r");
		if ($sendToTelegram == 'false') {
			echo '<p>Всё пошло по пизде</p>';
		} else {
			echo '<h3>Всё гуд</h3>';			
		}
	} else {
		echo '<h3>Не все поля ввёл</h3>';
		

	}
} else {
	header ("Location: http://localhost/telegram-form/"); 
}

?>