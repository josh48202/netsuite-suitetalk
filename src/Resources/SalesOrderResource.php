<?php

namespace Wjbecker\NetSuiteSuiteTalk\Resources;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;

class SalesOrderResource extends BaseResource
{
    /**
     * Operation create
     *
     * Insert record.
     *
     * @param array $salesOrder Request body. (required)
     * @param string|null $replace The names of sublists on this record. All sublist lines will be replaced with lines specified in the request. The names are delimited by comma. (optional, default to null)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function create(array $salesOrder, string $replace = null, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('POST', 'record/v1/salesOrder', [
                'query' => $this->sanitizeQueryParams([
                    'replace' => $replace,
                ]),
                'headers' => [
                    'Content-Type' => 'application/vnd.oracle.resource+json; type=singular',
                    ...$prefer ? ['Prefer' => 'respond-async'] : [],
                    ...$idempotencyKey ? ['X-NetSuite-Idempotency-Key' => $idempotencyKey] : [],
                    ...$additionalHeaders
                ],
                'json' => $salesOrder
            ]);
            
            if ($response->getStatusCode() === 204 || $response->getStatusCode() === 202) {
                return $response->getHeaders();
            } else {
                return json_decode($response->getBody()->getContents(), true);
            }
        } catch (RequestException $e) {
            return [
                'status_code' => $e->hasResponse() ? $e->getResponse()->getStatusCode() : $e->getCode(),
                'reason' => $e->hasResponse() ? $e->getResponse()->getReasonPhrase() : null,
                'details' => $e->hasResponse() ? json_decode($e->getResponse()->getBody()->getContents(), true) : $e->getMessage()
            ];
        }
    }

    /**
     * Operation delete
     *
     * Remove record.
     *
     * @param int|string $id Internal identifier. (required)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function delete(int|string $id, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('DELETE', str_replace('{id}', $id, 'record/v1/salesOrder/{id}'), [
                'headers' => [
                    'Content-Type' => 'application/json',
                    ...$prefer ? ['Prefer' => 'respond-async'] : [],
                    ...$idempotencyKey ? ['X-NetSuite-Idempotency-Key' => $idempotencyKey] : [],
                    ...$additionalHeaders
                ]
            ]);
            
            if ($response->getStatusCode() === 204 || $response->getStatusCode() === 202) {
                return $response->getHeaders();
            } else {
                return json_decode($response->getBody()->getContents(), true);
            }
        } catch (RequestException $e) {
            return [
                'status_code' => $e->hasResponse() ? $e->getResponse()->getStatusCode() : $e->getCode(),
                'reason' => $e->hasResponse() ? $e->getResponse()->getReasonPhrase() : null,
                'details' => $e->hasResponse() ? json_decode($e->getResponse()->getBody()->getContents(), true) : $e->getMessage()
            ];
        }
    }

    /**
     * Operation get
     *
     * Get record.
     *
     * @param int|string $id Internal identifier. (required)
     * @param bool|null $expandSubResources Set to &#39;true&#39; to automatically expand all sublists, sublist lines, and subrecords on this record. (optional, default to false)
     * @param bool|null $simpleEnumFormat Set to true to return enumeration values in a format that only shows the internal ID value. (optional, default to false)
     * @param string|null $fields The names of the fields and sublists on the record. Only the selected fields and sublists will be returned in the response. (optional, default to null)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function get(int|string $id, bool $expandSubResources = false, bool $simpleEnumFormat = false, string $fields = null, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('GET', str_replace('{id}', $id, 'record/v1/salesOrder/{id}'), [
                'query' => $this->sanitizeQueryParams([
                    'expandSubResources' => $expandSubResources,
                    'simpleEnumFormat' => $simpleEnumFormat,
                    'fields' => $fields,
                ]),
                'headers' => [
                    'Content-Type' => 'application/json',
                    ...$prefer ? ['Prefer' => 'respond-async'] : [],
                    ...$idempotencyKey ? ['X-NetSuite-Idempotency-Key' => $idempotencyKey] : [],
                    ...$additionalHeaders
                ]
            ]);
            
            if ($response->getStatusCode() === 204 || $response->getStatusCode() === 202) {
                return $response->getHeaders();
            } else {
                return json_decode($response->getBody()->getContents(), true);
            }
        } catch (RequestException $e) {
            return [
                'status_code' => $e->hasResponse() ? $e->getResponse()->getStatusCode() : $e->getCode(),
                'reason' => $e->hasResponse() ? $e->getResponse()->getReasonPhrase() : null,
                'details' => $e->hasResponse() ? json_decode($e->getResponse()->getBody()->getContents(), true) : $e->getMessage()
            ];
        }
    }

    /**
     * Operation list
     *
     * Get list of records.
     *
     * @param string|null $q The search query that is used to filter results. (optional, default to null)
     * @param int|null $limit The limit used to specify the number of results on a single page. (optional, default to 1000)
     * @param int|null $offset The offset used for selecting a specific page of results. (optional, default to 0)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function list(string $q = null, int $limit = 1000, int $offset = 0, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('GET', 'record/v1/salesOrder', [
                'query' => $this->sanitizeQueryParams([
                    'q' => $q,
                    'limit' => $limit,
                    'offset' => $offset,
                ]),
                'headers' => [
                    'Content-Type' => 'application/json',
                    ...$prefer ? ['Prefer' => 'respond-async'] : [],
                    ...$idempotencyKey ? ['X-NetSuite-Idempotency-Key' => $idempotencyKey] : [],
                    ...$additionalHeaders
                ]
            ]);
            
            if ($response->getStatusCode() === 204 || $response->getStatusCode() === 202) {
                return $response->getHeaders();
            } else {
                return json_decode($response->getBody()->getContents(), true);
            }
        } catch (RequestException $e) {
            return [
                'status_code' => $e->hasResponse() ? $e->getResponse()->getStatusCode() : $e->getCode(),
                'reason' => $e->hasResponse() ? $e->getResponse()->getReasonPhrase() : null,
                'details' => $e->hasResponse() ? json_decode($e->getResponse()->getBody()->getContents(), true) : $e->getMessage()
            ];
        }
    }

    /**
     * Operation transformCashSale
     *
     * Transform to cashSale.
     *
     * @param int|string $id Internal identifier. (required)
     * @param array $nsResource Request body. (required)
     * @param string|null $replace The names of sublists on this record. All sublist lines will be replaced with lines specified in the request. The names are delimited by comma. (optional, default to null)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function transformCashSale(int|string $id, array $nsResource, string $replace = null, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('POST', str_replace('{id}', $id, 'record/v1/salesOrder/{id}/!transform/cashSale'), [
                'query' => $this->sanitizeQueryParams([
                    'replace' => $replace,
                ]),
                'headers' => [
                    'Content-Type' => 'application/vnd.oracle.resource+json; type=singular',
                    ...$prefer ? ['Prefer' => 'respond-async'] : [],
                    ...$idempotencyKey ? ['X-NetSuite-Idempotency-Key' => $idempotencyKey] : [],
                    ...$additionalHeaders
                ],
                'json' => $nsResource
            ]);
            
            if ($response->getStatusCode() === 204 || $response->getStatusCode() === 202) {
                return $response->getHeaders();
            } else {
                return json_decode($response->getBody()->getContents(), true);
            }
        } catch (RequestException $e) {
            return [
                'status_code' => $e->hasResponse() ? $e->getResponse()->getStatusCode() : $e->getCode(),
                'reason' => $e->hasResponse() ? $e->getResponse()->getReasonPhrase() : null,
                'details' => $e->hasResponse() ? json_decode($e->getResponse()->getBody()->getContents(), true) : $e->getMessage()
            ];
        }
    }

    /**
     * Operation transformFulfillmentRequest
     *
     * Transform to fulfillmentRequest.
     *
     * @param int|string $id Internal identifier. (required)
     * @param array $nsResource Request body. (required)
     * @param string|null $replace The names of sublists on this record. All sublist lines will be replaced with lines specified in the request. The names are delimited by comma. (optional, default to null)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function transformFulfillmentRequest(int|string $id, array $nsResource, string $replace = null, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('POST', str_replace('{id}', $id, 'record/v1/salesOrder/{id}/!transform/fulfillmentRequest'), [
                'query' => $this->sanitizeQueryParams([
                    'replace' => $replace,
                ]),
                'headers' => [
                    'Content-Type' => 'application/vnd.oracle.resource+json; type=singular',
                    ...$prefer ? ['Prefer' => 'respond-async'] : [],
                    ...$idempotencyKey ? ['X-NetSuite-Idempotency-Key' => $idempotencyKey] : [],
                    ...$additionalHeaders
                ],
                'json' => $nsResource
            ]);
            
            if ($response->getStatusCode() === 204 || $response->getStatusCode() === 202) {
                return $response->getHeaders();
            } else {
                return json_decode($response->getBody()->getContents(), true);
            }
        } catch (RequestException $e) {
            return [
                'status_code' => $e->hasResponse() ? $e->getResponse()->getStatusCode() : $e->getCode(),
                'reason' => $e->hasResponse() ? $e->getResponse()->getReasonPhrase() : null,
                'details' => $e->hasResponse() ? json_decode($e->getResponse()->getBody()->getContents(), true) : $e->getMessage()
            ];
        }
    }

    /**
     * Operation transformInvoice
     *
     * Transform to invoice.
     *
     * @param int|string $id Internal identifier. (required)
     * @param array $invoice Request body. (required)
     * @param string|null $replace The names of sublists on this record. All sublist lines will be replaced with lines specified in the request. The names are delimited by comma. (optional, default to null)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function transformInvoice(int|string $id, array $invoice, string $replace = null, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('POST', str_replace('{id}', $id, 'record/v1/salesOrder/{id}/!transform/invoice'), [
                'query' => $this->sanitizeQueryParams([
                    'replace' => $replace,
                ]),
                'headers' => [
                    'Content-Type' => 'application/vnd.oracle.resource+json; type=singular',
                    ...$prefer ? ['Prefer' => 'respond-async'] : [],
                    ...$idempotencyKey ? ['X-NetSuite-Idempotency-Key' => $idempotencyKey] : [],
                    ...$additionalHeaders
                ],
                'json' => $invoice
            ]);
            
            if ($response->getStatusCode() === 204 || $response->getStatusCode() === 202) {
                return $response->getHeaders();
            } else {
                return json_decode($response->getBody()->getContents(), true);
            }
        } catch (RequestException $e) {
            return [
                'status_code' => $e->hasResponse() ? $e->getResponse()->getStatusCode() : $e->getCode(),
                'reason' => $e->hasResponse() ? $e->getResponse()->getReasonPhrase() : null,
                'details' => $e->hasResponse() ? json_decode($e->getResponse()->getBody()->getContents(), true) : $e->getMessage()
            ];
        }
    }

    /**
     * Operation transformItemFulfillment
     *
     * Transform to itemFulfillment.
     *
     * @param int|string $id Internal identifier. (required)
     * @param array $nsResource Request body. (required)
     * @param string|null $replace The names of sublists on this record. All sublist lines will be replaced with lines specified in the request. The names are delimited by comma. (optional, default to null)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function transformItemFulfillment(int|string $id, array $nsResource, string $replace = null, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('POST', str_replace('{id}', $id, 'record/v1/salesOrder/{id}/!transform/itemFulfillment'), [
                'query' => $this->sanitizeQueryParams([
                    'replace' => $replace,
                ]),
                'headers' => [
                    'Content-Type' => 'application/vnd.oracle.resource+json; type=singular',
                    ...$prefer ? ['Prefer' => 'respond-async'] : [],
                    ...$idempotencyKey ? ['X-NetSuite-Idempotency-Key' => $idempotencyKey] : [],
                    ...$additionalHeaders
                ],
                'json' => $nsResource
            ]);
            
            if ($response->getStatusCode() === 204 || $response->getStatusCode() === 202) {
                return $response->getHeaders();
            } else {
                return json_decode($response->getBody()->getContents(), true);
            }
        } catch (RequestException $e) {
            return [
                'status_code' => $e->hasResponse() ? $e->getResponse()->getStatusCode() : $e->getCode(),
                'reason' => $e->hasResponse() ? $e->getResponse()->getReasonPhrase() : null,
                'details' => $e->hasResponse() ? json_decode($e->getResponse()->getBody()->getContents(), true) : $e->getMessage()
            ];
        }
    }

    /**
     * Operation transformReturnAuthorization
     *
     * Transform to returnAuthorization.
     *
     * @param int|string $id Internal identifier. (required)
     * @param array $nsResource Request body. (required)
     * @param string|null $replace The names of sublists on this record. All sublist lines will be replaced with lines specified in the request. The names are delimited by comma. (optional, default to null)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function transformReturnAuthorization(int|string $id, array $nsResource, string $replace = null, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('POST', str_replace('{id}', $id, 'record/v1/salesOrder/{id}/!transform/returnAuthorization'), [
                'query' => $this->sanitizeQueryParams([
                    'replace' => $replace,
                ]),
                'headers' => [
                    'Content-Type' => 'application/vnd.oracle.resource+json; type=singular',
                    ...$prefer ? ['Prefer' => 'respond-async'] : [],
                    ...$idempotencyKey ? ['X-NetSuite-Idempotency-Key' => $idempotencyKey] : [],
                    ...$additionalHeaders
                ],
                'json' => $nsResource
            ]);
            
            if ($response->getStatusCode() === 204 || $response->getStatusCode() === 202) {
                return $response->getHeaders();
            } else {
                return json_decode($response->getBody()->getContents(), true);
            }
        } catch (RequestException $e) {
            return [
                'status_code' => $e->hasResponse() ? $e->getResponse()->getStatusCode() : $e->getCode(),
                'reason' => $e->hasResponse() ? $e->getResponse()->getReasonPhrase() : null,
                'details' => $e->hasResponse() ? json_decode($e->getResponse()->getBody()->getContents(), true) : $e->getMessage()
            ];
        }
    }

    /**
     * Operation update
     *
     * Update record.
     *
     * @param int|string $id Internal identifier. (required)
     * @param array $salesOrder Request body. (required)
     * @param string|null $replace The names of sublists on this record. All sublist lines will be replaced with lines specified in the request. The names are delimited by comma. (optional, default to null)
     * @param bool|null $replaceSelectedFields If set to &#39;true&#39;, all fields that should be deleted in the update request, including body fields, must be included in the &#39;replace&#39; query parameter. (optional, default to false)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function update(int|string $id, array $salesOrder, string $replace = null, bool $replaceSelectedFields = false, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('PATCH', str_replace('{id}', $id, 'record/v1/salesOrder/{id}'), [
                'query' => $this->sanitizeQueryParams([
                    'replace' => $replace,
                    'replaceSelectedFields' => $replaceSelectedFields,
                ]),
                'headers' => [
                    'Content-Type' => 'application/vnd.oracle.resource+json; type=singular',
                    ...$prefer ? ['Prefer' => 'respond-async'] : [],
                    ...$idempotencyKey ? ['X-NetSuite-Idempotency-Key' => $idempotencyKey] : [],
                    ...$additionalHeaders
                ],
                'json' => $salesOrder
            ]);
            
            if ($response->getStatusCode() === 204 || $response->getStatusCode() === 202) {
                return $response->getHeaders();
            } else {
                return json_decode($response->getBody()->getContents(), true);
            }
        } catch (RequestException $e) {
            return [
                'status_code' => $e->hasResponse() ? $e->getResponse()->getStatusCode() : $e->getCode(),
                'reason' => $e->hasResponse() ? $e->getResponse()->getReasonPhrase() : null,
                'details' => $e->hasResponse() ? json_decode($e->getResponse()->getBody()->getContents(), true) : $e->getMessage()
            ];
        }
    }

    /**
     * Operation upsert
     *
     * Insert or update record.
     *
     * @param string $id External identifier. (required)
     * @param array $salesOrder Request body. (required)
     * @param string|null $replace The names of sublists on this record. All sublist lines will be replaced with lines specified in the request. The names are delimited by comma. (optional, default to null)
     * @param bool|null $replaceSelectedFields If set to &#39;true&#39;, all fields that should be deleted in the update request, including body fields, must be included in the &#39;replace&#39; query parameter. (optional, default to false)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function upsert(string $id, array $salesOrder, string $replace = null, bool $replaceSelectedFields = false, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('PUT', str_replace('{id}', $id, 'record/v1/salesOrder/{id}'), [
                'query' => $this->sanitizeQueryParams([
                    'replace' => $replace,
                    'replaceSelectedFields' => $replaceSelectedFields,
                ]),
                'headers' => [
                    'Content-Type' => 'application/vnd.oracle.resource+json; type=singular',
                    ...$prefer ? ['Prefer' => 'respond-async'] : [],
                    ...$idempotencyKey ? ['X-NetSuite-Idempotency-Key' => $idempotencyKey] : [],
                    ...$additionalHeaders
                ],
                'json' => $salesOrder
            ]);
            
            if ($response->getStatusCode() === 204 || $response->getStatusCode() === 202) {
                return $response->getHeaders();
            } else {
                return json_decode($response->getBody()->getContents(), true);
            }
        } catch (RequestException $e) {
            return [
                'status_code' => $e->hasResponse() ? $e->getResponse()->getStatusCode() : $e->getCode(),
                'reason' => $e->hasResponse() ? $e->getResponse()->getReasonPhrase() : null,
                'details' => $e->hasResponse() ? json_decode($e->getResponse()->getBody()->getContents(), true) : $e->getMessage()
            ];
        }
    }

}
