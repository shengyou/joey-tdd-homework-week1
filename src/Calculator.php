<?php

namespace App;

use Exception;

class Calculator
{
    public function __construct()
    {
    }

    public function calculateSumByPropertyAndGroup(array $data, $property, $groupBy)
    {
        $groupSum = [];
        $sum = 0;
        $i = 1;

        foreach($data as $object) {

            if (!property_exists($object, $property)) {
                throw new Exception('Property none existed');
            }

            $sum += $object->{$property};

            if ($i == $groupBy) {
                $groupSum[] = $sum;
                $sum = 0;

                $i = 1;
            } else {
                $i++;
            }
        }

        if ($sum != 0) {
            $groupSum[] = $sum;
        }

        return $groupSum;
    }
}
