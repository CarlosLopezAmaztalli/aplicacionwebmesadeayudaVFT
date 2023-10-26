
<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    
    // Logo
    $this->Image('imagenes/login.jpg',5,8,19);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(40);
    // Título
    $this->Cell(100,10,'Reporte del cliente datos personales',30,50,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'cn.php';


$consulta="SELECT 
paterno, materno, nombre, telefono, correo, fecha_nacimiento,
id_rol=1
FROM
mesaayuda.t_persona inner join mesaayuda.t_usuarios limit 1;";
$resultado=$mysqli->query($consulta);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
while($row =$resultado->fetch_assoc()){
    $pdf->Cell(30,10,$row['paterno'],1,1,'C',0);
    $pdf->Cell(30,10,$row['materno'],1,1,'C',0);
    $pdf->Cell(30,10,$row['nombre'],1,1,'C',0);
    $pdf->Cell(50,10,$row['telefono'],1,1,'C',0);
    $pdf->Cell(30,10,$row['correo'],1,1,'C',0);
    $pdf->Cell(30,10,$row['fecha_nacimiento'],1,1,'C',0);
}
$pdf->Output();

ob_start();

require('index.php');

$html = ob_get_clean();

echo $html;

require_once '/vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Option;
use Dompdf\Exception as DomException;
use Dompdf\Options;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$filename = generate_filename().'reporteUsuario.pdf';
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream($filename, ['Attachment' => $download]);

?>






































































