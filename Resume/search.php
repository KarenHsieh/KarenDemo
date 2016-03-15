<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>x工作清單x</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/showup.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


       <style type="text/css">
           .scrollup{
               width:40px;
               height:40px;
               opacity:0.3;
               position:fixed;
               bottom:50px;
               right:100px;
               display:none;
               text-indent:-9999px;
               background: url('icon_top.png') no-repeat;
           }
       </style>
    </head>

<!--
    role_status=1 日間
    incs=2 不包含外包
    intmp=2 不包含派遣
    fmt=8 json格式
    kws： 關鍵字 window.encodeURIComponent()

    kwop： 關鍵字查詢範圍
    1=職務名稱
    2=職務名稱，職務說明，公司名，公司產品，公司簡介，福利制度，產業別描述，擅長工具描述，工作技能描述
    3=職務名稱，職務說明，公司名，公司產品，公司簡介，福利制度，產業別描述，其他說明，公司連結，職務別描述，職務產業別描述，科系別描述，證照描述，擅長工具描述，工作技能描述
    4=職務名稱，職務說明，公司簡介，產業別描述，職務其他描述，職務類別描述，職務產業別描述

    area=6001001000 台北市全部
    area=6001002000 新北市全部

    cols=
    J  職務代號
    JOB  職務名稱
    NAME  公司名
    JOB_ADDR_NO_DESCRIPT  職務工作地區
    JOB_ADDRESS  職務工作地點
    JOBCAT_DESCRIPT  職務類別
    DESCRIPTION 職務說明
    =====
    JOBSKILL_ALL_DESC  工作技能
    PCSKILL_ALL_DESC  電腦技能描述
    ONDUTYTIME  上班時間
    OFFDUTY_TIME  下班時間
    OTHERS  其他條件
    WELFARE  公司福利制度-->



	<body>

    <div id="error_msg" class="alert alert-danger" role="alert" style="display: none">
        <strong>Ooops!</strong> 最多只能選擇五個項目！
    </div>
    <br>
        <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-8">
                <form>
                    <div class="form-group">
                        <label class="text-danger">關鍵字</label>
                        <input type="text" class="form-control" id="keyword">
                    </div>

                   <!-- <div class="form-group">
                        <label class="text-danger">關鍵字查詢範圍</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="keyword_range" id="keyword_range_1" value="1" checked>
                                職務名稱
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="keyword_range" id="keyword_range_2" value="2">
                                職務名稱，職務說明，公司名，公司產品，公司簡介，福利制度，產業別描述，擅長工具描述，工作技能描述
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="keyword_range" id="keyword_range_3" value="3" disabled>
                                職務名稱，職務說明，公司名，公司產品，公司簡介，福利制度，產業別描述，其他說明，公司連結，職務別描述，職務產業別描述，科系別描述，證照描述，擅長工具描述，工作技能描述
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="keyword_range" id="keyword_range_4" value="4" disabled>
                                職務名稱，職務說明，公司簡介，產業別描述，職務其他描述，職務類別描述，職務產業別描述
                            </label>
                        </div>
                    </div>-->

                    <div class="form-group">
                        <label class="text-danger">職務類別</label>
                        <div class="radio">

                            <label>
                                <input type="radio" name="work_type" value="2007001000"> 軟體╱工程類人員全部
                            </label>

                            <label>
                                <input type="radio" name="work_type" value="2013001000"> 設計類人員全部
                            </label>

                            <label>
                                <input type="radio" name="work_type" value="2005003000"> 業務銷售類人員全部
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="text-danger">地區 (至多只能選擇五項)</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="taipei" value="6001001000" checked> 台北市全區
                            </label>
                        </div>

                        <!--<div class="checkbox">
                            <label>
                                <input type="checkbox" name="taipei" value="6001002000"> 新北市全區
                            </label>
                        </div>-->
                        <div class="checkbox-inline">

                                <input type="checkbox" name="taipei" value="6001002011"> 新北市新店區

                        </div>
                        <div class="checkbox-inline">

                                <input type="checkbox" name="taipei" value="6001002014"> 新北市永和區

                        </div>
                        <div class="checkbox-inline">

                                <input type="checkbox" name="taipei" value="6001002015"> 新北市中和區

                        </div>
                        <div class="checkbox-inline">

                                <input type="checkbox" name="taipei" value="6001002016"> 新北市土城區

                        </div>
                        <div class="checkbox-inline">

                                <input type="checkbox" name="taipei" value="6001002020"> 新北市三重區

                        </div>
                        <div class="checkbox-inline">

                                <input type="checkbox" name="taipei" value="6001002021"> 新北市新莊區

                        </div>
                        <div class="checkbox-inline">

                                <input type="checkbox" name="taipei" value="6001002024"> 新北市蘆洲區

                        </div>
                    </div>



                    <div class="form-group">
                        <label class="text-danger">其他條件顯示</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="others" value="JOBSKILL_ALL_DESC" checked> 工作技能
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="others" value="PCSKILL_ALL_DESC" checked> 電腦技能描述
                            </label>
                        </div>
                        <!--<div class="checkbox">
                            <label>
                                <input type="checkbox" name="others" value="ONDUTYTIME"> 上班時間
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="others" value="OFFDUTY_TIME"> 下班時間
                            </label>
                        </div>-->
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="others" value="OTHERS" checked> 其他條件
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="others" value="WELFARE" checked> 公司福利制度
                            </label>
                        </div>
                    </div>

                    <button type="button" id="search_btn" class="btn btn-default">查詢</button>

                </form>
            </div>

            <div class="col-md-2"></div>
        </div>
        <br>
        <hr>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div id="result_box" style="margin: 15px;"></div>
                <a class="scrollup" style="display: none;">Scroll</a>
            </div>
            <div class="col-md-1"></div>
        </div>
    </body>


    <script type="text/javascript">
        $( document ).ready(function() {

            $(window).scroll(function(){
                if ($(this).scrollTop() > 100) {
                    $('.scrollup').fadeIn();
                } else {
                    $('.scrollup').fadeOut();
                }
            });

            $('.scrollup').click(function(){
                $("html, body").animate({ scrollTop: 0 }, 600);
                return false;
            });


            var go_page = 1;

            var base_url = "http://www.104.com.tw/i/apis/jobsearch.cfm";
            var cols = "J,JOB,NAME,JOB_ADDR_NO_DESCRIPT,JOB_ADDRESS,JOBCAT_DESCRIPT,DESCRIPTION,APPEAR_DATE";

            var area = "";
            var keyword = "";
            var other_str = "";

            $("#search_btn").click(function(){

                $("#result_box").empty();

                console.log("search");

                var keyword = $("#keyword").val();
                console.log("keyword1 = "+keyword);
                keyword = window.encodeURIComponent(keyword);
                console.log("keyword2 = "+keyword);
                var work_type = $("[name='work_type']").val();
                console.log(work_type);

                var areas = [];
                var count = 0;

                $('input[name="taipei"]:checked').each(function() {
                    count++;

                    if(count > 5) {
                        $("#error_msg").alert();
                    }

                    var option = this.value;
                    console.log(option);
                    areas.push(option);
                });

                var areas_str = areas.join();
                if(areas_str != ''){
                    area = areas_str;
                }


                var others = [];
                $('input[name="others"]:checked').each(function() {
                    var option = this.value;
                    //console.log(option);
                    others.push(option);
                });

                var other_str = others.join();
                if(other_str != ''){
                    cols = cols+","+other_str;
                }

                console.log("[in click] " + go_page);

                $.ajax({
                    url: "get_content.php",
                    type: "POST",
                    dataType: "text",
                    data : {
                        url_str: base_url,
                        role: "1",
                        fmt: "8",
                        fz: "1",
                        kwop: "1",
                        role_status: "1",
                        incs: "2",
                        intmp: "2",
                        cols: cols,
                        area: area,
                        keyword: keyword,
                        cat: work_type,
                        page: go_page

                    },
                    //crossDomain: true,
                    success: function(response) {
                        //console.log(response);

                        var html = '';
                        var obj = jQuery.parseJSON(response);

                        var result = obj.data;

                        html = '<div class="row">';
                        html += '<div class="col-md-12">';


                        $.each(result, function(index, data){

                            var DESCRIPTION         = data['DESCRIPTION'];          //職務說明
                            var JOB                 = data['JOB'];                  //職務名稱
                            var JOBCAT_DESCRIPT     = data['JOBCAT_DESCRIPT'];      //職務類別
                            var JOBSKILL_ALL_DESC   = (data['JOBSKILL_ALL_DESC'] != '') ? data['JOBSKILL_ALL_DESC'] : '';    //工作技能
                            var JOB_ADDRESS         = data['JOB_ADDRESS'];          //職務工作地點
                            var JOB_ADDR_NO_DESCRIPT = data['JOB_ADDR_NO_DESCRIPT']; //職務工作地區
                            var NAME                = data['NAME'];                 //公司名
                            var OTHERS              = (data['OTHERS'] != '') ? data['OTHERS'] : '';               //其他條件
                            var PCSKILL_ALL_DESC    = (data['PCSKILL_ALL_DESC'] != '') ? data['PCSKILL_ALL_DESC'] : '';     //電腦技能描述
                            var WELFARE             = (data['WELFARE'] != '') ? data['WELFARE'] : '';              //公司福利制度

                            html += '<div class="panel panel-primary">';
                            html += '<table class="table table-bordered">';

                            html += '<tr class="info">';
                            html += '<td width="20%">公司名</td>';
                            html += '<td width="80%">'+NAME+'</td>';
                            html += '</tr>';

                            html += '<tr class="info">';
                            html += '<td>職務名稱</td>';
                            html += '<td>'+JOB+'</td>';
                            html += '</tr>';

                            html += '<tr>';
                            html += '<td>職務說明</td>';
                            html += '<td>'+DESCRIPTION+'</td>';
                            html += '</tr>';

                            html += '<tr>';
                            html += '<td>職務類別</td>';
                            html += '<td>'+JOBCAT_DESCRIPT+'</td>';
                            html += '</tr>';

                            html += '<tr class="info">';
                            html += '<td>職務工作地點</td>';
                            html += '<td>'+JOB_ADDR_NO_DESCRIPT+'  '+JOB_ADDRESS+'</td>';
                            html += '</tr>';

                            html += '<tr>';
                            html += '<td>工作技能</td>';
                            html += '<td>'+JOBSKILL_ALL_DESC+'</td>';
                            html += '</tr>';

                            html += '<tr>';
                            html += '<td>電腦技能描述</td>';
                            html += '<td>'+PCSKILL_ALL_DESC+'</td>';
                            html += '</tr>';

                            html += '<tr>';
                            html += '<td>公司福利制度</td>';
                            html += '<td>'+WELFARE+'</td>';
                            html += '</tr>';

                            html += '<tr>';
                            html += '<td>其他條件</td>';
                            html += '<td>'+OTHERS+'</td>';
                            html += '</tr>';

                            html += '</table>';
                            html += '</div>';


                            $("#result_box").append(html);

                        });



                       html2 = '</div>';
                        html2 += '</div>';

                        html2 += '<div class="row">';
                        html2 += '   <div class="col-md-12">';
                        html2 += '       <nav>';
                        html2 += '           <ul class="pager">';

                        if(go_page>1) {
                            html2 += '               <li><a class="pre">上一頁</a></li>';
                        } else {
                            html2 += '               <li class="disabled"><a class="pre">上一頁</a></li>';
                        }
                        html2 += '               <li><a class="next">下一頁</a></li>';
                        html2 += '           </ul>';
                        html2 += '       </nav>';
                        html2 += '      </div>';
                        html2 += '</div>';

                        $("#result_box").append(html2);
                        //alert("SUCCESS!!!");

                        $(".pre").click(function(){
                            go_page = go_page-1;
                            //console.log("[pre] " + go_page);
                            $("#search_btn").click();
                        });

                        $(".next").click(function(){
                            go_page = go_page+1;
                            //console.log("[next] " + go_page);
                            $("#search_btn").click();
                        });
                    },
                    error: function() {
                        alert("ERROR!!!");
                    }
                });
            });



        });
    </script>
</html>
