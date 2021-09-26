<?php

namespace app;

use League\Csv\Writer;

class ChatMessage
{
    private Writer $record;

    public function __construct(string $name, string $nickname, string $chatMessage)
    {
        $this->record = Writer::createFromPath("app/chat.csv", "a+");
        $message = [$name, $nickname, $chatMessage];
        $this->record->insertOne($message);
    }
}