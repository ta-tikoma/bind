<?php

namespace TaTikoma;

use Closure;

if (! function_exists('TaTikoma\bind')) {
    /**
     * For binding arguments to method
     *
     * @template TFirst
     * @template TReturn
     *
     * @param  callable(TFirst, mixed...): TReturn  $callable
     * @param  mixed...  $args
     * @return callable(TFirst): TReturn
     */
    function bind(callable $callable, mixed ...$args): Closure
    {
        return static fn(mixed $arg) => $callable($arg, ...$args);
    }
}

if (! function_exists('TaTikoma\flip')) {
    /**
     * For revers arguments
     *
     * @template TLast
     * @template TReturn
     *
     * @param  callable(mixed..., TLast): TReturn  $callable
     * @return callable(TLast, mixed...): TReturn
     */
    function flip(callable $callable): Closure
    {
        return static fn(mixed ...$args) => $callable(...array_reverse($args));
    }
}
