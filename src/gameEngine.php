<?php

namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Games\EvenGame\evenGameDataGenerator;

const GAMES_TO_WIN = 3;

function run($gameResources)
{
    line('Welcome to the Brain Games!');
    line($gameResources[0]);
    $name = prompt('May I have your name?');
    line("Hello, %s!" . PHP_EOL, $name);

    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        line('Question: ' . $gameResources[1]);
        $userAnswer = prompt('Your answer: ');
        $result = getCorrectAnswer($userAnswer, $gameResources[2]);

        getGameResult($result, $userAnswer, $gameResources[2]);
    }

    line("Congratulations, {$name}!");
}

function getCorrectAnswer($userAnswer, $correctAnswer)
{
    if ($userAnswer == $correctAnswer) {
        return true;
    }
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
