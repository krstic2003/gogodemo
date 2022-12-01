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
$pdf = new TCPDF('landscape', 'mm', 'A3', true, 'UTF-8', false);

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

$pdf->Output('prenosnica-'. $_POST["fak_br"].'.pdf', 'D');


//============================================================+
// END OF FILE
//============================================================+
