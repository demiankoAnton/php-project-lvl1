<?php

namespace BrainGames\Games\CalcGame;

function calcGameGenerator(&$correctAnswer, &$expressionString)
{
    $firstNumber = rand(0, 99);
    $secondNumber = rand(0, 99);
    $operation = rand(1, 3);

    switch ($operation) {
        case 1:
            $calculatedAnswer = $firstNumber + $secondNumber;
            $operationMark = '+';
            break;
        case 2:
            $calculatedAnswer = $firstNumber - $secondNumber;
            $operationMark = '-';
            break;
        case 3:
            $calculatedAnswer = $firstNumber * $secondNumber;
            $operationMark = '*';
            break;
    }

    $correctAnswer = $calculatedAnswer;
    $expressionString = "{$firstNumber} {$operationMark} {$secondNumber}";
}

function getCalcDescription()
{
    return 'What is the result of the expression?' . PHP_EOL;
}
