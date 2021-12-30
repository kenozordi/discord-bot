<?php

include './vendor/autoload.php';

use App\Http\Controllers\GameController;
use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Intents;
use Discord\WebSockets\Event;

class Bot
{
    protected $gameController;

    public function __construct(GameController $gameController)
    {
        $this->gameController = $gameController;
    }

    public function startBot()
    {
        $discord = new Discord([
            'token' => 'OTI1MTc1MzM2MjI2OTE4NDIy.YcpSrQ.j5LJi1wNqk2mIR0s48o9EeZstsU'
        ]);

        $discord->on('ready', function ($discord) {
            echo "Bot is ready!", PHP_EOL;
        });

        // Handle incomming messages
        $discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {
            $reply = $this->gameController->processMessage($message);
            if ($reply) {
                $message->reply($reply);
            }
        });

        $discord->run();
    }
}

$bot = new Bot(new GameController);
$bot->startBot();
// Bot::startBot();
