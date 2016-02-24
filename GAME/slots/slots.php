
<style>
    body{
        background-color:white;
        padding:0px;
        margin:0px;
    }


   /* .slots {
        font-size:100px;
        font-family:arial,helvetica,sans-serif;
        overflow:hidden;
        width:300px;
        height:100px;
        border:1px solid black;
        float:left;
    }*/

    #slots_a {
        font-size:24px;
        font-family:arial,helvetica,sans-serif;
        overflow:hidden;
        width:300px;
        height:100px;
        border:1px solid black;
        float:left;
        line-height:100px;
    }

    #slots_b {
        font-size:24px;
        font-family:arial,helvetica,sans-serif;
        overflow:hidden;
        width:300px;
        height:100px;
        border:1px solid black;
        float:left;
        line-height:100px;
    }

    #slots_c {
        font-size:24px;
        font-family:arial,helvetica,sans-serif;
        overflow:hidden;
        width:300px;
        height:100px;
        border:1px solid black;
        float:left;
        line-height:100px;
    }

    .slots .wrapper{
        margin-top:-6px;
        width:100px;

    }

    .slots .slot{
        width:300px;
        height:100px;
        text-align:center;

    }
</style>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>


    <script src="jquery.1.6.4.min.js" type="text/javascript"></script>
    <script src="jquery.easing.1.3.js" type="text/javascript"></script>


    <div style="width:1000px">
        <div class="slots"  id="slots_a">
            <div class="wrapper" ></div>
        </div>
        <div class="slots"  id="slots_b">
            <div class="wrapper" ></div>
        </div>
        <div class="slots"  id="slots_c">
            <div class="wrapper" ></div>
        </div>

        <br>
        <div style="text-align:center">
            <input type="button" value="spin!" onClick="go();" style="margin-top:15px; width: 100px; height: 70px; font-size: 18px;">
        </div>

    </div>

</body>

<script type="text/javascript">


    var opts1 = ['章魚','不沾鍋','來福','西瓜', '瑞死'];
    //var opts1 = ['XX','OOO','AA'];
    var opts2 = ['說','覺得','認為','碎念','靠腰'];
    //var opts2 = ['3','22','11'];
    var opts3 = ['設計稿只是參考用','不能同時做嗎？','這個要問螃蟹','你怎麼會問我','UI那份就是規格書','好醜','我們一定要有規格書','我心情不好要出去走走','上班就是要混','客戶沒講是我想的'];
    //var opts3 = ['AAAA','BBBB？','CCCC','DDDD'];


    //var check_point1 = [];

    function go(){
        //check_point1 = [];
        addSlots1($("#slots_a .wrapper"));
        moveSlots1($("#slots_a .wrapper"));
        addSlots2($("#slots_b .wrapper"));
        moveSlots2($("#slots_b .wrapper"));
        addSlots3($("#slots_c .wrapper"));
        moveSlots3($("#slots_c .wrapper"));
    }

    $(document).ready(
        function(){
            addSlots1($("#slots_a .wrapper"));
            addSlots2($("#slots_b .wrapper"));
            addSlots3($("#slots_c .wrapper"));

        }
    );



    function addSlots1(jqo){
        for(var i = 0; i < 15; i++){
            var ctr = Math.floor(Math.random()*opts1.length);
            //check_point1.push(opts1[ctr]);
            jqo.append("<div class='slot'>"+opts1[ctr]+"</div>");
        }

        //console.log("check_point1 = "+check_point1);
    }

    function addSlots2(jqo){
        for(var i = 0; i < 15; i++){
            var ctr = Math.floor(Math.random()*opts2.length);
            jqo.append("<div class='slot'>"+opts2[ctr]+"</div>");


        }
    }

    function addSlots3(jqo){
        for(var i = 0; i < 15; i++){
            var ctr = Math.floor(Math.random()*opts3.length);
            jqo.append("<div class='slot'>"+opts3[ctr]+"</div>");


        }
    }

    //console.log(parseInt(23.7, 10));
    function moveSlots1(jqo){
        //var time = 650;
        var time = Math.random()*1000+3;
        time += Math.round(Math.random()*1000);
        jqo.stop(true,true);

        var marginTop = parseInt(jqo.css("margin-top"), 10);



        marginTop -= (7 * 100)

        var check_num = Math.abs(parseInt(marginTop/100, 10));
        console.log("check_num = "+check_num);

        //var get_name = check_point1[check_num];
        //console.log("get_name = "+get_name);

        //console.log("margin-top1 = "+marginTop);

        jqo.animate(
            {"margin-top":marginTop+"px"},
            {'duration' : time, 'easing' : "easeOutElastic"});

    }

    function moveSlots2(jqo){
        //var time = 850;
        var time = Math.random()*1000+10;
        time += Math.round(Math.random()*1000);
        jqo.stop(true,true);

        var marginTop = parseInt(jqo.css("margin-top"), 10)

        marginTop -= (7 * 100)

        jqo.animate(
            {"margin-top":marginTop+"px"},
            {'duration' : time, 'easing' : "easeOutElastic"});

    }

    function moveSlots3(jqo){
        //var time = 1050;
        var time = Math.random()*1000+7;
        time += Math.round(Math.random()*1000);
        jqo.stop(true,true);

        var marginTop = parseInt(jqo.css("margin-top"), 10)

        marginTop -= (7 * 100)

        jqo.animate(
            {"margin-top":marginTop+"px"},
            {'duration' : time, 'easing' : "easeOutElastic"});

    }
</script>