<?php
	// Modul Description : Tabel Sex
	// Date              : 2022-01-20
	// Created by.       : yudhi irawan
	// Contact person    : IG: @iam.yudhi_irawan

	// File name   : sex.php
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

?>

<!--
NOTE:


-->

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<title>Tabel Sex </title>
	<script src="../005.mcg.root.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="../005.mycss.css">
</head>
<body>
	<!--menu from here-->
	<div style="width:auto;">
		<div id="toolbar1" class="easyui-panel" style="border-bottom:1;padding:0px;">
			<table style="width:100%;">
				<tr>
					<td style="width:100%;">
						<a id="id_btnPanelUtama" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="ocPanelUtama()">
							<b style="color:black;background-color:yellow;"><i>&nbsp back &nbsp</i></b>
						</a>
						<a id="id_btnViewHTML" class="easyui-linkbutton" target="preview" iconCls="icon-html" plain="true" onclick="html_or_pdf('html')">View as HTML</a>
						<a id="id_btnViewPDF" class="easyui-linkbutton" target="preview" iconCls="icon-pdf" plain="true" onclick="html_or_pdf('pdf')">View as PDF</a>
					</td>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<!--menu to here-->
	<!--Data id_hide_1 from here 100%----------------------------------------------------------------------------------------------------------->
	<div id="id_hide_1" class="parent">	
		<table id="dg_one"></table><br>
    	<div id="toolbar_one">
			<b style="color:black;background-color:yellow;">&nbsp sex &nbsp</b>
			<a id="id_btnAdd_one" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="add_one()">Add</a>
			<a id="id_btnEdit_one" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit_one()">Edit</a>
			<a id="id_btnDelete_one" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="del_one()">Delete</a>
			<div id="enter_area" style="float:right;">
				<input id="search_one" placeholder= "searching..." style="line-height:20px;border:1px solid #ccc">
				<a href="#" class="easyui-linkbutton" plain="true" onclick="doSearch_one()" iconCls="icon-search">Search</a>
			</div>
    	</div>

    	<!-- Dialog form -->
    	<?php include_once "sex_form.php" ?>

    	<div id="dlg_one_buttons">
        	<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="save_one()" style="width:90px">Ok</a>
        	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_one').dialog('close')" style="width:90px">Cancel</a>
    	</div>

	</div>
	<!--Data id_hide_1 to here 100%----------------------------------------------------------------------------------------------------------->

	<!--Data id_hide_2 (panel view) from here 100%----------------------------------------------------------------------------------------------------------->
	<div id="id_hide_2" class="parent">
		<iframe id="preview" name="preview" type="application/pdf" width="98%" height="100%" src=""></iframe>
	</div>
	<!--Data id_hide_2 (panel view) to here 100%----------------------------------------------------------------------------------------------------------->

</body>
</html>
<script type="text/javascript">
	var t_id_btnPanelUtama = $("#id_btnPanelUtama");
	var t_id_btnPrint = $("#id_btnPrint");
	var t_id_btnViewHTML = $("#id_btnViewHTML");
	var t_id_btnViewPDF = $("#id_btnViewPDF");
	t_id_btnPanelUtama.hide();
	$("#id_hide_1").css("display", "block");
	$("#id_hide_2").css("display", "none");

    var url;
	document.oncontextmenu = function() {return false;};

	var __sex_id;

	$(document).ready(function(){
		$("#search_one").on("input", function(){
			doSearch_one();
		});
	});

	$(function(){
		$('#dg_one').datagrid({
			height:'100%',
			width:'100%',
			toolbar:'#toolbar_one',
			rownumbers:true,
			singleSelect:true,
			fitColumns: true,
			fit: true,
			pagination: true,
			pageSize: 25,
			pageList: [25, 50, 100],
			idField:'',
			url: "sex_utility.php?method=GetData_one",
			columns:[[
				{field:'sex_id',title:'Sex ID',width:'20%',sortable:true,hidden:true},
				{field:'sex_desc',title:'Sex Description',width:'20%',sortable:true},
			]],
			onSelect: function(index,row){
				__sex_id = row.sex_id;
			},
			onLoadSuccess:function(){
				$(this).datagrid('selectRow',0);
			}
		});
	});

	function doSearch_one(){
		$('#dg_one').datagrid('load',{
			search_one: $('#search_one').val()
		});
	}

    function add_one(){
        $('#dlg_one').dialog('open').dialog('center').dialog('setTitle','Add');
        $('#fm_one').form('clear');
		url = "sex_utility.php?method=saveAddNew_one";
    }

    function edit_one(){
        var row = $('#dg_one').datagrid('getSelected');
        if (row){
        	$('#dlg_one').dialog('open').dialog('center').dialog('setTitle','Edit');
        	$('#fm_one').form('load',row);
			url = "sex_utility.php?method=saveEdit_one";
        }
    }

    function del_one(){
        var row = $('#dg_one').datagrid('getSelected');
        if (row){
        	$('#dlg_one').dialog('open').dialog('center').dialog('setTitle','Are you sure to delete this data?');
        	$('#fm_one').form('load',row);
			url = "sex_utility.php?method=saveDelete_one";
        }
    }

    function save_one(){
		var $f = $('#fm_one');
		if (!$f.form('validate')) return;
		var json = ConvertFormToJSON($f);
		$.ajax({
			url:url,
			data: { data: json },
			success: function (textjson) {
				var obj = JSON.parse(textjson);
		        if (obj[0].result == 'OK') {
		        	$('#dlg_one').dialog('close');
		        	$('#dg_one').datagrid('reload');
		        } else {
                    alert('data '+obj[0].result);
		        }
			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.responseText);
			}
		});
    }

	function number_format(num,dig,dec,sep) {
		x=new Array();
		s=(num<0?"-":"");
		num=Math.abs(num).toFixed(dig).split(".");
		r=num[0].split("").reverse();
		for(var i=1;i<=r.length;i++){x.unshift(r[i-1]);if(i%3==0&&i!=r.length)x.unshift(sep);}
		return s+x.join("")+(num[1]?dec+num[1]:"");
	}

	function ConvertFormToJSON(form){
		var disabled = form.find(':input:disabled').removeAttr('disabled');
		var array = jQuery(form).serializeArray();
		disabled.attr('disabled','disabled');
		var json = {};
		jQuery.each(array, function() {
			json[this.name] = this.value || '';
		});
		json = JSON.stringify(json)
		json = "["+json+"]";
		return json;
	}

	function ocPanelUtama() {
		t_id_btnPanelUtama.hide();
		t_id_btnPrint.show();
		t_id_btnViewHTML.show();
		t_id_btnViewPDF.show();
		$("#id_hide_1").css("display", "block");
		$("#id_hide_2").css("display", "none");
	}

	function html_or_pdf(html_or_pdf) {
	}

</script>
