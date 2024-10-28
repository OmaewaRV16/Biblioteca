<?php
require('fpdf186/fpdf.php');
include "conexion.php";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 10, 'Reporte de Libros', 0, 1, 'C');
$pdf->Ln(1); // Espacio entre el título y la línea

// Dibuja una línea horizontal debajo del título
$pdf->SetDrawColor(212, 4, 70); // Color de la línea (mismo que el de los títulos)
$pdf->Line(10, $pdf->GetY(), 195, $pdf->GetY()); // Dibuja la línea (ajusta 200 según el ancho de la página)
$pdf->Ln(5); // Espacio entre la línea y la tabla

// Títulos de la tabla
$pdf->SetFont('Times', 'B', 8);
$pdf->SetFillColor(212, 4, 70);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(20, 10, utf8_decode('ID Libro'), 1, 0, 'C', true);
$pdf->Cell(70, 10, utf8_decode('Título'), 1, 0, 'C', true);
$pdf->Cell(40, 10, utf8_decode('Autor'), 1, 0, 'C', true);
$pdf->Cell(20, 10, utf8_decode('Año'), 1, 0, 'C', true);
$pdf->Cell(35, 10, utf8_decode('Editorial'), 1, 1, 'C', true);

// Contenido de la tabla
$pdf->SetFont('Times', 'B', 7); // Cambia a un tamaño de letra más pequeño
$pdf->SetFillColor(252, 252, 237);
$pdf->SetTextColor(0, 0, 0);

// Cambiar el color de los bordes a negro
$pdf->SetDrawColor(0, 0, 0); // Color negro para los bordes de la tabla

$query = "SELECT libros.id_libro, libros.titulo, autores.nombre, libros.anio, libros.editorial 
          FROM libros 
          INNER JOIN autores ON libros.autor = autores.id_autor";
$result = mysqli_query($conectar, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(20, 10, utf8_decode($row['id_libro']), 1, 0, 'C', true);
    $pdf->Cell(70, 10, utf8_decode($row['titulo']), 1, 0, 'C', true);
    $pdf->Cell(40, 10, utf8_decode($row['nombre']), 1, 0, 'C', true);
    $pdf->Cell(20, 10, utf8_decode($row['anio']), 1, 0, 'C', true);
    $pdf->Cell(35, 10, utf8_decode($row['editorial']), 1, 1, 'C', true);
}

// Añadir un espacio antes de la imagen
$pdf->Ln(10);

// Calcular la posición para centrar la imagen
$imageUrl = 'https://iconape.com/wp-content/files/og/176545/png/176545.png';
$imageWidth = 30; // Ajusta el ancho de la imagen como desees
$xPosition = ($pdf->GetPageWidth() - $imageWidth) / 2; // Centrar la imagen

// Insertar la imagen
$pdf->Image($imageUrl, $xPosition, $pdf->GetY(), $imageWidth); // Cambia $imageWidth según sea necesario

$pdf->Output('D', 'reporte_libros.pdf');
?>
