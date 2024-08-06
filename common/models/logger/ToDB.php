<?php

namespace common\models\logger;

use Yii;
use common\models\LogsTable;


class ToDB extends LoggerSender{

    /**
     * @param string $message
     * @return void
     */
    public function send (string $message):void{
        LogsTable::saveLog($message);
    }
    
}