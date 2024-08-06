<?php

namespace common\models;
use yii\db\ActiveRecord;
use Yii;

/**
 * LogsTable model
 * @property int $id
 * @property string $created_at
 * @property string $message
 */
class LogsTable extends ActiveRecord{

    
    /**
     * {@inheritdoc}
     */
    public static function tableName():string
    {
        return 'log';
    }

    /**
     * Summary of rules
     * @return array
     */
    public function rules(){
        return[
            ['id', 'integer'],
            ['created_at', 'datetime', 'format' => 'php:Y-m-d H:i:s'],
            ['message', 'string'],
            ['message', 'required'],
        ];           
           
    }


    /**
     * @param string $message
     * @return bool
     */
    public static function saveLog (string $message) :bool{
        $log = new self();
        $log->message = $message;
        
        if (!$log->validate()) {
            Yii::warning($log->getErrors());
            return false;
        }

        return $log->save();
    }

}