<?php

namespace Abwel\Phplace\Http;

class Response {

    /**
     * Http status code.
     * @var int $httpStatus
     */
    private $httpStatus = 200;

    /**
     * Response header.
     * @var array $headers
     */
    private $headers;

    /**
     * Type of content being returned
     * @var string $contentType
     */
    private $contentType;

    /**
     * Contents of the response.
     * @var mixed $responseContent
     */
    private $responseContent;

    /**
     * @param $httpStatus
     * @param $responseContent
     * @param $contentType
     */
    public function __construct($httpStatus, $responseContent, $contentType = 'text/html') {
        $this->httpStatus      = $httpStatus;
        $this->responseContent = $responseContent;
        self::setContentType($contentType);
    }

    /**
     * @return void
     */
    public function sendResponse(): void {

        $this->sendHeaders();

        if ($this->contentType == 'text/html') {
            echo $this->responseContent;
            exit;
        }
    }

    private function sendHeaders(): void {
        http_response_code($this->httpStatus);
        foreach ($this->headers as $key=>$value) {
            header($key . ': ' . $value);
        }

    }

    private function setContentType($contentType) {
        $this->contentType = $contentType;
        self::addHeader('Content-Type', $contentType);
    }

    /**
     * @param $key
     * @param $value
     * @return void
     */
    private function addHeader($key, $value): void {
        $this->headers[$key] = $value;
    }

}