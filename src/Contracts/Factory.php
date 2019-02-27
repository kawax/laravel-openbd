<?php

namespace Revolution\OpenBD\Contracts;

use GuzzleHttp\ClientInterface;

interface Factory
{
    /**
     * @param array $isbn
     *
     * @return array
     */
    public function get(array $isbn): array;

    /**
     * @return array
     */
    public function coverage(): array;

    /**
     * @return array
     */
    public function schema(): array;

    /**
     * @param string $endpoint
     *
     * @return $this
     */
    public function endpoint(string $endpoint): Factory;

    /**
     * @param ClientInterface $http
     *
     * @return $this
     */
    public function setHttpClient(ClientInterface $http): Factory;

    /**
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface;
}
