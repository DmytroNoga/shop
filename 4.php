<?php
/*$usermail = 'Добрий вечір';
$usermail2 = 'Hello';

if (preg_match("/[а-яіїґєА-ЯІЇҐЄ]/" , $usermail2)!=NULL) {
        echo "українська мова".'<br>';
        }

elseif (preg_match("/[a-zA-Z]/" , $usermail2)!=NULL) {
		echo "English".'<br>';
}

else
	echo "something else";*/


/*$keywords = preg_split("/[\s.,:!?-]+/", "hypertext:language, programming! hypertext:language, programming?hypertext:language, programming");
foreach ($keywords as $value) {
	echo $value.'<br>';
}*/

/*$str = 'Входная строка: Иванов Иван Иванович, работает дворником, телефон 8900-000-00-00,  email: ivanOV2@gmail.com Входная строка: Иванов Иван Иванович, работает дворником, телефон 8900-000-00-00,  email: ivanov3@gmail.com';

preg_match_all('/\b[\._a-z0-9-]+@[\._a-z0-9-]+/i', $str, $matches);
//preg_match('/\b([a-z0-9_\.\-])+\@([a-z0-9\-\.])+\b/i', $str, $matches); 

$matches2 = reset($matches);
foreach ($matches2 as $value) {
	echo $value.'<br>';
};*/

$email = 'adada@i.ua';
echo $_COOKIE['email'];
?>
<form method="POST">
  <input type="text" name="name" placeholder="Name"><br>
  <input type="text" name="email" placeholder="Email" value=$email><br>
  <input type="submit" value="Subscribe">
</form>
 
