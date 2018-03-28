## Contents

- [Installation](#installation)
- [Usage](#usage)

## Installation

1) Update your `composer.json` file:
```json
"tarasovych/maintenancelog": "dev-master"
```
2) Open your `config/app.php` and add the following to the `providers` array:
```php
Tarasovych\MaintenanceLog\MaintenanceLogProvider::class,
```

## Usage

* Put application into maintenance mode:
```php
php artisan down-log
```

* Bring application out of maintenance mode:
```php
php artisan up-log
```

Logs are stored inside `/storage/logs/maintenance`