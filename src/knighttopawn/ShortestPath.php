<?php


namespace pvillareal\knighttopawn;


class ShortestPath
{
    /**
     * @var Board
     */
    protected $board;
    /**
     * @var array
     */
    protected $startPosition;
    /**
     * @var array
     */
    protected $destination;

    /**
     * ShortestPath constructor.
     */
    public function __construct()
    {
    }

    public function setBoard(Board $board)
    {
        $this->board = $board;
    }

    public function setUnit(Unit $unit, string $column, string $row)
    {
        $this->board->move($unit, $column, $row);
        $this->startPosition = [$column, $row];
    }

    public function setDestination(string $column, string $row)
    {
        $this->destination = [$column, $row];
    }

    public function find()
    {
        /** @var Unit $unit */
        $unit = $this->board->check($this->startPosition[0], $this->startPosition[1]);
        $queue = [];
        array_push($queue, $unit);
        while(!empty($queue)) {
            $unit = array_shift($queue);
            if($unit->getLocation() == $this->destination) {
                return $unit->getPath();
            }
            foreach ($unit->getLegalMoves() as $move) {
                if (empty($this->board->check($move[0], $move[1]))) {
                    $clone = clone($unit);
                    $clone = $this->board->move($clone, $move[0], $move[1]);
                    array_push($queue, $clone);
                }
            }
        }
        return [];
    }
}