<?php

namespace App\Http\Controllers;

use App\Conversations\GetDataConversation;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\LaravelCache;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BotManController extends Controller
{
    /**
     * Web page for testing
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function telegramWebView()
    {
        return view('telegram');
    }

    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $config = [
            "telegram" => [
                "token" => "1563866676:AAHg2SYB0NiOhF60jWzY_7BJrUqOIdOq-ZY"
            ],
            "botman" => [
                'conversation_cache_time' => 720 ,
                'user_cache_time' => 720,
            ],
        ];

        // Load the driver(s) you want to use
        DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);
        DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramLocationDriver::class);
        DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramContactDriver::class);

        // Create an instance
        $botman = BotManFactory::create($config, new LaravelCache());

        // Give the bot something to listen for.
        $botman->hears('{message}', function($botman, $message) {
            if ($message == '/start') {
                $botman->startConversation(new GetDataConversation());
            } else {
                $botman->reply("Напишите '/start' для того чтобы начать общение.");
            }
        });

        $botman->receivesLocation(function (Location $location) {
            Log::info(print_r($location, true));
            return true;
        });

        $botman->fallback(function($bot) {
            $bot->reply('Извините. Я не понял Вас. Нажмите /start для того чтобы начать общение.');
        });

        $botman->exception(\Exception::class, function($exception, $bot) {
            \Illuminate\Support\Facades\Log::info($exception);
            $bot->reply('Sorry, something went wrong');

            if (method_exists($bot->getDriver(), 'messagesHandled'))
                $bot->getDriver()->messagesHandled();
        });

        // Start listening
        $botman->listen();
    }
}
