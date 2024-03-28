<?php


namespace pvillareal;


class GiveMeChange
{
    /**
     * @var int
     */
    protected $value;
    /**
     * @var array
     */
    protected $denomination;

    /**
     * GiveMeChange constructor.
     * @param int $value
     * @param array $denomination
     */
    public function __construct(int $value, array $denomination)
    {
        $this->value = $value;
        $this->denomination = $denomination;
    }

    public function giveChange() : array
    {
        $result = [];
        rsort($this->denomination);
        $val = $this->value;
        foreach ($this->denomination as $denom) {
            $result[$denom] = floor($val / $denom);
            $val -= $result[$denom] * $denom;
        }
        return $result;
    }
}