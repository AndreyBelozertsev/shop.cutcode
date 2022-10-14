<?php

namespace App\Logging\Telegram;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

class TelegramLoggerFactory
{

    /**
     * Create a custom Monolog instance.
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {

        $output = "%datetime%\nУровень: %level_name% \nСообщение: %message%\n";
        $formatter = new LineFormatter($output, "Дата: Y-m-d Время: H:i:sP");

        $streamHandler = new TelegramLoggerHandler($config);
        $streamHandler->setFormatter($formatter);

        $logger = new Logger('telegram');
        $logger->pushHandler($streamHandler);
    
        
        return $logger;
    }
    
}