<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\Gameserver\Module;
use Vexura\Whmcs\Gameserver\Registrar;
use Vexura\Whmcs\Gameserver\Automation;

/** Gameserver: WHMCS MetaData callback. */
function vexuragameserver_MetaData(): array
{
    return ['DisplayName' => 'Vexura · Gameserver', 'APIVersion' => '1.1', 'RequiresServer' => true, 'DefaultSSLPort' => 443];
}

/** Gameserver: WHMCS ConfigOptions callback. */
function vexuragameserver_ConfigOptions(): array
{
    return Module::config('gameserver');
}

/** Gameserver: WHMCS TestConnection callback. */
function vexuragameserver_TestConnection(array $params): array
{
    return Module::connection($params);
}

/** Gameserver: WHMCS ClientArea callback. */
function vexuragameserver_ClientArea(array $params): array
{
    return Module::clientArea('gameserver', $params);
}

/** Gameserver: WHMCS AdminCustomButtonArray callback. */
function vexuragameserver_AdminCustomButtonArray(): array
{
    return ['Bereitstellung prüfen' => 'RefreshStatus', 'Bezahlte Rechnungen abgleichen' => 'SyncPaidInvoices'];
}

/** Gameserver: WHMCS CreateAccount callback. */
function vexuragameserver_CreateAccount(array $params): string
{
    return Module::run('gameserver', 'create', $params);
}

/** Gameserver: WHMCS RefreshStatus callback. */
function vexuragameserver_RefreshStatus(array $params): string
{
    return Module::run('gameserver', 'create', $params);
}

/** Gameserver: WHMCS SyncPaidInvoices callback. */
function vexuragameserver_SyncPaidInvoices(array $params): string
{
    return Module::run('gameserver', 'sync', $params);
}

/** Gameserver: WHMCS TerminateAccount callback. */
function vexuragameserver_TerminateAccount(array $params): string
{
    return Module::run('gameserver', 'terminate', $params);
}

/** Gameserver: WHMCS SuspendAccount callback. */
function vexuragameserver_SuspendAccount(array $params): string
{
    return Module::run('gameserver', 'suspend', $params);
}

/** Gameserver: WHMCS UnsuspendAccount callback. */
function vexuragameserver_UnsuspendAccount(array $params): string
{
    return Module::run('gameserver', 'unsuspend', $params);
}
