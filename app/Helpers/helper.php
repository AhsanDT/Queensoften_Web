<?php


if (!function_exists('changeTimeFormat')) {
    function changeTimeFormat($time): string
    {
        try {
            $splitTime = explode(' ', $time);
            $first = $splitTime[0];
            if ($splitTime[1] == 'seconds' || $splitTime['1'] == 'second') {
                $second = 'sec';
            } else if ($splitTime[1] == 'minutes' || $splitTime['1'] == 'minute') {
                $second = 'min';
            } else if ($splitTime[1] == 'hours' || $splitTime[1] == 'hour') {
                $second = 'h';
            } else if ($splitTime[1] == 'days' || $splitTime['1'] == 'day') {
                $second = 'd';
            } else if ($splitTime[1] == 'weeks' || $splitTime['1'] == 'week') {
                $second = 'w';
            } else if ($splitTime[1] == 'years' || $splitTime['1'] == 'year') {
                $second = 'y';
            }else{
                return $time;
            }

            return $first.$second;

        } catch (\Exception $exception) {
            return $time;
        }

    }
}

