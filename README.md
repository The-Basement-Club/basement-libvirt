# basement-common

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

This package is a basic QEMU management interface using the interfaces from [the-basement/common](https://packagist.org/packages/the-basement/common). 

## Install

Via Composer

``` bash
$ composer require the-basement/libvirt
```

## Basic Usage

Creating a VM in QEMU/KVM

```php
// This assumes you have an ubuntu server image available from your KVM host
// This also assumes the default image location of the disks created by KVM.
// Both of these can be changed; disks that exist will not be overwritten
// disks that don't exist will be created.
$service = new TheBasement\Libvirt\LibvirtService();
$service->createServer([
    'name' => 'my-virtual-machine',
    'memory' => (string) (1024 * 1024), // 1G in KiB
    'cores' => 1,
    'threads' => 1,
    'iso_path' => '/var/lib/libvirt/iso/ubuntu-22.04.4-live-server-amd64.iso',
    'storage_pool' => 'default',
    'network_mac' => '',
    'video_ram' => '65536', // bytes of video ram
    'disk_path' => '/var/lib/libvirt/images/ubuntu22.04-2.qcow2',
    'disk_name' => 'ubuntu22.04-2.qcow2',
    'disk_capacity' => 10 * 1024 * 1024 * 1024, // 10 GB in bytes
]);

// Gets all servers defined for the KVM
$servers = $service->findAllServers();
```



## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email security@austinkregel.com instead of using the issue tracker.

## Credits

- [Austin Kregel][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/the-basement/libvirt.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/the-basement/libvirt.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/the-basement/libvirt.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/the-basement/libvirt
[link-downloads]: https://packagist.org/packages/the-basement/libvirt
[link-author]: https://github.com/austinkregel
[link-contributors]: ../../contributors
