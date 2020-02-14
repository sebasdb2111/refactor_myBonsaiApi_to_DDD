<?php

declare(strict_types = 1);

namespace MyBonsaiApi\Shared\Infrastructure\Bus\Event\RabbitMq;

use MyBonsaiApi\Shared\Domain\Bus\Event\DomainEventSubscriber;
use MyBonsaiApi\Shared\Domain\Utils;
use function Lambdish\Phunctional\last;
use function Lambdish\Phunctional\map;

final class RabbitMqQueueNameFormatter
{
    public static function format(DomainEventSubscriber $subscriber): string
    {
        $subscriberClassPaths = explode('\\', str_replace('MyBonsaiApi', 'mybonsaiapi', get_class($subscriber)));

        $queueNameParts = [
            $subscriberClassPaths[0],
            $subscriberClassPaths[1],
            $subscriberClassPaths[2],
            last($subscriberClassPaths)
        ];

        return implode('.', map(self::toSnakeCase(), $queueNameParts));
    }

    public static function formatRetry(DomainEventSubscriber $subscriber): string
    {
        $queueName = self::format($subscriber);

        return "retry.$queueName";
    }

    public static function formatDeadLetter(DomainEventSubscriber $subscriber): string
    {
        $queueName = self::format($subscriber);

        return "dead_letter.$queueName";
    }

    public static function shortFormat(DomainEventSubscriber $subscriber): string
    {
        $subscriberCamelCaseName = (string) last(explode('\\', get_class($subscriber)));

        return Utils::toSnakeCase($subscriberCamelCaseName);
    }

    private static function toSnakeCase(): callable
    {
        return static function (string $text) {
            return Utils::toSnakeCase($text);
        };
    }
}
