<?php
    session_start();
    include_once("config.php");
?>
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
        
        <style>
            body {
                background-image: url("imgs/6.jpg");
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            #footer {
               bottom:0;
               width:100%;
               height:30px;   /* Height of the footer */
               background: white;
               opacity: 0.6;
            }
            #calendar {
        /* 		float: right; */
                margin: 0 auto;
                padding: 10px;
                background-color: #FFFFFF;
                opacity: 0.9;
                border: 2px solid black;
                box-shadow: 0 1px 2px #C3C3C3;
                }
            .month {
                color: black;
                text-align: center;
                background-color: #ebf1ef;
                border-left: 2px solid black;
                border-right: 2px solid black;
            }
            .fc-today {
                background: #C7EAE4 !important;
                border-top: 3px solid #0C120C !important;
                color: orangered;
                font-weight: bolder;
            }
            h1 {
                text-shadow: 2px 2px white;
            }
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                opacity: 0.9;
                overflow: hidden;
                background-color: #87E752;
                border: 2px solid black;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }

            li {
                float: left;
            }

            li a {
                display: block;
                color: black;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-weight: bold;
            }

            li a:hover:not(.active) {
                background-color: #43B929;
            }

            .active {
                background-color: #43B929;
            }
        </style>
        <script>
            $(document).ready(function() {
                var $months = $('#months');
                var $calendar = $('#calendar');
                
                var calendar = $('#calendar').fullCalendar({
                    eventTextColor: "black",
                    eventBackgroundColor: "yellow",
                    firstDay: 1,
                    eventBorderColor: "black",
                    height: 680,
                    editable:false,
                    header:{
                        left: 'title ',
                        center: false, 
                        right: 'today prev,next',
                    },
                    events: 'calendarload.php',
                    selectable:false,
                    selectHelper:true,
                    select: function(start, end, allDay)
                       //enter data
                    {
                        $.ajax({
                            data:{title:title, start:start, end:end},
                            success:function()
                            {
                                calendar.fullCalendar('refetchEvents');
                                alert("Added Successfully");
                            }
                        })
                    },

                   //delete event
                    eventClick:function(event)
                    {
                        if(confirm("Are you sure you want to delete this booking?"))
                        {
                            var id = event.id;
                            $.ajax({
                            url:"calendardelete.php",
                            type:"POST",
                            data:{id:id},
                            success:function()
                                {
                                    calendar.fullCalendar('refetchEvents');
                                    alert("Booking Removed");
                                }
                            })
                        }
                    },
                    viewRender: function() {
                        buildMonthList();
                    },
                    eventRender: function(event, element) { 
                        //element.find('.fc-title').append(" | " + event.staffid);
                        element.find('.fc-title').append(" <b>(" + event.status + ")<b>");
                    }
                });
                
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
                    <div class="col">
                        
                    </div>
                </div>
            </center>
            <ul>
                <li><a><b>WELCOME, <?php echo $_SESSION['email']; ?></b></a></li>
                <li><a href="admin.php">List of Borrowers</a></li>
                <li><a href="carslist.php">List of Cars</a></li>
                <li style="float:right" class="active"><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="container">
            <div class="month">
                <label for='months'>Jump to</label>
                <select id='months'></select>
            </div>
            <div id="calendar"></div>
        </div>
        <center>&copy;<?php echo date("Y");?> Selia Selenggara Engineering</center>
        <br>
        <div id="footer">
        <center>
            Photo by @rawpixel on <a href="https://unsplash.com/photos/CQB5J0hZC5U">Unsplash.com</a>
        </center>
        </div>
    </body>
</html>