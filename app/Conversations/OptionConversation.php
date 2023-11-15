<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class OptionConversation extends Conversation
{
    public function run()
    {
        $question = Question::create("Bạn đang gặp vấn đề gì?")
            ->fallback('Lựa chọn không hợp lệ')
            ->callbackId('ask_about_option')
            ->addButtons([
                Button::create('Liên hệ hỗ trợ')->value('call'),
                Button::create('Nhắn tin trực tiếp')->value('comment'),
                Button::create('Đặt hàng')->value('order')
            ]);
        $this->bot->ask($question, function (Answer $answer){
            if($answer->isInteractiveMessageReply()){
                $value = $answer->getValue();
                switch ($value){
                    case 'call':
                        $this->bot->startConversation(new CallConversation);
                    break;
                    case 'comment':
                        $this->bot->startConversation(new MessageConversation);
                        break;
                    case 'order':
                        $this->bot->startConversation(new OrderConversation);
                        break;
                }
            }
        });
    }
}
