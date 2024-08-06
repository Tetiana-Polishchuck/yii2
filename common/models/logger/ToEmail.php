<?php

namespace common\models\logger;

use Yii;

class ToEmail extends LoggerSender{

    
    private string $email_receiver;
    private string $email_sender;
    private string $email_subject;


    public function __construct(){
        $this->email_receiver = Yii::$app->params['logger']['receiver'];
        $this->email_sender = Yii::$app->params['logger']['from'];
        $this->email_subject = Yii::$app->params['logger']['subject'];
    }

    /**
     * @param string $message
     * @return void
     */
    public function send (string $message):void{
        Yii::$app->mailer->compose()
            ->setFrom($this->email_sender)
            ->setTo($this->email_receiver)
            ->setSubject($this->email_subject) 
            ->setTextBody($message)      
            ->send();
    }
    
}