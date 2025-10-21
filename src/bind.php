<?php

namespace TaTikoma;

use Closure;

if (! function_exists('TaTikoma\bind')) {
    /**
     * For binding arguments to method
     *
     * @template TReturn
     * @param  callable(mixed...): TReturn  $callable
     * @param  mixed...  $args
     * @return callable(mixed): TReturn
     */
    function bind(callable $callable, mixed ...$args): Closure
    {
        return static fn(mixed $arg) => $callable($arg, ...$args);
    }
}
