<?php


namespace pvillareal\knighttopawn;


class Knight extends Unit
{

    /**
     * @return array
     */
    public function getLegalMoves() : array
    {
        $legalMoves = [];
        if ($this->moveUpLeft()) {
            $legalMoves[] = $this->moveUpLeft();
        }
        if ($this->moveUpRight()) {
            $legalMoves[] = $this->moveUpRight();
        }
        if ($this->moveRightUp()) {
            $legalMoves[] = $this->moveRightUp();
        }
        if ($this->moveRightDown()) {
            $legalMoves[] = $this->moveRightDown();
        }
        if ($this->moveDownRight()) {
            $legalMoves[] = $this->moveDownRight();
        }
        if ($this->moveDownLeft()) {
            $legalMoves[] = $this->moveDownLeft();
        }
        if ($this->moveLeftDown()) {
            $legalMoves[] = $this->moveLeftDown();
        }
        if ($this->moveLeftUp()) {
            $legalMoves[] = $this->moveLeftUp();
        }

        return $legalMoves;
    }

    private function isOutofBounds($column, $row)
    {
        if (ord(strtolower($column)) < 97 || ord(strtolower($column)) > 104) {
            return false;
        }
        if ($row < 1 || $row > 8) {
            return false;
        }
        return true;
    }

    private function moveUpRight()
    {
        $loc = $this->getLocation();
        $column = chr(ord($loc[0]) + 1);
        $row = $loc[1] + 2;
        $newLoc = [$column, strval($row)];
        return $this->isOutofBounds($column, $row) ? $newLoc : false;
    }

    private function moveUpLeft()
    {
        $loc = $this->getLocation();
        $column = chr(ord($loc[0]) - 1);
        $row = $loc[1] + 2;
        $newLoc = [$column, strval($row)];
        return $this->isOutofBounds($column, $row) ? $newLoc : false;
    }

    private function moveRightUp()
    {
        $loc = $this->getLocation();
        $column = chr(ord($loc[0]) + 2);
        $row = $loc[1] + 1;
        $newLoc = [$column, strval($row)];
        return $this->isOutofBounds($column, $row) ? $newLoc : false;
    }

    private function moveRightDown()
    {
        $loc = $this->getLocation();
        $column = chr(ord($loc[0]) + 2);
        $row = $loc[1] - 1;
        $newLoc = [$column, strval($row)];
        return $this->isOutofBounds($column, $row) ? $newLoc : false;
    }

    private function moveDownRight()
    {
        $loc = $this->getLocation();
        $column = chr(ord($loc[0]) + 1);
        $row = $loc[1] - 2;
        $newLoc = [$column, strval($row)];
        return $this->isOutofBounds($column, $row) ? $newLoc : false;
    }

    private function moveDownLeft()
    {
        $loc = $this->getLocation();
        $column = chr(ord($loc[0]) - 1);
        $row = $loc[1] - 2;
        $newLoc = [$column, strval($row)];
        return $this->isOutofBounds($column, $row) ? $newLoc : false;
    }

    private function moveLeftUp()
    {
        $loc = $this->getLocation();
        $column = chr(ord($loc[0]) - 2);
        $row = $loc[1] + 1;
        $newLoc = [$column, strval($row)];
        return $this->isOutofBounds($column, $row) ? $newLoc : false;
    }

    private function moveLeftDown()
    {
        $loc = $this->getLocation();
        $column = chr(ord($loc[0]) - 2);
        $row = $loc[1] - 1;
        $newLoc = [$column, strval($row)];
        return $this->isOutofBounds($column, $row) ? $newLoc : false;
    }
}