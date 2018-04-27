<?php

namespace Acro5piano\Pest;

use Acro5piano\Pest\Matcher;
use Acro5piano\Pest\Describe;
use Acro5piano\Pest\It;
use Acro5piano\Pest\Exceptions\NotMatchException;

class Spec
{
    public static function describe(string $description, callable $callable, $nested = false)
    {
        if ($nested) {
            $callable(new Describe([$description]));
        } else {
            $callable(new It($description));
        }
    }

    public function it(string $description, callable $callable)
    {
        return new It($description);
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
}
