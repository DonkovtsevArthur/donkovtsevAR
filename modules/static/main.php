<?php
$sql = "SELECT * FROM  `tovar`";
$res = mysqli_query($db,$sql);

while($row = mysqli_fetch_object($res)){
	$phones[] = ['brand'=>mb_strtolower($row->name),'all'=>true,'memory'=>$row->memory,'2g'=>$row->wlan,mb_strtolower($row->name)=>true,'img'=> $row->img, 'name'=>$row->name,'memory'=>$row->memory,'wlan'=>$row->wlan, 'sub'=>$row->id];	
}
$tel = $_GET['tel'];
$memory = $_GET['memory'];	
$set = $_GET['set'];
$submit = $_GET['submit'];
$search = $_GET['search'];
$tel1 = ['microsoft' => '1', 'samsung' => '2', 'lenovo' => '3', 'apple' => '4'];
if(isset($tel)) {
	foreach($tel as $g) {
		if(isset($tel1[$g]))
        $tel1[$g] = 'checked="checked"';
	}
}
$set1 = ['2g' => '1', '3g' => '2', '4g' => '3'];
if(isset($_GET['set'])){
	foreach($_GET['set'] as $g) {
		if(isset($set1[$g]))
        $set1[$g] = 'checked="checked"';
		echo  $set1[$g];
	}
}	
if( isset($tel, $mem, $set)) {
	if ($phone['all']) { 
	$myphones[] = $phone;
	}
}
	elseif(isset($tel) && isset($set)) {
		foreach($tel as $v => $value ) {
			$m = $tel[$v];					
			foreach($set as $v => $value ) {
				$s = $set[$v];						
				foreach ($phones as $phone) {
					if (($phone[$m])&& ($phone[$memory])&& ($phone[$s])) { 
						$myphones[] = $phone;
					}	
					elseif (($phone[$m]) && ($phone[$s])) {
						$myphones[] = $phone;
					}
				}					
			}					
		}				
	} 							
	elseif($tel) {
		foreach($tel as $v => $value ) {
			$m = $tel[$v];
			foreach ($phones as $phone) {
				if ($phone[$m]) { 
					$myphones[] = $phone;
				}
			}
		}
	}	
	elseif($set) {
		foreach($set as $v => $value ) {
			$s = $set[$v];
			echo $s;
			foreach ($phones as $phone) {
				$pos = strpos($phone['2g'], $s);
				if ($pos !== false)	 { 
					$myphones[] = $phone;
				}					
			}
		}	
	} 
	elseif($memory) {	 
		foreach ($phones as $phone) {
			$pos = strpos($phone['memory'], $memory);
			if ($pos !== false)	 { 
				$myphones[] = $phone;
			}
		}			
	}	
	elseif(isset($search)){
		unset($set);
		unset($memory);
		unset($tel);
		foreach ($phones as $phone) {
			$pos = strpos($phone['brand'], mb_strtolower($search));
			if ($pos !== false)	 { 
				$myphones[] = $phone;
			}
		}
	}	else {			
			foreach ($phones as $phone) {
				if ($phone['all']) { 
					$myphones[] = $phone;
				}
			}
		}		
$html = '';
$html .= '<div class="col-md-12 text-right vsego">Всего : '.count($myphones).' шт.</div>';
   if(isset($myphones)){ 
		foreach ($myphones as $phone) {
			$html .='<form action=""  method="post">
			<div class="col-md-4 text-center"><div class="mobile vote">'.$phone['img'].'<div class="caption">
			<h3 class="text-center">'.$phone['name'].'</h3>
			<p>Память:'.$phone['memory'].'</p>
			<p>Тип связи:'.$phone['wlan'].'</p>
			<input type="submit"  class="buttom2 text-center" name="buy" value="Купить" >
			<input type="hidden"  class="buttom2 text-center" name="buy1" value="'.$phone['sub'].'" >
			</div></div></div>
			</form>';
		}	
   }else { 
     $html .= '<div class="col-md-12 text-center vsego">Еще не привезли с такими параметрами</div>';
	} 

if(isset($_POST['buy'])) {
		$_SESSION['buy1'] = $_POST['buy1'];
		$_SESSION['pages'] .= (int)$_SESSION['buy1'].',';
	
		
} 
$del = substr($_SESSION['pages'], 0, -1);

$sql = "SELECT `id`, `name`, `memory`, `wlan`, `sub`, `g2`, `img` FROM `tovar` WHERE `id` IN (".$del.")";
$res = mysqli_query($db,$sql);

while($rqw = mysqli_fetch_object($res)){
	$kov[] = ['brand'=>mb_strtolower($row->name),'all'=>true,'memory'=>$row->memory,'2g'=>$row->wlan,mb_strtolower($row->name)=>true,'img'=> $row->img, 'name'=>$row->name,'memory'=>$row->memory,'wlan'=>$row->wlan, 'sub'=>$row->id];	

	$_SESSION['kov'] = count($ser);
	$tov .= '<div class="col-md-4 text-center">
			<div class="mobiles">'. $rqw->img .'
			<div class="caption  text-center">
			<h3 class="text-center">'. $rqw->name .'</h3>
			<p>Память:'. $rqw->memory .'</p>
			<p>Тип связи:'. $rqw->wlan .'</p>
			</div></div></div>'; 
	$_SESSION['tov'] = $tov;
			
}
foreach ($kov as $koves) {			
					$kove[] = $koves;
				}
$_SESSION['kov'] = count($kove);			
?>