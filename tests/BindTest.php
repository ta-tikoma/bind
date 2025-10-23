<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use function TaTikoma\bind;

final class BindTest extends TestCase
{
    public function testCountArguments(): void
    {
        $before = substr(...);
        $this->assertEquals(3, (new ReflectionFunction($before))->getNumberOfParameters());
        $after = bind($before, 0, 3);
        $this->assertEquals(1, (new ReflectionFunction($after))->getNumberOfParameters());
    }

    public function testResult(): void
    {
        $text = 'some-text';
        $offset = 0;
        $length = 3;

        $this->assertEquals(substr($text, $offset, $length), bind(substr(...), $offset, $length)($text));
    }
}
