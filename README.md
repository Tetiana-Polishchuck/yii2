
~~~
composer docker-run
~~~

~~~
composer dev-install
~~~

~~~
composer migrate-up
~~~

### For production

# Usage

Run container:

~~~
composer docker-run
~~~


Запис лога з використанням дефолтного логгера:

~~~
http://localhost:21083/logger/log
~~~

Запис лога з вказанням типу логгера:

~~~
http://localhost:21083/logger/log-to?type=file
~~~

~~~
http://localhost:21083/logger/log-to?type=email
~~~

~~~
http://localhost:21083/logger/log-to?type=db
~~~

Запис лога з використанням всіх логгерів:

~~~
http://localhost:21083/logger/log-to-all
~~~

Контроллер \backend\controllers\LoggerController
Інтерфейс  \common\components\LoggerInterface
Конфіг  \common\config\params.php
Моделі \common\models\logger\, \common\models\LogsTable