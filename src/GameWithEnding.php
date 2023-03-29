<?php

class GameWithEnding
{
    public array $playerOneValuesMap = [
        'A' => 'rock',
        'B' => 'paper',
        'C' => 'scissors'
    ];

    public array $expectedResultsMap = [
        'X' => 'lose',
        'Y' => 'draw',
        'Z' => 'win'
    ];

    public array $decisionPoints = [
        'rock' => 1,
        'paper' => 2,
        'scissors' => 3
    ];

    public array $endingPoints = [
        'lose' => 0,
        'draw' => 3,
        'win' => 6,
    ];

    public array $mappingDecisionByEnding = [
        'rock lose' => 'scissors',
        'rock win' => 'paper',
        'paper lose' => 'rock',
        'paper win' => 'scissors',
        'scissors lose' => 'paper',
        'scissors win' => 'rock'
    ];

    public function __construct(private string $playerOne, private string $expectedEnding)
    {
    }

    public function roundResult(): int
    {
        $playerOne = $this->playerOneValuesMap[$this->playerOne];
        $expectedResult = $this->expectedResultsMap[$this->expectedEnding];
        $pointsForEnding = $this->endingPoints[$expectedResult];
        if($expectedResult === 'draw') {
            return $this->getDrawPoints() + $pointsForEnding;
        }
        $resultsKey = $playerOne.' '.$expectedResult;
        $decision = $this->mappingDecisionByEnding[$resultsKey];
        return $pointsForEnding + $this->decisionPoints[$decision];
    }

    public function getDrawPoints(): int
    {
        $playerOneDecision = $this->playerOneValuesMap[$this->playerOne];

        return $this->decisionPoints[$playerOneDecision];
    }
}