
<!doctype html>
<html lang="zh-TW">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset='utf-8'>
<head>
<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>

<![endif]-->

<!-- META ===================================================== -->
    <title>人社院場地借用清單</title>


<!-- Favicon  ========================================== -->


<!-- CSS ======================================================
	<link rel="stylesheet" href="css/responsivetables.css">-->
	<!-- Demo CSS (don't use) -->
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet" type="text/css">
	<style type="text/css">
		body, html {
			padding:0px;
			margin:0px;
			background: url('images/bg2.jpg') center;
			background-size:cover;
			background-attachment: fixed;
			text-align:center;
			color:#fff;
			line-height: 1.4em;
			font-family: "Trebuchet MS", Helvetica, sans-serif;
		}
		body {
			padding:10vh 0vw;
		}
		h1 {
			font-family: 'Yanone Kaffeesatz', sans-serif;
			text-align: center;
			font-size: 77px;
			text-shadow: 0 0px 30px rgba(0, 0, 0, 0.2);
		}
		h2 {
			font-family: 'Yanone Kaffeesatz', sans-serif;
			font-size:30px;
			text-shadow: 0 0px 20px rgba(0, 0, 0, 0.3);
			color:#fff;
		}
		.monthly {
			box-shadow: 0 13px 40px rgba(0, 0, 0, 0.5);
		}

		input[type="text"], input[type="color"], select {
			padding: 15px;
			border-radius: 2px;
			font-size: 16px;
			outline: none;
			border: 2px solid rgba(255, 255, 255, 0.5);
			background: rgba(63, 78, 100, 0.27);
			color: #fff;
			width: 250px;
			box-sizing: border-box;
			font-family: "Trebuchet MS", Helvetica, sans-serif;
		}

		/*input[type="color"]{
			height: 50px;
		}*/
        select {
			height: 60px;
		}

		input[type="text"]:hover {
			border: 2px solid rgba(255, 255, 255, 0.7);
		}
		input[type="text"]:focus {
			border: 2px solid rgba(255, 255, 255, 1);
			background:#eee;
			color:#222;
		}

		.input_gap {
			margin: 15px 0px;
		}

		.button {
			display: inline-block;
			padding: 15px 25px;
			margin: 25px 0 75px 0;
			border-radius: 3px;
			color: #fff;
			background: #000;
			letter-spacing: .4em;
			text-decoration: none;
			font-size: 16px;
		}
		.button:hover {
			background: #3b587a;
		}
		.desc {
			max-width: 250px;
			text-align: left;
			font-size:14px;
			padding-top:30px;
			line-height: 1.4em;
		}
		.resize {
			background: #222;
			display: inline-block;
			padding: 6px 15px;
			border-radius: 22px;
			font-size: 13px;
		}
		@media (max-height: 700px) {
			.sticky {
				position: relative;
			}
		}
		@media (max-width: 600px) {
			.resize {
				display: none;
			}
		}

		::-webkit-input-placeholder {
			color: #FFF;
		}

		:-moz-placeholder { /* Firefox 18- */
			color: #FFF;
		}

		::-moz-placeholder {  /* Firefox 19+ */
			color: #FFF;
		}

		:-ms-input-placeholder {
			color: #FFF;
		}

		#alertify-form {
			color: #000000;
		}
	</style>
	<link rel="stylesheet" href="css/monthly.css">
	<link rel="stylesheet" href="css/alertify.core.css">
	<link rel="stylesheet" href="css/alertify.default.css">

</head>

<?php

	if(isset($_GET['user'])){
		if($_GET['user'] == 1){
			$user = 'admin';
		} else {
			$user = 'normal';
		}
	} else {
		$user = 'normal';
	}

?>

<body>
<div class="page">
		<!--<h1>monthly.js</h1>
		<h2>Example One - Event Calendar</h2>-->
		<div style="width:100%; max-width:600px; display:inline-block;">
			<div class="monthly" id="mycalendar"></div>
		</div>
		<br><br>


		<div id="admin_box" style="display: none">
			<div style="display:inline-block; width:250px;">
				<select class="input_gap" id="room">
					<option value="遠距教室">遠距教室</option>
					<option value="會議室">會議室</option>
					<option value="2樓大廳">2樓大廳</option>
					<option value="1樓大廳">1樓大廳</option>
				</select>
				<input type="text" id="lend_unit" class="input_gap" placeholder="借出單位">
				<input type="text" id="lend_date" class="input_gap" value="選擇日期">
				<div class="monthly" id="mycalendar2"></div>

				<input type="text" class="input_gap" id="time_start" placeholder="輸入開始的時間(24小時制)">
				<input type="text" class="input_gap" id="time_end" placeholder="輸入結束的時間(24小時制)">
				<!-- <input type="color" id="color" value="#FFFFFF"> -->
			</div>
			<br>
			<a class="button" id="add_record">新增紀錄</a>
		</div>
</div>
<!-- JS ======================================================= -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/monthly.js"></script>
<script type="text/javascript" src="js/alertify.js"></script>
<script type="text/javascript">
	$(window).load( function() {

		var user = "<?php echo $user; ?>";

		if(user == 'admin'){
			$("#admin_box").show();
		}

		alertify.set({
			labels : {
				ok     : "確認",
				cancel : "取消"
			}
		});

		getData(function(){
			//console.log("loading xml");
			$('#mycalendar').monthly({
				mode: 'event',
				xmlUrl: 'booking.xml'
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#lend_date',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#lend_date',
				stylePast: true,
				disablePast: true
			});
		});

		function getData(callback){
			//console.log("getData");
			$.ajax({
				url: 'data.php',
				data: {
					func: 'get'
				},
				type:"POST",
				dataType:'html',

				success: function(msg){
					//console.log(msg);

					callback();
				},

				error:function(xhr, ajaxOptions, thrownError){
					alert(xhr.status+" "+thrownError);
				}
			});
		}




		$("#add_record").click(function(){

			var booking_room = $("#room").val();
			var booking_unit = $("#lend_unit").val();
			var booking_date = $("#lend_date").val();
			var time_start = $("#time_start").val();
			var time_end = $("#time_end").val();
            var color = '';

            switch (booking_room) {
                case '遠距教室':
                    color = '#1a75ff';
                    break;
                case '會議室':
                    color = '#ff9900';
                    break;
                case '2樓大廳':
                    color = '#cc33ff';
                    break;
                case '1樓大廳':
                    color = '#2eb82e';
                    break;
                default:

            }


			alertify.prompt("請輸入密碼", function (e, str) {
				// str is the input text
				//console.log(str);
				if (e) {
					if (str == '24626117') {
						$.ajax({
							url: 'data.php',
							data: {
								room: booking_room,
								unit: booking_unit,
								date: booking_date,
								start: time_start,
								end: time_end,
								color: color,
								func: 'insert'
							},
							type:"POST",
							dataType:'text',

							success: function(msg){
								//console.log(msg);
								location.reload();
							},

							error:function(xhr, ajaxOptions, thrownError){
								alert(xhr.status+thrownError);
							}
						});
					} else {
						alertify.error("密碼輸入錯誤");
					}
				} else {

				}

			});

		});




		switch(window.location.protocol) {
			case 'http:':
			case 'https:':
			// running on a server, should be good.
			break;
			case 'file:':
			alert('Just a heads-up, events will not work when run locally.');
		}

	});
</script>
</body>
</html>
