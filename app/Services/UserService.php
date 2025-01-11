<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;

class UserService
{
    public function __construct(
        protected UserRepositoryInterface $userRepository
    )
    {
    }

    public function create(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function createByRole(array $data, string|int $roleId)
    {
        return $this->userRepository->createByRole($data, $roleId);
    }

    public function update(array $data, $id)
    {
        return $this->userRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }

    public function findAll(?array $options)
    {
        return $this->userRepository->findAll($options);
    }

    public function getOne($id)
    {
        return $this->userRepository->getOne($id);
    }

    public function getByUsername(string $username)
    {
        return $this->userRepository->getByUsername($username);
    }

    public function getByEmail(string $email)
    {
        return $this->userRepository->getByEmail($email);
    }
}
