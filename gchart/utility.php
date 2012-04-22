<?php
namespace gchart;
/**
 * @brief Utility class
 *
 * @version 0.2
 * @since 0.4
 */
class utility
{
    public static function getMaxOfArray($ArrayToCheck)
    {
        $maxValue = 0;

        foreach($ArrayToCheck as $temp)
        {
            if(is_array($temp))
            {
                $maxValue = max($maxValue, utility::getMaxOfArray($temp));
            }
            else
            {
                $maxValue = max($maxValue, $temp);
            }
        }
        return $maxValue;
    }
}