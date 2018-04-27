<?php

namespace Acro5piano\Pest;

use Acro5piano\Pest\Matcher;
use Acro5piano\Pest\Expect;
use Acro5piano\Pest\Exceptions\NotMatchException;

class It
{
    protected $descriptions = [];

    public function __construct(...$descriptions)
    {
        $this->descriptions = $descriptions;
    }

    public function __invoke(...$args)
    {
        $this->it(...$args);
    }

    public function it(string $description, callable $callable)
    {
        try {
            $callable(new Expect($this->descriptions));
            echo "\033[32mSuccess\033[0m\n";
            $this->trace($description);
        } catch (NotMatchException $e) {
            echo "\033[31mFailed\033[0m\n";
            $this->trace($description);
        }
    }

    private function trace(string $description)
    {
        $descriptions = array_merge($this->descriptions, [$description]);
        foreach ($descriptions as $depth => $d) {
            foreach (range(0, $depth) as $_) {
                echo '  ';
            }
            echo $d."\n";
        }
    }
}
