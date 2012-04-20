<?php
namespace gchart;
/**
 * @brief Concentric Pie Chart
 */
class gConcentricPieChart extends gPieChart
{
    function __construct($width = 350, $height = 200)
    {
        $this->setProperty('cht', 'pc');
        $this->setDimensions($width, $height);
    }
    /**
     * @brief Returns the applicable labels for the chart.
     *
     * This function counts recursively the numeber of values in the $values array.
     * @return Array Applicable labels
     */
    public function getApplicableLabels($labels)
    {
        return array_splice($labels, 0, count($this->values, COUNT_RECURSIVE));
    }
    /**
     * @brief Adds the legend for Concentric Pie Charts
     *
     * Run an instance of this function for each data set.
     *
     * @param $labels Array
     */
    public function addLegend($labels)
    {
        $this->setProperty('chdl', urlencode($this->encodeData($this->getApplicableLabels($labels),"|")), true);
    }
}