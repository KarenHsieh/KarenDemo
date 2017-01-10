$(document).ready(function() {
	$('select').material_select();
	$('.sortable').sortable();

	$("textarea").on("change", function(){
		$(this).trigger('autoresize');
	});

	$("#add_one").on("click", function(){
		$('.sortable').sortable('destroy');

		var clone = $("#demo").find("li:first").clone();

		$(".sortable").append(clone);
		$('.sortable').sortable();
	});

	var row_name = [];
	var row_is_show = [];
	var row_value = [];
	var row_is_func = [];
	$("#gen_code").on("click", function(){
		var rows = $(".sortable").find("li");
		//console.log(rows);
		$.each(rows, function(index, data){
			//console.log($(data).find(".name").val());
			row_name.push($(data).find(".name").val());

			if($(data).find(".is_show").prop("checked")) {
				row_is_show.push("Y");
			} else {
				row_is_show.push("N");
			}
			//console.log($(data).find(".is_show").prop("checked"));

			row_value.push($(data).find(".value").val());

			if($(data).find(".is_func").prop("checked")) {
				row_is_func.push("Y");
			} else {
				row_is_func.push("N");
			}
		});

		genCode();
	});


	function genCode(){

		var scope = getScope();

		var theadValue = [];
		var tbodyValue = [];
		var tbodyStyle = [];
		$.each(row_name, function(key, value){

			var temp_obj1 = new Object();
			temp_obj1['Text'] = value;

			if(row_is_show[key] == "Y"){
				tbodyStyle.push({});
			} else {
				temp_obj1['Style'] = { "display" : "none" };
				tbodyStyle.push({ "display" : "none" });
			}
			theadValue.push(temp_obj1);


		
			if(row_is_func[key] == "Y"){
				var func_val = {};
				func_val['h'] =  'function (col) { return col["col_name"];}';
				tbodyValue.push(func_val);
			} else {
				tbodyValue.push(row_value[key]);
			}

		});

		scope.theadValue.push(theadValue);
		scope.tbodyValue = {};
		scope.tbodyValue['Value'] = tbodyValue;
		scope.tbodyValue['Style'] = tbodyStyle;

		//scope = scope.toString();
		//console.log(JSON.stringify(scope));
		console.log(scope);

		$("textarea").text(JSON.stringify(scope));
	}


	function getScope(){

		var tableArg = {
			theadValue: [
				//[{},{}]
			],
			tbodyValue: {
				Value: [],
				Style: []
			}
		};

		return tableArg;
	}

});