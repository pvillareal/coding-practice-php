<?php


namespace pvillareal;



class SimpleGraph
{

    /**
     * @var array
     */
    protected $graphs;

    public function __construct(array $input)
    {
        $this->processGraph($input);
    }

    public function getGraphs() : array
    {
        return $this->graphs;
    }

    private function processGraph(array $input): void
    {
        $map = [];
        foreach ($input as $assoc) {
            $map[$assoc[0]] = $assoc[1];
        }

        $items = array_keys($map);

        while ($items !== []) {
            $item = array_shift($items);
            $association = $map[$item];
            $list = [$item, $association];
            $hasAssociation = array_key_exists($association, $map);
            $newItem = $association;
            while ($hasAssociation) {
                $newAssociation = $map[$newItem];
                $list[] = $newAssociation;
                $items = array_diff($items, [$newItem]);
                $hasAssociation = array_key_exists($newAssociation, $map);
                if ($hasAssociation) {
                    $newItem = $newAssociation;
                }
            }
            $this->graphs[] = $list;
        }

    }

}