<?php

namespace BrainGames\gameEngine;

use function cli\line;
use function cli\prompt;

function run($description, $gameData)
{
    line('Welcome to the Brain Games!');
    line("{$description}\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!\n", $name);

    foreach ($gameData as $data) {
        [$question, $correctAnswer] = $data;

        line("Question {$question}");
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
