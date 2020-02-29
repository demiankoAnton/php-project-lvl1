<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;


function run()
{
    line("Welcome to the Brain Games!\n");
    $name = prompt('Mey I ask your name?');
    line("Hello %s!", $name);
}

