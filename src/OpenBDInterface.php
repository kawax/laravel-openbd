<?php

namespace Revolution\OpenBD;

use GuzzleHttp\ClientInterface;

interface OpenBDInterface
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
    public function endpoint(string $endpoint): OpenBDInterface;

    /**
     * @param ClientInterface $http
     *
     * @return $this
     */
    public function setHttpClient(ClientInterface $http): OpenBDInterface;

    /**
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface;
}
