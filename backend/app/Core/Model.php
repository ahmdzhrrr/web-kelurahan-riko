<?php

namespace App\Core;

abstract class Model
{
    protected Database $db;

    protected string $table = '';

    protected string $primaryKey = 'id';

    /**
     * Daftar field yang boleh diisi.
     * Override di masing-masing Model.
     */
    protected array $fillable = [];

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * Menentukan tipe data mysqli.
     */
    protected function getType($value): string
    {
        if (is_int($value)) {
            return 'i';
        }

        if (is_float($value)) {
            return 'd';
        }

        return 's';
    }

    /**
     * Filter data berdasarkan fillable.
     */
    protected function filterFillable(array $data): array
    {
        if (empty($this->fillable)) {
            return $data;
        }

        return array_intersect_key(
            $data,
            array_flip($this->fillable)
        );
    }

    public function all(): array
    {
        $result = $this->db->query(
            "SELECT * FROM {$this->table}"
        );

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT *
            FROM {$this->table}
            WHERE {$this->primaryKey}=?
            LIMIT 1"
        );

        $stmt->bind_param("i", $id);

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_assoc() ?: null;
    }

    public function first(): ?array
    {
        $result = $this->db->query(
            "SELECT *
            FROM {$this->table}
            LIMIT 1"
        );

        return $result->fetch_assoc() ?: null;
    }

    public function firstWhere(string $column, $value): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT *
            FROM {$this->table}
            WHERE {$column}=?
            LIMIT 1"
        );

        $type = $this->getType($value);

        $stmt->bind_param($type, $value);

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_assoc() ?: null;
    }

    public function where(string $column, $value): array
    {
        $stmt = $this->db->prepare(
            "SELECT *
            FROM {$this->table}
            WHERE {$column}=?"
        );

        $type = $this->getType($value);

        $stmt->bind_param($type, $value);

        $stmt->execute();

        return $stmt
            ->get_result()
            ->fetch_all(MYSQLI_ASSOC);
    }

    public function latest(
        string $column = 'id',
        int $limit = 10
    ): array
    {
        return $this->query(
            "SELECT *
            FROM {$this->table}
            ORDER BY {$column} DESC
            LIMIT {$limit}"
        );
    }

    public function create(array $data): int|false
    {
        $data = $this->filterFillable($data);

        $columns = implode(', ', array_keys($data));

        $placeholders = implode(
            ', ',
            array_fill(0, count($data), '?')
        );

        $types = '';

        $values = [];

        foreach ($data as $value) {

            $types .= $this->getType($value);

            $values[] = $value;
        }

        $sql = "INSERT INTO {$this->table}
                ({$columns})
                VALUES ({$placeholders})";

        $stmt = $this->db->prepare($sql);

        $stmt->bind_param($types, ...$values);

        if ($stmt->execute()) {

            return $this->db->lastInsertId();
        }

        return false;
    }

    public function update(
        int $id,
        array $data
    ): bool
    {
        $data = $this->filterFillable($data);

        $set = [];

        $types = '';

        $values = [];

        foreach ($data as $column => $value) {

            $set[] = "{$column}=?";

            $types .= $this->getType($value);

            $values[] = $value;
        }

        $types .= 'i';

        $values[] = $id;

        $sql = "UPDATE {$this->table}
                SET " . implode(', ', $set) . "
                WHERE {$this->primaryKey}=?";

        $stmt = $this->db->prepare($sql);

        $stmt->bind_param($types, ...$values);

        return $stmt->execute();
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare(
            "DELETE
            FROM {$this->table}
            WHERE {$this->primaryKey}=?"
        );

        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    public function exists(int $id): bool
    {
        return $this->find($id) !== null;
    }

    public function count(): int
    {
        $result = $this->db->query(
            "SELECT COUNT(*) AS total
            FROM {$this->table}"
        );

        return (int) $result->fetch_assoc()['total'];
    }

    public function query(string $sql): array
    {
        $result = $this->db->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function execute(string $sql): bool
    {
        return $this->db->query($sql);
    }
}