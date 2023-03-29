<?php

class DayTwo
{

    public function __construct(private string $input)
    {
    }

    public function result(): int
    {
        $items = explode(PHP_EOL, $this->input);
        $rounds = [];
        foreach ($items as $item) {
            $players = explode(' ' ,$item);
            $game = new Game($players[0], $players[1]);
            $rounds[] = $game->roundResult();
        }
        return array_sum($rounds);
    }

    public function resultWithEnding(): int
    {
        $items = explode(PHP_EOL, $this->input);
        $rounds = [];
        foreach ($items as $item) {
            $players = explode(' ' ,$item);
            $game = new GameWithEnding($players[0], $players[1]);
            $rounds[] = $game->roundResult();
        }

        return array_sum($rounds);
    }
}