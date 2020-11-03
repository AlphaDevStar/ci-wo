<?php
function OD($a, $b, $c) {
    while ($a > $c) $a -= $c - $b;
    while ($a < $b) $a += $c - $b;
    return $a;
}
function SD($a, $b, $c) {
    $b != null && ($a = max($a, $b));
    $c != null && ($a = min($a, $c));
    return $a;
}
function getDistance($a_lat,$a_lng,$b_lat,$b_lng) {
    //由于php的pi() 与 js的Math.PI的差异，为保证和JS计算的值统一故直接使用近似值
    $a = 3.141592653589793 * OD($a_lat, -180, 180) / 180;
    $b = 3.141592653589793 * OD($b_lat, -180, 180) / 180;
    $c = 3.141592653589793 * SD($a_lng, -74, 74) / 180;
    $d = 3.141592653589793 * SD($b_lng, -74, 74) / 180;
    return 6370996.81 * acos(sin($c) * sin($d) + cos($c) * cos($d) * cos($b-$a));
}

echo number_format(getDistance(116.331398,39.897445,117.331398,39.897445),2,'.','');

?>