<?php

namespace App\Logging\Telegram;

use Monolog\Logger;
use App\Services\Telegram\TelegramBotApi;
use Monolog\Handler\AbstractProcessingHandler;
use App\Exceptions\Telegram\InvalidTelegramSendMessageException;

class TelegramLoggerHandler extends AbstractProcessingHandler
{

    public function __construct(array $config)
    {
        $level = Logger::toMonologLevel($config['level']);
        parent::__construct($level);
    }

    protected function write(array $record) :void
    {
        try {
            TelegramBotApi::sendMessage( $record['formatted'] ); 
        } catch (InvalidTelegramSendMessageException $e) {
            echo 'Catch exception: ',  $e->getMessage(), "\n";
        } 
       
    }
    
}