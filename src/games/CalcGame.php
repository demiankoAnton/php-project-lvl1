<?php

namespace BrainGames\Games\CalcGame;

function calcGameGenerate(&$correctAnswer, &$expressionString)
{
    $firstNumber = rand(0, 99);
    $secondNumber = rand(0, 99);
    $operation = rand(1, 3);
    $operationMark = '';

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

    return $expressionString;
}

function getCalcAnswer($answer, $correctAnswer)
{
    if ($answer == $correctAnswer) {
        return 1;
    }
}

function getcalcDescription()
{
    return 'What is the result of the expression?' . PHP_EOL;
}
