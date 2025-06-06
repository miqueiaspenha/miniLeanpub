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
        $this->expectExceptionMessage('Invalid Entity: Book Code');

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
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Invalid Entity: Price');

        $book = new Book('UUID', 'Titulo Livro', 'Description', -10, 'path_book', 'text/markdown');
        $book->validate();
    }

    public function testIfBookValidationThrowsExceptionToAnInvalidBookPath()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Invalid Entity: Path Book');

        $book = new Book('UUID', 'Titulo Livro', 'Description', 25.9, null, 'text/markdown');
        $book->validate();
    }

    public function testIfBookValidationThrowsExceptionToValidBookMimeType()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Invalid Entity: MimeType');

        $book = new Book('UUID', 'Titulo Livro', 'Descrição Livro', 25.9, 'book_path', 'application/json');
        $book->validate();
    }
}
