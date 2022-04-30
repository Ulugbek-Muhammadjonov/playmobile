<?php

namespace ulugbek\playmobile\models;

use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\httpclient\Client;
use yii\httpclient\Exception;
use yii\httpclient\Request;

/**
 * This is just an example.
 */
class Playmobile extends Component
{
    /**
     * @var string $baseUrl
     */
    public $baseUrl = "http://91.204.239.44/broker-api/";

    /**
     * @var string $username
     */
    private $username;

    /**
     * @var string $password
     */
    private $password;

    /**
     * @var Client $client
     */
    private $client;

    /**
     * @var Request $request
     */
    private $request;

    /**
     * Playmobile constructor.
     * @param $username
     * @param $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        parent::__construct();
    }


    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     */
    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }


    /**
     * @param array $options
     * @throws InvalidConfigException
     */
    public function create($options = [])
    {
        if (isset($options['baseUrl'])) {
            $this->baseUrl = $options['baseUrl'];
        }
        $this->client = new Client(['baseUrl' => $this->baseUrl]);
        $this->request = $this->client->createRequest();
    }

    /**
     * @param array $messages
     * @return false|string
     * @throws Exception
     */
    public function send($messages = [])
    {
        $data = [];
        foreach ($messages as $message) {
            if (isset($message["recipient"]) && isset($message["message-id"]) && isset($message["originator"]) && isset($message["text"])) {
                $data[] = [
                    "recipient" => $message["recipient"],
                    "message-id" => $message["message-id"],
                    "sms" => [
                        "originator" => $message["originator"],
                        "content" => [
                            "text" => $message['text']
                        ]
                    ]
                ];
            }
        }

        $response = $this->request
            ->setUrl("send")
            ->setMethod("POST")
            ->addHeaders(['Authorization' => "Basic " . base64_encode($this->username . ":" . $this->password)])
            ->setFormat(Client::FORMAT_JSON)
            ->addData([
                "messages" => $data
            ])
            ->send();
        if ($response->isOk) {
            return $response->content;
        }
        return false;
    }
}
