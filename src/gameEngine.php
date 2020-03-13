<?php

namespace BrainGames\gameEngine;

use function cli\line;
use function cli\prompt;

use const BrainGames\gameConfig\GAMES_TO_WIN;

function run($description, $gameResources)
{
    [$currentQuestions, $correctAnswers] = [$gameResources[0], $gameResources[1]];

    line('Welcome to the Brain Games!');
    line($description . PHP_EOL);
    $name = prompt('May I have your name?');
    line("Hello, %s!" . PHP_EOL, $name);

    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        line('Question: ' . $currentQuestions[$i]);

        $userAnswer = prompt('Your answer');
        $result = getCorrectAnswer($userAnswer, $correctAnswers[$i]);

        if ($result) {
            line('Correct!');
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswers[$i]}'");
            die;
        }
    }

    line("Congratulations, {$name}!");
}

function getCorrectAnswer($userAnswer, $correctAnswer): bool
{
        return $userAnswer == $correctAnswer;
}
