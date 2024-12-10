<?php

namespace Wjbecker\NetSuiteSuiteTalk\Resources;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;

class CustomerResource extends BaseResource
{
    /**
     * Operation create
     *
     * Insert record.
     *
     * @param array $customer Request body. (required)
     * @param string|null $replace The names of sublists on this record. All sublist lines will be replaced with lines specified in the request. The names are delimited by comma. (optional, default to null)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function create(array $customer, string $replace = null, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('POST', 'record/v1/customer', [
                'query' => $this->sanitizeQueryParams([
                    'replace' => $replace,
                ]),
                'headers' => [
                    'Content-Type' => 'application/vnd.oracle.resource+json; type=singular',
                    ...$prefer ? ['Prefer' => 'respond-async'] : [],
                    ...$idempotencyKey ? ['X-NetSuite-Idempotency-Key' => $idempotencyKey] : [],
                    ...$additionalHeaders
                ],
                'json' => $customer
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
     * @param int $id Internal identifier. (required)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function delete(int $id, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('DELETE', str_replace('{id}', $id, 'record/v1/customer/{id}'), [
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
     * @param int $id Internal identifier. (required)
     * @param bool|null $expandSubResources Set to &#39;true&#39; to automatically expand all sublists, sublist lines, and subrecords on this record. (optional, default to false)
     * @param bool|null $simpleEnumFormat Set to true to return enumeration values in a format that only shows the internal ID value. (optional, default to false)
     * @param string|null $fields The names of the fields and sublists on the record. Only the selected fields and sublists will be returned in the response. (optional, default to null)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function get(int $id, bool $expandSubResources = false, bool $simpleEnumFormat = false, string $fields = null, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('GET', str_replace('{id}', $id, 'record/v1/customer/{id}'), [
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
            $response = $this->client->request('GET', 'record/v1/customer', [
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
     * @param int $id Internal identifier. (required)
     * @param array $nsResource Request body. (required)
     * @param string|null $replace The names of sublists on this record. All sublist lines will be replaced with lines specified in the request. The names are delimited by comma. (optional, default to null)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function transformCashSale(int $id, array $nsResource, string $replace = null, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('POST', str_replace('{id}', $id, 'record/v1/customer/{id}/!transform/cashSale'), [
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
     * Operation transformCustomerPayment
     *
     * Transform to customerPayment.
     *
     * @param int $id Internal identifier. (required)
     * @param array $nsResource Request body. (required)
     * @param string|null $replace The names of sublists on this record. All sublist lines will be replaced with lines specified in the request. The names are delimited by comma. (optional, default to null)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function transformCustomerPayment(int $id, array $nsResource, string $replace = null, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('POST', str_replace('{id}', $id, 'record/v1/customer/{id}/!transform/customerPayment'), [
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
     * Operation transformEstimate
     *
     * Transform to estimate.
     *
     * @param int $id Internal identifier. (required)
     * @param array $nsResource Request body. (required)
     * @param string|null $replace The names of sublists on this record. All sublist lines will be replaced with lines specified in the request. The names are delimited by comma. (optional, default to null)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function transformEstimate(int $id, array $nsResource, string $replace = null, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('POST', str_replace('{id}', $id, 'record/v1/customer/{id}/!transform/estimate'), [
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
     * @param int $id Internal identifier. (required)
     * @param array $nsResource Request body. (required)
     * @param string|null $replace The names of sublists on this record. All sublist lines will be replaced with lines specified in the request. The names are delimited by comma. (optional, default to null)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function transformInvoice(int $id, array $nsResource, string $replace = null, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('POST', str_replace('{id}', $id, 'record/v1/customer/{id}/!transform/invoice'), [
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
     * Operation transformOpportunity
     *
     * Transform to opportunity.
     *
     * @param int $id Internal identifier. (required)
     * @param array $nsResource Request body. (required)
     * @param string|null $replace The names of sublists on this record. All sublist lines will be replaced with lines specified in the request. The names are delimited by comma. (optional, default to null)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function transformOpportunity(int $id, array $nsResource, string $replace = null, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('POST', str_replace('{id}', $id, 'record/v1/customer/{id}/!transform/opportunity'), [
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
     * Operation transformSalesOrder
     *
     * Transform to salesOrder.
     *
     * @param int $id Internal identifier. (required)
     * @param array $salesOrder Request body. (required)
     * @param string|null $replace The names of sublists on this record. All sublist lines will be replaced with lines specified in the request. The names are delimited by comma. (optional, default to null)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function transformSalesOrder(int $id, array $salesOrder, string $replace = null, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('POST', str_replace('{id}', $id, 'record/v1/customer/{id}/!transform/salesOrder'), [
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
     * Operation transformVendor
     *
     * Transform to vendor.
     *
     * @param int $id Internal identifier. (required)
     * @param array $nsResource Request body. (required)
     * @param string|null $replace The names of sublists on this record. All sublist lines will be replaced with lines specified in the request. The names are delimited by comma. (optional, default to null)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function transformVendor(int $id, array $nsResource, string $replace = null, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('POST', str_replace('{id}', $id, 'record/v1/customer/{id}/!transform/vendor'), [
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
     * @param int $id Internal identifier. (required)
     * @param array $customer Request body. (required)
     * @param string|null $replace The names of sublists on this record. All sublist lines will be replaced with lines specified in the request. The names are delimited by comma. (optional, default to null)
     * @param bool|null $replaceSelectedFields If set to &#39;true&#39;, all fields that should be deleted in the update request, including body fields, must be included in the &#39;replace&#39; query parameter. (optional, default to false)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function update(int $id, array $customer, string $replace = null, bool $replaceSelectedFields = false, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('PATCH', str_replace('{id}', $id, 'record/v1/customer/{id}'), [
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
                'json' => $customer
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
     * @param array $customer Request body. (required)
     * @param string|null $replace The names of sublists on this record. All sublist lines will be replaced with lines specified in the request. The names are delimited by comma. (optional, default to null)
     * @param bool|null $replaceSelectedFields If set to &#39;true&#39;, all fields that should be deleted in the update request, including body fields, must be included in the &#39;replace&#39; query parameter. (optional, default to false)
     * @param bool $prefer The server behavior requested by the client. Use 'respond-async' to execute the request asynchronously. If the request is executed asynchronously, 'Preference-applied: respond-async' is returned in the response.
     * @param string|null $idempotencyKey A user-defined unique idempotency key that is applied to every asynchronous requests to ensure that the request is executed only once. Only one request can be executed with every unique idempotency key. Use UUID in string format as defined by RFC 4122. If the request is executed synchronously, this value is ignored.
     * @param array $additionalHeaders
     * @return array|mixed
     * @throws GuzzleException
     */
    public function upsert(string $id, array $customer, string $replace = null, bool $replaceSelectedFields = false, bool $prefer = false, ?string $idempotencyKey = null, array $additionalHeaders = []): mixed
    {
        try {
            $response = $this->client->request('PUT', str_replace('{id}', $id, 'record/v1/customer/{id}'), [
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
                'json' => $customer
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