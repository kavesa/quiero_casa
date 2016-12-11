<?php
use yii\helpers\Html;
use yii\mail\BaseMailer;


/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>

<html>
<body>
<h1 style="color: #5e9ca0;">&nbsp;</h1>
<h1 style="color: #5e9ca0;">Gracias por registrarte en QuieroCasa!</h1>
<p>Haz click <a href="http://localhost/quiero_casa/api/v1/user?secret=<?php echo $auth_key ?>"><span style="background-color: #2b2301; color: #fff; display: inline-block; padding: 3px 10px; font-weight: bold; border-radius: 5px;">Aqu&iacute;</span></a>&nbsp;para confirmar tu registro y activar tu cuenta.</p>
<p>&nbsp;</p>
<h2 style="color: #2e6c80;">Te esperamos con las mejores ofertas!</h2>


</body>
</html>



