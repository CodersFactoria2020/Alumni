<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use App\Conversations\BotConversation;





class BotManController extends Controller
{

    public function handle()
    {
        $botman = app('botman');

        $botman->listen();
    }

    public function startEmpezar(BotMan $bot)
    {
        $bot->startConversation(new BotConversation());
    }
    

    public function welcome()
    {
        return view ('botman.botman');
    }
    
}
