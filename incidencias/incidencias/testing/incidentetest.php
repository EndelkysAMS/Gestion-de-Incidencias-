<?php

use PHPUnit\Framework\TestCase;
use App\Models\Incident;

class IncidentTest extends TestCase
{
    protected $incident;

    protected function setUp(): void
    {
        $this->incident = new Incident();
    }

    // Test 1: Validar la creación de una nueva incidencia
    public function testCreateNewIncident()
    {
        $result = $this->incident->create([
            'title' => 'Error en el sistema',
            'description' => 'No se puede acceder a la plataforma.',
            'status' => 'open',
            'assigned_to' => null,
        ]);

        $this->assertTrue($result, 'La incidencia no fue creada correctamente.');
    }

    // Test 2: Validar la actualización de una incidencia existente
    public function testUpdateIncidentDetails()
    {
        $this->incident->create([
            'id' => 1,
            'title' => 'Error en el sistema',
            'description' => 'No se puede acceder a la plataforma.',
            'status' => 'open',
        ]);

        $updated = $this->incident->update(1, [
            'status' => 'in_progress',
            'assigned_to' => 2,
        ]);

        $this->assertTrue($updated, 'La incidencia no se actualizó correctamente.');
    }

    // Test 3: Validar el cambio de estado de la incidencia
    public function testChangeIncidentStatus()
    {
        $this->incident->create([
            'id' => 2,
            'title' => 'Error en la base de datos',
            'description' => 'Conexión fallida.',
            'status' => 'open',
        ]);

        $statusChanged = $this->incident->changeStatus(2, 'closed');

        $this->assertTrue($statusChanged, 'No se pudo cambiar el estado de la incidencia.');
        $this->assertEquals('closed', $this->incident->find(2)['status'], 'El estado de la incidencia no coincide.');
    }

    // Test 4: Validar búsqueda y filtrado
    public function testSearchIncidentsByStatus()
    {
        $this->incident->create([
            'title' => 'Error de permisos',
            'description' => 'El usuario no tiene acceso.',
            'status' => 'open',
        ]);

        $this->incident->create([
            'title' => 'Error de carga',
            'description' => 'La página no carga correctamente.',
            'status' => 'closed',
        ]);

        $results = $this->incident->search(['status' => 'open']);

        $this->assertCount(1, $results, 'La búsqueda no devolvió el número esperado de resultados.');
        $this->assertEquals('open', $results[0]['status'], 'El estado de la incidencia no coincide.');
    }
}
