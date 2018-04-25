<?php

namespace Acro5piano\Pest;

use Acro5piano\Pest\Exceptions\NotMatchException;

class Matcher
{
    protected $exp;

    public function __construct($exp)
    {
        $this->exp = $exp;
    }

    public function toBe($exp)
    {
        if ($this->exp !== $exp) {
            throw new NotMatchException('');
        }
    }
}
