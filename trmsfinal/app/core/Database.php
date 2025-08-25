<?php
class Database
{
    private static ?Database $instance = null;
    private \PDO $dbh;
    private \PDOStatement $stmt;

    private function __construct()
    {
        $dsn = sprintf('mysql:host=%s;dbname=%s;port=%d;charset=utf8mb4', DB_HOST, DB_NAME, DB_PORT);
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this->dbh = new \PDO($dsn, DB_USER, DB_PASS, $options);
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query(string $sql): self
    {
        $this->stmt = $this->dbh->prepare($sql);
        return $this;
    }

    public function bind(string|int $param, $value, $type = null): self
    {
        if ($type === null) {
            switch (true) {
                case is_int($value):
                    $type = \PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = \PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = \PDO::PARAM_NULL;
                    break;
                default:
                    $type = \PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
        return $this;
    }

    public function execute(): bool
    {
        return $this->stmt->execute();
    }

    public function result(): ?array
    {
        $this->execute();
        $res = $this->stmt->fetch();
        return $res === false ? null : $res;
    }

    public function results(): array
    {
        $this->execute();
        $res = $this->stmt->fetchAll();
        return $res === false ? [] : $res;
    }
}
