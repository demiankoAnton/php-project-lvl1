<?php

namespace BrainGames\Games\CalcGame;

use function BrainGames\GameEngine\run;

use const BrainGames\GameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'What is the result of the expression?' . PHP_EOL;

function calcGame()
{
    $gameResources = calcGameGenerator();

    run(DESCRIPTION, $gameResources);
}

function calcGameGenerator()
{
    $expressionStrings = [];
    $correctAnswers = [];

    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $firstNumber = rand(0, 99);
        $secondNumber = rand(0, 99);
        $operation = rand(1, 3);

        switch ($operation) {
            case 1:
                $correctAnswers[] = $firstNumber + $secondNumber;
                $operationMark = '+';
                break;
            case 2:
                $correctAnswers[] = $firstNumber - $secondNumber;
                $operationMark = '-';
                break;
            case 3:
                $correctAnswers[] = $firstNumber * $secondNumber;
                $operationMark = '*';
                break;
        }

        $expressionStrings[] = "{$firstNumber} {$operationMark} {$secondNumber}";
    }

    return [
        $expressionStrings,
        $correctAnswers
    ];
}
