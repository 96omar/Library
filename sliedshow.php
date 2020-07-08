<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Slide Show</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    </head>
    <body style="background-color: white;">
        <div class="w3-content w3-section" style="width: 1000px;">
            <img class="mySlides w3-animate-left"src="image/lib4.jpg" alt="" style="width: 100%">
            <img class="mySlides" src="image/lib5.jpg" alt="" style="width: 100%">
            <img class="mySlides" src="image/lib.jpg" alt="" style="width: 100%">
        </div>
    
        <script>
            var myIndex = 0;
            carousel();

            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                myIndex++;
                if (myIndex > x.length) {
                    myIndex = 1
                }
                x[myIndex - 1].style.display = "block";
                setTimeout(carousel, 5000);
            }
        </script>

    </body>
</html>
