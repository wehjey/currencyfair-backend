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

/**
 * Returns associative array of months
 *
 * @return array
 */
function getMonths()
{
    return [
      'jan' => '01',
      'feb' => '02',
      'mar' => '03',
      'apr' => '04',
      'may' => '05',
      'jun' => '06',
      'jul' => '07',
      'aug' => '08',
      'sep' => '09',
      'oct' => '10',
      'nov' => '11',
      'dec' => '12',
    ];
}
