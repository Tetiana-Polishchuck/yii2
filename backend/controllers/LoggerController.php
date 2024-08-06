<?php


namespace backend\controllers;
use common\models\logger\Logger as Logger;
use yii\web\Controller;
use Faker\Factory as FakerFactory;
use Yii;

class LoggerController extends Controller{

    protected $logger;
    private $faker;

    private $default_logger_type;
    private $user_message_db = "log have written to log table";
    private $user_message_file;
    private $user_message_email;
    private $user_message_unknown = "log may have processed by unknown logger";


    public function beforeAction($action)
    {
        $this->logger = new Logger();
        $this->faker = FakerFactory::create();
        $this->default_logger_type = $this->logger->getType();  
        $this->user_message_file = "log have written to log file. Looking for log file on " . Yii::$app->params['logger']['log_file'];
        $this->user_message_email = "log have sent to email " . Yii::$app->params['logger']['receiver'];     
        return parent::beforeAction($action);
    }
    /**
     * Sends a log message to the default logger 
     * @return string
     */
    public function actionLog() :string{
        $message = $this->faker->text(50);
        $this->logger->send($message);
        return $this->returnMessage($this->default_logger_type);
    }

     /**
     * Sends a log message to the spesial logger 
     * @param string $type 
     * @return ${:string}
     */
     public function actionLogTo(string $type) :string{
        $message = $this->faker->text(50);
        $this->logger->sendByLogger($message, $type); 
        return $this->returnMessage($type);      
    }

    /**
     * Sends a log message to the all logger 
     * @return string
     */
    public function actionLogToAll() :string{
        $message = $this->faker->text(50);
        $user_message = '';
        foreach(Logger::ACCEPTED_TYPES as $type){
            $this->logger->sendByLogger($message, $type);
            $user_message .= $this->returnMessage($type) . "<br>\n";
        }
        return $user_message;
    }

    /**
     * @param string $type
     * @return string
     */
    private function returnMessage(string $type):string{
        switch($type){
            case 'db':
                return $this->user_message_db;
            case 'file':
                return $this->user_message_file;
            case 'email':
                return $this->user_message_email;
            default:
                return $this->user_message_unknown;
        }
    }
}