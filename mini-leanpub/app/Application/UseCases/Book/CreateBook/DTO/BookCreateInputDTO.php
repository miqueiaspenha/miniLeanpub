<?php

namespace MiniLeanpub\Application\UseCases\Book\CreateBook\DTO;

use MiniLeanpub\Application\UseCases\Shared\InteractorDTO;

class BookCreateInputDTO extends InteractorDTO
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public float $price,
        public string $bookPath,
        public string $mimeType
    ) {}
}
