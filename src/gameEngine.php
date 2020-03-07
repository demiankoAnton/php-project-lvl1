<?php

namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Games\EvenGame\evenGameDataGenerator;

use const BrainGames\GameConfig\GAMES_TO_WIN;

function run($description, $gameResources)
{
    $expressionString = $gameResources[0];
    $correctAnswer = $gameResources[1];

    line('Welcome to the Brain Games!');
    line($description);
    $name = prompt('May I have your name?');
    line("Hello, %s!" . PHP_EOL, $name);

    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        line('Question: ' . $expressionString[$i]);
        $userAnswer = prompt('Your answer: ');
        $result = getCorrectAnswer($userAnswer, $correctAnswer[$i]);

        getGameResult($result, $userAnswer, $correctAnswer[$i]);
    }

    line("Congratulations, {$name}!");
}

function getCorrectAnswer($userAnswer, $correctAnswer)
{
        return $userAnswer == $correctAnswer;
}

function getGameResult($result, $userAnswer, $correctAnswer)
{
    if ($result) {
        line('Correct!');
    } else {
        line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
        die;
    }
}
