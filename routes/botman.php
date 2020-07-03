<?php
use App\Http\Controllers\BotManController;
use App\Conversations\BotConvesation;
use App\Conversations\ExempleConvesation;

$botman = resolve('botman');

$botman->hears('hola|hello|hi', function($bot){
    $bot->reply('Hola!, Bienvennido a alumni, si deseas conversar escribe Empezar!');
});
    $botman->hears('Empezar',BotmanController::class.'@startEmpezar');

    $botman->hears('Chiste', BotmanWelcomeController::class. '@startWelcome');
