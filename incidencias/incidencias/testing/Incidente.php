<?php

namespace App\Models;

class Incident
{
    protected $incidents = [];
    protected $idCounter = 1;

    public function create(array $data): bool
    {
        $data['id'] = $this->idCounter++;
        $this->incidents[] = $data;
        return true;
    }

    public function update(int $id, array $data): bool
    {
        foreach ($this->incidents as &$incident) {
            if ($incident['id'] === $id) {
                $incident = array_merge($incident, $data);
                return true;
            }
        }
        return false;
    }

    public function changeStatus(int $id, string $status): bool
    {
        return $this->update($id, ['status' => $status]);
    }

    public function find(int $id): ?array
    {
        foreach ($this->incidents as $incident) {
            if ($incident['id'] === $id) {
                return $incident;
            }
        }
        return null;
    }

    public function search(array $criteria): array
    {
        return array_filter($this->incidents, function ($incident) use ($criteria) {
            foreach ($criteria as $key => $value) {
                if ($incident[$key] !== $value) {
                    return false;
                }
            }
            return true;
        });
    }
}
