<?php

namespace App;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Cache\DoctrineCache;
use Doctrine\Common\Cache\FilesystemCache;



class OnboardingConversation extends Conversation
{
protected $section;

protected $name;

protected $email;



public function askName()
{
//Pregunta del chat bot al usuario donde se obtiene la respuesta
$this->ask('Antes que nada. ¿Cómo te llamas? Para dirigirme a ti', function(Answer $answer) {
// Texto respuesta
$this->name = $answer->getText();
$this->say('Encantado, '.$this->name);
$this->askWhatToDo();
});
}

public function askWhatToDo(){
//Se programa una pregunta donde se establacen dos respuestas por defecto y un fallback por si no es ninguna de las dos
$question =  Question::create('¿Qué deseas hacer en mi blog?')
->fallback('Lo siento pero...')
->callbackId('que_quieres_hacer')
->addButtons([Button::create('¿Ver todos los posts?')->value('all'),Button::create('¿Ver todas las categorías?')->value('categorias'),]);
$this->ask($question, function(Answer $answer) {

if ($answer->isInteractiveMessageReply()){
$value = $answer->getValue();
$text = $answer->getText();
$this->say('Opcion, '.$value.' '.$text);
}
});
}

public function run()
{
// Función llamada cuando se inicia la conversación
$this->askName();
}
}

$config = [
// Your driver-specific configuration
// "telegram" => [
//    "token" => "TOKEN"
// ]
];

DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

//Se crea el objeto del chatbot. El parámatro de doctrine es el cache de las conversaciones y se indica en que directorio se almacenará dicha
$botman = BotManFactory::create($config, new DoctrineCache(new FilesystemCache('/cache/')));

$botman->hears('hey', BotManController::class.'@startConversation');
/*
Inicio de la conversación por parte del usuario que puede ser: hola o buenas o buenos díaso bueno o dias o buenas tardes o buenas noches
*/
$botman->hears('.*(hola|buenas|buenos días|buenos dias|buenas tardes|buenas noches).*', function (BotMan $bot,$word) {
//Se espera un segundo
$bot->typesAndWaits(1);
//Se inicia la conversación
$bot->startConversation(new OnboardingConversation);
});

/*
Si el usuario introduce alguna palabra que no está en la lista anterior salta el siguiente mensaje
*/
$botman->fallback(function($bot) {
$bot->reply('Lo siento no te puedo ayudar');
});

$botman->fallback(function($bot) {
$bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
});

//ejemplo de pregunta específica
$botman->hears('¿Qué hora es {ciudad} en {continente}' , function (BotMan $bot,$ciudad,$continente) {
date_default_timezone_set("$continente/$ciudad");
$bot->reply('The time in '.$ciudad.' '.$continente.' is '.date('h:i:sa'));
});

// Botman empieza a escuchar
$botman->listen();
