<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jQuery UI Droppable - Default functionality</title>
    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <style>

        #draggable-5 {
            opacity:0.5;
            z-index: 10;
            width: 100px; height: 50px; padding: 0.5em; float: left;
            margin: 22px 5px 10px 0;
        }/*
        .droppable-8 {
            width: 1px; height: 1000px;padding: 0.5em; float: left;
            margin: 10px;
        }*/
        .droppable-8 {
            width: 2px; height: 1000px;float: left;

        }

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

            var p = $("#draggable-5");
            var position = p.position();

            var d = $("#flat");
            var dposition = d.offset();

            var left = position.left - dposition.left;

            $("#left").text("left : "+ position.left);
            $("#left-div").text("left - div : "+ left);
        }
        $(function() {
            /*for(var i =0;i<3000;i++){
             $("#flat").append(
             '<div class="droppable-8 ui-widget-header"> <p></p></div>');
             };*/

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



<div id="draggable-5" class="ui-widget-content" onmouseup="test(0);">
    <p>Guitar_1</p>
</div>
<!--
<div class="droppable-8">
    <p>Drop here</p>
</div>
<div class="droppable-8">
    <p>Drop here</p>
</div>-->

</body>
</html>