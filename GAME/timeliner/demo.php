<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="utf-8" />


<script src="js/modernizr.custom.js" type="text/javascript" charset="utf-8"></script>

<title>髒東西的日常</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css" type="text/css" media="screen" title="no title" charset="utf-8">

<link rel="stylesheet" href="timeglider/Timeglider.css" type="text/css" media="screen" title="no title" charset="utf-8">


<!--<link rel="stylesheet" href="docs-style.css" type="text/css" media="screen" title="no title" charset="utf-8">-->


<!-- UNCOMMENT FOR CHECKBOX-STYLE LEGEND ITEMS
<link rel="stylesheet" href="css/tg_legend_checkboxes.css" type="text/css" media="screen" charset="utf-8">-->


<link rel="stylesheet" href="timeglider/timeglider.datepicker.css" type="text/css" media="screen" charset="utf-8">


<style type='text/css'>


		.header {
			margin:32px;
		}

		#p1 {
			margin:32px;
			margin-bottom:0;
			height:450px;
		}
				
				
		
		.timeglider-legend {
			width:180px;
		}
		
		
		*.no-select {
		-moz-user-select: -moz-none;
		-khtml-user-select: none;
		-webkit-user-select: none;
		user-select: none;
		}
		
		
		.timeglider-timeline-event.ongoing .timeglider-event-title {
			color:green;
		}


	
		.dragger {
			float:right;
			width:40%;
			text-align:right;
			margin-right:8px;
			font-size:18px;
			color:green;
			font-size:12px;
			cursor:pointer;	
		}

		</style>
</head>
<body class='sample'>

<div style="padding-left: 30px;">

	內容：<input type="text" id="content" placeholder="文字寫在這" style="margin-top: 15px;margin-bottom: 15px; height: 26px; width: 350px;"><br>

	<p style="margin-bottom: 10px;">主角是：</p><br>
	<input type="radio" name="who" value="taco" style="margin-bottom: 10px;">章魚<br>
	<input type="radio" name="who" value="dog" style="margin-bottom: 10px;">狗<br>
	<input type="radio" name="who" value="parrot" style="margin-bottom: 10px;">鸚鵡<br>
	<input type="radio" name="who" value="asshole" style="margin-bottom: 10px;">垃圾鍋子<br>
	<button type="button" id="record_btn" style="margin-top: 15px;margin-bottom: 15px; width: 150px; height: 30px;">新增紀錄</button>
</div>


<div id='p1'></div>


<p></p>



	<script src="js/json2.js" type="text/javascript" charset="utf-8"></script>
	
	<script src="js/jquery-1.10.1.min.js" type="text/javascript" charset="utf-8"></script>
	<!-- jquery-1.9.1.min.js  OR  jquery-1.10.1.min.js -->
	<script src="js/jquery-ui-1.10.3.custom.min.js" type="text/javascript" charset="utf-8"></script>
	
	
	<script src="js/underscore-min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/backbone-min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.tmpl.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/ba-debug.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/ba-tinyPubSub.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.mousewheel.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.ui.ipad.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/globalize.js" type="text/javascript" charset="utf-8"></script>	
	
	
	
	<script src="timeglider/TG_Date.js" type="text/javascript" charset="utf-8"></script>
	<script src="timeglider/TG_Org.js" type="text/javascript" charset="utf-8"></script>
	<script src="timeglider/TG_Timeline.js" type="text/javascript" charset="utf-8"></script> 
	<script src="timeglider/TG_TimelineView.js" type="text/javascript" charset="utf-8"></script>
	<script src="timeglider/TG_Mediator.js" type="text/javascript" charset="utf-8"></script> 
	<script src="timeglider/timeglider.timeline.widget.js" type="text/javascript"></script>
	
	<script src="timeglider/timeglider.datepicker.js" type="text/javascript"></script>

	
	<script src="js/jquery.jscrollpane.min.js" type="text/javascript"></script>

	
	<!-- JUST FOR KITCHEN SINK: NOT NEEDED FOR TG WIDGET -->
	<script src="js/jquery.ui.sortable.js" type="text/javascript" charset="utf-8"></script>
	
	

  <script type='text/javascript'>
  
  
    var ico = window.ico;
    
	window.pizzaShack = {
		clicker: function(tg_event) {
			alert("you clicked on " + tg_event.title);
		}
	};
  
   var tg1 = window.tg1 = "";
   
	$(function () { 
	
		var tg_instance = {};

        /*$("body").keydown(function(e) {
            if (e.keyCode == 17 && e.keyCode == 90) {
                window.open('www.liveplates.com');
            }

        });*/

        $.ajax({
            url: 'demo_sql.php',
            type:'POST',
            dataType: "html",
            beforeSend:function(){
                //$('#content').mask("LOADING...");
            },
            data: {
                action: "update_record"
            },
            complete:function(){

            },
            error:function(xhr, ajaxOptions, thrownError){
                console.log("xhr.status : " + xhr.status);
                console.log("thrownError : " + thrownError);
            },
            success: function(response) {
                console.log(response);
                //$("body").append(response);


            }

        });
		

		tg1 = $("#p1").timeline({
					
					/*
					// custom hover & click callbacks
					// returning false prevents default
	
					eventHover: function($ev, ev) {
						debug.log("ev hover, no follow:", ev);
						return false;
					},
					
					eventClick: function($ev, ev) {
						debug.log("eventClick, no follow:", ev);
						return false;
					},
					*/
	
					"min_zoom":1,
					"max_zoom":50,
					"timezone":"+08:00",
					"icon_folder":"timeglider/icons/",
					"data_source": "json/demo2.json",
					"show_footer":true,
					"display_zoom_level":true,
					"mousewheel":"none", // zoom | pan | none
					"constrain_to_data":true,
					"image_lane_height":100,
                    "base_font_size":8,
					"legend":{type:"default"}, // default | checkboxes
					"loaded":function () { 
						// loaded callback function
					 }
	
			}).resizable({
				stop:function(){ 
					// $(this).data("timeline").resize();
				}
			});
			
			
		
		tg_instance = tg1.data("timeline");
	
	
		$(".goto").click(function() {
			var d = $(this).attr("date");
			var z = $(this).attr("zoom");
			tg_instance.goTo(d,z);
		});
		
		$(".zoom").click(function() {
			var z = Number($(this).attr("z"));
			tg_instance.zoom(z);
		});
		
		
		tg_instance.panButton($(".pan-left"), "left");
		tg_instance.panButton($(".pan-right"), "right");
		
	
		$("#getScope").click(function() {
			
			var so = tg_instance.getScope();
						
			var ml = "RETURNS: <br><br>container (jquery dom object): " + so.container.toString()
			+ "<br>focusDateSec (tg sec):" + so.focusDateSec
			+ "<br>focusMS (js timestamp): " + so.focusMS
			+ "<br>leftMS (js timestamp): " + so.leftMS
			+ "<br>left_sec (tg sec): " + so.left_sec
			+ "<br>rightMS (js timestamp): " + so.rightMS
			+ "<br>right_sec (tg sec): " + so.right_sec
			+ "<br>spp (seconds per pixel): " + so.spp
			+ "<br>timelineBounds (object, left- & right-most in tg sec): " + JSON.stringify(so.timelineBounds)
			+ "<br>timelines (array of ids): " + JSON.stringify(so.timelines);
			
			var d = new Date(so.focusMS)
			
			ml += "<br><br>Date using focusMS:" + d.toString('yyyy-MM-dd');
			
			$(".scope-view").html(ml);
					
		});
	
	
		$("#loadData").click(function() {
			
			var src = $("#loadDataSrc").val();
			
			var cb_fn = function(args, timeline) {
				// called after parsing data, after load
				debug.log("args", args, "timeline", timeline[0].id);
			};
			
			var cb_args = {}; // {display:true};
			
			tg_instance.getMediator().emptyData();
			tg_instance.loadTimeline(src, function(){debug.log("cb!");}, true);
			
			$("#reloadDataDiv").hide();
		});
		
		
		$("#reloadTimeline").click(function() {
			tg_instance.reloadTimeline("js_history", "json/demo2.json");
		});
		
		
	
		$("#refresh").click(function() {
			debug.log("timeline refreshed!");
			tg_instance.refresh();
		});
		
		
		
		$("#scrolldown").bind("click", function() {
			$(".timeglider-timeline-event").animate({top:"+=100"})
		})
		
		$("#scrollup").bind("click", function() {
			$(".timeglider-timeline-event").animate({top:"-=100"})
		})
				

	
	
	  	timeglider.eventActions = {
			nagavigateTo:function(obj) {
				// event object must have a "navigateTo"
				// element with zoom, then ISO date delimited
				// with a pipe | 
				// one can use
				var nav = obj.navigateTo;
				tg_instance.goTo(nav.focus_date,nav.zoom_level);
				
				setTimeout(function () {
					$el = $(".timeglider-timeline-event#" + obj.id);
					$el.find(".timeglider-event-spanner").css({"border":"1px solid green"}); // 
				}, 50);
				
			}
		}


	
		
		$("#adjustNow").click(function() {
			tg_instance.adjustNowEvents();
		});	
		
		
		
		
		$("#addEvent").click(function() {
		
			var rando = Math.floor((Math.random()*1000)+1); 
			var impo = Math.floor((Math.random()*50)+20); 
			
			var obj = {
				id:"new_" + rando,
				title:"New Event!",
				startdate:"today",
				importance:impo,
				icon:"star_red.png",
				timelines:["js_history"]
			}
			
			tg_instance.addEvent(obj, true);
			
		});	
		
		
		
		
		$("#updateEvent").click(function() {
			
			var updatedEventModel = {
				id:"deathofflash",
				title: "Flash struggles to survive in the age of HTML5."
			}
			
			tg_instance.updateEvent(updatedEventModel);

		});	
		
		
		$(".method").each(function() {
			$(this).find("h4").addClass("clearfix");
			$(this).prepend("<div class='dragger'>drag me</div>");
		});
		
		
		$("#sorters").sortable({"handle":".dragger"});
		$("#sorters").disableSelection();

        // 新增紀錄
		$("#record_btn").click(function(){
		    //console.log("click record_btn");

            var content = $("#content").val();
            var who = $('input[name="who"]:checked').val();
            //console.log("content = "+content);
            //console.log("who = "+who);

            var icon = '';
            switch (who) {
                case 'taco' :
                    icon = 'triangle_red.png';
                    break;

                case 'dog' :
                    icon = 'triangle_green.png';
                    break;

                case 'parrot' :
                    icon = 'square_orange.png';
                    break;

                case 'asshole' :
                    icon = 'square_blue.png';
                    break;
            }

            $.ajax({
                url: 'demo_sql.php',
                type:'POST',
                dataType: "html",
                beforeSend:function(){
                    //$('#content').mask("LOADING...");
                },
                data: {
                    description: content,
                    icon: icon,
                    action: "insert"
                },
                complete:function(){

                },
                error:function(xhr, ajaxOptions, thrownError){
                    console.log("xhr.status : " + xhr.status);
                    console.log("thrownError : " + thrownError);
                },
                success: function(response) {
                    console.log(response);
                    //$("body").append(response);
                    location.reload();

                }

            });
		});

		
    }); // end document-ready
    
    
    
    
   
 
	
</script>
<!--<script src='js/tg-sample-nav.js' type='text/javascript'></script>-->

</body>
</html>


