<?php

declare (strict_types=1);
/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SearchWP\Dependencies\Monolog\Handler;

use SearchWP\Dependencies\Aws\Sqs\SqsClient;
use SearchWP\Dependencies\Monolog\Logger;
use SearchWP\Dependencies\Monolog\Utils;
/**
 * Writes to any sqs queue.
 *
 * @author Martijn van Calker <git@amvc.nl>
 */
class SqsHandler extends \SearchWP\Dependencies\Monolog\Handler\AbstractProcessingHandler
{
    /** 256 KB in bytes - maximum message size in SQS */
    protected const MAX_MESSAGE_SIZE = 262144;
    /** 100 KB in bytes - head message size for new error log */
    protected const HEAD_MESSAGE_SIZE = 102400;
    /** @var SqsClient */
    private $client;
    /** @var string */
    private $queueUrl;
    public function __construct(\SearchWP\Dependencies\Aws\Sqs\SqsClient $sqsClient, string $queueUrl, $level = \SearchWP\Dependencies\Monolog\Logger::DEBUG, bool $bubble = \true)
    {
        parent::__construct($level, $bubble);
        $this->client = $sqsClient;
        $this->queueUrl = $queueUrl;
    }
    /**
     * Writes the record down to the log of the implementing handler.
     *
     * @param array $record
     */
    protected function write(array $record) : void
    {
        if (!isset($record['formatted']) || 'string' !== \gettype($record['formatted'])) {
            throw new \InvalidArgumentException('SqsHandler accepts only formatted records as a string');
        }
        $messageBody = $record['formatted'];
        if (\strlen($messageBody) >= static::MAX_MESSAGE_SIZE) {
            $messageBody = \SearchWP\Dependencies\Monolog\Utils::substr($messageBody, 0, static::HEAD_MESSAGE_SIZE);
        }
        $this->client->sendMessage(['QueueUrl' => $this->queueUrl, 'MessageBody' => $messageBody]);
    }
}
