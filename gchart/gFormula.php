<?php
namespace gchart;
class gFormula extends gChart
{
    /**
     * @param $widht Integer It is set by default to 0 because the server will size the png automatically
     * @param $height Integer It is set by default to 0 because the server will size the png automatically
     */
    function __construct($width = 0, $height = 0)
    {
        $this->setDimensions($width, $height);
        $this->setProperty('cht','tx');
    }

    public function setLatexCode($latexCode)
    {
        $this->setProperty('chl', urlencode($latexCode));
    }
    public function setTextColor($textColor)
    {
        $this->setProperty('chco', $textColor);
    }

    public function getImgCode()
    {
        $code = '<img src="';
        $code .= $this->getUrl().'"';
        $code .= 'alt="gChartPhp Chart"';
        if($this->width)
            $code .= ' width='.$this->width;
        if($this->height)
            $code .= ' height='.$this->height;
        $code .= '>';
        print($code);
    }
}