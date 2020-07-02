<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class BotConversation extends Conversation
{
    protected $name;


    public function run()
    {
        $this->askName();
        
    }

    public function askName()
    {
        $this->ask('Para continuar dime tu nombre', function(Answer $answer) {
            // Save result
            $this->name = $answer->getText();

            $this->say('¡Mucho gusto! '.$this->name);
            $this->startEmpezar();
        });
    }
    public function startEmpezar()
    {
        $question = Question::create("Aqui encontraras lo basico sobre Alumni")
        ->fallback('no se pudo responder la pregunta')
        ->callbackId('ask_reason')
        ->addButtons([
        Button::create('¿Que es alumni?')->value('alumni'),
        Button::create('Factoria')->value('factoria'),
        Button::create('info')->value('info'),
        Button::create('Contacto')->value('contacto'),
        
        ]);
        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
            switch ($answer->getValue()){
            case 'alumni':
            $response="Alumni es una plataforma para coders para poder buscar información sobre empresas u opinar sobre ellas";
            break;
            case 'contacto':
            $response='email: factoriaf5@factoriaf5.com <BR> telefono:996633';
            break;
            case 'factoria':
            $response='Factoria es un Bootcamp...';
            break;
            case 'info':
            $response='La pagina tiene diferentes aparatados, tales como Empresa, Ofertas de Empleo, eventos, foro... Si quieres saber mas escribe Apartados!. ';
            $this->startForo();
            break;
           
            };
            $this->say($response);
            }
            });
    }
    
}