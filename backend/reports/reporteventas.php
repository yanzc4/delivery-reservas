<?php 
utf8_decode('áéíóúñÁÉÍÓÚÑ');
setlocale(LC_ALL, 'es_ES');
require('../../assets/libs/fpdf/fpdf.php');
include_once "../../inc/conexion.php";
$con = conectar();
date_default_timezone_set("America/Lima");
$fechad =getdate();
$fecha="Fecha/ ".$fechad['mday']."-".$fechad['mon']."-".$fechad['year'];
function money(float $valor, string $simbolo = 'S/.'): string
{
    return $simbolo . number_format($valor, 2, '.', ',');
}

$f1=$_POST['fechainicio'];
$f2=$_POST['fechafin'];
//consulta para mostrar los registros donde se muestra el nombre del cliente concatenado con el apellido, el id del pedido, la fecha, el subtotal, el descuento y el total
$consulta = $con->query("SELECT
p.id AS id_pedido,
CONCAT(c.nombre, ' ', c.apellido) AS nombre_cliente,
p.fecha,
SUM(dp.cantidad * dp.precio) AS monto_total_pedido
FROM pedidos p
INNER JOIN detallepedido dp ON p.id = dp.id_pedido
INNER JOIN productos pr ON dp.id_producto = pr.id
INNER JOIN clientes c ON p.id_cliente = c.id
GROUP BY p.id, c.nombre, c.apellido, p.fecha;
");


class PDF extends FPDF
{
    // Cabecera de página
    public function Header()
    {
        $this->SetY(10);
        $this->SetFont('Arial','B',40);
        $this->SetFillColor(249, 119, 119);
        $this->Rect(0,0,210,30,'F');
        $this->SetTextColor(0,0,0);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(1.5);
        $this->Rect(10,7.5,15,15,'D');
        $this->SetX(11);
        $this->Write(11, 'B');
        $this->SetX(28);
        $this->SetFont('Arial','',16);
        $this->Write(11, 'BooFast');

        $this->SetLineWidth(0.5);
        $this->Line(76, 6, 76, 22);
        $this->SetX(79);
        $this->SetFont('Arial','',9);
        $this->SetTextColor(0,0,0);
        $this->Write(0, 'Av. Los Alamos 123');
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
        $this->SetTextColor(0,0,0);
        $this->Write(-18, 'Telefono: 906 123 4567');
        $this->Ln();
        $this->SetX(126);
        $this->Write(27, 'Correo: soporteboofast@zohomail.com');
        $this->Ln();
        $this->SetX(126);
        $this->Write(-18, 'Web: www.boofast.com');
        $this->SetY(35);
        $this->Cell(0,0,'',0,0,'C',0);
    }

    // Pie de página
    public function Footer()
    {
        $this->SetFont('Arial','B',40);
        $this->SetFillColor(249, 119, 119);
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
$fpdf->Write(3, 'REPORTE DE VENTAS');
$fpdf->SetFont('Arial','',14);
$fpdf->SetX(140);
$fpdf->Write(3, $fecha);
$fpdf->Ln(8);
$fpdf->SetFont('Arial','B',14);
$fpdf->Write(7, 'DESDE: '.$f1.' HASTA: '.$f2);
$fpdf->Ln(15);
$fpdf->SetFillColor(249, 119, 119);
$fpdf->SetTextColor(47,45,53);
$fpdf->SetDrawColor(249, 119, 119);
$fpdf->SetFont('Arial','B',14);
$fpdf->Cell(50,10,'ID PEDIDO',1,0,'C',1);
$fpdf->Cell(54,10,'CLIENTE',1,0,'C',1);
$fpdf->Cell(45,10,'FECHA',1,0,'C',1);
$fpdf->Cell(40,10,'MONTO',1,0,'C',1);
$fpdf->Ln();
$ssubtotal=0;
$sdsc=0;
$stotal=0;
//mostrar los registros
while($row = $consulta->fetch_assoc()){
    $fpdf->SetFont('Arial','',12);
    $fpdf->SetTextColor(47,45,53);
    $fpdf->SetDrawColor(47,45,53);
    $fpdf->Cell(50,10,$row['id_pedido'],1,0,'C',0);
    $fpdf->Cell(60,10,$row['nombre_cliente'],1,0,'C',0);
    $fpdf->Cell(44,10,$row['fecha'],1,0,'C',0);
    $fpdf->Cell(35,10,money($row['monto_total_pedido']),1,0,'C',0);
    $fpdf->Ln();
    $ssubtotal=$ssubtotal+$row['monto_total_pedido'];
}


// $fpdf->SetDrawColor(47,45,53);
// $fpdf->Cell(109,10,'',0,0,'S',0);
// $fpdf->Cell(50,10,'SUBTOTAL','B',0,'',0);
// $fpdf->Cell(30,10,money($ssubtotal),'B',0,'',0);
// $fpdf->Ln();
// $fpdf->SetFont('Arial','B',14);
// $fpdf->Cell(109,10,'RESUMEN DE LAS VENTAS',0,0,'S',0);
// $fpdf->SetFont('Arial','',14);
// $fpdf->Cell(50,10,'DESCUENTO','B',0,'',0);
// $fpdf->Cell(30,10,money($sdsc),'B',0,'',0);
$fpdf->Ln();
$fpdf->SetDrawColor(249, 119, 119);
$fpdf->Cell(9,10,'Restaurante Boomerang','T',0,'s',0);
$fpdf->Cell(100,10,'',0,0,'C',0);
$fpdf->Cell(50,10,'TOTAL',1,0,'',1);
$fpdf->Cell(30,10,money($ssubtotal),1,0,'',1);
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
