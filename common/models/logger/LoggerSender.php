<?php

namespace common\models\logger;

abstract class LoggerSender
{
    abstract public function send(string $message):void;

}
 