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
        $firstComponentPart = (int) substr($firstComponent, $position, 9);
        $secondComponentPart = (int) substr($secondComponent, $position, 9);
        $sum = $firstComponentPart + $secondComponentPart + $sumOverflow;
        $sumOverflow = (int) substr($sum, 0, -9);
        $sum = substr($sum, -9, 9);
        $firstComponent = substr($firstComponent, 0, strlen($firstComponent) - 9);
        $secondComponent = substr($secondComponent, 0, strlen($secondComponent) - 9);
        $result = $sum . $result;
    }
    return $result;
}