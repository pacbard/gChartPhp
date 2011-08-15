<?php
namespace gchart;
class gPieChart extends gChart
{
    public function __construct($width = 350, $height = 200)
    {
        $this->setProperty('cht', 'p');
        $this->setDimensions($width, $height);
    }
    public function getApplicableLabels($labels)
    {
        return array_splice($labels, 0, count($this->values[0]));
    }
    public function set3D($is3d = true, $resize = true)
    {
        if($is3d)
        {
            $this->setProperty('cht', 'p3');
            if ($resize)
                $this->setDimensions($this->getWidth() * 1.5, $this->getHeight());
        }
        else
        {
            $this->setProperty('cht', 'p');
            if ($resize)
                $this->setDimensions($this->getWidth() / 1.5, $this->getHeight());
        }
    }
    /**
     * @brief Sets the labels for Pie Charts
     *
     * @param $labels Array
     */
    public function setLabels($labels)
    {
        $this->setProperty('chl', urlencode($this->encodeData($this->getApplicableLabels($labels),"|")));
    }
    /**
     * @brief Rotates the chart.
     *
     * By default, the first series is drawn starting at 3:00, continuing clockwise around the chart, but
     * you can specify a custom rotation using this function.
     *
     * @param $angle Integer A floating point value describing how many radians to rotate the chart clockwise.
     *                       One complete turn is 2 pi radiants (2 pi is about 6.2831).
     * @param $degree Bool Specifies if $angle is in degrees and not in radians. The function will to the conversion.
     */
    public function setRotation($angle, $degree = false)
    {
        if ($degree)
            $angle = ($angle / 360) * 6.2831;
        $this->setProperty('chp', $angle);
    }
    /**
     * @brief Sets the colors for element of the chart.
     *
     * This is the basic function. The data in the array are interpreted as one color one slice. If you are
     * using gConcentricPieChart(), consider using setColors() for more customization.
     *
     * @param $colors Array Specifies colors using a 6-character string of hexadecimal values,
     *                      plus two optional transparency values, in the format RRGGBB[AA].
     */
    public function setColors($colors)
    {
        $this->setProperty('chco', $this->encodeData($this->getApplicableLabels($colors), "|"), true);
    }
    /**
     * @brief Sets colors for each data set.
     *
     * This function allows you to specify colors for each individual slice of the chart or to specify a
     * color gradient. Usage:
     * - One color one slice: addColors(array($colorSlice1, .., $colorSliceN)). If there are less color than
     *   slices, the colors are repeated
     * - Gradient filling: addColors(array($gradientColor)). The chart will be colored in a gradient of
     *   $gradientColor
     * If you are using gConcentricPie class, run an instance of this function for each data set.
     *
     * @param $colors Array Specifies colors using a 6-character string of hexadecimal values,
     *                      plus two optional transparency values, in the format RRGGBB[AA]
     */
    public function addColors($colors)
    {
        $this->setProperty('chco', $this->encodeData($colors, "|"), true, ",");
    }
}