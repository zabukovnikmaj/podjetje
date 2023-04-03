<?php

namespace Controllers;

abstract class BaseController
{
    /**
     * function for filtering out specified data from inputed array
     *
     * @param array $array
     * @param string $filterBy
     * @return array
     */
    protected function filterArray(array $array, string $filterBy): array{
        return array_filter($array, function($value) use ($filterBy) {
            return $value !== $filterBy;
        });
    }
}