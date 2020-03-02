<?php

namespace BrainGames\Games\CalcGame;

function calcGenerate(&$correctAnswer, &$expressionString)
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

function calcAnswer($answer, $correctAnswer)
{
    if ($answer == $correctAnswer) {
        return 1;
    } else {
        return 0;
    }
}
