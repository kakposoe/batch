<?php

require __DIR__ . '/vendor/autoload.php';

// To Do
// Check if folder exists and halt if true, ask user to use force
// Create force argument which will force the process if folder exists

// To Do - Separate add on
// Create random string for b2
// send all images up to b2 

use Batch\Message;


$batch = new Batch\Batch;
$c = new League\CLImate\CLImate;

$c->extend([
    'status' => 'Batch\Status'
]);

$arguments = require_once('arguments.php');

$c->arguments->add($arguments);

$c->arguments->parse();

// Define variables
$folder = $c->arguments->defined('folder') ? $c->arguments->get('folder') . '/' : 'images/';
$quality = $c->arguments->defined('quality') ? (int) $c->arguments->get('quality') : 100;
$stats = $c->arguments->defined('stats') ? true : false;

if (!file_exists($folder)) {
    mkdir('./' . $folder, 0777, true);
}

if ($stats) {
    $time = new Myth\Timer\Timer;
    $time->start('script');
}

/*
 * Check if quality argument has been passed
 */

$c->status('Low Res Quality', $quality . '%');

/*
 * Check if thumbnails argument has been passed
 */
if ($c->arguments->defined('thumbnails')) {
    if (!file_exists($folder . 'thumbs')) {
        mkdir(getcwd() . '/' . $folder . 'thumbs', 0777, true);
    }
    $c->status('Thumbnails', 'Queued');
}
if ($c->arguments->defined('stats')) {
    $c->status('Statistics', 'On');
}

$c->br();

/* 
 * Remove memory restriction applied by php
 */
ini_set('memory_limit','-1');

/* 
 * Count photos to process
 */

$count = $batch->total();

$c->backgroundBlueBlack(' Processing images (' . $count . ') ')->br();

$c->yellow('Creating Low Res Images...');

$batch->lowres($folder, $stats);

if ($c->arguments->defined('thumbnails')) {
$c->yellow('Creating Thumbnails...');
    $batch->thumbnails($folder, $stats);
}

if ($stats) {
    $time->stop('script');
    $time = explode(' ', $time->output('script'));
    $c->out('Process completed in <yellow>' . round($time[1], 2) . ' ' . rtrim($time[2], ',') . '</yellow>')->br();
}

$c->backgroundGreenBlack(' Success: All images optimized ');

if ($c->arguments->defined('open')) {
    exec('open ' . $folder);
}
