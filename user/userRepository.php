<?php

/** @package  */
class userRepository implements userInterface
{
    private query $query;
    public function __construct(query $query)
    {
        $this->query = $query;
    }

    /**
     * @param mixed $data 
     * @return mixed 
     * The INSERT statement is used to insert new rows into an existing table. The INSERT ... VALUES
     * and INSERT ... SET forms of the statement insert rows based on explicitly specified values.
     */
    public function registerUser($data)
    {
        return $this->query->execute(
            "INSERT INTO users (uuid, real_name, user_name, email, password) VALUES (?, ?, ?, ?, ?)",
            [$data['uuid'], $data['realname'], $data['username'], $data['email'], $data['password']]
        );
    }

    public function checkUUID($data)
    {
        return $this->query->execute("SELECT COUNT(*) FROM users WHERE uuid = ?", [$data]);
    }

    public function checkUsername($data)
    {
        return $this->query->execute("SELECT COUNT(*) FROM users WHERE user_name = ?", [$data]);
    }

    public function checkEmail(string $data)
    {
        return $this->query->execute("SELECT COUNT(*) FROM users WHERE email = ?", [$data]);
    }
}
