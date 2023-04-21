<?php

// сюда нужно вписать токен вашего бота
define('TELEGRAM_TOKEN', '5870976008:AAGKqNF3vf4_E2Yu3U-HeZIDCVXumQp5qg8');

// сюда нужно вписать айдишник чата 
define('TELEGRAM_CHATID', '-1001538433416');

function message_to_telegram($text)
{
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
                'chat_id' => TELEGRAM_CHATID,
                'text' => $text,
            ),
        )
    );
    curl_exec($ch);
}