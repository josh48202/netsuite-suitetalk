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
            $sanitizedKey = urlencode((string) $key);

            $sanitizedParams[$sanitizedKey] = match (true) {
                $key === 'q' => $value, // Keep "q" as is
                is_bool($value) => $value ? 'true' : 'false', // Convert boolean to string
                is_null($value) => '', // Convert null to empty string
                is_scalar($value) => urlencode((string) $value), // Convert scalars safely
                default => null, // Skip unsupported types
            };

            // Remove unsupported types (null values)
            if ($sanitizedParams[$sanitizedKey] === null) {
                unset($sanitizedParams[$sanitizedKey]);
            }
        }

        return $sanitizedParams;
    }

}
