<?php

namespace boctulus\TolScraper\core\interfaces;

Interface ISubResources {
    static function getSubResources(string $table, Array $connect_to, ?Object &$instance = null, ?string $tenant_id = null);
} 