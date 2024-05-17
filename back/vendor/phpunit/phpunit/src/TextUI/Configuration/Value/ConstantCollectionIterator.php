<?php

declare(strict_types=1);

/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\TextUI\Configuration;

use function count;
use function iterator_count;

use Countable;
use Iterator;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
 * @template-implements Iterator<int, Constant>
 */
final class ConstantCollectionIterator implements Countable, Iterator
{
    /**
     * @psalm-var list<Constant>
     */
    private readonly array $constants;
    private int $position = 0;

    public function __construct(ConstantCollection $constants)
    {
        $this->constants = $constants->asArray();
    }

    public function count(): int
    {
        return iterator_count($this);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return $this->position < count($this->constants);
    }

    public function key(): int
    {
        return $this->position;
    }

    public function current(): Constant
    {
        return $this->constants[$this->position];
    }

    public function next(): void
    {
        $this->position++;
    }
}
