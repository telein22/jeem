<?php

namespace Application\Helpers;

use Application\Models\Tenant;
use System\Core\Model;

class TenantHelper
{
    public static function getName(): string
    {
        $host = $_SERVER['HTTP_HOST'];
        $hostParts = explode('.', $host);

        return $hostParts[0];
    }

    public static function getId(): ?int
    {
        $tenantM = Model::get(Tenant::class);
        $tenant = $tenantM->getCurrentTenantInfo();

        return $tenant['id'] ?? null;
    }
}