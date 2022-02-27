<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class TaskControllerTest extends TestCase
{
    public function testGetAllTasksSuccess()
    {
        $client = new Client(['base_uri' => 'http://localhost:8000/']);

        $response = $client->request('GET', '/tasks');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('application/json;', $response->getHeader('Content-Type')[0]);
    }

    /**
     * @param string  $name      name
     * @param string  $startDate startDate
     * @param string  $endDate   endDate
     * @param integer $status    status
     *
     * @dataProvider providerTestCreateTask
     */
    public function testCreateTaskSuccess($name, $startDate, $endDate, $status)
    {
        $client = new Client(['base_uri' => 'http://localhost:8000/']);

        $response = $client->request('POST', '/tasks/create', [
            'form_params' => [
                'name' => $name,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status' => $status,
            ]]);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString($name, $response->getBody()->getContents());
    }

    public function providerTestCreateTask()
    {
        return [
            ['Play game', '2022-02-27', '2022-02-27', 0],
            ['Meeting', '2020-01-01', '2022-01-02', 1],
            ['Do something', '2014-02-27', '2014-03-01', 2],
        ];
    }
}
