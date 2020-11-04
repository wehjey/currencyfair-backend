<?php

/**
 * Number of elements per page
 *
 * @return int
 */
function perPage()
{
    $per_page = 10;

    // Check if per_page exists in query and ensure its an integer
    if (request()->exists('per_page')) {
        $per_page = (int) request('per_page');
    }
    return $per_page;
}
