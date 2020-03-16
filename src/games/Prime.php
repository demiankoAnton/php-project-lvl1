<?php

namespace BrainGames\games\Prime;

use function BrainGames\gameEngine\run;

use const BrainGames\gameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function primeGame()
{
    $primeGameData = generatePrimeGameData();

    run(DESCRIPTION, $primeGameData);
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

function generatePrimeGameData()
{
    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $number = rand(1, 99);

        $correctAnswer = isPrime($number) ? 'yes' : 'no';

        $primeGameData[] = [$number, $correctAnswer];
    }


    return $primeGameData;
}
