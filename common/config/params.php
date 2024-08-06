<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
    'user.passwordMinLength' => 8,
    'grid_view' => [
        'default_page_size' => 50
    ],
    'logger' => [
        'default_type' => 'db',
        'receiver' => 'tetiana.polishchuk.83@gmail.com',
        'from' => 'logs@example.com', 
        'subject' => 'Log message',
        'log_file' => '@runtime/logs/logger.log'
    ],   
];
