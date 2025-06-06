<?php

namespace MiniLeanpub\Domain\Book\Entity;

use Exception;

class Book
{

    public function __construct(
        private ?string $bookCode,
        private ?string $title,
        private ?string $description,
        private ?float $price,
        private ?string $bookPath,
        private ?string $mimeType
    ) {}

    public function validate()
    {
        if (!$this->bookCode) throw new Exception('Invalid Entity: Book Code');
        if (!$this->title) throw new Exception('Invalid Entity: Title');
        if (!$this->description) throw new Exception('Invalid Entity: Description');
        if ($this->price < 0) throw new Exception('Invalid Entity: Price');
        if (!$this->bookPath) throw new Exception('Invalid Entity: Path Book');
        if ($this->mimeType != 'text/markdown') throw new Exception('Invalid Entity: MimeType');
    }
}
