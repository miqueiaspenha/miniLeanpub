<?php

namespace MiniLeanpub\Application\UseCases\Book\CreateBook\DTO;

use MiniLeanpub\Application\UseCases\Shared\InteractorDTO;

class BookCreateOutputDTO extends InteractorDTO
{
    public function __construct(
        public ?string $bookCode = null,
        public ?string $title = null,
        public ?string $description = null,
        public ?float $price = null,
        public ?string $bookPath = null,
        public ?string $mimeType = null
    ) {}
}
