<?php

if (!function_exists('get_years')) {
    /**
     * Returns an array of years
     *
     * @return array of years
     *
     * */
    function get_years()
    {
        $initYear = \Config::get('constants.years.init');
        $currentYear = date('Y');
        $years = [];
        for ($year = $currentYear; $year >= $initYear ; $year--) {
            $years[$year] = $year;
        }

        return $years;
    }
}


if (!function_exists('delete_element')) {
    /**
     * Remove an element from an array.
     *
     * @param string|int $element
     * @param array $array
     */
    function delete_element($element, &$array){
        $index = array_search($element, $array);
        if($index !== false){
            unset($array[$index]);
        }
    }

}
