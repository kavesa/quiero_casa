<?php

namespace api\common\components;

use dektrium\user\models\User;
use dektrium\user\models\Token;

class Mailer extends \dektrium\user\Mailer
{
    public function sendConfirmationMessage(User $user, Token $token)
    {
        return $this->sendMessage('itfuno@gmail.com', 
            \Yii::t('user', 'Confirm your account on {0}', \Yii::$app->name),
            'confirmation',
            ['user' => $user, 'token' => $token]
        );
    }
}