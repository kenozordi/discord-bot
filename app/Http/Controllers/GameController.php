<?php

namespace App\Http\Controllers;

use Discord\Parts\Channel\Message;
use Illuminate\Http\Request;

class GameController extends Controller
{
    protected $name = "QuizGame";
    public function __construct()
    {
    }

    public function registerPlayer(Message $message)
    {
    }

    public static function processMessage(Message $message)
    {
        if ($message->content == "hello") {
            return "nice to meet you!";
        }
    }
}
