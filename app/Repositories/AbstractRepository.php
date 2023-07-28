<?php

namespace App\Repositories;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

abstract class AbstractRepository implements IteratorAggregate {

    protected $entity;
    protected array $collection = [];

    protected function collectionAdd($request) {
        $this->collection[] = $request;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->collection);
    }

}