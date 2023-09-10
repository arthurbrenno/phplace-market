<?php

namespace Abwel\Phplace\Http;

/**
 * Representa uma resposta do servidor a uma Request.
 */
class Response {

    /**
     * Status da requisicao HTTP.
     * @var int $httpStatus
     */
    private int $httpStatus;

    /**
     * Header da response HTTP.
     * @var array $headers
     */
    private array $headers;

    /**
     * Tipo de conteúdo sendo retornado. E.x: 'text/html'
     * @var string $contentType
     */
    private string $contentType;

    /**
     * Conteudo da Response.
     * @var mixed $responseContent
     */
    private mixed $responseContent;

    /**
     * Construtor
     * @param int $httpStatus status da Response HTTP
     * @param mixed $responseContent conteudo da Response.
     * @param string $contentType tipo de conteudo retornado pela response.
     */
    public function __construct(int $httpStatus, mixed $responseContent, string $contentType = 'text/html') {
        $this->httpStatus      = $httpStatus;
        $this->responseContent = $responseContent;
        self::setContentType($contentType);
    }


    /**
     * Manda uma Response conforme o Content-Type setado
     * @return void
     */
    public function sendResponse(): void {
        $this->sendHeaders();

        if ($this->contentType == 'text/html') {
            echo $this->responseContent;
            exit;
        }
    }

    /**
     * Manda os headers da Response.
     * @return void
     */
    private function sendHeaders(): void {
        http_response_code($this->httpStatus);

        foreach ($this->headers as $key=>$value) {
            header($key . ': ' . $value);
        }
    }

    /**
     * Setter. Seta a variavel local $contentType.
     * @param string $contentType valor para ser setado.
     * @return void
     */
    private function setContentType(string $contentType): void {
        $this->contentType = $contentType;
        self::addHeader('Content-Type', $contentType);
    }

    /**
     * Adiciona um novo header [KV]
     * @param string $key chave a ser adicionada
     * @param string $value
     * @return void
     */
    private function addHeader(string $key, string $value): void {
        $this->headers[$key] = $value;
    }
}