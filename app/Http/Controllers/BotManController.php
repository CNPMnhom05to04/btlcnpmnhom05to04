<?php

namespace App\Http\Controllers;

use App\Conversations\OptionConversation;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Support\Facades\DB;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->fallback(function ($botman) {
            $this->optionConversation($botman);
            $botman->reply("Cảm ơn quý khách đã sử dụng dịch vụ bên Tâm Trà!");
        });
        $botman->listen();
    }

    /**
     * Place your BotMan logic here.
     */
    public function optionConversation(BotMan $botman)
    {
        $botman->startConversation(new OptionConversation());
    }
}
