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

    public function startWelcome(BotMan $bot)
    {
        $bot->startConversation(new WelcomeConversation());
    }
    

    public function welcome()
    {
        return view ('botman.botman');
    }

}
