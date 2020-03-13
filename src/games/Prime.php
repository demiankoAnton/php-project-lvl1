<?php

namespace BrainGames\games\Prime;

use function BrainGames\gameEngine\run;

use const BrainGames\gameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function primeGame()
{
    $gameResources = primeGameGenerator();

    run(DESCRIPTION, $gameResources);
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2, $optimizedNumber = round($number / 2); $i < $optimizedNumber; $i++) {
        if (is_integer($number / $i)) {
            return false;
        }
    }

    return true;
}

function primeGameGenerator()
{
    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $number = rand(1, 99);

        if (isPrime($number)) {
            $correctAnswers = 'yes';
        } else {
            $correctAnswers = 'no';
        }

        $gameResources[] = [$number, $correctAnswers];
    }


    return $gameResources;
}
