
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script type="text/javascript" src="js/jquery.tinyMap-3.3.15.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtet_o6-UU8Q90HL7sb30ZM6NGvem6D6M" type="text/javascript"></script>
</head>

<style>
    .map_window {
        width: 95vw;
    }

    .map {
        width: 640px;
        height: 480px;
    }

    .edit_box {
        margin-left: 15px;
        margin-top: 15px;
        padding: 10px;
    }

    .edit_item {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .edit_input_label {
        margin-right: 10px;
        display: inline;
    }

    .edit_input {
        display: inline;
        width: 300px;
    }

</style>

<body>

    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="map_window">
                <div class="map"></div>
            </div>
            <div class="edit_box">
                <div class="edit_item">
                    <label class="edit_input_label">店名：</label><input type="text" id="store_name" class="edit_input">
                </div>
                <div class="edit_item">
                    <label class="edit_input_label">地址：</label><input type="text" id="store_address" class="edit_input">
                </div>
                <!--<div class="edit_item">
                    <label class="edit_input_label">種類：</label><input type="text" id="store_type" class="edit_input">
                </div>-->
                <div class="edit_item">
                    <button type="button" id="add_record">新增店家</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>



<script type="text/javascript">

    $(document).ready(function() {
        /*$('.map').tinyMap({
            'center': '台北市大安區忠孝東路四段142號',
            'zoom'  : 14
        });*/


        $('.map').tinyMap({
            'center': ['25.034516521123315','121.56496524810791'],
            'zoom'  : 16,
            'autoLocation': function (loc) {
                $('.map').tinyMap('modify', {
                    'marker': [{
                        'addr': [
                            loc.coords.latitude,
                            loc.coords.longitude
                        ],
                        'text': '<strong>您的位置</strong>',
                        'newLabel': '您的位置',
                        'newLabelCSS': 'labels',
                        // 自訂外部圖示
                        'icon': {
                            'url': 'icon/pin.png',
                            'scaledSize': [36, 36]
                        },
                        // 動畫效果
                        'animation': 'DROP'
                    }]
                });
            }
        });




        $("#add_record").click(function(){

            var lat = "";
            var lng = "";
            var addr_str = lat+","+lng;

            var store_address = $("#store_address").val();
            console.log(store_address);

            $(".map").tinyMap('query', store_address, function (addr) {
                lat = addr.geometry.location.lat();
                lat = lat.toString();
                console.log(addr.geometry.location.lat()); // Latitude
                lng = addr.geometry.location.lng();
                lng = lng.toString();
                console.log(addr.geometry.location.lng()); // Longitude

                addr_str = lat+","+lng;
                console.log("123 "+addr_str);

                //$(".map").tinyMap('clear');

                $(".map").tinyMap('modify', {
                    //'center': addr_str,
                    'zoom': 14,
                    'marker': [
                        {
                            'addr': addr_str,
                            'text': '<strong>'+store_address+'</strong>',
                            'newLabel': store_address,
                            'newLabelCSS': 'labels',
                            // 自訂外部圖示
                            'icon': {
                                'url': 'icon/map3.png',
                                'scaledSize': [32, 42]
                            },
                            // 動畫效果
                            'animation': 'DROP'
                        }
                    ]
                });

                $(".map").tinyMap('panTo', addr_str);
            });



            //var addr_str = lat+","+lng;
            /*console.log(addr_str);
            console.log($.type(addr_str));*/


        });

    });
</script>
