<?php


namespace Senna\Bundle\AppBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface as SecurityUserInterface;

use Senna\Bundle\AppBundle\Model\User;

class UserProvider implements UserProviderInterface
{
    /**
     * @var userRepository
     */
    protected $userRepository;

    /**
     * Constructor.
     *
     * @param userRepository $userRepository
     */
    public function __construct($userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function loadUserByUsername($username)
    {
        $user = $this->findUser($username);

        if (!$user) {
            throw new UsernameNotFoundException(sprintf('Username "%s" does not exist.', $username));
        }

        return $user;
    }

    /**
     * {@inheritDoc}
     */
    public function refreshUser(SecurityUserInterface $user)
    {

        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Expected an instance of '.$this->userRepository->getClassName().', but got "%s".', get_class($user)));
        }

        if (!$this->supportsClass(get_class($user))) {
            throw new UnsupportedUserException(sprintf('Expected an instance of %s, but got "%s".', $this->userRepository->getClass(), get_class($user)));
        }

        if (null !== $reloadedUser = $this->userRepository->find(array('slug' => $user->getSlug()))) {
            return $reloadedUser;
        }

        if (null === $reloadedUser = $this->userRepository->find(array('id' => $user->getId()))) {
            throw new UsernameNotFoundException(sprintf('User with ID "%d" could not be reloaded.', $user->getId()));
        }

        return $reloadedUser;
    }

    /**
     * {@inheritDoc}
     */
    public function supportsClass($class)
    {
        $userClass = $this->userRepository->getClassName();

        return $userClass === $class || is_subclass_of($class, $userClass);
    }

    /**
     * Finds a user by username.
     *
     * This method is meant to be an extension point for child classes.
     *
     * @param string $username
     *
     * @return UserInterface|null
     */
    protected function findUser($username)
    {
        return $this->userRepository->find(array('username' => $username));
    }

    public function getUsernameForApiKey($apiToken)
    {
        // Look up the username based on the token in the database, via
        // an API call, or do something entirely different
        $user = $this->userRepository->find(array('token' => $apiToken));

        return $user;
    }
}