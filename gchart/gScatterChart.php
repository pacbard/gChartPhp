<?php
namespace gchart;
class gScatterChart extends gChart
{
    function __construct($width = 200, $height = 200)
    {
        $this->setDimensions($width, $height);
        $this->setProperty('cht','s');
    }
    /**
     * @brief Returns the applicable labels
     *
     * There is no reason to use this function. Please refer to the documentation to know how to use colors and legend.
     */
    public function getApplicableLabels($labels)
    {
        return $labels;
    }
    /**
     * @brief Sets the colors for the chart.
     *
     * It has a different separator than the one in the parent class
     */
    public function setColors($colors)
    {
        $this->setProperty('chco', $this->encodeData($this->getApplicableLabels($colors),"|"));
    }
}