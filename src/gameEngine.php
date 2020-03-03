<?php

namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;

function run(string $game)
{
    $gameGenerator = '';
    $gameDescription = '';

    getGameType($game, $gameGenerator, $gameDescription);

    line('Welcome to the Brain Games!');
    line($gameDescription());
    $name = prompt('May I have your name?');
    line("Hello, %s!" . PHP_EOL, $name);

    for ($i = 0; $i < 3; $i++) {
        $expressionString = '';
        $correctAnswer = 0;

        $gameGenerator($correctAnswer, $expressionString);

        line('Question: ' . $expressionString);
        $userAnswer = prompt('Your answer: ');
        $result = getCorrectAnswer($userAnswer, $correctAnswer);

        getGameResult($result, $userAnswer, $correctAnswer);
    }

    line("Congratulations, {$name}!");
}

function getGameType(string $game, &$gameGenerator, &$gameDescription)
{
    switch ($game) {
        case 'calc':
            $gameGenerator = 'BrainGames\Games\CalcGame\calcGameGenerator';
            $gameDescription = 'BrainGames\Games\CalcGame\getCalcDescription';
            break;
        case 'even':
            $gameGenerator = 'BrainGames\Games\EvenGame\evenGameGenerator';
            $gameDescription = 'BrainGames\Games\EvenGame\getEvenDescription';
            break;
        case 'gcd':
            $gameGenerator = 'BrainGames\Games\GcdGame\GcdGameGenerator';
            $gameDescription = 'BrainGames\Games\GcdGame\getGcdDescription';
            break;
        case 'progression':
            $gameGenerator = 'BrainGames\Games\ProgressionGame\progressionGameGenerator';
            $gameDescription = 'BrainGames\Games\ProgressionGame\getProgressionDescription';
            break;
        case 'prime':
            $gameGenerator = 'BrainGames\Games\PrimeGame\primeGameGenerator';
            $gameDescription = 'BrainGames\Games\PrimeGame\getPrimeDescription';
            break;
    }
}

function getCorrectAnswer($userAnswer, $correctAnswer)
{
    if ($userAnswer == $correctAnswer) {
        return 1;
    }
}

function getGameResult($result, $userAnswer, $correctAnswer)
{
    if ($result == 1) {
        line('Correct!');
    } else {
        line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
        die;
    }
}
