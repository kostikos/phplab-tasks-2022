<?php

namespace arrays;

class Arrays implements ArraysInterface
{
    /**
     * Make an array which contains the same digits but repetitive by its value
     * without changing the order.
     * Example: [1,3,2] => [1,3,3,3,2,2]
     *
     * @param array $input variable contains an array of digits
     * @return array  the resulting array.
     */
    public function repeatArrayValues(array $input): array
    {
        $result = [];
        foreach ($input as $element) {
            $result = array_merge($result, array_fill(0, $element, $element));
        }
        return $result;
    }

    /**
     * Returns the lowest unique value or 0 if there is no unique values or array is empty.
     * Example: [1, 2, 3, 2, 1, 5, 6] => 3
     *
     * @param array $input variable contains an array of digits
     * @return int the resulting number or 0 if $input is empty
     */
    public function getUniqueValue(array $input): int
    {
        $arrayUnique = array_diff($input, array_diff_assoc($input, array_unique($input)));
        return count($arrayUnique) > 0 ? min($arrayUnique) : 0;

    }

    /**
     *  Modifies the input array. The list of 'names' grouped by 'tags'
     *  The 'names' sorted by ascending.
     *  Example:
     * [
     *  ['name' => 'potato', 'tags' => ['vegetable', 'yellow']],
     *  ['name' => 'apple', 'tags' => ['fruit', 'green']],
     *  ['name' => 'orange', 'tags' => ['fruit', 'yellow']],
     * ]
     *
     * @param array $input variable contains an array of arrays.
     *  Each sub array has keys: name (contains strings), tags (contains array of strings)
     * @return array transformed array
     */
    public function groupByTag(array $input): array
    {

        $arrTags = $result = [];
        foreach ($input as $arr) {
            $arrTags = array_merge($arrTags, $arr["tags"]);
        }
        $arrTags = array_unique($arrTags);
        foreach ($input as $arrElement) {
            foreach ($arrTags as $tag) {
                if (in_array($tag, $arrElement['tags'])) {
                    $result[$tag][] = $arrElement['name'];
                    $result[$tag] = array_unique($result[$tag]);
                    sort($result[$tag]);
                }
            }
        }
        ksort($result);
        return $result;
    }
}