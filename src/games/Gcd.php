<?php

namespace BrainGames\games\Gcd;

use function BrainGames\gameEngine\run;

use const BrainGames\gameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

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
    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $firstNumber = rand(1, 99);
        $secondNumber = rand(1, 99);
        $gameResources[] = ["{$firstNumber} {$secondNumber}", getNod($firstNumber, $secondNumber)];
    }

    return $gameResources;
}
