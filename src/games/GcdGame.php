<?php

namespace BrainGames\Games\GcdGame;

function gcdGameGenerator(&$correctAnswer, &$expressionString)
{
    $firstNumber = rand(1, 99);
    $secondNumber = rand(1, 99);
    $correctAnswer = getNod($firstNumber, $secondNumber);
    $expressionString = "{$firstNumber} {$secondNumber}";
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

function getGcdDescription()
{
    return 'Find the greatest common divisor of given numbers.' . PHP_EOL;
}
