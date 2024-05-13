<?php

declare(strict_types=1);

namespace TheBasement\Libvirt\Tests\Integration;

use PHPUnit\Framework\TestCase;
use TheBasement\Libvirt\LibvirtService;

// FILEPATH: /-/basement-libvirt/tests/Integration/LibvirtServiceTest.php


class LibvirtServiceTest extends TestCase
{
    protected LibvirtService $libvirtService;

    protected function setUp(): void
    {
        $this->libvirtService = new LibvirtService();
    }

    public function testCreateServer(): void
    {
        $config = [
            'name' => 'myvm',
            'memory' => 1024,
            'cores' => 1,
            'threads' => 0,
            'disk_path' => '/path/to/disk.img',
            'iso_path' => '/path/to/iso.iso',
            'disk_name' => 'mydisk',
        ];

        $server = $this->libvirtService->createServer($config);

        $this->assertArrayHasKey('id', $server);
        $this->assertArrayHasKey('name', $server);
        $this->assertArrayHasKey('on', $server);
        $this->assertArrayHasKey('state', $server);
        $this->assertArrayHasKey('memory', $server);
        $this->assertArrayHasKey('cpu_usage', $server);
        $this->assertArrayHasKey('cpus', $server);
        $this->assertArrayHasKey('disk', $server);
        $this->assertArrayHasKey('balloon', $server);
        $this->assertArrayHasKey('net', $server);
    }

    public function testFindAllRegions(): void
    {
        $regions = $this->libvirtService->findAllRegions();

        $this->assertIsArray($regions);
        $this->assertNotEmpty($regions);
    }

    public function testFindAllSizes(): void
    {
        $sizes = $this->libvirtService->findAllSizes();

        $this->assertIsArray($sizes);
        $this->assertNotEmpty($sizes);
    }

    public function testFindAllServers(): void
    {
        $servers = $this->libvirtService->findAllServers();

        $this->assertIsArray($servers);
        $this->assertNotEmpty($servers);
        $this->assertArrayHasKey('data', $servers);
    }
}