<?php namespace Batch;

use League\CLImate\TerminalObject\Basic\BasicTerminalObject;

class Success extends BasicTerminalObject
{
    protected $msg;

    public function __construct($msg)
    {
        $this->msg   = $msg;
    }

    public function result()
    {
        return '<backgroundGreen>' . $this->status_title . ': </yellow>' . $this->status;
    }
}
