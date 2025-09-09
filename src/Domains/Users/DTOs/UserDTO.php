<?php

namespace ERM\Domains\Users\DTOs;

class UserDTO {
    public int $id;
    public string $email;

    public function __construct(
        int $id,
        string $email
    ) {
        $this->id = $id;
        $this->email = $email;
    }

    public static function fromArray(array $user): UserDTO {
        $dto = self::new(
            $user['id'],
            $user['email']
        );
    }


    public static function toArray(UserDTO $dto): array {
        $user = array(
            'id' => $dto->id,
            'email' => $dto->email
        );
        return $user;
    }
}