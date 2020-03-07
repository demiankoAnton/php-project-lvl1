<?php

namespace BrainGames\Games\CalcGame;

const DESCRIPTION = 'What is the result of the expression?' . PHP_EOL;

function calcGame()
{
    $firstNumber = rand(0, 99);
    $secondNumber = rand(0, 99);
    $operation = rand(1, 3);

    switch ($operation) {
        case 1:
            $correctAnswer = $firstNumber + $secondNumber;
            $operationMark = '+';
            break;
        case 2:
            $correctAnswer = $firstNumber - $secondNumber;
            $operationMark = '-';
            break;
        case 3:
            $correctAnswer = $firstNumber * $secondNumber;
            $operationMark = '*';
            break;
    }

    $expressionString = "{$firstNumber} {$operationMark} {$secondNumber}";

    return [
        DESCRIPTION,
        $expressionString,
        $correctAnswer
    ];
}

