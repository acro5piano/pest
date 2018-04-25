<?php

namespace Acro5piano\Pest;

use Acro5piano\Pest\Matcher;
use Acro5piano\Pest\Exceptions\NotMatchException;

class Functions
{
    protected $descriptions = [];

    public function __invoke(...$args)
    {
        $this->it(...$args);
    }

    public function describe(string $description, callable $callable)
    {
        $this->descriptions[] = $description;

        try {
            $callable($this);
            echo 'good';
        } catch (NotMatchException $e) {
            $this->trace();
        }
    }

    public function it(string $description, callable $callable)
    {
        $this->descriptions[] = $description;
        $callable();
    }

    private function trace()
    {
        echo "Failed:  \n";
        foreach ($this->descriptions as $nest => $description) {
            echo "  ";
            for ($i = 0; $i < $nest; $i++) {
                echo "  ";
            }
            echo $description."\n";
        }
    }

    public static function expect($expression)
    {
        return new Matcher($expression);
    }
}
