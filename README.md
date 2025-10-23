# BIND

## There is only two functions in this package: `bind` and `flip`

## Install

## Examples

### Example 1
#### Before
`array_map(static fn (string $s) => substr($s, 2), ['a_bar', 'a_foo', 'a_boo'])`
#### After
`array_map(bind(substr(...), 2), ['a_bar', 'a_foo', 'a_boo'])`

### Example 2
#### Before
```php
$result = 'Hello World'
    |> static fn (string $s) => explode(' ', $s)
    |> static fn (array $a) => array_filter($a, static fn (string $s) => str_starts_with($s, 'H'))
```
#### After
```php
$result = 'Hello World'
    |> bind(flip(explode(...)), ' ')
    |> bind(array_filter(...), bind(str_starts_with(...), 'H'))```
