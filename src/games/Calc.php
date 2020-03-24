<?php

namespace BrainGames\games\Calc;

use function BrainGames\gameEngine\run;

use const BrainGames\gameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'What is the result of the expression?';

function calcGame()
{
    $gameData = generateGameData();

    run(DESCRIPTION, $gameData);
}

function generateGameData()
{
    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $firstNumber = rand(0, 99);
        $secondNumber = rand(0, 99);
        $operations = ['+', '-', '*'];
        $operationKey = array_rand($operations);
        $operation = $operations[$operationKey];

        switch ($operation) {
            case '+':
                $correctAnswer = $firstNumber + $secondNumber;
                break;
            case '-':
                $correctAnswer = $firstNumber - $secondNumber;
                break;
            case '*':
                $correctAnswer = $firstNumber * $secondNumber;
                break;
        }

        $question = "{$firstNumber} {$operation} {$secondNumber}";
        $gameData[] = [$question, $correctAnswer];
    }

    return $gameData;
}
