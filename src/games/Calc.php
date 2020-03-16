<?php

namespace BrainGames\games\Calc;

use function BrainGames\gameEngine\run;

use const BrainGames\gameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'What is the result of the expression?';

function calcGame()
{
    $calcGameData = generateCalcGameData();

    run(DESCRIPTION, $calcGameData);
}

function generateCalcGameData()
{
    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $firstNumber = rand(0, 99);
        $secondNumber = rand(0, 99);
        $operation = ['+', '-', '*'];
        $currentOperationKey = array_rand($operation);

        switch ($operation[$currentOperationKey]) {
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

        $currentQuestion = "{$firstNumber} {$operation[$currentOperationKey]} {$secondNumber}";
        $calcGameData[] = [$currentQuestion, $correctAnswer];
    }

    return $calcGameData;
}
