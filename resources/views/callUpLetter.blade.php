<?php 
include 'fpdf/fpdf.php'; //adding the pdf package
$date = " Thursday, April 21, 2020";
$OfficerInCharge = " State Co-Ordinator";

if ($user) {
	$stateOrientationCamp = $user->StateofDeployment;
	switch ($stateOrientationCamp) {
    case 'Kaduna':
         $address = 'Kaduna Orientation Camp';
        break;
    case 'Kano':
         $address = 'kano Orientation Camp';
        break;
    case 'Katsina':
         $address = 'Katsina Orientation Camp';
        break;
    case 'Lagos':
         $address = 'Lagos Orientation Camp';
        break;
    case 'Ekiti':
         $address = 'Ekiti Orientation Camp';
        break;
    case 'Taraba':
         $address = 'Taraba Orientationv Camp';
        break;
    case 'Adamawa':
         $address = 'Adamawa Orientationv Camp';
        break;
    case 'Fct':
         $address = 'Fct Orientation Camp';
        break;
    case 'Yobe':
         $address = 'Yobe Orientation Camp';
        break;
    case 'Nassarawa':
         $address = 'Nassarawa Orientation Camp';
        break;
    case 'Bauchi':
         $address = 'Bauchi Orientation Camp';
        break;
    case 'Ogun':
         $address = 'Ogun Orientation Camp';
        break;
    case 'Ondo':
         $address = 'Ondo Orientation Camp';
        break;
    case 'Osun':
         $address = 'Osun Orientation Camp';
        break;
    case 'Borno':
         $address = 'Borno Orientation Camp';
        break;
    case 'Zamfara':
         $address = 'Zamfara Orientation Camp';
        break;
    case 'Rivers':
         $address = 'Rivers Orientation Camp';
        break;
    case 'Niger':
         $address = 'Niger Orientation Camp';
        break;
    case 'Sokoto':
         $address = 'Sokoto Orientation Camp';
        break;
    case 'Oyo':
         $address = 'Oyo Orientation Camp';
        break;
    case 'Delta':
         $address = 'Delta Orientation Camp';
        break;
    case 'Ebonyi':
         $address = 'Ebonyi Orientation Camp';
        break;
    case 'Cross Rivers':
         $address = 'Cross Rivers Orientation Camp';
        break;
    case 'Benue':
         $address = 'Benue Orientation Camp';
        break;
    case 'Bayelsa':
         $address = 'Bayelsa Orientation Camp';
        break;
    case 'Anambra':
         $address = 'Anambra Orientation Camp';
        break;
    case 'Akwa Ibom':
         $address = 'Akwa Ibom Orientation Camp';
        break;
    case 'Kebbi':
         $address = 'Kebbi Orientation Camp';
        break;
    case 'Plateau':
         $address = 'Plateau Orientation Camp';
        break;
    case 'Jigawa':
         $address = 'Jigawa Orientation Camp';
        break;
    case 'Kwara':
         $address = 'Kwara Orientation Camp';
        break;
    case 'Kogi':
         $address = 'Kogi Orientation Camp';
        break;
    case 'Imo':
         $address = 'Imo Orientation Camp';
        break;
    case 'Gombe':
         $address = 'Gombe Orientation Camp';
        break;
    case 'Enugu':
         $address = 'Enugu Orientation Camp';
        break;
    case 'Rivers':
         $address = 'Rivers Orientation Camp';
        break;    
    default:
         $address = 'NYSc Orientation Camp';
        break;
}


$pdf = new FPDF();
$pdf->AddPage();
//setfont(name, type, font-size);
$pdf->SetFont('Times','B', 20);
$pdf->SetTextColor(76, 175, 80);
$pdf->Cell(0, 20, 'NATIONAL YOUTH SERVICE CORPS', 0, 1, 'C');

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Times','', 14);
$pdf->Cell(0, 4, 'National Headquarters, Yakubu Gowon House', 0, 1, 'C');

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Times','', 12);
$pdf->Cell(0, 10, 'Plot 416 Tigris Cresents, off Aguyi Ironsi Street, Maitama, Abuja', 0, 1, 'C');

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Times','B', 18);
$pdf->Cell(0, 6, 'BATCH A, 2020 Call-Up Letter', 0, 1, 'C');


$pdf->Image('images/download.jpg', 13, 13, 25); //left
$pdf->Image('images/download.jpg', 168, 13, 25); //right


$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Times','B', 28);
$pdf->Cell(40, 26, " "." ".'A', 0, 10, 'L');

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Times','', 12);
$pdf->Cell(40, 7, "Surname: "." "." "." "." "." ". " "." ". " ". " "." "." ". ""." "." "." "." ". " "." "." "." "." ".$user->lname , 0, 10);
$path = public_path().'/storage/passport/';
$filePath = $path.$user->photo;
if (file_exists($filePath)) {
    $pdf->Image($filePath, 148, 79, 25); //users

}


$pdf->Cell(40, 5, "Other Names: "." "." "." "." "." ". " "." ". " ". " "." "." ". ""." "." ". $user->fname. " ". " ". $user->mname , 0, 10);

$pdf->Cell(40, 5, "Call-Up No.: "." "." "." "." "." ". " "." ". " ". " "." "." ". ""." "." "." "." ".$user->Callupnumber , 0, 10);

$pdf->Cell(40, 5, "State of Origin: "." "." "." "." "." ". " "." ". " ". " "." "." ". "". $user->state , 0, 10);

$pdf->Cell(40, 5, "Gender: "." "." "." "." "." ". " "." ". " ". " "." "." ". " ". " "." "." "." "." "." "." "." "." "." "." ".$user->gender , 0, 7);


$pdf->Cell(40, 5, "Institution: "." "." "." "." "." ". " "." ". " ". " ". " "." "." "." "." "." "." " ." "." ". $user->school, 0, 10);

$pdf->Cell(40, 5, "Course: "." "." "." "." "." ". " "." ". " ". " "." "." "." "." "." "." "." "." "." "." "." "." "." ". " ".$user->course , 0, 10);

$pdf->Cell(40, 5, "Date Graduated: "." "." "." "." "." ". " "." ". " ". " ".$user->year , 0, 10);


//$pdf->SetFont('Times','', 12);
$pdf->SetTextColor(76, 175, 80);
$pdf->SetFont('Times','', 12);
$pdf->Cell(0, 13, 'Dear Compatriot,', 0, 1, 'L');

//$pdf->SetFont('Times','', 20);
$pdf->SetTextColor(76, 175, 80);
$pdf->SetFont('Times','', 12);
$pdf->Cell(0, 5, 'I am happy to inform you that by the provision of NYSC Act Cap N84 of the laws of the Federation', 0, 1, 'L');
$pdf->Cell(0, 5, 'of Nigeria 2004, arrangements have been completed for you to participate in the National Youth', 0, 1, 'L');
$pdf->Cell(0, 5, 'Service Corps Scheme for One Calendar Year and you should report as follows ', 0, 1, 'L');


$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Times','', 12);
$pdf->Cell(40, 7, "State Of Deployment: "." "." "." "." "." ". " "." ". " ". " ". " "." "." "." "." "." "." "." "." "." "." "." "." "." ". $user->StateofDeployment , 0, 10);

$pdf->Cell(40, 7, "Date Of Reporting: "." "." "." "." "." ". " "." ". " ". " "." "." "." "." ". " ". " "." ". " ". " "." ". " "." "." ". " "." "." ". " ".ucfirst($date), 0, 10);

$pdf->Cell(40, 7, "Officer-In-Charge: "." "." "." "." "." ". " "." ". " ". " ". " "." ". " "." "." "." "." "." "." "." "." "." "." "." "." "." "." "." ".ucfirst($OfficerInCharge), 0, 10);

$pdf->Cell(40, 7, "State Orientation Camp: "." "." "." "." "." ". " "." ". " ". " " . " "." "." "." "." "." "." "." "." "." ". ucwords($address) , 0, 10);





$pdf->Image('images/sign.png',165, 255,20);
// $pdf->SetTextColor(0, 0, 0);
// $pdf->SetFont('Times','I', 12);
// $pdf->Cell(0, 89, 'Rtd. Kazure', 0, 1, 'R');

$pdf->Output();
exit();

}else {
     $pdf = new FPDF();
     $pdf->AddPage();
    $pdf->Image('images/download.jpg', 168, 13, 25); //right
    $pdf->SetFont('Times','B', 22);
    $pdf->SetTextColor(255, 0, 0);
    $pdf->Cell(0, 100, 'Please Register before proceeding to print Call-Up Letter', 0, 1, 'L');
    $pdf->Output();
    exit();

}

 
?>