<?php

namespace Acro5piano\Pest;

use Acro5piano\Pest\Matcher;
use Acro5piano\Pest\Exceptions\NotMatchException;

class Expect
{
    public function __invoke(...$args)
    {
        return $this->expect(...$args);
    }

    public static function expect($expression)
    {
        return new Matcher($expression);
    }
}
