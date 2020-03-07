<?php

namespace BrainGames\Games\PrimeGame;

use function BrainGames\GameEngine\run;

use const BrainGames\GameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".' . PHP_EOL;

function primeGame()
{
    $gameResources = primeGameGenerator();

    run(DESCRIPTION, $gameResources);
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

function primeGameGenerator()
{
    $expressionStrings = [];
    $correctAnswers = [];

    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $number = rand(1, 99);
        $expressionStrings[] = $number;

        if (isPrime($number)) {
            $correctAnswers[] = 'yes';
        } else {
            $correctAnswers[] = 'no';
        }
    }


    return [
        $expressionStrings,
        $correctAnswers
    ];
}
