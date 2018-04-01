<?php

$toAppend = '<table>
<tr>
  <td>Nombre del Producto</td>
  <td>Marca</td>
  <td>Categoria</td>
  <td>Cantidad</td>
  <td>Precio</td>
  <td>Total</td>
</tr>';
if ( !($parametros['detalles'] === false) ) {
  $total = 0;
  foreach ($parametros['detalles'] as $orden) {
    $total = $total + ( $orden->iDetalle_pedido_cantidad * $orden->fProducto_precio);
    $toAppend .= '<tr>
    <td>'.$orden->sProducto_nombre.'</td>
    <td>'.$orden->sMarca_nombre.'</td>
    <td>'.$orden->sMarca_categoria.'</td>
    <td>'.$orden->iDetalle_pedido_cantidad.'</td>
    <td>'.$orden->fProducto_precio.'</td>
    <td>'.$orden->fProducto_precio * $orden->iDetalle_pedido_cantidad .'</td>
    </tr>';
  }
  $toAppend .=   '<tr><td>Total:</td><td></td><td></td><td></td><td></td><td>'.$total.'</td></tr>';
}
$toAppend .= '</table>';

require_once 'public/templates/vendor/autoload.php';
$html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
$html2pdf->writeHTML($toAppend);
$html2pdf->output();
?>
