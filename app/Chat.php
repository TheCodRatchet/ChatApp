<?php

namespace app;

use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\TabularDataReader;

class Chat
{
    private Reader $csv;

    public function __construct(string $filename)
    {
        $this->csv = Reader::createFromPath($filename, "r");
        $this->csv->setDelimiter(",");
    }

    public function getMessages(): TabularDataReader
    {
        return Statement::create()->process($this->csv);
    }
}