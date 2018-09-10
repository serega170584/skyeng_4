<?php
function bigSum(string $firstComponent, string $secondComponent): string
{
    $sumOverflow = 0;
    $result = '';
    $position = -9;
    if (strlen($secondComponent) > strlen($firstComponent)) {
        $tmpFirstComponent = $firstComponent;
        $firstComponent = $secondComponent;
        $secondComponent = $tmpFirstComponent;
    }
    while (strlen($firstComponent) > 0) {
        $firstComponentStr = substr($firstComponent, $position, 9);
        $firstComponentPart = (int) $firstComponentStr;
        $secondComponentPart = (int) substr($secondComponent, $position, 9);
        $sum = $firstComponentPart + $secondComponentPart + $sumOverflow;
        $firstComponentStrLength = strlen($firstComponentStr);
        $sumStrLength = strlen($sum);
        for ($i = 0; $i < $firstComponentStrLength - $sumStrLength; ++$i) {
            $sum = '0' . $sum;
        }
        $sumOverflow = (int) substr($sum, 0, -9);
        $sum = substr($sum, -9, 9);
        $firstComponentStrlen = strlen($firstComponent) - 9;
        $secondComponentStrlen = strlen($secondComponent) - 9;
        if ($firstComponentStrlen < 1) {
            $firstComponent = '';
        } else {
            $firstComponent = substr($firstComponent, 0, $firstComponentStrlen);
        }
        if ($secondComponentStrlen < 1) {
            $secondComponent = '';
        } else {
            $secondComponent = substr($secondComponent, 0, $secondComponentStrlen);
        }
        $result = $sum . $result;
    }
    return $result;
}