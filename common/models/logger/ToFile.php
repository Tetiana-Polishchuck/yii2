<?php

namespace common\models\logger;

use Yii;


class ToFile extends LoggerSender{
    private string $file;

    public function __construct(){
        $this->file = Yii::$app->params['logger']['log_file'];
    }

    /**
     * 
     * @param string $message
     * @return void
     */
    public function send (string $message):void{
        $formattedMessage = $this->formatMessage($message, 'info');
        file_put_contents(Yii::getAlias($this->file), $formattedMessage, FILE_APPEND);

    }

    /**
     * @param string $message
     * @param string $level
     * @return string
     */
    protected function formatMessage(string $message, string $level)
    {
        return date('Y-m-d H:i:s') . " [$level] $message\n";
    }
    
}