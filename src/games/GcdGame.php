<?php

namespace BrainGames\Games\GcdGame;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.' . PHP_EOL;

function gcdGame()
{
    $firstNumber = rand(1, 99);
    $secondNumber = rand(1, 99);
    $correctAnswer = getNod($firstNumber, $secondNumber);
    $expressionString = "{$firstNumber} {$secondNumber}";

    return [
        DESCRIPTION,
        $expressionString,
        $correctAnswer
    ];
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

