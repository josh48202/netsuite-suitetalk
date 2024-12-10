<?php

namespace Wjbecker\NetSuiteSuiteTalk\Resources;

use GuzzleHttp\Client;

abstract class BaseResource
{
    public function __construct(public Client $client)
    {
    }

    protected function sanitizeQueryParams(array $queryParams): array
    {
        $sanitizedParams = [];

        foreach ($queryParams as $key => $value) {
            // Sanitize the key
            $sanitizedKey = urlencode((string)$key);

            if (is_bool($value)) {
                // Convert boolean to string "true" or "false"
                $sanitizedValue = $value ? 'true' : 'false';
            } elseif (is_null($value)) {
                // Convert null to an empty string
                $sanitizedValue = '';
            } elseif (is_scalar($value)) {
                // Keep strings, numbers, and other scalar values
                $sanitizedValue = urlencode((string)$value);
            } else {
                // Skip unsupported types (arrays, objects, resources)
                continue;
            }

            $sanitizedParams[$sanitizedKey] = $sanitizedValue;
        }

        return $sanitizedParams;
    }

}
