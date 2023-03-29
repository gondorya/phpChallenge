<?php

class Calories
{

    public function __construct(private string $input)
    {
    }
    public function most(): int
    {
        $sums = $this->formatInput();
        return max($sums);
    }


    public function mostThree(): int
    {
        $sums = $this->formatInput();
        rsort($sums);
        return $sums[0] + $sums[1] + $sums[2];
    }

    /**
     * @return int[]
     */
    public function formatInput(): array
    {
        $trimmed = preg_replace('/[ ]{2,}|[\t]/', '', trim($this->input));
        $items = array_map('intval', explode(PHP_EOL, $trimmed));
        $sums = [];
        $index = 0;
        $sums[0] = 0;
        foreach ($items as $item) {
            if ($item !== 0) {
                $sums[$index] += $item;
            } else {
                $index++;
                $sums[$index] = 0;
            }
        }
        return $sums;
    }
}