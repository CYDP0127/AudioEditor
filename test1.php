<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jQuery UI Droppable - Default functionality</title>
    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <style>
        body, html{
            margin:0;
            padding:0;
        }

        #logo img{
            position:relative;
            float:left;
            height:55px;
            margin-left:50px;
            margin-top:7px;
        }

        #flat{
            position:relative;
            padding:0;
            margin:0;
            background-color: rgb(230,233,235);
            border-style:solid;
            border-width: 1px;
            height:50rem;
            width:3000px;
            left: 301px;
            top:53px;
        }
        #tile{
            position:relative;
            background-image: url("tile.png");
            background-size:16px;
            background-repeat: repeat-x;
            width:100%;
            height:125px;
            z-index: 10;
        }

        #seconds{
            float:left;
        }

        #bar{
            position:absolute;
            top:0;
            left:0;
            z-index: 1000;
            border-style:solid;
            border-width: 1px;
            height:100%;
            width:0;
            background: black;
        }
        .playlist{
            position:relative;
            float:right;
            height:1000px;
            width:330px;
            top:70px;
        }

        .options{
            position:absolute;
            float:left;
            height:1000px;
            width:300px;
            top:70px;
            background:rgb(232,235,237);
        }


        #buttons{
            z-index: 1;
            position:absolute;
            bottom:0;
            width:100%;
            height:100px;
            background: whitesmoke;
        }

        #buttons #buttons-align{
            vertical-align:center;
            text-align: center;
            line-height: 100px;
        }

        .raw-audio {
            position: relative;
            background-image: url("waves/waveform1.png");
            background-repeat:no-repeat;
            background-position:center;
            width:2844px;
            height:100px;
            background-color: #BA55D3;
            margin-top: 5px;
            margin-bottom: 9px;
            opacity: 0.9;
            z-index: 10;
            left:100px;
        }

        .raw-audio2 {
             position: absolute;
             background-image: url("waves/waveform2.png");
             background-repeat:no-repeat;
             background-position:center;
             width:507px;
             height:100px;
             background-color: #BA55D3;
             margin-top: 5px;
             margin-bottom: 9px;
             opacity: 0.9;
             z-index: 10;
         }

    </style>
    <script>
        var RemToPx = 16;
        var timeout;
        var _increase;
        function bar(tmp){
            if(document.getElementById("button").value == "start") {
                document.getElementById("button").value = "stop";
                if(_increase == null){
                    barProcess(tmp);
                }else{
                    barProcess(_increase);
                }
            }else{
                document.getElementById("button").value = "start";
                clearTimeout(timeout);
            }
        }

        function barProcess(increase) {
            _increase = parseInt(increase) + RemToPx;
            $("#bar").css("left", _increase / 10 + "px");
            timeout = setTimeout("barProcess('" + _increase + "')", 100);
        }

        function test(){
/*
            var p = $("#draggable-5");
            var position = p.position();
            var d = $("#flat");
            var dposition = d.offset();

            var left = position.left - dposition.left;


            $("#left").text("left : "+ position.left);
            $("#left-div").text("top : "+ position.top);*/
        }
        function reset(){
            _increase = null;
            $("#bar").css("left", "0");
            document.getElementById("button").value = "start";
            clearTimeout(timeout);
        }

        function collision($div1, $div2) {
            var x1 = $div1.offset().left;
            var y1 = $div1.offset().top;
            var h1 = $div1.outerHeight(true);
            var w1 = $div1.outerWidth(true);
            var b1 = y1 + h1;
            var r1 = x1 + w1;
            var x2 = $div2.offset().left;
            var y2 = $div2.offset().top;
            var h2 = $div2.outerHeight(true);
            var w2 = $div2.outerWidth(true);
            var b2 = y2 + h2;
            var r2 = x2 + w2;

            if (b1 < y2 || y1 > b2 || r1 < x2 || x1 > r2) return false;
            return true;
        }


        $(function() {
            /*for(var i =0;i<3000;i++){
             $("#flat").append(
             '<div class="droppable-8 ui-widget-header"> <p></p></div>');
             };*/

            $("#draggable-1").draggable ({
                axis : "x"

            });

            $("#draggable-2").draggable ({
                axis : "x"
            });

            $("#draggable-3").draggable ({
                axis : "x"
            });

            $("#draggable-4").draggable ({
                axis : "x"
            });

            /*$( ".droppable-8" ).droppable({/!*
             tolerance: 'touch',*!/
             drop: function( event, ui ) {
             $( this )
             .addClass( "ui-state-highlight" )
             .find( "div" )
             .html( "Dropped with a touch!" );
             }
             });*/

            var audioElement = document.createElement('audio');
            audioElement.setAttribute('src', 'song1.mp3');

          /*  var audioElement2 = document.createElement('audio');
            audioElement2.setAttribute('src', 'song2.mp3');
*/


            /*
                       // EVENT LISTENER FOR AUDIO
                        audioElement.addEventListener("load", function() {
                            audioElement.play();
                        }, true);
            */

            window.setInterval(function() {
                if(collision($('#bar'), $('#draggable-1'))){
                    audioElement.play();
                }
            }, 10);


  /*          window.setInterval(function() {
                if(collision($('#bar'), $('#draggable-2'))){
                    audioElement2.play();
                }
            }, 10);
*/
            /*
                $('.play').click(function() {
                    audioElement.play();
                });

                $('.pause').click(function() {
                    audioElement.pause();
                });*/

        });





    </script>
</head>
<body>
<div id="logo">
<img src="logo.png">
</div>
<div class="options">

    <div>
        <p>Colliding? <span id="result">false</span>
    </div>
</div>

<div class="playlist">

</div>

<!--
<div id="seconds">
    <a style="margin-left:2rem">1</a>
    <a style="margin-left:1rem">2</a>
    <a style="margin-left:5rem">2:00</a>
    <a style="margin-left:5rem">2:30</a>
    <a style="margin-left:5rem">3:00</a>
    <a style="margin-left:5rem">3:30</a>
    <a style="margin-left:5rem">4:00</a>
</div>-->
</br>

<div id="buttons">
    <div id="buttons-align">
        <input type="button" value="start" id="button" onclick="bar(0)">
        <input type="button" value="reset" id="reset-button" onclick="reset()">
    </div>
</div>

<div id="flat">
    <div id="tile">
        <div id="draggable-1" class="raw-audio">

        </div>
    </div>

    <div id="tile">
        <div id="draggable-2" class="raw-audio">

        </div>
    </div>
    <div id="tile">
        <div id="draggable-3" class="raw-audio">

        </div>
    </div>
    <div id="tile">
        <div id="draggable-4" class="raw-audio">

        </div>
    </div>

    <div id="bar">
    </div>
</div>
<div>
    <p id="left"></p>
    <p id="left-div"></p>
</div>


<!-- Draggable with coordinates -->
<!--<div id="draggable-5" class="raw-audio" onmouseup="test();">
    sadasd
</div>-->

</body>
</html>