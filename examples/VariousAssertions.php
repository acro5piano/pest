<?php

require_once(__DIR__.'/../vendor/autoload.php');

use Acro5piano\Pest\Spec;

function add(int $x, int $y)
{
    return $x + $y;
}

Spec::describe('contain', function ($it) {
    $it('passes', function ($expect) {
        $expect([1, 2])->toContain(1);
    });
    $it('fails', function ($expect) {
        $expect([1, 2])->toContain(4);
    });
});
