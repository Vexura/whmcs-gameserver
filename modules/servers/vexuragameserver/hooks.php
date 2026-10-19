<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\Gameserver\Module;
use Vexura\Whmcs\Gameserver\Registrar;
use Vexura\Whmcs\Gameserver\Automation;

add_hook('InvoiceCreated', 1, static function (array $vars): void { Automation::snapshot('gameserver', (int) $vars['invoiceid']); });
add_hook('InvoicePaid', 1, static function (array $vars): void { Automation::paid('gameserver', (int) $vars['invoiceid']); });
add_hook('AfterCronJob', 1, static function (array $vars): void { Automation::cron('gameserver'); });
