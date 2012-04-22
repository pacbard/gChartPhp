<?php
namespace gchart;
class gStackedBarChart extends gBarChart
{
    function __construct($width = 200, $height = 200)
    {
        $this->setChartType('s', 'v');
        $this->setDimensions($width, $height);
    }
    public function setHorizontal($isHorizontal = true)
    {
        if($isHorizontal)
        {
            $this->setChartType('s', 'h');
        }
        else
        {
            $this->setChartType('s', 'v');
        }
    }
}