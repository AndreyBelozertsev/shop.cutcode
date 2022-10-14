<?php

namespace App\Services\Telegram;

use Illuminate\Support\Facades\Http;
use App\Exceptions\Telegram\InvalidTelegramSendMessageException;



class TelegramBotApi 
{

    public const HOST = 'https://api.telegram.org/bot';

    public static function sendMessage($text)
    {
        $response = Http::get(self::HOST . env('TELEGRAM_TOKEN') . '/sendMessage',[
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'text' => $text
        ]);
        if(! $response->json('ok')) {
            throw new InvalidTelegramSendMessageException('Some Trouble. Message not sending');
        }
    }

}