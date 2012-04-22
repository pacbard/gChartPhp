<?php
require_once(__DIR__ . "/gchart/gChartInit.php");
$lineChart = new gchart\gLineChart($_GET['width'],$_GET['height']);
$lineChart->addDataSet(array(120,131,135,160,129,22,190));
$lineChart->setLegend(array('Nice figures'));
$lineChart->setColors(array('ED237A'));
$lineChart->setVisibleAxes(array('x','y'));
$lineChart->setDataRange(0,200);
$lineChart->setLegendPosition('t');
// axisnr, from, to, step
$lineChart->addAxisRange(0,0,28,7);
$lineChart->addAxisRange(1,0,200);

$lineChart->setGridLines(25,10);
$lineChart->renderImage($_GET['post']);
?>
