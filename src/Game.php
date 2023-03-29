<?php

class Game
{

    public array $valueMap = [
        'X' => 1,
        'Y' => 2,
        'Z' => 3
    ];

    public array $decisionMap = [
        'A Z' => 0,
        'C X' => 6,
        'C Y' => 0,
        'B Z' => 6,
        'B X' => 0,
        'A Y' => 6,
    ];
    public function __construct(private string $playerOne, private string $playerTwo)
    {
    }

    public function roundResult(): int
    {
        if($this->isDraw()) {
            return $this->valueMap[$this->playerTwo] + 3;
        }
        $round = $this->playerOne.' '.$this->playerTwo;
        return $this->valueMap[$this->playerTwo] + $this->decisionMap[$round];
    }

    public function isDraw(): bool
    {
        return $this->playerOne === 'A' && $this->playerTwo === 'X' || $this->playerOne === 'B' && $this->playerTwo === 'Y' || $this->playerOne === 'C' && $this->playerTwo === 'Z';
    }
}