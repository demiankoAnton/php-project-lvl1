<?php

namespace BrainGames\gameEngine;

use function cli\line;
use function cli\prompt;

function run($description, $gameData)
{
    line('Welcome to the Brain Games!');
    line($description . PHP_EOL);
    $name = prompt('May I have your name?');
    line("Hello, %s!" . PHP_EOL, $name);

    foreach ($gameData as $data) {
        [$question, $correctAnswer] = [$data[0], $data[1]];

        line('Question: ' . $question);
        $userAnswer = prompt('Your answer');

        if ($userAnswer == $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
            die;
        }
    }

    line("Congratulations, {$name}!");
}
