<?php

namespace Revolution\OpenBD;

use Illuminate\Support\Traits\Macroable;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

use Revolution\OpenBD\Contracts\Factory;

class OpenBD implements Factory
{
    use Macroable;

    /**
     * @var string
     */
    protected $endpoint = 'https://api.openbd.jp/v1/';

    /**
     * @var ClientInterface
     */
    protected $http;

    /**
     * OpenBD constructor.
     */
    public function __construct()
    {
        $this->http = new Client();
    }

    /**
     * @param array $isbn
     *
     * @return array
     */
    public function get(array $isbn): array
    {
        if (empty($isbn)) {
            return [];
        }

        if (count($isbn) > 10000) {
            throw new \InvalidArgumentException('ISBNs size must be less than 10000.');
        }

        $isbns = implode(',', $isbn);

        if (count($isbn) > 1000) {
            $options = [
                'form_params' => [
                    'isbn' => $isbns,
                ],
            ];
            $res = $this->http->post($this->endpoint . 'get', $options);
        } else {
            $options = [
                'query' => [
                    'isbn' => $isbns,
                ],
            ];
            $res = $this->http->get($this->endpoint . 'get', $options);
        }

        return json_decode($res->getBody(), true);
    }

    /**
     * @return array
     */
    public function coverage(): array
    {
        $res = $this->http->get($this->endpoint . 'coverage');

        return json_decode($res->getBody(), true);
    }

    /**
     * @return array
     */
    public function schema(): array
    {
        $res = $this->http->get($this->endpoint . 'schema');

        return json_decode($res->getBody(), true);
    }

    /**
     * @param string $endpoint
     *
     * @return $this
     */
    public function endpoint(string $endpoint): Factory
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * @param ClientInterface $http
     *
     * @return $this
     */
    public function setHttpClient(ClientInterface $http): Factory
    {
        $this->http = $http;

        return $this;
    }

    /**
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        return $this->http;
    }
}
