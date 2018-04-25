<?php

require_once(__DIR__.'/../vendor/autoload.php');

use Acro5piano\Pest\Functions as Pest;

function add(int $x, int $y)
{
    return $x + $y;
}

$pest = new Pest();

$pest->describe('add', function ($it) {
    $it('returns sum of integers', function () {
        Pest::expect(add(1, 2))->toBe(3);
    });
    $it('a failing test', function () {
        Pest::expect(add(1, 2))->toBe(4);
    });
});
