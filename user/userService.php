<?php
require_once __DIR__ . '/userInterface.php';

use Random\RandomException;

/** @package  */
class userService implements userInterface
{
    private userRepository $userRepository;

    public function __construct(userRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function validateUserRegistrationForm($data) {}

    /**
     * @return string 
     * @throws RandomException 
     * Application created username
     */
    public function createUsername(array $data): string
    {
        $username = "";
        $length = 3;
        $bytes = random_bytes($length);
        $hex = bin2hex($bytes);
        $username = substr($hex, 0, $length);
        $realname = $data['realname'];
        $username =  $realname . "_" . $username;
        return $username;
    }

    /**
     * @param mixed $data 
     * @return int|string[]|void 
     * Check Username availability in database
     */
    public function checkUsername(string $data)
    {
        $result = $this->userRepository->checkUsername($data);
        foreach ($result as $nest) {
            foreach ($nest as $value) {
                if ($value === 0) {
                    return 0;
                } else {
                    throw new Exception("There was an account creation error, please try again.", 1);
                }
            }
        }
        return;
    }

    /**
     * @return string 
     * @throws RandomException 
     * Application created UUID (unique user identification id across application)
     */
    public function createUUID(): string
    {
        $length = 26;
        $bytes = random_bytes($length);
        $hex = bin2hex($bytes);
        $uuid = substr($hex, 0, $length);
        return $uuid;
    }

    /**
     * @param mixed $data 
     * @return int|string[]|void 
     * Check UUID availability in database
     */
    public function checkUUID(string $data)
    {
        $result = $this->userRepository->checkUUID($data);
        foreach ($result as $nest) {
            foreach ($nest as $value) {
                if ($value === 0) {
                    return 0;
                } else {
                    throw new Exception("There was an account creation error, please try again.", 1);
                }
            }
        }
    }

    /**
     * @param string $data 
     * @return int|string[]|void 
     * Check email availability in database
     */
    public function checkEmail(string $data)
    {
        $result = $this->userRepository->checkEmail($data);
        foreach ($result as $nest) {
            foreach ($nest as $value) {
                if ($value === 0) {
                    return 0;
                } else {
                    throw new Exception("Email address already in use, try again with another one.", 1);
                }
            }
        }
    }

    public function hashPassword(): string
    {
        $temp = "";
        return $temp;
    }

    public function registerUser(array $data)
    {
        $data['uuid'] = $this->createUUID();
        $this->checkUUID($data['uuid']);

        $data['username'] = $this->createUsername($data);
        $this->checkUsername($data['username']);

        $this->checkEmail($data['email']);

        $this->userRepository->registerUser($data);
    }
}
