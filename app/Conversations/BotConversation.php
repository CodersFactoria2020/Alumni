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
            $this->bot->startConversation(new BotConversation());
            break;
            case 'contacto':
            $response='email: factoriaf5@factoriaf5.com <BR> telefono:996633';
            break;
            case 'factoria':
            $response='Factoria es un Bootcamp...';
            break;
            case 'info':
            $response='La pagina tiene diferentes aparatados, tales como Empresa, Ofertas de Empleo, eventos, foro... Si quieres saber mas escribe Apartados!';
            break;        
            };
            $this->say($response);
            }
            });
    }
    public function startForo()
    {
        $question = Question::create("Que quieres saber")
        ->fallback('no se pudo responder la pregunta')
        ->callbackId('ask_reason')
        ->addButtons([
        Button::create('¿Cómo funciona?')->value('Como funciona foro'),
        Button::create('¿Qué es el Foro?')->value('qué es el foro'),
        Button::create('Normas del Foro')->value('Normas'),
        Button::create('Como acceder sin cuenta')->value('Como entrar'),
        ]);
        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
            switch ($answer->getValue()){
            case 'Como funciona foro':
            $response='El foro es muy simple , cualquier <strong> usuario </strong> puede postear cualquier cosa y asi otros usuarios puedan ver el mensaje y responder';
            break;
            case 'qué es el foro':
            $response='El foro es una herramienta donde nuestros usuarios pueden hablar , debatir o recomendarse empresas donde trabajar , se puede hablar de lo que sea pero siempre con educación ;)';
            break;
            case 'Normas':
            $response='Las Normas son muy intuitivas:<br>1-No insultar <br>2-No Escribir todo en mayusculas <br>3-Si nadie te responde ten paciencia y no postees mas de una vez lo mismo <br>4-No hablar de lo que mola linux ni apple todo el mundo sabe que windows es mejor.';
            break;
            case 'Como entrar':
            $response='no se puede';
            break;
            };
            $this->say($response);
            }
            });
    }
}