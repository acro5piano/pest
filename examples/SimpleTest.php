<?php

require_once(__DIR__.'/../vendor/autoload.php');

use Acro5piano\Pest\Spec;

function add(int $x, int $y)
{
    return $x + $y;
}

Spec::describe('add', function ($it) {
    $it('returns 3 when args are 1, 2', function ($expect) {
        $expect(add(1, 2))->toBe(3);
    });
    $it('a failing test', function ($expect) {
        $expect(add(1, 2))->toBe(4);
    });
    $it('using "not"', function ($expect) {
        $expect(add(3, 4))->not()->toBe(11);
    });
    $it('fail test using "not"', function ($expect) {
        $expect(add(3, 4))->not()->toBe(7);
    });
    $it('using "contain"', function ($expect) {
        $expect([1, 2])->toContain(1);
    });
    $it('fail using "contain"', function ($expect) {
        $expect([1, 2])->not()->toContain(1);
    });
});

Spec::it('using "contain"', function ($expect) {
    $expect([1, 2])->toContain(1);
    $expect([1, 2])->not()->toContain(1);
});

