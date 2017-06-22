<?php
	//計算尺寸
	$large = (int)$width[$array_num] + (int)$height[$array_num] + (int)$length[$array_num];

//算運費
  if ($package_type == "一般常溫用品") {
  	//判斷經濟宅急便
  	if((int)$weight[$array_num] <= 5000){
  		//判斷當日宅急便
  		if($delivery_method == "急件") {
  			$pac_price = $price_cheap[$K_cheap["0"]]+10*1;
  		}
  		else if($delivery_method == "一般寄件") {
  			$pac_price = $price_cheap[$K_cheap["0"]];
  		}
  	}
  	//判斷常溫宅急便
  	else if ($large <= 150 && (int)$weight[$array_num] <= 20000) {
  		for($i = 0; $i < count($K); $i++)
		{
			//尺寸小於第1個限制
			if($i == 0 && $large <= $K[$i]){
				//price是第1限制的價碼
		  		//判斷當日宅急便
		  		if($delivery_method == "急件") {
		  			$pac_price = $price[$K[$i]]+10*($i+1);
		  		}
		  		else if($delivery_method == "一般寄件") {
					$pac_price = $price[$K[$i]];
		  		}
			}
			else if($i != 0 &&$large > $K[($i-1)] && $large <= $K[$i]){
		  		//判斷當日宅急便
		  		if($delivery_method == "急件") {
		  			$pac_price = $price[$K[$i]]+10*($i+1);
		  		}
		  		else if($delivery_method == "一般寄件") {
					$pac_price = $price[$K[$i]];
		  		}
			}
		}
  	}
  	//超過的
  	else {
  		//判斷當日宅急便
  		if($delivery_method == "急件") {
  			
  			$pac_price = ((float)$large*1)+((float)$weight[$array_num]*0.02)+100;
  		}
  		else if($delivery_method == "一般寄件") {
  		//尺寸1公分增加1塊，每增加1公斤加20元
  			$pac_price = ((float)$large*1)+((float)$weight[$array_num]*0.02);
  		}
  		
  	}
  } else if ($package_type == "低溫保鮮品" || $package_type == "冷凍保鮮品") {
  	//判斷低溫宅急便
  	if ($large <= 120 && $weight[$array_num] <= 20000) {
  		for($i = 0; $i < count($K_cold); $i++)
		{
			//尺寸小於第1個限制
			if($i == 0 && $large <= $K_cold[$i]){
				//price是第1限制的價碼
		  		//判斷當日宅急便
		  		if($delivery_method == "急件") {
		  			$pac_price = $price_cold[$K_cold[$i]]+10*($i+1);
		  		}
		  		else if($delivery_method == "一般寄件") {
					$pac_price = $price_cold[$K_cold[$i]];
		  		}
			}
			else if($i != 0 &&$large > $K_cold[($i-1)] && $large <= $K_cold[$i]){
		  		//判斷當日宅急便
		  		if($delivery_method == "急件") {
		  			$pac_price = $price_cold[$K_cold[$i]]+10*($i+1);
		  		}
		  		else if($delivery_method == "一般寄件") {
					$pac_price = $price_cold[$K_cold[$i]];
		  		}
			}
		}
  	}
  	//超過的
  	else {
		if($delivery_method == "急件") {
			$pac_price = ((float)$large*1.5)+((float)$weight[$array_num]*0.02) + 100;
		}
		else if($delivery_method == "一般寄件") {
  		//尺寸1公分增加1.5塊，每增加1公斤加20元
  			$pac_price = ((float)$large*1.5)+((float)$weight[$array_num]*0.02);
		}
  	}
  } else if ($package_type == "易碎品") {
		//判斷當日宅急便
		if($delivery_method == "急件") {
		//尺寸1公分增加2塊，每增加1公斤加25元
			$pac_price = ((float)$large*2)+((float)$weight[$array_num]*0.025)+100;
		}
		else if($delivery_method == "一般寄件") {
  		//尺寸1公分增加2塊，每增加1公斤加25元
			$pac_price = ((float)$large*2)+((float)$weight[$array_num]*0.025); 
		} 	
  }
?>