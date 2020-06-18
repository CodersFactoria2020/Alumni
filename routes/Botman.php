<?php

use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hola', function ($bot) {
    $bot->reply('Hola! ¿Qué necesitas? (indica el número de tu opción) 1.Información.  2.Nada.');
});


$botman->hears('1', function ($bot) {
    $bot->reply('¿Sobre qué? (escribe el tema que te interese) -Alumni. -Contacto.');
});
$botman->hears('2', function ($bot) {
    $bot->reply('Gracias, hasta otra');
});

$botman->hears('Alumni', function ($bot) {
    $bot->reply('Alumni es una plataforma para coders para poder buscar información sobre empresas u opinar sobre ellas         ¿Qué deseas hacer ahora? -Empezar.  -Nada.');
});
$botman->hears('Contacto', function ($bot) {
    $bot->reply('factoriaf5@factoriaf5.com   telefono:996633   ¿Qué deseas hacer ahora? -Empezar.  -Nada.');
});



$botman->hears('Empezar', function ($bot) {
    $bot->reply('Hola de nuevo! ¿Qué necesitas? 1.Información.  2.Nada.');
});


$botman->hears('Start conversation', BotManController::class.'@startConversation');


