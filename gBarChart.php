<?php
namespace gchart;


class gBarChart extends gChart
{
    /**
     * @brief Constructor for the gBarChart
     *
     * With this constructor you can specify all the type of Bar Charts.
     *
     * @param $width Integer Width of the chart, in pixels. Default value is 200.
     * @param $height Integer Height of the chart, in pixels. Default value is 200.
     * @param $type String Chooses the type of chart. Use 'g' for grouped chart, 's' for stacked, 'o' for overlapped
     * @param $direction String Chooses the direction of the chart. Use 'v' for vertical, 'h' for horizontal
     */
    public function __construct($width = 200, $height = 200, $type = 'g', $direction='v')
    {
        $this->setChartType($type, $direction);
        $this->setDimensions($width, $height);
    }
    protected function setChartType($type, $direction)
    {
        $this-> setProperty('cht', 'b'.$direction.$type);
    }
    public function getUrl()
    {
        $retStr = parent::getUrl();
        return $retStr;
    }
    /**
     * @brief Specifies custom values for bar widths and spacing between bars and groups.
     *
     * You can only specify one set of width values for all bars. If you don't set this, all bars will be 23 pixels wide,
     * which means that the end bars can be clipped if the total bar + space width is wider than the chart width.
     *
     * @param $barWidth Integer The width of the bar. You can specify widths and spacing absolutely. Default
     *                          value is 23 pixels, absolute value.
     * @param $spaceBetweenBars Integer Space between bars in the same group. This is a width in pixels. Default value is 4 pixels
     *                                  for absolute values.
     * @param $spaceBetweenGroups Integer Space between bar groups in the same group. This is a width in pixels; Default value
     *                                    is 8 pixels for absolute values.
     */
    public function setBarWidth($barWidth, $spaceBetweenBars = 4,$spaceBetweenGroups = 8)
    {
        $this->setProperty('chbh', $this->encodeData(array($barWidth, $spaceBetweenBars,$spaceBetweenGroups), ','));
    }
    /**
     * @brief Resize values automatically
     */
    public function setAutoBarWidth()
    {
        $this->setProperty('chbh', 'a');
    }
    /**
     * @brief Specify custom values for bar widths and spacing between bars and groups.
     *
     * You can specify widths and spacing absolutely or relatively, by entering one of the following values.
     *
     * @param $barScale String You can specify widths and spacing absolutely or relatively, by entering one of the following values:
     *                         - a: space_between_bars and space_between_groups  are given in absolute units (or default absolute
     *                             values, if not specified). Bars will be resized so that all bars will fit in the chart.
     *                         - r: space_between_bars and space_between_groups are given in relative units (or default relative values,
     *                              if not specified) Relative units are floating point values compared to the bar width, where the bar
     *                              width is 1.0: for example, 0.5 is half the bar width, 2.0 is twice the bar width. Bars can be clipped
     *                              if the chart isn't wide enough.
     *                         Default value is 'a'
     * @param $spaceBetweenBars Integer Space between bars in the same group. This is a width in pixels. Default value is 4 pixels
     *                                  for absolute values.
     * @param $spaceBetweenGroups Integer Space between bar groups in the same group. This is a width in pixels; Default value
     *                                    is 8 pixels for absolute values.
     */
    public function setBarScale($barScale = 'a', $spaceBetweenBars = '4',$spaceBetweenGroups = '8')
    {
        $this->setProperty('chbh', $this->encodeData(array($barScale, $spaceBetweenBars,$spaceBetweenGroups), ','));
    }
    /**
     * @brief Sets colors for each data set.
     *
     * This function allows you to specify colors for each individual slice of the chart or to specify a
     * color gradient. Usage:
     * - One color one bar: addColors(array($colorBar1, .., $colorBarN)). If there are less colors than
     *   bars, colors will be repeated
     *
     * @param $colors Array Specifies colors using a 6-character string of hexadecimal values,
     *                      plus two optional transparency values, in the format RRGGBB[AA]
     */
    public function addColors($colors)
    {
        $this->setProperty('chco', $this->encodeData($colors, "|"), true, ",");
    }
}