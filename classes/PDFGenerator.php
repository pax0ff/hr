<?php
require('./fpdf/fpdf.php');

class PDFGenerator extends FPDF
{
    function demisieHeader()
    {
        $this->SetFont('Arial');
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'D E M I S I E',0,0,'C');
        // Line break
        $this->Ln(20);
    }
    function demsieContent($nume,$prenume,$functie,$data)
    {
        $this->MultiCell(200,10,"       Subsemnatul {$nume} {$prenume} salariat la IT DESK SRL, in functia de {$functie},va rog sa luati act de demisia mea, urmand sa incetez activitatea la data de {$data}.Perioada de timp dintre prezenta notificare si data incetarii activitatii reprezinta preavizul de 20 de zile calendaristice prevazut in contractul individual de munca.In cazul in care doriti sa renuntati partial sau total la preaviz va rog sa-mi comunicati.",0,"L");
    }
    function demisieFooter()
    {
        $this->SetFont('Arial');
        // Move to the right
        //$this->Cell(80);
        // Title
        $this->Cell(100,10,'    Data',0,0,'L');
        $this->Cell(80,10,'Semnatura',0,0,'R');
        // Line break
        $this->Ln(20);
    }
    function genereazaDemisiePDF()
    {
        $this->Output('I');
    }
}