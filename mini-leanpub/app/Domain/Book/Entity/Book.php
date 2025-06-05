<?php

namespace MiniLeanpub\Domain\Book\Entity;

use Exception;

class Book
{

    public function __construct(
        private ?string $id,
        private ?string $title
    ) {}

    public function validate()
    {
        if (!$this->id) throw new Exception('Invalid Entity: ID');
        if (!$this->title) throw new Exception('Invalid Entity: Title');
    }
}
