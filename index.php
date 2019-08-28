<?php 
$inFirst = '1472583692581472583692581174472583693692';
$inSecond = '9638527418529638527418529639638528527418';

var_dump(calculate($inFirst,$inSecond));

function calculate($inFirst, $inSecond){
	$arrSum = array();
	if(iconv_strlen($inFirst)>=iconv_strlen($inSecond)){
		$count = iconv_strlen($inFirst);
	}else{
		$count = iconv_strlen($inSecond);
	}
	//echo 'итераций - '.$count.'<br>';
	$is1 = array_reverse(str_split($inFirst));
	$is2 = array_reverse(str_split($inSecond));
	$totalSum = 0;
	$des = 0;
	for($i=0;$i<=$count;$i++){
		if($i==$count && $des>0){
			bugs($count);
			$totalSum = 1;
			array_unshift($arrSum,(string)$totalSum);
			break;
		}
		if(!isset($is1[$i]) && !isset($is2[$i])){break;}
		if(!isset($is1[$i])){
			$is1[$i]=0;
		}
		if(!isset($is2[$i])){
			$is2[$i]=0;
		}

		$total = $is1[$i] + $is2[$i];
		//echo $is1[$i].' + '.$is2[$i].' = '.$total.'<br>';

		if($total>=10){
			$totalTen = str_split($total);
			//echo 'пишем '.$totalTen[1].' (1) в уме<br>';
			if($des>0){
				$totalSum = (int)$totalTen[1]+1;
			}else{
				$totalSum = $totalTen[1];
			}
			$des = 1;
		}else{
			if($des>0){
				//echo 'пишем '.$total.' и 1 был в уме<br>';
				$totalSum = (int)$total+1;
				if($totalSum>=10){
					$totalSum = str_split($totalSum);
					$totalSum = $totalSum[1];
					$des = 1;
				}else{
					$des = 0;
				}
			}else{
				//echo 'пишем '.$total.'<br>';
				$totalSum = $total;
				$des = 0;
			}
		}
		array_unshift($arrSum,(string)$totalSum);
	}
	$trug = '';
	foreach($arrSum as $rr){
		$trug = $trug.(int)$rr;
	}
	return $trug;
}