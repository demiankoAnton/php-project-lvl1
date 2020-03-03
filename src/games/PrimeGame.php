<?php

namespace BrainGames\Games\PrimeGame;

function primeGameGenerator(&$correctAnswer, &$expressionString)
{
    $number = rand(1, 99);

    $expressionString = $number;

    if (isPrime($number)) {
        $correctAnswer = 'yes';
    } else {
        $correctAnswer = 'no';
    }
}

function isPrime(int $number): bool
{
    for ($i = 2, $optimizedNumber = $number; $i < $optimizedNumber; $i++) {
        if (is_integer($number / $i)) {
            return false;
        }
    }

    return true;
}

function getPrimeDescription()
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".' . PHP_EOL;
}
