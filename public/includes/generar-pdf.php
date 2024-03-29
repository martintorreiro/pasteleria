<?php
  require_once '../../vendor/dompdf/autoload.inc.php';
    
  use Dompdf\Dompdf;

function creaPdf($pdf){
 // instantiate and use the dompdf class
 $dompdf = new Dompdf();
 $dompdf->loadHtml($pdf);
 
 // (Optional) Setup the paper size and orientation
 $dompdf->setPaper('A4', 'landscape');
 
 // Render the HTML as PDF
 $dompdf->render();
 
 // Output the generated PDF to Browser
 /* $dompdf->stream(); */
 
 return $dompdf->output();
}
    
   