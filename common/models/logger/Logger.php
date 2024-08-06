<?php

namespace common\models\logger;

use Yii;
use common\components\LoggerInterface;

class Logger implements LoggerInterface{

    private string $type;
    public const ACCEPTED_TYPES = ['db', 'email', 'file'];


    public function __construct(){
        $this->type = Yii::$app->params['logger']['default_type'];
    }
    /**
     * Send message to current logger
     * @param string $message
     * @return void
     */
    public function send(string $message):void{
        $sender = $this->getLogger();
        $sender->send($message);
    }

    /**
     * Send message by selected logger
     * @param string $message
     * @param string $loggerType
     * @return void
     */
    public function sendByLogger(string $message, string $loggerType):void{
        $this->setType($loggerType);
        $this->send($message);
    }


    /**
     * Gets current logger type
     * @return string
     */
    public function getType():string{
        return $this->type;
    }

    /**
     * Sets current logger type
     * @param string $type
     * @return void
     */
    public function setType(string $type):void{        
        if(in_array($type, self::ACCEPTED_TYPES)){
            $this->type = $type;
        }else{
            throw new \Exception('incorrect type');
        }
    }

    /**
     * @throws \Exception
     * @return \common\models\logger\LoggerSender
     */
    private function getLogger() :LoggerSender{
        switch ($this->type){
            case 'db':
                return new ToDB();
            case 'file':
                return new ToFile();
            case 'email':
                return new ToEmail();
            default:
                throw new \Exception('incorrect type');            
        }
    }
}