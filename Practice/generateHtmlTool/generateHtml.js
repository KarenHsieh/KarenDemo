/**
 * Created by karen on 2017/1/3.
 */



	function getScope(responseScope) {
		$.ajax({
			url: "getScope.php",
			data: "",
			type:"POST",
			dataType:'html',

			success: function(msg){
				responseScope(msg);
			},

			error:function(xhr, ajaxOptions, thrownError){
				alert(xhr.status);
				//alert(thrownError);
			}
		});
	};


var htmlcode = function() {
	this.whole_row = '<div class="rwd_form_row"><div class="rwd_form_left"></div><div class="rwd_form_right"></div></div>';
	this.half_row = '<div class="rwd_form_row 4col"><div class="rwd_form_left"></div><div class="rwd_form_right"></div>//addSecond</div>';


	this.input_text = '<input name="db_name" type="text" id="txt_" />';
	this.textarea = '<textarea name="db_name" id="tarea"></textarea>';
	this.select = '<select name="db_name" id="slt_"></select>';
	this.checkbox = '<input name="db_name" type="checkbox" id="checkbox_" />';
	this.radio = '<input name="db_name" type="radio" id="radio_" />';
	this.datepicker = '<span class="select_date"><input type="text" name="db_name" id="date_" class="datepicker"></span>';
	this.address = '<input name="Zip3" type="text" id="txt_Zip3" /> <input name="Zip2" type="text" id="txt_Zip2" /> (郵遞區號) <select name="CityCode" id="slt_CityCode"></select> <select name="AreaCode" id="slt_AreaCode"></select> <select name="RoadCode" id="slt_RoadCode"></select> <input name="RoadItem" type="text" id="txt_RoadItem" /> <input name="Section" type="text" id="txt_Section" />段 <input name="Alley" type="text" id="txt_Alley" />巷 <input name="Lane" type="text" id="txt_Lane" />弄 <input name="Num" type="text" id="txt_Num" />號之 <input name="NumDash" type="text" id="txt_NumDash" /> <input name="Floor" type="text" id="txt_Floor" />樓之 <input name="FloorDash" type="text" id="txt_FloorDash" />';
	this.label = '<label id="lbl_"></label>';
}


$(document).ready(function () {
	var getCode = "";

	$('select').material_select();
	$("textarea").on("change", function(){
		$(this).trigger('autoresize');
	});
	$(".collapsible-header:first").click();


	$("#add_scope").on("click", function() {
		var file_name = $("#file_name").val();
		var subject = $("#subject").val();

		getScope(function(res){
			//console.info(typeof (res));

			if(file_name != ""){
				res = res.replace("thisisjsfile", file_name);
			}

			if(subject != ""){
				res = res.replace('<title></title>', '<title>'+subject+'</title>');
				res = res.replace('<div class="rwd_form_caption"></div>', '<div class="rwd_form_caption">'+subject+'</div>');
			}

			var pre_code = $("#code").val();
			$("#code").val(pre_code+"\r\n\r\n"+res).trigger('autoresize');
			$(".collapsible-header:eq(1)").click();
			//console.info(res);
		});
	})


	$("#update_data").on("click", function(){

		var field_name = [];
		var db_name = [];

		var f_lines = $("#field_name").val().split('\n');
		for(var i = 0;i < f_lines.length;i++){
			field_name.push(f_lines[i]);
		}

		var d_lines = $("#db_name").val().split('\n');
		for(var i = 0;i < d_lines.length;i++){
			db_name.push(d_lines[i]);
		}


		$("#title").find("option").remove().material_select();
		$.each(field_name, function(index, data){
			$("#title").append("<option value='"+db_name[index]+"'>"+data+"</option>");
			$("#title").material_select();
		});
		$(".collapsible-header:eq(2)").click();
	});

	$("#add_second").on("click", function(){

		var title = $("#title").find(":selected").text();
		var db_name = $("#title").find(":selected").val();
		var is_required = $("#is_required:checked").val();
		var type = $("#type").find(":selected").val();

		var temp_scope = '<div class="rwd_form_left"></div><div class="rwd_form_right"></div>';

		if (is_required == "y" && title != "") {
			temp_scope = temp_scope.replace('<div class=\"rwd_form_left\"></div>', '<div class="rwd_form_left"><span class="required">'+title+'</span></div>');
		} else if (is_required != "y" && title != "") {
			temp_scope = temp_scope.replace('<div class=\"rwd_form_left\"></div>', '<div class="rwd_form_left">'+title+'</div>');
		}

		var inner_code = "";
		switch(type){
			case "text":
				inner_code = getCode.input_text;
				inner_code = inner_code.replace("db_name", db_name).replace("txt_", "txt_"+db_name);
				break;
			case "select":
				inner_code = getCode.select;
				inner_code = inner_code.replace("db_name", db_name).replace("slt_", "slt_"+db_name);
				break;
			case "checkbox":
				inner_code = getCode.checkbox;
				inner_code = inner_code.replace("db_name", db_name).replace("checkbox_", "checkbox_"+db_name);
				break;
			case "radio":
				inner_code = getCode.radio;
				inner_code = inner_code.replace("db_name", db_name).replace("radio_", "radio_"+db_name);
				break;
			case "textarea":
				inner_code = getCode.textarea;
				inner_code = inner_code.replace("db_name", db_name).replace("tarea_", "tarea_"+db_name);
				break;
			case "datepicker":
				inner_code = getCode.datepicker;
				inner_code = inner_code.replace("db_name", db_name).replace("date_", "date_"+db_name);
				break;
			case "address":
				inner_code = getCode.address;
				//inner_code = inner_code.replace("db_name", db_name).replace("date_", "date_"+db_name);
				break;
			case "label":
				inner_code = getCode.label;
				inner_code = inner_code.replace("lbl_", "lbl_"+db_name);
				break;
		}

		temp_scope = temp_scope.replace('<div class="rwd_form_right">','<div class="rwd_form_right">'+inner_code);

		var pre_code = $("#code").val();
		//console.info(pre_code);

		var full_code = pre_code.replace("//addSecond", temp_scope+"\r\n");
		$("#code").val(full_code).trigger('autoresize');

		Materialize.toast('加入成功！', 2000);
	});





	$("#add_btn").on("click", function() {
		var row_type = $("#row_type").find(":selected").val();
		var title = $("#title").find(":selected").text();
		var db_name = $("#title").find(":selected").val();
		var is_required = $("#is_required:checked").val();
		var type = $("#type").find(":selected").val();

		getCode = new htmlcode();

		var temp_code = "";

		if(row_type == "one"){
			temp_code = getCode.whole_row;
		} else {
			temp_code = getCode.half_row;
			temp_code = temp_code.replace("rwd_form clearfix", "rwd_form clearfix complex");
		}


		if (is_required == "y" && title != "") {

			temp_code = temp_code.replace('<div class=\"rwd_form_left\"></div>', '<div class="rwd_form_left"><span class="required">' + title + ": </span></div>");

		} else if (is_required != "y" && title != "") {

			temp_code = temp_code.replace('<div class="rwd_form_left"></div>', '<div class="rwd_form_left">' + title + ": </div>");

		}

		var inner_code = "";
		switch(type){
			case "text":
				inner_code = getCode.input_text;
				inner_code = inner_code.replace("db_name", db_name).replace("txt_", "txt_"+db_name);
				break;
			case "select":
				inner_code = getCode.select;
				inner_code = inner_code.replace("db_name", db_name).replace("slt_", "slt_"+db_name);
				break;
			case "checkbox":
				inner_code = getCode.checkbox;
				inner_code = inner_code.replace("db_name", db_name).replace("checkbox_", "checkbox_"+db_name);
				break;
			case "radio":
				inner_code = getCode.radio;
				inner_code = inner_code.replace("db_name", db_name).replace("radio_", "radio_"+db_name);
				break;
			case "textarea":
				inner_code = getCode.textarea;
				inner_code = inner_code.replace("db_name", db_name).replace("tarea_", "tarea_"+db_name);
				break;
			case "datepicker":
				inner_code = getCode.datepicker;
				inner_code = inner_code.replace("db_name", db_name).replace("date_", "date_"+db_name);
				break;
			case "address":
				inner_code = getCode.address;
				//inner_code = inner_code.replace("db_name", db_name).replace("date_", "date_"+db_name);
				break;
			case "label":
				inner_code = getCode.label;
				inner_code = inner_code.replace("lbl_", "lbl_"+db_name);
				break;
		}

		temp_code = temp_code.replace('<div class="rwd_form_right">','<div class="rwd_form_right">'+inner_code);

		$("#is_required").prop('checked', false);
		var pre_code = $("#code").val();
		console.info(pre_code);

		var full_code = pre_code.replace("//FillContent", temp_code+"\r\n //FillContent");
		$("#code").val(full_code).trigger('autoresize');

		Materialize.toast('加入成功！', 2000);
	});

	$("#code").on("change", function(){
		$(this).trigger('autoresize');
	});

	$("#row_type").on("change", function(){

		if($("#row_type").find(":selected").val() == "one"){
			$("#add_second").hide();
		} else {
			$("#add_second").show();
		}

	});

});
