<?php
	function get_txtSql($progid, $progcaller, &$SqlData="", &$SqlWhere="")
	{
		$SqlData="";
		$SqlWhere='';
			
		//---tested works!
		if ($progid=='course_GetData_one')
		{
			//$SqlData="select * from course";	
			//$SqlWhere="upper(course) like upper('%z%')";	//-->maybe needed another filter
		}
		
		/*
		//---sample-1 using SELECT common (tested works!)
		if ($progid=='jenis_GetData_one')
		{
			$SqlData="select * from jenis";			

			//-------------------------
			//$SqlWhere="jenis.jenis_nama='Mobil'";	//-->maybe needed another filter
			//-------------------------							
		}
		*/
		
		
		/*
		//---sample-2 using SELECT VIEW and FILTER (tested works!)
		if ($progid=='jenis_GetData_one')
		{
			$SqlData="select * from jenis_one_view";

			//-------------------------
			$SqlWhere="jenis_nama='Mobil'";	//-->maybe needed another filter
			//-------------------------				
		}
		*/		
		
		
		
		/*	
		//---sample-3 using SELECT VIEW and FILTER and PROGCALLER
		if (($progid=='jenis_GetData_one') && ($progcaller=='mar_jual1xxx'))
		{
			$SqlData="select * from jenis_one_view";
			
			//-------------------------
			$SqlWhere="jenis_nama='Mobil'";	//-->maybe needed another filter
			//-------------------------	
		}	
		*/
		
		
		$result=true;
		return $result;
	} 
?>