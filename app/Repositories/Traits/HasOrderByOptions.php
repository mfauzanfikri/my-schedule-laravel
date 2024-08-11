<?php

namespace App\Repositories\Traits;

trait HasOrderByOptions {
    /**
     * array $options is a modifier to the query using provided constants
     * example:
     * $options for ordering by date $options = ['order_by' => static::ORDER_BY_LATEST]
     */
    const ORDER_BY_LATEST = 'LATEST';
    const ORDER_BY_OLDEST = 'OLDEST';
}
