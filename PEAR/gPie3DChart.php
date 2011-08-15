<?php
namespace gchart;
/**
 * @brief 3-dimensional Pie Chart
 */
class gPie3DChart extends gPieChart
{
    function __construct($width = 500, $height = 200)
    {
        $this->setProperty('cht', 'p3');
        $this->setDimensions($width, $height);
    }
}