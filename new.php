<?php

function slice($coll, $start = 0, $end = null)
{
    $length = count($coll);
    $end = $end ?? $length;

    if ($start < 0 && -$start <= $length) {
        return [$coll[0]];
    }

    return array_slice($coll, $start, $end - $start);
}

function sliceRight($coll, $start = 0, $end = null)
{
    $length = count($coll);
    $end = $end ?? $length;
    $normalisedStart = $start;

    if ($normalisedStart < 0) {
        $normalisedStart = -$normalisedStart > $length ? 0 : $normalisedStart + $length;
    }

    $normalisedEnd = $end > $length ? $length : $end;

    if ($normalisedEnd < 0) {
        $normalisedEnd += $length;
    }

    $result = [];

    for ($i = $normalisedStart; $i < $normalisedEnd; $i++) {
        $result[] = $coll[$i];
    }

    return $result;
}
function indexOfRight($coll, $value, $fromIndex = 0)
{
    $length = count($coll);

    if ($length === 0) {
        return -1;
    }

    $index = $fromIndex;

    if ($index < 0) {
        if (-$index > $length) {
            $index = 0;
        } else {
            $index = $length + $index;
        }
    }

    for ($i = $index; $i < $length; $i++) {
        if ($coll[$i] === $value) {
            return $i;
        }
    }
    return -1;
}

function indexOf($coll, $value, $fromIndex = 0)
{
    $length = count($coll);

    if ($length === 0) {
        return -1;
    }

    if ($fromIndex < 0 && -$fromIndex <= $length) {
        return array_search($value, $coll, true);
    }

    $index = $fromIndex;

    if ($index < 0) {
        $index = -$index > $length ? 0 : $length + $index;
    }

    for ($i = $index; $i < $length; $i++) {
        if ($coll[$i] === $value) {
            return $i;
        }
    }
    return -1;
}
var_dump(slice([1, 2, 3], -2, -1));
var_dump(sliceRight([1, 2, 3], -2, -1));
