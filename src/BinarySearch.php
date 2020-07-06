<?php


namespace pvillareal;


class BinarySearch
{
    protected $cycles;
    protected $result;
    protected static $try;
    /**
     * @var false|float|int
     */
    protected $index;

    /**
     * @return false|float|int
     */
    public function getIndex()
    {
        return $this->index;
    }

    public static function try() {
        return self::$try;
    }

    /**
     * MergeSort constructor.
     * @param array $values
     */
    public function __construct(int $value, array $values)
    {
        $this->cycles = 0;
        $this->index = $this->findIndex($value, $values);
    }

    public function getCycles()
    {
        return $this->cycles;
    }

    private function findIndex(int $value, array $values)
    {
        $floor = 0;
        $ceiling = count($values) - 1;
        $pivot = 0;
        while ($floor <= $ceiling) {
            $this->cycles++;
            $pivot = floor(($floor + $ceiling) / 2);
            if ($value == $values[$pivot]) {
                break;
            }
            if ($value < $values[$pivot]) {
                $ceiling = $pivot - 1;
            } else {
                $floor = $pivot + 1;
            }
        }
        return $pivot;
    }
}