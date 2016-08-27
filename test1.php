<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jQuery UI Droppable - Default functionality</title>
    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <style>

        #flat{
            z-index:-1;
            position:relative;
            padding:0;
            background-color: antiquewhite;
            border-style:solid;
            border-width: 1px;
            margin: 1rem 1rem 1rem 1rem;
            height:50rem;
            width:80%;
        }
        #waveform{
            position:relative;
            background-image: url("tile.png");
            background-size:0.93rem;
            background-repeat: repeat-x;
            width:100%;
            height:16%;
            z-index: 10;
        }
        #seconds{
            margin: 0;
            padding: 0;
            float:left;
        }
        #bar{
            top:0px;
            z-index: 1000;
            position:absolute;
            left:0rem;
            border-style:solid;
            border-width: 1px;
            height:100%;
            width:0px;
        }
        .playlist{
            position:relative;
            float:right;
            height:1000px;
            width:330px;
            background-color: aquamarine;
            padding-top:50px;
        }

        .raw-audio{
            position:relative;
            height:100px;
            width:300px;
            background-color: dimgray;
            margin-bottom:10px;

            opacity: 0.8;
            z-index: 10;
            padding: 0.5em;
            float: left;

            background-image: url("waves/waveform1.png");

        }


    </style>
    <script>

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

        function barProcess(increase){
            _increase = parseInt(increase) + 1;
            $("#bar").css("left", _increase/100+"rem");
            timeout = setTimeout("barProcess('"+_increase+"')", 10);
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
        $(function() {
            /*for(var i =0;i<3000;i++){
             $("#flat").append(
             '<div class="droppable-8 ui-widget-header"> <p></p></div>');
             };*/

            $("#draggable-1").draggable ({
                axis : "x"
            });

            $( "#draggable-2" ).draggable();
            $( "#draggable-3" ).draggable();
            $( "#draggable-4" ).draggable();
            $( "#draggable-5" ).draggable();


            /*$( ".droppable-8" ).droppable({/!*
             tolerance: 'touch',*!/
             drop: function( event, ui ) {
             $( this )
             .addClass( "ui-state-highlight" )
             .find( "div" )
             .html( "Dropped with a touch!" );
             }
             });*/
        });

        function reset(){
            _increase = null;
            $("#bar").css("left", "0");
            document.getElementById("button").value = "start";
            clearTimeout(timeout);
        }
    </script>
</head>
<body>

<div class="playlist">
    <div id="draggable-1" class="raw-audio">

    </div>
    <div id="draggable-2" class="raw-audio">

    </div>
    <div id="draggable-3" class="raw-audio">

    </div>
    <div id="draggable-4" class="raw-audio">
    </div>
</div>



<div id="seconds">
    <a style="margin-left:2rem">1</a>
    <a style="margin-left:1rem">2</a>
    <a style="margin-left:5rem">2:00</a>
    <a style="margin-left:5rem">2:30</a>
    <a style="margin-left:5rem">3:00</a>
    <a style="margin-left:5rem">3:30</a>
    <a style="margin-left:5rem">4:00</a>
</div>
</br>
<input type="button" value="start" id="button" onclick="bar(0)">
<input type="button" value="reset" id="reset-button" onclick="reset()">
<div id="flat">
    <div id="waveform">
    </div>
    <div id="waveform">
    </div>
    <div id="waveform">
    </div>
    <div id="waveform">
    </div>
    <div id="bar">
    </div>
</div>
<div>
    <p id="left"></p>
    <p id="left-div"></p>
</div>

<!-- Draggable with coordinates -->
<div id="draggable-5" class="raw-audio" onmouseup="test();">
    sadasd
</div>


</body>
</html>