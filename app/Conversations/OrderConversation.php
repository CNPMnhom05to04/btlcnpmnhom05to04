<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class OrderConversation extends Conversation
{
    public function run()
    {
        $this->bot->reply("Bạn muốn đặt hàng hãy làm theo các bước dưới đây: \n
         B1: Lựa chọn sản phẩm và thêm vào giỏ hàng. \n
         B2: Vào giỏ hàng để thêm voucher (nếu có), xác nhận các thông tin và phương thức thanh toán. \n
         B3: Thanh toán và nhận hàng.");

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
                        $this->bot->startConversation(new CallConversation);
                        break;
                    case 'message':
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
