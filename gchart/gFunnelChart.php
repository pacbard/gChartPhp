<?php
namespace gchart;
class gFunnelChart extends gBarChart
{
    function __construct($width = 200, $height = 200)
    {
        $this->setChartType('s', 'h');
        $this->setDimensions($width, $height);
    }
    
    /**
     * This function creates the funnel effect by calculating the hidden dataset
     * 
     */
    public function addData($data)
    {
        $ghost = array();
        for($i = 0; $i < count($data); $i++) {
            $ghost[$i] = (100 - $data[$i])/2;
        }
        $this->addDataSet($ghost);
        $this->addDataSet($data);
    }
}