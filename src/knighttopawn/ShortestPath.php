<?php


namespace pvillareal\knighttopawn;


class ShortestPath
{
    protected Board $board;

    protected array $startPosition;

    protected array $destination;

    /**
     * ShortestPath constructor.
     */
    public function __construct()
    {
    }

    public function setBoard(Board $board): void
    {
        $this->board = $board;
    }

    public function setUnit(Unit $unit, string $column, string $row): void
    {
        $this->board->move($unit, $column, $row);
        $this->startPosition = [$column, $row];
    }

    public function setDestination(string $column, string $row): void
    {
        $this->destination = [$column, $row];
    }

    public function find()
    {
        $unit = $this->board->check($this->startPosition[0], $this->startPosition[1]);
        $queue = [];
        $queue[] = $unit;
        while(!empty($queue)) {
            $unit = array_shift($queue);
            if($unit->getLocation() == $this->destination) {
                return $unit->getPath();
            }
            foreach ($unit->getLegalMoves() as $move) {
                if (empty($this->board->check($move[0], $move[1]))) {
                    $clone = clone($unit);
                    $clone = $this->board->move($clone, $move[0], $move[1]);
                    $queue[] = $clone;
                }
            }
        }
        return [];
    }
}