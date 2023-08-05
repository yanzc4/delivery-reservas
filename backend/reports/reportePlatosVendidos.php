<?php 
utf8_decode('áéíóúñÁÉÍÓÚÑ');
setlocale(LC_ALL, 'es_ES');
require('../../assets/libs/fpdf/fpdf.php');
include("../db.php");
$con = conectar();
date_default_timezone_set("America/Lima");
$fechad =getdate();
$fecha="Fecha/ ".$fechad['mday']."-".$fechad['mon']."-".$fechad['year'];
function money(float $valor, string $simbolo = 'S/.'): string
{
    return $simbolo . number_format($valor, 2, '.', ',');
}

$consulta=$con->query("SELECT
p.id AS id_producto,
p.nombre AS nombre_producto,
SUM(dp.cantidad) AS total_vendido
FROM productos p
INNER JOIN detallepedido dp ON p.id = dp.id_producto
GROUP BY p.id, p.nombre
ORDER BY total_vendido DESC;");

class PDF extends FPDF
{
    // Cabecera de página
    public function Header()
    {
        $this->SetY(10);
        $this->SetFont('Arial','B',40);
        $this->SetFillColor(47,45,53);
        $this->Rect(0,0,210,30,'F');
        $this->SetTextColor(255,196,56);
        $this->SetDrawColor(255,196,56);
        $this->SetLineWidth(1.5);
        $this->Rect(10,7.5,15,15,'D');
        $this->SetX(11);
        $this->Write(11, 'B');
        $this->SetX(28);
        $this->SetFont('Arial','',16);
        $this->Write(11, 'BOOMERANG');

        $this->SetLineWidth(0.5);
        $this->Line(76, 6, 76, 22);
        $this->SetX(79);
        $this->SetFont('Arial','',9);
        $this->SetTextColor(255,255,255);
        $this->Write(0, 'Av Los Olivos de Pro 123');
        $this->Ln();
        $this->SetX(79);
        $this->Write(9, 'Lima - Peru');
        $this->Ln();
        $this->SetX(79);
        $this->Write(0, '07076');

        $this->SetLineWidth(0.5);
        $this->Line(123, 6, 123, 22);
        $this->SetX(126);
        $this->SetFont('Arial','',9);
        $this->SetTextColor(255,255,255);
        $this->Write(-18, 'Telefono: 123456789');
        $this->Ln();
        $this->SetX(126);
        $this->Write(27, 'Correo: restaurante@boomerang.com');
        $this->Ln();
        $this->SetX(126);
        $this->Write(-18, 'Web: www.rboomerang.com');
        $this->SetY(35);
        $this->Cell(0,0,'',0,0,'C',0);
    }

    // Pie de página
    public function Footer()
    {
        $this->SetFont('Arial','B',40);
        $this->SetFillColor(255,196,56);
        $this->Rect(0,277,210,20,'F');
        $this->SetY(-15);
        $this->SetFont('Arial','',16);
        $this->SetTextColor(47,45,53);
        $this->SetX(50);
        $this->Write(11, 'GRACIAS POR LEER EL REPORTE');
    }
}

$fpdf = new PDF();
$fpdf->AddPage();
$fpdf->SetFont('Arial','B',24);
$fpdf->SetTextColor(47,45,53);
$fpdf->SetMargins(10,30,20,20);
$fpdf->Write(3, 'PLATOS VENDIDOS');
$fpdf->SetFont('Arial','',14);
$fpdf->SetX(140);
$fpdf->Write(3, $fecha);
$fpdf->Ln(8);
$fpdf->SetFillColor(255,196,56);
$fpdf->SetTextColor(47,45,53);
$fpdf->SetDrawColor(255,196,56);
$fpdf->SetFont('Arial','B',14);
$fpdf->Cell(60,10,'ID',1,0,'C',1);
$fpdf->Cell(60,10,'PLATO',1,0,'C',1);
$fpdf->Cell(60,10,'VENDIDOS',1,0,'C',1);
$fpdf->Ln();

while($resultado = $consulta->fetch_assoc()) {
    $fpdf->SetFont('Arial','',14);
    $fpdf->SetDrawColor(47,45,53);
    $fpdf->SetTextColor(47,45,53);
    $fpdf->SetLineWidth(0.5);
    $fpdf->Cell(60,10,$resultado['id_producto'],'B',0,'S',0);
    $fpdf->Cell(25,10,$resultado['nombre_producto'],'B',0,'C',0);
    $fpdf->Cell(35,10,$resultado['total_vendido'],'B',0,'C',0);
    $fpdf->Ln();

}


$fpdf->Ln();
$fpdf->SetFont('Arial','',11);
$fpdf->Cell(80,8,'Prenix System',0,0,'',0);
$fpdf->Ln();
$fpdf->Cell(80,8,'Elaborado: sistema informatico',0,0,'',0);
$fpdf->Ln();
$fpdf->SetFont('Arial','B',14);
$fpdf->Cell(9,10,'TERMINOS Y CONDICIONES','B',0,'',0);
$fpdf->Ln();
$fpdf->SetFont('Arial','',11);
$fpdf->Write(7, utf8_decode('1. El reporte es propiedad del usuario y sólo se debe usar para uso interno.'));
$fpdf->Ln();
$fpdf->Write(7, utf8_decode('2. La información del usuario será confidencial y no se divulgará a terceros sin el consentimiento del usuario.'));
$fpdf->Ln();
$fpdf->Write(7, utf8_decode('3. Los términos y condiciones se regirán e interpretarán de acuerdo con las leyes del país donde está registrada la empresa.'));
$fpdf->Ln();
$fpdf->Write(7, utf8_decode('4. Al solicitar el informe generado automáticamente, el usuario acepta y se compromete a cumplir con todos los términos y condiciones establecidos en este documento.'));
$fpdf->Ln();

$user_agent = $_SERVER["HTTP_USER_AGENT"];
if(preg_match("/(android|webos|avantgo|iphone|ipod|ipad|bolt|boost|cricket|docomo|fone|hiptop|opera mini|mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",$user_agent ))
{
    $fpdf->Output('D','ventas'.$f1.'&'.$f2.'.pdf');
}
else{
    $fpdf->Output();
}

?>
