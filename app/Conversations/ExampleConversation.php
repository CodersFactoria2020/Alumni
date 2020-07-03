<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class ExampleConversation extends Conversation
{

    

    public function run()
    {
        $this->askReason();
    }
    /**
     * First question
     */
    public function askReason()
    {

        $question = Question::create("Claro. En qué puedo ayudarte?")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Cuentame un chiste')->value('joke'),
                Button::create('Quiero contactar con vosotros')->value('contact'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()){
                case 'joke':
                $response="Alumni es una plataforma para coders para poder buscar información sobre empresas u opinar sobre ellas";
                $joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'),true);
                $this->say($joke->value->joke);
                break;
                case 'contact':
                $response='email: factoriaf5@factoriaf5.com <BR> telefono:996633';
                break;     
            };
            $this->say($response);
            }
            });
    }
    

    /**
     * Start the conversation
     */
    
}
