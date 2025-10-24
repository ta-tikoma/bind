<?php

namespace TaTikoma;

use Closure;

if (! function_exists('TaTikoma\bind')) {
    /**
     * For binding arguments to method
     *
     * @template TFirst
     * @template TSecond
     *
     * @template TReturn
     *
     * @param  Closure(TFirst, TSecond): TReturn $callable
     * @param  TSecond ...$args
     * @return Closure(TFirst $first): TReturn
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
     * @template TFirst
     * @template TLast
     * @template TReturn
     *
     * @param  Closure(TFirst $first, TLast $last): TReturn $callable
     * @return Closure(TLast $last, TFirst $first): TReturn
     */
    function flip(callable $callable): Closure
    {
        return static fn(mixed ...$args) => $callable(...array_reverse($args));
    }
}
