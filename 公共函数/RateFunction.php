<?php 

//填入id号，获取历史成功率
function successrate($id) {
	$content = M()
		-> field ("s.directprice, s.directsoldprice")
		-> table ("silkbag s")
		-> where ("s.fromuser='$id'")
		-> select ();

	$more = array();
	for ($i = 0; $i < count($content); $i++) {
		$buy = $content[$i]['directprice'];
		$sold = $content[$i]['directsoldprice'];
		if ($sold > $buy) {
			$more[] = $content;
		}
	}

	$successrate = ceil((count($more) / count($content)) * 100);

	return "$successrate%";

	}
?>