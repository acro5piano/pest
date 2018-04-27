# Pest

A php unit testing library with Rspec style.

# Example

```php
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
```

Result:

# Grouping

You can nest with Type Hint.

```php
use Acro5piano\Pest\Describe;

Spec::describe('1: nested describe', function (Describe $describe) {
    $describe('2: second describe', function ($it) {
        $it('3: finally it comes', function ($expect) {
            $expect([1, 2])->not()->toContain(1);
        });
    });
});
```

Result:

```
Failed
  1: nested describe
      2: second describe
            3: finally it comes
```

# Assertions

`toBe`
`toContain`

`not()` invert the condition. e.g.)

```php
$expect([1, 2])->not()->toContain(3); // -> Fails
```
