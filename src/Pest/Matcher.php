<?php

namespace Acro5piano\Pest;

use Acro5piano\Pest\Exceptions\NotMatchException;

class Matcher
{
    /* @var anything */
    protected $exp;

    /* @var bool */
    protected $not;

    public function __construct($exp)
    {
        $this->exp = $exp;
    }

    public function toBe($exp)
    {
        $this->assert($this->exp === $exp);
    }

    public function toContain($element)
    {
        $this->assert(in_array($element, $this->exp));
    }

    public function not()
    {
        $this->not = true;

        return $this;
    }

    private function assert(bool $condition)
    {
        if ($this->not && $condition || !$this->not && !$condition) {
            throw new NotMatchException('');
        }
    }
}
