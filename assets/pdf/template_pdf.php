<?php
//En los comentarios del código para descargar
//están explicadas a detalle las siguientes líneas
    ob_start();
    include(dirname(__FILE__).'/pdf/vistas/pdf_blanco.php');
    $content = ob_get_clean();
 
    //Se obtiene la librería
    require_once(dirname(__FILE__).'html2pdf.class.php');
 
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 3);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
        $html2pdf->Output('exemple03.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>