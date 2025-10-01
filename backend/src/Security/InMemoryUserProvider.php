<?php

namespace App\Security;

use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class InMemoryUserProvider implements UserProviderInterface
{
    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        return new InMemoryUser($identifier, 'password', ['ROLE_USER']);
    }

    public function refreshUser(UserInterface $user): UserInterface
    {
        if (!$user instanceof InMemoryUser) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return new InMemoryUser($user->getUserIdentifier(), null, $user->getRoles());
    }

    public function supportsClass(string $class): bool
    {
        return $class === InMemoryUser::class || is_subclass_of($class, InMemoryUser::class);
    }
}
