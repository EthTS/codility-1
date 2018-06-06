 <?php

/**
 * EquiLeader
 *
 *  Find the index S such that the leaders of the sequences A[0], A[1], ..., A[S] and A[S + 1], A[S + 2], ..., A[N - 1] are the same.
 */

include '../../Tests.class.php';

function solution($A) {
    $sizeOfA = sizeof($A);

    $count = array_count_values($A);
    $leader = 0;
    $leader_count = 0; 
    
    for($i = 0; $i < $sizeOfA;$i++){
       if($count[$A[$i]] > $N/2){ $leader = $A[$i]; $leader_count = $count[$A[$i]]; break; }
       continue;
    }
    
    $lNumOfLeaders = 0;
    $totalEquiLeaders = 0;
    for($i=0; $i<$sizeOfA; $i++){
        $lHalfArray = (int)(($i+1) / 2);
        $rHalfArray = (int)(($sizeOfA - $i - 1) / 2);
        if($A[$i] == $leader){
            $lNumOfLeaders++;
        }
        $rNumOfLeaders = $leader_count - $lNumOfLeaders;
        if($lNumOfLeaders > $lHalfArray && $rNumOfLeaders > $rHalfArray){
            $totalEquiLeaders++;
        }
    }
    return $totalEquiLeaders;
}

$test = new Tests('EquiLeader');

$name = 'test';
$A = array(4, 3, 4, 4, 4, 2);
$result = 2;
$test->run(array($A), $result, $name);

// small random test with two values, length = ~100
$name = 'small_random';
$B = array(0,1,1,0,0,0,0,1,1,1,1,1,0,0,0,1,0,1,0,1,0,0,1,0,0,1,1,0,1,1,0,0,0,0,1,0,1,0,0,1,0,0,1,0,0,0,1,1,1,1,0,0,1,1,0,0,0,1,1,1,0,1,0,1,0,0,0,1,0,1,0,1,0,0,0,1,0,0,0,0,0,1,0,1,0,1,0,0,1,1,0,0,1,0,0,0,0,1,1,1);
$result = 79;
$test->run(array($B), $result, $name);

// 1, 2, ..., N, length = ~100,000
$name = 'large_range';
$C = range(1, 100000);
$result = 0;
$test->run(array($C), $result, $name);

// all the same values
$name = 'extreme_large';
$D = array_fill(0, 100000, 1000000000);
$result = 99999;
$test->run(array($D), $result, $name);
