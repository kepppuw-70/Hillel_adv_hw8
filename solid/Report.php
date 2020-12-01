<?php

echo '<h1>Hint - use Single Responsibility Principle Violation</h1>';
class Report
{
    public function getTitle()
    {
        return 'Report Title';
    }

    public function getDate()
    {
        return '2016-04-21';
    }

    public function getContents()
    {
        return [
            'title' => $this->getTitle(),
            'date' => $this->getDate(),
        ];
    }
}

class Json 
{
    
    private $contents;

    public function __construct($contents)
    {
        $this->contents = $contents;
    }

    public function formatJson()
    {
        return json_encode($this->contents);
    }
}

$report = new Report();
$json = new Json($report->getContents());
var_dump($json->formatJson());