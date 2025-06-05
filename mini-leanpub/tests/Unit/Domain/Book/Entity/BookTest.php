<?php

namespace Tests\MiniLeanpub\Unit\Domain\Book\Entity;

use MiniLeanpub\Domain\Book\Entity\Book;
use PHPUnit\Framework\TestCase;

use Exception;
use Mockery\Expectation;

class BookTest extends TestCase
{
    public function testIfBookValidationThrowExceptionToAnInvalidId()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Invalid Entity: ID');

        $book = new Book(null, 'Titulo Livro', 'Descrição', 25.9, 'path_book', 'mime_type');
        $book->validate();
    }

    public function testIfBookValidationThrowsExceptionToAnInvalidTitle()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Invalid Entity: Title');

        $book = new Book('UUID', null, 'Description', 25.9, 'path_book', 'text/markdown');
        $book->validate();
    }

    public function testIfBookValidationThrowsExceptionToAnInvalidDescription()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Invalid Entity: Description');

        $book = new Book('UUID', 'Titulo Livro', null, 25.9, 'path_book', 'text/markdown');
        $book->validate();
    }

    public function testIfBookValidationThrowExpectionToAnInvalidPrice()
    {
        $this->expectException(Expectation::class);
        $this->expectExceptionMessage('Invalid Entity: Price');

        $book = new Book('UUID', 'Titulo Livro', 'Description', -10, 'path_book', 'text/markdown');
        $book->validate();
    }
}
