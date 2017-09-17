<?php namespace Batch;

use League\CLImate\TerminalObject\Basic\BasicTerminalObject;

class Status extends BasicTerminalObject
{
    protected $status_title;

    protected $status;

    public function __construct($status_title, $status)
    {
        $this->status_title   = $status_title;
        $this->status = $status;
    }

    public function result()
    {
        return '<yellow>' . $this->status_title . ': </yellow>' . $this->status;
    }
}
