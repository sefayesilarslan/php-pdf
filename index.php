<?php 

// include autoloader
require_once 'dompdf/autoload.inc.php';


// reference the Dompdf namespace
use Dompdf\Dompdf;

ob_start();
require 'content.php';
$content=ob_get_clean();

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($content);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();


$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));

?>