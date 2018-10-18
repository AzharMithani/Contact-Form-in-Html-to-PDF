<?php
require_once 'dompdf/autoload.inc.php';


use Dompdf\Dompdf;



$document = new Dompdf();


$output = "
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='css/bootstrap.css'/>
	</head>
<body>
<table class='table table-bordered'>
	<thead class='alert-info'>
		<tr>
			<th>Firstname</th>
			<th>Middlename</th>
			<th>Lastname</th>
			<th>Address</th>
			<th>Civil Status</th>
		</tr>
	</thead>
";

require_once 'conn.php';

$query = $conn->query("SELECT * FROM `member` ORDER BY `lastname` ASC") or die($conn->error());

while($fetch = $query->fetch_array()){
	
$output .= '
	<tbody style="background-color:#fff;">	
		<tr>
			<td>'.$fetch['firstname'].'</td>
			<td>'.$fetch['middlename'].'</td>
			<td>'.$fetch['lastname'].'</td>
			<td>'.$fetch['address'].'</td>
			<td>'.$fetch['civil_status'].'</td>
		</tr>
	</tbody>
';

}


$output .= '</table></body></html>';

$document->loadHtml($output);

$document->setPaper('A4', 'landscape');

$document->render();

$document->stream("AzharPDF", array("Attachment"=>0));

?>
