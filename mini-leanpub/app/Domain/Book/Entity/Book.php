<?php

namespace MiniLeanpub\Domain\Book\Entity;

class Book
{

    public function __construct(
        private ?string $id
    ) {}

    public function validate()
    {
        if (!$this->id) throw new \Exception('Invalid Entity: ID');
    }
}
