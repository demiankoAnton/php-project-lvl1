<?php

namespace BrainGames\EvenGame;

use function cli\line;
use function cli\prompt;

function isEven(string $name)
{


    for ($i = 0; $i < 3; $i++) {
        $randNumber = rand(0, 999);
        line("Question: {$randNumber}");
        $answer = prompt('Your answer: ');

        if ($answer != 'yes' && $answer != 'no') {
            return line('Incorrect answer!');
        }

        if ($randNumber % 2 == 0 && $answer == 'yes') {
                line('Correct!');
        } else {
            return line("'no' is wrong answer ;(. Correct answer is 'yes'\n Let's try again {$name}\n");
        }

        if ($randNumber % 2 != 0 && $answer == 'no') {
                line('Correct!');
        } else {
                return line("'yes' is wrong answer ;(. Correct answer is 'no'\n Let's try again {$name}\n");
        }
    }

    line("Congratulations, {$name}!");
}
