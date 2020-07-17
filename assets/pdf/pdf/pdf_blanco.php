<?php

    include('../../controller/template/funciones_template.php');
    include('../../controller/circulares/funciones_circulares.php');
    include('../../controller/funciones.php');
    include('../../model/bandeja/fill_circular.php');
    $id_circular = $_GET['id'];
    $visto = $_GET['visto'];
    $circular = fill_circular($id_circular);
    $status_circular = fill_status_circular($id_circular); 
    $enviadoa = fill_enviadoa($status_circular);
    $recibidopor = fill_recibidopor($status_circular);
    $vistopor = fill_vistopor($status_circular);
 
    $total_peso = $total_archivos = $total = 0;
    $file = array();
    if($circular['ruta']!= '')
    {
        $ruta = '../../'.$circular['ruta'];
        $directorio = opendir($ruta); //ruta actual
        $total_archivos = count(glob($ruta.'/{*.pdf}',GLOB_BRACE));
        $archivo = array_diff(scandir($ruta), array('..', '.'));
        
        $i = 1;
        foreach ($archivo as $value) 
        {
            if (!is_dir($value))//verificamos si es o no un directorio
            {
                $files[$i]['name'] = $value;
                $files[$i]['link'] = $circular['ruta'].'/'.$value;
                 $size =filesize($ruta.'/'.$value);
                 $total = $total + round($size/pow(1024, 2), 2);        
                $i++;
            }
        }
    }
    if($visto == '')
    {
        date_default_timezone_set('America/Monterrey');
        $fecha_visto = date('Y-m-d H:i:s');
        update_visto($id_circular, $_SESSION['id_usuario'], $fecha_visto);
    }
    $template = get_template_usuario($circular['id_emisor']);

	//ob_start guardará en un búfer lo que esté
	//en la ruta del include.
	ob_start();
    //include(dirname(__FILE__).'/vistas/pdf_blanco.php');
    //En una variable llamada $content se obtiene lo que tenga la ruta especificada
    //NOTA: Se usa ob_get_clean porque trae SOLO el contenido
    //Evitará este error tan común en FPDF:
    //FPDF error: Some data has already been output, can't send PDF
    $content = $_GET['contenido'];

    //Se obtiene la librería
    require_once(dirname(__FILE__).'/../html2pdf.class.php');
    /* Las lineas siguientes siempre serán las mismas
     * A mi parecer no hay mucho que explicar. Se explican
     * por sí solas :D
     * */
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 3); //Configura la hoja
        $html2pdf->pdf->SetDisplayMode('fullpage'); //Ver otros parámetros para SetDisplaMode
        $html2pdf->writeHTML($content); //Se escribe el contenido 
        $html2pdf->Output('mipdf.pdf'); //Nombre default del PDF
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>
