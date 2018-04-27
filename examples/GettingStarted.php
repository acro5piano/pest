<?php

require_once(__DIR__.'/../vendor/autoload.php');

use Acro5piano\Pest\Spec;

function add(int $x, int $y)
{
    return $x + $y;
}

Spec::describe('add', function ($it) {
    $it('returns 3 given 1, 2', function ($expect) {
        $expect(add(1, 2))->toBe(3);
    });
    $it('a failing test', function ($expect) {
        $expect(add(1, 2))->toBe(4);
    });
});
