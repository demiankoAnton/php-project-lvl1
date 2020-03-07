<?php

namespace BrainGames\Games\GcdGame;

use function BrainGames\GameEngine\run;

use const BrainGames\GameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.' . PHP_EOL;

function gcdGame()
{
    $gameResources = gcdGameGenerator();

    run(DESCRIPTION, $gameResources);
}

function getNod($firstNumber, $secondNumber)
{
    $minNumber = $firstNumber > $secondNumber ? $secondNumber : $firstNumber;

    for ($i = $minNumber; $i > 0; $i--) {
        if (is_int($firstNumber / $i) && is_int($secondNumber / $i)) {
            return $i;
        }
    }

    return 1;
}

function gcdGameGenerator()
{
    $expressionStrings = [];
    $correctAnswers = [];

    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $firstNumber = rand(1, 99);
        $secondNumber = rand(1, 99);
        $correctAnswers[] = getNod($firstNumber, $secondNumber);
        $expressionStrings[] = "{$firstNumber} {$secondNumber}";
    }

    return [
        $expressionStrings,
        $correctAnswers
    ];
}
