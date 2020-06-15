<?php

namespace CarrotRakko\ReinventingTheSquareWheel\ArrayFunction;

if (!function_exists(__NAMESPACE__ . '\\array_reverse')) {
    function array_reverse(array $array, bool $preserve_keys = false): array
    {
        // Array to return.
        $reversed_array = [];

        // Set the internal pointer to the last element.
        end($array);

        // Walk through the array in reverse order.
        while (!is_null($key = key($array))) {
            // Current value corresponding to `$key`
            $value = current($array);

            // When necessary to preserve the key.
            if ($preserve_keys || is_string($key)) {
                $reversed_array[$key] = $value;
            } else {
                $reversed_array[] = $value;
            }

            // Decrement the internal pointer.
            prev($array);
        }

        return $reversed_array;
    }
}
