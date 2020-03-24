<?php

namespace BrainGames\games\Prime;

use function BrainGames\gameEngine\run;

use const BrainGames\gameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function primeGame()
{
    $gameData = generateGameData();

    run(DESCRIPTION, $gameData);
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

function generateGameData()
{
    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $question = rand(1, 99);

        $correctAnswer = isPrime($question) ? 'yes' : 'no';

        $gameData[] = [$question, $correctAnswer];
    }

    return $gameData;
}
