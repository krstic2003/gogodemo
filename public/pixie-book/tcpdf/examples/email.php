<?php
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



//**************** PDF 1

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Certification Signature (experimental)
 * @author Nicola Asuni
 * @since 2009-05-07
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, 'mm', 'A4', true, 'UTF-8', false);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(5, 5, 5);
$pdf->SetHeaderMargin(5);
$pdf->SetFooterMargin(5);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

/*
NOTES:
 - To create self-signed signature: openssl req -x509 -nodes -days 365000 -newkey rsa:1024 -keyout tcpdf.crt -out tcpdf.crt
 - To export crt to p12: openssl pkcs12 -export -in tcpdf.crt -out tcpdf.p12
 - To convert pfx certificate to pem: openssl pkcs12 -in tcpdf.pfx -out tcpdf.crt -nodes
*/

// set certificate file
//$certificate = 'file://data/cert/tcpdf.crt';

// set additional information
$info = array(
	'Name' => 'Rakije Vesic',
	'Location' => 'Office',
	'Reason' => 'Testing',
	'ContactInfo' => 'http://www.rakijevesic.com',
	);

// set document signature
//$pdf->setSignature($certificate, $certificate, 'tcpdfdemo', '', 2, $info);

// set font
$pdf->SetFont('freeserif', '', 10);
$pdf->SetCellPadding(1);

// add a page
$pdf->AddPage();

// print a line of text
$text = html_entity_decode($_POST["html_pdf"]);
$pdf->writeHTML($text, true, 0, true, 0);




// define active area for signature appearance


// ---------------------------------------------------------

ob_end_clean();

//Close and output PDF document

$file_n = str_replace("/", "-", $_POST["fak_br"]);


$pdf->Output(__DIR__ . '/pdf/faktura-'.$file_n.'.pdf', 'F');
$pdf->Output('faktura-'. $file_n.'.pdf', 'D');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once(__DIR__.'/mail/Exception.php');
require_once(__DIR__.'/mail/PHPMailer.php');
require_once(__DIR__.'/mail/SMTP.php');

$mail = new PHPMailer();                    
$mail->From = "krstic2003@gmail.com";
$mail->FromName = "Rakije Vesic";
$mail->AddAddress($_POST["email"]);
//$mail->AddReplyTo("email@gmail.com", "Your name");               
$mail->AddAttachment(__DIR__ . '/pdf/faktura-'.$file_n.'.pdf');      
// attach pdf that was saved in a folder
$mail->Subject = "Faktura " . $file_n;                  
$mail->Body = "Postovani, u prilogu je Vasa faktura.";
if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
   echo "Message sent";
} //`the end`

//============================================================+
// END OF FILE
//============================================================+
