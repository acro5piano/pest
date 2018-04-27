<?php

require_once(__DIR__.'/../vendor/autoload.php');

use Acro5piano\Pest\Spec;
use Acro5piano\Pest\Describe;

Spec::describe('1: nested describe', function (Describe $describe) {
    $describe('2: second describe', function ($it) {
        $it('3: finally it comes', function ($expect) {
            $expect([1, 2])->not()->toContain(1);
        });
    });
});
