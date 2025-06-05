<?php

namespace Tests\MiniLeanpub\Unit\Domain\Book\Entity;

use MiniLeanpub\Domain\Book\Entity\Book;
use PHPUnit\Framework\TestCase;

use Exception;


class BookTest extends TestCase
{
    public function testIfBookValidationThrowExceptionToAnInvalidId()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Invalid Entity: ID');

        $book = new Book(null, 'Titulo Livro', 'Descrição', 25.9, 'path_book', 'mime_type');
        $book->validate();
    }
}
