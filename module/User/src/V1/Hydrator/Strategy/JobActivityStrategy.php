<?php

namespace User\V1\Hydrator\Strategy;

use Zend\Hydrator\Strategy\StrategyInterface;
use Job\Entity\Job;
use Zend\Hydrator\Strategy\DateTimeFormatterStrategy;

/**
 * Class JobActivityStrategy
 *
 * @package User\Stdlib\Hydrator\Strategy
 */
class JobActivityStrategy implements StrategyInterface
{
    /**
     * Converts the given value so that it can be extracted by the hydrator.
     *
     * @param  mixed $value The original value.
     * @param  object $object (optional) The original object for context.
     * @return mixed Returns the value that should be extracted.
     * @throws \RuntimeException If object os not a User
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function extract($value, $object = null)
    {
        if ($value instanceof Job && ! is_null($value)) {            
            $values = [
                "uuid" => $value->getUuid(),
                "desc" => $value->getDesc(),
                "createdAt" => $value->getCreatedAt()->format('c'),
                "note" => $value->getNote(),
                "status" => $value->getStatus()
            ];
            return $values;
        }
        return null;
    }

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param  mixed $value The original value.
     * @param  array $data (optional) The original data for context.
     * @return mixed Returns the value that should be hydrated.
     * @throws \InvalidArgumentException
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function hydrate($value, array $data = null)
    {
        return $value;
    }
}
