<?php

namespace BrainGames\gameEngine;

use function cli\line;
use function cli\prompt;

use const BrainGames\gameConfig\GAMES_TO_WIN;

function run($description, $gameData)
{
    line('Welcome to the Brain Games!');
    line($description . PHP_EOL);
    $name = prompt('May I have your name?');
    line("Hello, %s!" . PHP_EOL, $name);

    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        [$currentQuestions, $correctAnswers] = [$gameData[$i][0], $gameData[$i][1]];

        line('Question: ' . $currentQuestions);
        $userAnswer = prompt('Your answer');

        if ($userAnswer == $correctAnswers) {
            line('Correct!');
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswers}'");
            die;
        }
    }

    line("Congratulations, {$name}!");
}
