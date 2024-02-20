<?php


namespace pvillareal;


class BalancedBrackets
{
    /**
     * @var string
     */
    protected $string;

    /**
     * BalancedBrackets constructor.
     * @param string $string
     */
    public function __construct(string $string)
    {
        $this->string = $string;
    }

    public function isBalanced()
    {
        if (strlen($this->string) % 2 === 1) {
            return false;
        }
        $stack = [];
        $bracketMatch = [
          ")" => "(",
          "]" => "[",
          "}" => "{"
        ];
        for($i = 0; $i < strlen($this->string); $i++) {
            $char = $this->string[$i];
            if (in_array($char, $bracketMatch)) {
                $stack[] = $char;
            }
            if (array_key_exists($char, $bracketMatch)) {
                if ($stack === []) {
                    return false;
                }
                $openingChar = array_pop($stack);
                if ($bracketMatch[$char] != $openingChar) {
                    return false;
                }
            }
        }
        return true;
    }
}