<?php 

if(isset($_GET['date'])){
	 $date = $_GET["date"];
	 $time  = strtotime($date);
$day   = date('d',$time);
$month = date('m',$time);
$year  = date('Y',$time);
 $month = ltrim($month, '0');
 $day = ltrim($day, '0');

    $stringSQL = "select * from bill where Status = 1 && DAY(BillDate) like '%$day%' && YEAR(BillDate) like '%$year%' && MONTH(BillDate) like '%$month%' ";
    $dssp = $db ->prepare($stringSQL);
    $dssp -> execute();
    $dssp_rowsdata = $dssp -> fetchAll();
}
	

if (isset ($_GET ["search"]) and empty($_GET['date'])){
    $key = $_GET["search"];
	if($key =="paid"){
    $stringSQL = "select * from bill where Status = 1";
    $dssp = $db ->prepare($stringSQL);
    $dssp -> execute();
    $dssp_rowsdata = $dssp -> fetchAll();
	}
	else if($key =="unpaid"){
    $stringSQL = "select * from bill where Status = 0";
    $dssp = $db ->prepare($stringSQL);
    $dssp -> execute();
    $dssp_rowsdata = $dssp -> fetchAll();
	}
}

	

?>