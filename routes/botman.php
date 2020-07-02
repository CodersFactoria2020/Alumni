<?php
use App\Http\Controllers\BotManController;
use App\Conversations\BotConvesation;


$botman = resolve('botman');

$botman->hears('hola|hello|hi', function($bot){
    $bot->reply('Hola!, Bienvennido a alumni, si deseas conversar escribe Empezar!');
    
});
    $botman->hears('Empezar',BotManController::class.'@startEmpezar');
    $botman->hears('Alumni', BotManController::class. '@startAlumni');
    $botman->hears('Foro', BotManController::class. '@startForo');
    $botman->hears('Name', BotManController::class. '@askName');

