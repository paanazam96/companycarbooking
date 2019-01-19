<!DOCTYPE html>
<html>
    <head>
        <title>Carpool Booking System</title>
       
        <meta charset='utf-8' />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        
        <link rel="stylesheet" href="css/styleindexcal.css">
        <style>
            body {
                background-image: url("imgs/9.jpg");
                background-size: cover;
            }
        </style>
        
        <script>
            $(document).ready(function() {
                var $months = $('#months');
                var $calendar = $('#calendar');

                $calendar.fullCalendar({
                    eventTextColor: "black",
                    eventBackgroundColor: "yellow",
                    firstDay: 1,
                    eventBorderColor: "black",
                    height: 680,
                    editable:false,
                    header:{
                        left: 'title',
                        center: 'false', 
                        right: 'today prev,next',
                    },
                    events: 'calendarload.php',
                    viewRender: function() {
                        buildMonthList();
                    },
                    eventRender: function(event, element) { 
                        //element.find('.fc-title').append(" | " + event.staffid);
                        element.find('.fc-title').append(" <b>(" + event.status + ")<b>");
                    } 
                });
                //calendar dropdown list
                $('#months').on('change', function() {
                    $calendar.fullCalendar('gotoDate', $(this).val());
                });

                buildMonthList();

                function buildMonthList() {
                    $('#months').empty();
                    var month = $calendar.fullCalendar('getDate');
                    var initial = month.format('YYYY-MM');
                    month.add(-6, 'month');
                    for (var i = 0; i < 13; i++) {
                        var opt = document.createElement('option');
                        opt.value = month.format('YYYY-MM-01');
                        opt.text = month.format('MMM YYYY');
                        opt.selected = initial === month.format('YYYY-MM');
                        $months.append(opt);
                        month.add(1, 'month');
                    }
                }
                //calendar dropdown list
            });
        </script>
        <script>
            history.pushState(null, null, location.href);
            window.onpopstate = function () {
                history.go(1);
            };
        </script>
        <script type="text/javascript" src="date_time.js"></script>
    </head>
    <body>
        <div class="container">
            <center> 
                <div class="row">
                    <div class="col">
                       <img src="imgs/Untitled-1.png" style="width:200px; height:150x;">
                    </div>
                    <div class="col-6">
                        <h1 style="font-family:verdana;"><i>Carpool Booking System</i></h1>
                    </div>
                    <div class="col-3">
                        <span id="date_time"></span>
                        <script type="text/javascript">window.onload = date_time('date_time');</script>
                    </div>
                </div>
            </center>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="bookingform.php">Book Now!</a></li>
                <li style="float:right" class="active"><a href="login.php">Login</a></li>
            </ul>
        </div>
        <!-- calendar -->
        <div class="container">
            <div class="month">
                <label for='months'>Jump to</label>
                <select id='months'></select>
            </div>
            <div id="calendar"></div>
        </div>
        <!-- calendar -->
        <center>&copy;<?php echo date("Y");?> Selia Selenggara Engineering</center>
        <br>
        <div id="footer">
        <center>
            Photo by @rawpixel on <a href="https://unsplash.com/photos/CQB5J0hZC5U">Unsplash.com</a>
        </center>
        </div>
    </body>
</html>