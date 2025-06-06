<?php

namespace MiniLeanpub\Application\UseCases\Book\CreateBook;

use MiniLeanpub\Application\UseCases\Book\CreateBook\DTO\BookCreateInputDTO;
use MiniLeanpub\Application\UseCases\Book\CreateBook\DTO\BookCreateOutputDTO;
use MiniLeanpub\Domain\Book\Entity\Book;
use MiniLeanpub\Domain\Book\Repository\BookRepositoryInterface;

class CreateBookUseCase
{
    public function __construct(
        private BookCreateInputDTO $input,
        private BookRepositoryInterface $repository
    ) {}

    public function handle(): BookCreateOutputDTO
    {
        $data = $this->input->getData();
        $entity = new Book(
            $data['bookCode'],
            $data['title'],
            $data['description'],
            $data['price'],
            $data['bookPath'],
            $data['mimeType']
        );
        $entity->validate();
        $result = $this->repository->create($data);
        return new BookCreateOutputDTO($result->id, $result->title);
    }
}
