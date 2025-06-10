<?php

namespace Tests\MiniLeanPub\Unit\Application\UseCases\Book\CreateBook;

use MiniLeanpub\Application\UseCases\Book\CreateBook\CreateBookUseCase;
use MiniLeanpub\Application\UseCases\Book\CreateBook\DTO\BookCreateInputDTO;
use MiniLeanpub\Application\UseCases\Book\CreateBook\DTO\BookCreateOutputDTO;
use App\Models\Book;
use MiniLeanpub\Infrastructure\Repository\Book\BookEloquentRepository;
use PHPUnit\Framework\TestCase;
use stdClass;

class CreateBookUseCaseTest extends TestCase
{
    public function testShouldCreateANewBookViaUseCase()
    {
        $repository = $this->getRepositoryMock();

        $input = new BookCreateInputDTO(
            'a5544894-d498-4b6e-a881-169b23b5721b',
            'My Awesome Book',
            'My Awesome Book Desc',
            25.9,
            'book_path',
            'text/markdown'
        );

        $useCase = new CreateBookUseCase($input, $repository);
        $result = $useCase->handle();

        $this->assertInstanceOf(BookCreateOutputDTO::class, $result);

        $data = $result->getData();

        $this->assertEquals('a5544894-d498-4b6e-a881-169b23b5721b', $data['bookCode']);
        $this->assertEquals('My Awesome Book', $data['title']);
    }

    private function getRepositoryMock()
    {
        $return = new stdClass();
        $return->book_code = 'a5544894-d498-4b6e-a881-169b23b5721b';
        $return->title = 'My Awesome Book';
        $return->description = 'My Awesome Book Desc';
        $return->price = 25.9;
        $return->bookPath = 'book_path';

        $model = $this->createMock(Book::class);

        $mock = $this->getMockBuilder(BookEloquentRepository::class)
            ->onlyMethods(['create'])
            ->setConstructorArgs([$model])
            ->getMock();

        $mock->expects($this->once())
            ->method('create')
            ->willReturn($return);

        return $mock;
    }
}
