<?php

namespace Acro5piano\Pest;

use ReflectionFunction;
use Closure;
use Acro5piano\Pest\Matcher;
use Acro5piano\Pest\Describe;
use Acro5piano\Pest\It;
use Acro5piano\Pest\Exceptions\NotMatchException;

class Spec
{
    public static function describe(string $description, Closure $closure)
    {
        if (static::getClosureRequiresClassName($closure) === Describe::class) {
            $closure(new Describe($description));
            return;
        }

        $closure(new It($description));
    }

    private static function getClosureRequiresClassName(Closure $closure)
    {
        $functionReflection = new ReflectionFunction($closure);
        $parameters = $functionReflection->getParameters();
        return $parameters[0]->getClass()->name;
    }

    public function it(string $description, Closure $closure)
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
