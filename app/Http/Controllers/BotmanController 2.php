<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use App\Conversations\ExampleConversation;





class BotManController extends Controller
{

    public function handle()
    {
        $botman = app('botman');

        $botman->listen();
    }


    public function welcome()
    {
        return view('welcome');
    }


    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }


}
