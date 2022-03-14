<?php
	// Modul Description : Table Education Level
	// Date              : 2022-01-20
	// Created by.       : yudhi irawan
	// Contact person    : IG: @iam.yudhi_irawan

	// File name   : edu_utility.php
	// Last Edited : 2022-03-14


	// MCG - Massive CRUD Generator for PHP-Easyui-MySQL-PDO ver. Mar 2022-Free Version

	// Private message at Telegram        : @yudhi_irawan
	// Private activity feeds at Instagram: @iam.yudhi_irawan

	// Download Massive CRUD Generator on telegram and github link
	// MCG Application: https://t.me/MCGFreeVersion
	// Documentation  : https://yudhi-irawan.github.io/mcg-documentation
	// Testing        : https://github.com/yudhi-irawan/mcg_testing
	// Template       : 

	// Donation and Support link
	// Ko-fi   : https://ko-fi.com/MassiveCrudGenerator
	// Trakteer: https://trakteer.id/MassiveCrudGenerator

	// Please follow us for information about new releases


	session_start();
	require_once('../manual/manual_script_sql.php');
	require_once('../inc/conn.php');
	require_once('../inc/inc_method.php');

	function GetData_one()
	{
		$progid='edu_GetData_one';
		$column_order_one = array(null, 'edu_id', 'edu_code', 'edu_desc'); //set column field database for datatable orderable
		$column_search_one = array('edu_id', 'edu_code', 'edu_desc'); //set column field database for datatable searchable


		if(isset($_GET['progcaller'])) {
			$progcaller = $_GET['progcaller'];
		} else {
			$progcaller = '';
		}

		$SqlData='';
		$SqlWhere='';
		$txtSql=get_txtSql($progid, $progcaller, $SqlData, $SqlWhere);

		$orderByColumn__= 1;
		$searchString = isset($_POST['search_one']) ? strval($_POST['search_one']) : '';
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;

		$length = isset($_POST['rows']) ? intval($_POST['rows']) : 10;			//limit
		$orderByColumn = isset($_POST['sort']) ? strval($_POST['sort']) : $orderByColumn__;
		$orderByDirection = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$startIndex = ($page-1)*$length;

		//-----------------------------------------------------
		$myconn = createDB();
		$SQL="select * from edu_one_view";

		if ($SqlData=='') {
			$SQL1="select * from ( ".$SQL." ) as xxx";
		} else {
			$SQL1="select * from ( ".$SqlData." ) as xxx";
		}

		if ($SqlWhere=='') {
			$where="1=1";
		} else {
			$where=$SqlWhere;
		}

		//---search all column--------------------------------
		if ($searchString != '')
		{
			$i = 0;
			foreach ($column_search_one as $item)
			{
				if ($i===0) // first loop
				{
					$where .= " and (";
					$where .= " upper($item)";
					$where .= " like upper('%".$searchString."%')";
				}
				else
				{
					$where .= " or ";
					$where .= " upper($item)";
					$where .= " like upper('%".$searchString."%')";
				}
				if (count($column_search_one) - 1 == $i) //last loop
					$where .= ")";

				$i++;
			}
		}
		//---search all column--------------------------------

		$SQL1.=" where $where";

		//--recordsFiltered---
		$rs = $myconn->prepare($SQL1);
		$rs->execute();
		$fetchData=$rs->fetchAll(PDO::FETCH_ASSOC);
		$recordsFiltered = $rs->rowCount();

		$output = array();
		$output["total"] = $recordsFiltered;

		if(!empty($orderByColumn)){
			if ($orderByDirection != "desc") $orderByDirection = "asc";
			$order = " order by " . $orderByColumn . " " . $orderByDirection;
		} else {
			$order = " order by 1 asc";
		}

		$SQL1.=" $order limit $startIndex, $length";

		$rs = $myconn->prepare($SQL1);
		$rs->execute();
		//-----------------------------------------------------

		$datarows = array();
	    $fetchData = $rs->fetchAll(PDO::FETCH_ASSOC);
	    foreach($fetchData as $row) {
	    	array_push($datarows,$row);
	    }					
	    $output["rows"] = $datarows;

		$myconn = NULL;

		ob_end_clean();
		$json = json_encode($output);
		print_r($json);
	};

	function saveAddNew_one()
	{
		$myconn = createDB();
		$json = request("data");
		$rows = php_json_decode($json);
		$sql = '';
		$result = '';
		foreach ($rows as $row){
			if($row["edu_id"] == null || $row["edu_id"] == "") $row["edu_id"] = "99999";
			if($row["edu_code"] == null) $row["edu_code"] = "";
			if($row["edu_desc"] == null) $row["edu_desc"] = "";

			$sql = "CALL edu_one_add";
			$sql .= " (";
			$sql .= ":edu_id";
			$sql .= ",:edu_code";
			$sql .= ",:edu_desc";
			$sql .= ")";

			$rs = $myconn->prepare($sql);
			$rs->bindParam(':edu_id', $row['edu_id']);
			$rs->bindParam(':edu_code', $row['edu_code']);
			$rs->bindParam(':edu_desc', $row['edu_desc']);
			$rs->execute();
		}
		$data = array();
		$fetchData=$rs->fetchAll();
		foreach($fetchData as $row) {
			$item = array();
			$item['result'] = $row['result'];
			$data[] = $item;
		}
		//-----------------------------------------
		$myconn = NULL;
		$result = $data;
		ob_end_clean();
		$json = json_encode($result);
		print_r($json);
	};

	function saveEdit_one()
	{
		$myconn = createDB();
		$json = request("data");
		$rows = php_json_decode($json);
		$sql = '';
		$result = '';
		foreach ($rows as $row){
			if($row["edu_id"] == null || $row["edu_id"] == "") $row["edu_id"] = "0";
			if($row["edu_code"] == null) $row["edu_code"] = "";
			if($row["edu_desc"] == null) $row["edu_desc"] = "";

			$sql = "CALL edu_one_edit";
			$sql .= " (";
			$sql .= ":edu_id";
			$sql .= ",:edu_code";
			$sql .= ",:edu_desc";
			$sql .= ")";

			$rs = $myconn->prepare($sql);
			$rs->bindParam(':edu_id', $row['edu_id']);
			$rs->bindParam(':edu_code', $row['edu_code']);
			$rs->bindParam(':edu_desc', $row['edu_desc']);
			$rs->execute();
		}
		$data = array();
		$fetchData=$rs->fetchAll();
		foreach($fetchData as $row) {
			$item = array();
			$item['result'] = $row['result'];
			$data[] = $item;
		}
		//-----------------------------------------
		$myconn = NULL;
		$result = $data;
		ob_end_clean();
		$json = json_encode($result);
		print_r($json);
	};

	function saveDelete_one()
	{
		$myconn = createDB();
		$json = request("data");
		$rows = php_json_decode($json);
		$sql = '';
		$result = '';
		foreach ($rows as $row){

			$sql = "CALL edu_one_delete";
			$sql .= " (";
			$sql .= ":edu_id";
			$sql .= ")";

			$rs = $myconn->prepare($sql);
			$rs->bindParam(':edu_id', $row['edu_id']);
			$rs->execute();
		}
		$data = array();
		$fetchData=$rs->fetchAll();
		foreach($fetchData as $row) {
			$item = array();
			$item['result'] = $row['result'];
			$data[] = $item;
		}
		//-----------------------------------------
		$myconn = NULL;
		$result = $data;
		ob_end_clean();
		$json = json_encode($result);
		print_r($json);
	};




?>
