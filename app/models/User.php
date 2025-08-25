<?php
class User
{
    private Database $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function findByUsername(string $username): ?array
    {
        return $this->db->query('SELECT * FROM users WHERE username = :username LIMIT 1')
            ->bind(':username', $username)
            ->result();
    }

    public function findByEmail(string $email): ?array
    {
        return $this->db->query('SELECT * FROM users WHERE email = :email LIMIT 1')
            ->bind(':email', $email)
            ->result();
    }

    public function all(): array
    {
        return $this->db->query('SELECT id, username, full_name, email, role, created_at FROM users ORDER BY id DESC')
            ->results();
    }

    public function countAll(): int
    {
        $res = $this->db->query('SELECT COUNT(*) as cnt FROM users')->result();
        return $res['cnt'] ?? 0;
    }
}
