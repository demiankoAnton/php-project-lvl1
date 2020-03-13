<?php

namespace BrainGames\games\Calc;

use function BrainGames\gameEngine\run;

use const BrainGames\gameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'What is the result of the expression?';

function calcGame()
{
    $gameResources = calcGameGenerator();

    run(DESCRIPTION, $gameResources);
}

function calcGameGenerator()
{
    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $firstNumber = rand(0, 99);
        $secondNumber = rand(0, 99);
        $operation = ['+', '-', '*'];
        $currentOperationKey = array_rand($operation);

        switch ($operation[$currentOperationKey]) {
            case '+':
                $correctAnswers = $firstNumber + $secondNumber;
                break;
            case '-':
                $correctAnswers = $firstNumber - $secondNumber;
                break;
            case '*':
                $correctAnswers = $firstNumber * $secondNumber;
                break;
        }

        $gameResources[] = ["{$firstNumber} {$operation[$currentOperationKey]} {$secondNumber}", $correctAnswers];
    }

    return $gameResources;
}
