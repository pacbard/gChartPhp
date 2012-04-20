<?php
namespace gchart;
class gGroupedBarChart extends gBarChart
{
    function __construct($width = 200, $height = 200)
    {
        $this->setChartType('g', 'v');
        $this->setDimensions($width, $height);
    }
    public function setHorizontal($isHorizontal = true)
    {
        if($isHorizontal)
        {
            $this->setChartType('g', 'h');
        } else
        {
            $this->setChartType('g', 'v');
        }
    }
}