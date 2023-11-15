<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class MessageConversation extends Conversation
{
    public function run()
    {
        $this->bot->reply("Hãy liên hệ với chúng tôi qua chức năng Chat ở góc trái Hoặc qua Zalo: 0943206425 (Tâm Trà)
         Hoặc qua Facebook: <a href='https://www.facebook.com/profile.php?id=100004954485807'>Tâm Trà</a>");

        $this->bot->typesAndWaits(1);

        $question = Question::create("Bạn đang gặp vấn đề gì?")
            ->fallback('Lựa chọn không hợp lệ')
            ->callbackId('ask_about_option')
            ->addButtons([
                Button::create('Liên hệ hỗ trợ')->value('call'),
                Button::create('Chat với chúng tôi')->value('message'),
                Button::create('Đặt hàng')->value('order')
            ]);
        $this->bot->ask($question, function (Answer $answer){
            if($answer->isInteractiveMessageReply()){
                $value = $answer->getValue();
                switch ($value){
                    case 'call':
                        $this->bot->startConversation(new CallConversation());
                        break;
                    case 'message':
                        $this->bot->startConversation(new MessageConversation());
                        break;
                    case 'order':
                        $this->bot->startConversation(new orderConversation);
                        break;
                }
            }
        });
    }
}
