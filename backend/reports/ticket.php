<?php

# Incluyendo librerias necesarias #
require "../../assets/libs/code128.php";
include("../db.php");
$con = conectar();

date_default_timezone_set("America/Lima");
$fechad =getdate();
$fecha=$fechad['mday']."-".$fechad['mon']."-".$fechad['year'];
$hora = date("h:i A");


function money(float $valor, string $simbolo = 'S/.'): string
{
    return $simbolo . number_format($valor, 2, '.', ',');
}

$idv=$_GET['idve'];
$consulta=$con->query("call _nombrevendedor ($idv)");
$fila=$consulta->fetch_assoc();
$vendedor=$fila['vendedor'];
$cliente=$fila['cliente'];
$consulta->close();

$con=conectar();
$consulta2=$con->query("call _listardetalleventa ($idv)");

$pdf = new PDF_Code128('P', 'mm', array(80, 258));
$pdf->SetMargins(4, 0, 4);
$pdf->AddPage();

# Encabezado y datos de la empresa #
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Ln(10);
$pdf->MultiCell(0, 5, utf8_decode(strtoupper("Restaurante Boomerang")), 0, 'C', false);
$pdf->SetFont('Arial', '', 9);
$pdf->MultiCell(0, 5, utf8_decode("RUC: 0000000000"), 0, 'C', false);
$pdf->MultiCell(0, 5, utf8_decode("Direccion Av Los Olivos de Pro 123"), 0, 'C', false);
$pdf->MultiCell(0, 5, utf8_decode("Teléfono: 123456789"), 0, 'C', false);
$pdf->MultiCell(0, 5, utf8_decode("Email: restaurante@boomerang.com"), 0, 'C', false);

$pdf->Ln(1);
$pdf->Cell(0, 5, utf8_decode("------------------------------------------------------"), 0, 0, 'C');
$pdf->Ln(5);

$pdf->MultiCell(0, 5, utf8_decode("Fecha: " . date("d/m/Y", strtotime($fecha)) . " " . $hora), 0, 'C', false);
$pdf->MultiCell(0, 5, utf8_decode("Caja Nro: 1"), 0, 'C', false);
$pdf->MultiCell(0, 5, utf8_decode("Vendedor: " . $vendedor), 0, 'C', false);
$pdf->SetFont('Arial', 'B', 10);
$pdf->MultiCell(0, 5, utf8_decode(strtoupper("Ticket Nro: " . $idv)), 0, 'C', false);
$pdf->SetFont('Arial', '', 9);

$pdf->Ln(1);
$pdf->Cell(0, 5, utf8_decode("------------------------------------------------------"), 0, 0, 'C');
$pdf->Ln(5);

$pdf->MultiCell(0, 5, utf8_decode("Cliente: " . $cliente), 0, 'C', false);
//$pdf->MultiCell(0, 5, utf8_decode("Documento: DNI 00000000"), 0, 'C', false);
//$pdf->MultiCell(0, 5, utf8_decode("Teléfono: 00000000"), 0, 'C', false);
//$pdf->MultiCell(0, 5, utf8_decode("Dirección: San Salvador, El Salvador, Centro America"), 0, 'C', false);

$pdf->Ln(1);
$pdf->Cell(0, 5, utf8_decode("-------------------------------------------------------------------"), 0, 0, 'C');
$pdf->Ln(3);

# Tabla de productos #
$pdf->Cell(10, 5, utf8_decode("Cant."), 0, 0, 'C');
$pdf->Cell(19, 5, utf8_decode("Precio"), 0, 0, 'C');
$pdf->Cell(15, 5, utf8_decode("Desc."), 0, 0, 'C');
$pdf->Cell(28, 5, utf8_decode("Total"), 0, 0, 'C');

$pdf->Ln(3);
$pdf->Cell(72, 5, utf8_decode("-------------------------------------------------------------------"), 0, 0, 'C');
$pdf->Ln(3);

$stotal=0;
$ssubtotal=0;
$des=0;

/*----------  Detalles de la tabla  ----------*/
while($resultado = $consulta2->fetch_assoc()) {
$pdf->MultiCell(0, 4, utf8_decode($resultado['Menu']), 0, 'C', false);
$pdf->Cell(10, 4, utf8_decode($resultado['Cantidad']), 0, 0, 'C');
$pdf->Cell(19, 4, money($resultado['Precio']), 0, 0, 'C');
$pdf->Cell(15, 4, money($resultado['dsc']), 0, 0, 'C');
$pdf->Cell(28, 4, money($resultado['Precio']*$resultado['Cantidad']), 0, 0, 'C');
$pdf->Ln(6);
$ssubtotal += $resultado['Precio']*$resultado['Cantidad'];
$des += $resultado['dsc'];
}

$stotal=$ssubtotal-$des;
$pdf->MultiCell(0, 4, utf8_decode("Garantía de fábrica: 2 Meses"), 0, 'C', false);
$pdf->Ln(7);
/*----------  Fin Detalles de la tabla  ----------*/



$pdf->Cell(72, 5, utf8_decode("-------------------------------------------------------------------"), 0, 0, 'C');

$pdf->Ln(5);

# Impuestos & totales #
$pdf->Cell(20, 5, utf8_decode(""), 0, 0, 'C');
$pdf->Cell(26, 5, utf8_decode("SUBTOTAL"), 0, 0, 'S');
$pdf->Cell(26, 5, utf8_decode("+ " . money($ssubtotal)), 0, 0, 'S');

$pdf->Ln(5);

$pdf->Cell(20, 5, utf8_decode(""), 0, 0, 'C');
$pdf->Cell(26, 5, utf8_decode("IGV (18%)"), 0, 0, 'S');
$pdf->Cell(26, 5, utf8_decode("+ " . money(0.00)), 0, 0, 'S');

$pdf->Ln(5);

$pdf->Cell(20, 5, utf8_decode(""), 0, 0, 'C');
$pdf->Cell(26, 5, utf8_decode("DESCUENTO"), 0, 0, 'S');
$pdf->Cell(26, 5, utf8_decode("- " . money($des)), 0, 0, 'S');

$pdf->Ln(5);

$pdf->Cell(72, 5, utf8_decode("-------------------------------------------------------------------"), 0, 0, 'C');

$pdf->Ln(5);

$pdf->Cell(18, 5, utf8_decode(""), 0, 0, 'C');
$pdf->Cell(22, 5, utf8_decode("TOTAL A PAGAR"), 0, 0, 'C');
$pdf->Cell(32, 5, utf8_decode(money($stotal)), 0, 0, 'C');

/*$pdf->Ln(5);

$pdf->Cell(18, 5, utf8_decode(""), 0, 0, 'C');
$pdf->Cell(22, 5, utf8_decode("TOTAL PAGADO"), 0, 0, 'C');
$pdf->Cell(32, 5, utf8_decode("$100.00 USD"), 0, 0, 'C');

$pdf->Ln(5);

$pdf->Cell(18, 5, utf8_decode(""), 0, 0, 'C');
$pdf->Cell(22, 5, utf8_decode("CAMBIO"), 0, 0, 'C');
$pdf->Cell(32, 5, utf8_decode("$30.00 USD"), 0, 0, 'C');

$pdf->Ln(5);

$pdf->Cell(18, 5, utf8_decode(""), 0, 0, 'C');
$pdf->Cell(22, 5, utf8_decode("USTED AHORRA"), 0, 0, 'C');
$pdf->Cell(32, 5, utf8_decode("$0.00 USD"), 0, 0, 'C');
*/
$pdf->Ln(10);

$pdf->MultiCell(0, 5, utf8_decode("*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar este ticket ***"), 0, 'C', false);

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 7, utf8_decode("Gracias por su compra"), '', 0, 'C');

$pdf->Ln(9);

# Codigo de barras #
$pdf->Code128(5, $pdf->GetY(), "COD". $idv, 70, 20);
$pdf->SetXY(0, $pdf->GetY() + 21);
$pdf->SetFont('Arial', '', 14);
$pdf->MultiCell(0, 5, utf8_decode("COD". $idv), 0, 'C', false);

# Nombre del archivo PDF #
$user_agent = $_SERVER["HTTP_USER_AGENT"];
if (preg_match("/(android|webos|avantgo|iphone|ipod|ipad|bolt|boost|cricket|docomo|fone|hiptop|opera mini|mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $user_agent)) {
    $pdf->Output('D', 'COD' . $idv . '.pdf');
} else {
    $pdf->Output();
}
