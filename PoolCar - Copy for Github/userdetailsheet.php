<?php
    session_start();
    //$staffid = $_SESSION['email'];    
    require('fpdf17/fpdf.php');
?>

<?php

    $id =$_GET['id'];
    
    $conn = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($conn, "poolcar3");
    $query = mysqli_query($conn, "select * from booking where id=$id");

    while($rows=mysqli_fetch_array($query))
    {             
        $tarikh=$rows['date'];
        $date=date('d - F - Y', strtotime($tarikh));
                        
        $usedate=date('d - F - Y [h:i A]', strtotime($rows['start_event']));
                        
        $lastusedate=date('d - F - Y [h:i A]', strtotime($rows['end_event']));
    //A4 width  : 219mm
    //default margin : 10mm each side
    //writable horizaontal : 219-(10*2)=189mm

    $pdf = new FPDF('p','mm','A4');

    $pdf -> AddPage();

    //set font to arial, bold, 14pt
    $pdf -> SetFont('Arial','B',10);
    
    //Cell (width, height, text, border, end line, [align] )

    $pdf -> Image('imgs/Untitled-1.png',10,10,-300);

    $pdf -> Cell(189, 5,'Selia Selenggara Enginering Sdn Bhd', 0, 1, 'R');//end of line
    $pdf -> Cell(189, 5,'No 170 TU2 Taman Tasik Utama,', 0, 1, 'R');//end of line
    $pdf -> Cell(189, 5, 'Ayer Keroh, 75450 Melaka', 0, 1, 'R');
    $pdf -> Cell(15, 5, 'Date : ', 0, 0);
    $pdf -> Cell(30, 5, $date, 0, 0);
    $pdf -> Cell(144, 5, 'Malaysia', 0, 1, 'R');

    $pdf -> SetFont('Times','B',16);
    $pdf -> Cell(189, 20, 'BOOKING DETAILS', 0, 1, 'C');
    $pdf -> Cell(189, 5, '', 0, 1);

    $pdf -> SetFont('Times','',12);
    $pdf -> Cell(50, 5, 'PERSONAL DETAILS', 0, 1);
    $pdf -> Cell(189, 5, '', 0, 1); //SKIP ROW

    //set font to arial, bold, 10pt
    $pdf -> SetFont('Arial','B',10);

    $pdf -> Cell(20, 5, 'Name : ', 0, 0);
    $pdf -> Cell(169, 5, $rows['name'], 0, 1);
    $pdf -> Cell(189, 5, '', 0, 1); //SKIP ROW

    $pdf -> Cell(30, 5, 'Department : ', 0, 0);
    $pdf -> Cell(157, 5, $rows['dept'], 0, 1);
    $pdf -> Cell(189, 5, '', 0, 1); //SKIP ROW

    $pdf -> Cell(15, 5, 'Email : ', 0, 0);
    $pdf -> Cell(75, 5, $rows['email'], 0, 0);
    $pdf -> Cell(22, 5, 'Telephone : ', 0, 0);
    $pdf -> Cell(25, 5, $rows['tel'], 0, 1);
    $pdf -> Cell(189, 5, '', 0, 1); //SKIP ROW
    $pdf -> Cell(189, 5, '', 0, 1); //SKIP ROW
    $pdf -> Cell(189, 5, '', 0, 1); //SKIP ROW

    $pdf -> SetFont('Times','',12);
    $pdf -> Cell(50, 5, 'BOOKING DETAILS', 0, 1);
    $pdf -> Cell(189, 5, '', 0, 1); //SKIP ROW

    $pdf -> SetFont('Arial','B',10);

    $pdf -> Cell(35, 5, 'Borrowing Date : ', 0, 0);
    $pdf -> Cell(60, 5, $usedate, 0, 0);
    $pdf -> Cell(35, 5, 'Returning Date : ', 0, 0);
    $pdf -> Cell(60, 5, $lastusedate, 0, 1); 
    $pdf -> Cell(189, 5, '', 0, 1); //SKIP ROW
       
    $pdf -> Cell(25, 5, 'No. of Day(s) : ', 0,0);
    $pdf -> Cell(10, 5, $rows['no_days'], 0,1);
    $pdf -> Cell(189, 5, '', 0, 1); //SKIP ROW
    $pdf -> Cell(189, 5, '', 0, 1); //SKIP ROW

    $pdf -> Cell(15, 5, 'Car : ', 0,0);
    $pdf -> Cell(60, 5, $rows['title'], 0,1);
    $pdf -> Cell(189, 5, '', 0, 1); //SKIP ROW

    $pdf -> Cell(25, 5, 'Destination : ', 0,0);
    $pdf -> Cell(160, 5, $rows['dest'], 0,1);
    $pdf -> Cell(189, 5, '', 0, 1); //SKIP ROW

    $pdf -> Cell(25, 5, 'Place Name : ', 0,0);
    $pdf -> Cell(160, 5, $rows['placename'], 0,1);
    $pdf -> Cell(189, 5, '', 0, 1); //SKIP ROW

    $pdf -> Cell(25, 5, 'Purpose(s) : ', 0,0);
    $pdf -> Cell(160, 5, $rows['purpose'], 0,1);
    
    $pdf -> Output();
        
    }
?>