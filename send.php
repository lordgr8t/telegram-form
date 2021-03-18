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
				$aboutFieldset = "О соискателе:%20";
			}
		}
		if (isset($_POST['vacancy'])) {
			if (!empty($_POST['vacancy'])){
				$vacancy = strip_tags($_POST['vacancy']);
				$vacancyFieldset = "Должность:%20";
			}
		}
		


		$token = "1642225797:AAFqQyPz2swFIUeBd417FSyIv8LPzXv0OVI";
		$chat_id = "-513290394";
		$arr = array(
			$unameFieldset => $uname,
			$uphoneFieldset => $uphone,
			$vacancyFieldset => $vacancy,			
			$aboutFieldset => $about	

		);
		foreach($arr as $key => $value) {
			$txt .= "<b>".$key."</b>".$value."%0A";
		};
		$sendToTelegram = fopen("https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chat_id."&parse_mode=html&text=".$txt,"r");
		if ($sendToTelegram == 'false') {
			echo '<p class="fail"><b>Ошибка. Сообщение не отправлено!</b></p>';
		} else {
			echo '<h3 style="text-align: center; margin-top: 10%; padding: 10% 10%; background: #DE7070; border-radius: 10px; color: #fff;
			filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));">Спасибо! В ближайшее время мы рассмотрим вашу кандидатуру и свяжемся с вами!</h3>';
			echo '<a style="text-align: center; font-size: 25px; 	width: 100%; display: block; color: #DE7070;" href="">Вернуться</a>';
		}
	} else {
		echo '<h3 style="text-align: center; margin-top: 10%; padding: 10% 10%; background: #DE7070; border-radius: 10px; color: #fff;
		filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));">Ошибка. Вы заполнили не все обязательные поля!</h3>';
		echo '<a style="text-align: center; font-size: 25px; 	width: 100%; display: block; color: #DE7070;" href="">Вернуться</a>';

	}
} else {
	header ("Location: http://gr8t.site/"); 
}

?>