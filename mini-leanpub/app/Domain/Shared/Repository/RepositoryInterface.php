<?php

namespace MiniLeanpub\Domain\Shared\Repository;

interface RepositoryInterface
{
    public function create($data);
    public function find($id);
}
