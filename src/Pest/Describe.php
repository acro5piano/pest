<?php

namespace Acro5piano\Pest;

use Acro5piano\Pest\Matcher;
use Acro5piano\Pest\It;
use Acro5piano\Pest\Exceptions\NotMatchException;

class Describe
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
        $this->descriptions[] = $description;
        $callable(new It(...$this->descriptions));
    }
}
