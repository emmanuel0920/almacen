<?php
include("../../model/tramites/fill.php");
$id_tramite = $_GET['tramite'];
$detalles_tramite = detalle_tramite($id_tramite);
$requisitos = fill_requisitos($id_tramite);
$tr_requisitos = "";
foreach ($requisitos as $requisito) 
{
  $tr_requisitos.='<tr>
                    <td class="90c">'.$requisito['requisito'].'</td>
                    <td class="5c">&#8226;</td>
                    <td class="5c">'.$requisito['copia'].'</td>
                  </tr>
                  '; 
}
//============================================================+
// File name   : example_003.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 003 for TCPDF class
//               Custom Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Custom Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        
        $image_file = K_PATH_IMAGES.'jm.png';
        $this->Image($image_file, 17, 10, 35, '', 'PNG', '', 'T', false, 360, '', false, false, 1, false, false, false);

        // Set font
        
        // Title
        $cabeza = '<table>
                     <tr>
                      <td>Presidencia Municipal de Jesús María</td>
                     </tr>

                     <tr>
                      <td>Gobierno Municipal 2019 - 2021</td>
                     </tr>

                     <tr>
                      <td>DEPENDENCIA</td>  
                     </tr>
                    </table>';
        
        $this->SetFont('dejavuserifi', 'B', 13);

        $this->writeHTMLCell('', '', '', 23, $cabeza, $border=0, $ln=2, $fill=0, $reseth=true, $align='C', $autopadding=true);
        //$this->Cell(w, h = 0, txt = '', border = 0, ln = 0, align = '', fill = 0, link = nil, stretch = 0, ignore_min_height = false, calign = 'T', valign = 'M');
         $this->SetTopMargin(50);

    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        $this->SetX(40);
        // Set font
        $this->SetFont('dejavuserifi', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
//$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Trámite');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------

// add a page
$pdf->AddPage();

// set some text to print
$html_1 = '

  <style>
      td.c-1 {
          color: white;
          background-color: #0a56ab;
          width: 40%;
          font-family: dejavuserif;
          font-size: 11pt;
      }

      td.c-2{
          background-color: #9cbbdd;
          width: 60%;
          font-family: dejavuserif;
          font-size: 11pt;
      }

      table.border{
        border-style: solid solid solid solid; 
        border-width: 1px 1px 1px 1px;
        border-color: black; 
      }

      td.90c{
        width: 90%;
        border-style: solid solid solid solid; 
        border-width: 1px 1px 1px 1x;
        border-color: black;    
      }

      td.5c{
        width: 5%; 
        text-align: center;
        border-style: solid solid solid solid; 
        border-width: 1px 1px 1px 0px;
        border-color: black;
      }

      tr.primero{
        background-color: white;
      }

      tr.segundo{
        background-color: #9cbbdd;
      }

      .palomita::before {
        content: "(\2713)";
      }

  </style>

  <table cellpadding="4" cellspacing="6">

    <tr>
      <td class="c-1">DEPENDENCIA</td>  
      <td class="c-2" align="left">'.$detalles_tramite['secretaria'].'</td>
    </tr>

    <tr>
      <td class="c-1">TITULAR</td>  
      <td class="c-2" align="left">'.$detalles_tramite['titular'].'</td>
    </tr>

    <tr>
      <td class="c-1">NOMBRE DEL TRÁMITE</td>   
      <td class="c-2"align="left">'.$detalles_tramite['nombre'].'</td>
    </tr>

    <tr>
      <td class="c-1">Clave</td>    
      <td class="c-2" align="left">'.$detalles_tramite['clave'].'</td>
    </tr>

    <tr>
      <td class="c-1">Usuarios</td> 
      <td class="c-2"align="left">'.$detalles_tramite['usuarios'].'</td>
    </tr>

    <tr>
      <td class="c-1">Documento o servicio que se obtiene</td>  
      <td class="c-2" align="left">'.$detalles_tramite['documento_obtenido'].'</td>
    </tr>

    <tr>
      <td class="c-1">Costo de Trámite/Servicio</td>    
      <td class="c-2" align="left">'.$detalles_tramite['costo'].'</td>
    </tr>

    <tr>
      <td class="c-1">Tiempo de Respuesta</td>    
      <td class="c-2" align="left">'.$detalles_tramite['tiempo'].'</td>
    </tr>

  </table>

  <p style="text-align: center; font-family: dejavuserif; font-size: 12pt;">LUGAR DONDE  SE REALIZA</p>

  <table cellpadding="4" cellspacing="6">

    <tr>
      <td class="c-1">Oficina Receptora</td>  
      <td class="c-2" align="left"><b>'.$detalles_tramite['oficina'].'</b></td>
    </tr>

    <tr>
      <td class="c-1">Domicilio</td>  
      <td class="c-2" align="left"><b>'.$detalles_tramite['domicilio'].'</b></td>
    </tr>

    <tr>
      <td class="c-1">Teléfono(s)</td>  
      <td class="c-2" align="left"><b>'.$detalles_tramite['telefono'].'</b></td>
    </tr>

    <tr>
      <td class="c-1">Horario de atención</td>  
      <td class="c-2" align="left"><b>'.$detalles_tramite['horario'].'</b></td>
    </tr>

    <tr>
      <td class="c-1">Oficina de resolución</td>  
      <td class="c-2" align="left"><b>'.$detalles_tramite['resolucion'].'</b></td>
    </tr>

    <tr>
      <td class="c-1">E-mail</td>  
      <td class="c-2" align="left"><b>'.$detalles_tramite['email'].'</b></td>
    </tr>

  </table>

  <div style="height: 30px;"></div>

  <table class="border" cellpadding="4">  
    <tr style="color: white; background-color: #0a56ab;">
      <th style="width:90%;">REQUISITOS</th>
      <th style="width:5%; text-align: center;">O</th>
      <th style="width:5%; text-align: center;">C</th>
    </tr>

   '.$tr_requisitos.'
  </table>

  <table>
    <tr>
      <td style="width: 1%; font-size: .8em;">(</td>
      <td style="width: 2.4%;"><img style="width: 80%;" src="../../img/checkmark/favicon-16x16.png"></td>
      <td style="width: 1%; font-size: .8em;">)</td>
      <td style="width: 30%; font-size: .45em;"><span style="font-size: 2em;"></span>EL ORIGINAL SE ENTREGARÁ PARA EL EXPEDIENTE</td>

      <td style="width: 1%; font-size: .8em;">(</td>
      <td style="width: 2.4%;"><img style="width: 80%;" src="../../img/dot/favicon-16x16.png"></td>
      <td style="width: 1%; font-size: .8em;">)</td>
      <td style="width: 50%; font-size: .45em;"><span style="font-size: 2em;"></span>EL ORIGINAL ES SÓLO PARA COTEJO, DESPUÉS SERÁ DEVUELTO AL SOLICITANTE</td>
      
      <td style="width:10%; font-size: .45em;"><span style="font-size:2em;">(</span> na <span style="font-size:2em;">)</span> NO APLICA</td>
    </tr>
  </table>

  <div style="height: 30px;"></div>
 
';

$html_2 ='

  <style>
      table.border{
        border-style: solid solid solid solid; 
        border-width: 1px 1px 1px 1px;
      }

      tr.header{
        color: white; 
        background-color: #0a56ab; 
        text-align: center;
        font-family: dejavuserif;
        font-size: 12pt;
      }

      td.letra{
        font-family: dejavuserif;
        font-size: 11pt;
        text-align: justify;
      }

  </style>

  <table class="border" cellpadding="4">
  
    <tr class="header">
      <th>
        OBSERVACIONES
      </th>
    </tr>

  <tr>
    <td class="letra">
      '.$detalles_tramite['observaciones'].'
    </td>
  </tr>
</table>

<div style="height: 30px;"></div>

  <table class="border" cellpadding="4">
    <tr class="header">
      <th>
        FUNDAMENTO JURÍDICO DEL TRÁMITE
      </th>
    </tr>

    <tr>
      <td class="letra">
        <span class="letra">'.$detalles_tramite['fundamento'].'</span>
      </td>
    </tr>
  </table>

  <div style="height: 30px;"></div>

  <table class="border">
    <tr>
      <th style="width: 50%; text-align: center; height: 175px; border-style: solid solid solid solid; border-width: 0px 1px 0px 0px;">FIRMA</th>
      
      <th style="width: 50%; text-align: center; height: 175px;">SELLO</th>
    </tr>

  </table>

  <div></div>

  <table>
    <tr>
      <td style="width: 50%; text-align: center; font-family: dejavuserif; font-size: 11pt;">
      '.$detalles_tramite['titular'].'
      </td>
    </tr>
  </table>

';

// output the HTML content
$pdf->writeHTML($html_1, true, false, true, false, '');

$pdf->AddPage();

$pdf->writeHTML($html_2, true, false, true, false, '');
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Trámite.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+