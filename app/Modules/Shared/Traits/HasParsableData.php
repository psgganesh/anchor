<?php

namespace App\Modules\Shared\Traits;

trait HasParsableData
{
    /**
     * Parse different types of datatypes
     * and return the filtered data
     */
    public function parse($type, $data)
    {
        switch($type)
        {
            case 'array':
                $output = json_encode(json_decode($data), FALSE);
                break;
            case 'json':
                $output = json_decode(json_encode($data), FALSE);
                break;
            default:
                $output = null;
                break;
        }

        return $output;
    }
}