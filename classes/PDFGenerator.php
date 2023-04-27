<?php
require('./fpdf/fpdf.php');

class PDFGenerator extends FPDF
{
    //DEMISIE
    public function demisieHeader()
    {
        $this->SetFont('Arial');
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'D E M I S I E',0,0,'C');
        // Line break
        $this->Ln(20);
    }
    public function demsieContent($nume,$prenume,$functie,$data)
    {
        $this->MultiCell(200,10,"       Subsemnatul {$nume} {$prenume} salariat la IT DESK SRL, in functia de {$functie},va rog sa luati act de demisia mea, urmand sa incetez activitatea la data de {$data}.Perioada de timp dintre prezenta notificare si data incetarii activitatii reprezinta preavizul de 20 de zile calendaristice prevazut in contractul individual de munca.In cazul in care doriti sa renuntati partial sau total la preaviz va rog sa-mi comunicati.",0,"L");
    }
    public function demisieFooter()
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
    public function genereazaDemisiePDF()
    {
        $this->Output('I');
    }

    //ADEVERINTA VENIT SIMPLA

    public function venitHeader()
    {
        $this->SetFont('Arial');
        // Move to the right
        // Title
        $this->Cell(100,10,'SC '.Config::get('date_firma/nume').' SRL',0,0,'L');
        $this->Ln(5);
        $this->Cell(100,10,'Cod fiscal '.Config::get('date_firma/cod_fiscal'),0,0,'L');
        $this->Ln(5);
        $this->Cell(100,10,'Nr. de inregistrare la registrul comertului '.Config::get('date_firma/reg_comert').'',0,0,'L');
        $this->Ln(5);
        $this->Cell(100,10,'Nr. inregistrare '.Config::get('date_firma/nr_inregistrare'),0,0,'L');
        $this->Ln(5);
        // Line break
        $this->Ln(20);
        $this->Cell(45);
        $this->Cell(100,10,'ADEVERINTA DE VENIT',0,0,'C');
    $this->Ln(20);
    }

    public function venitContent($nume,$prenume,$judet,$strada,$numar,$scara,$ap,$etaj,$sector,$cnp,$tip_act,$serie_ad,$numar_ad,$eliberat_de,$data_eliberare,$perioada_inceput,$perioada_sfarsit,$data_contract,$motiv)
    {
        $nume_firma = Config::get('date_firma/nume');
        $this->MultiCell(185,10,"Prin prezenta se atesta faptul ca domnul/doamna $nume $prenume, cu domiciliul in $judet, Str. $strada, Nr. $numar, Sc. $scara, Et. $etaj, Ap. $ap, Jud. $judet,Sector $sector legitimat/a cu $tip_act seria $serie_ad nr. $numar_ad eliberata de SPCLEP $eliberat_de., la data de $data_eliberare, CNP $cnp, este angajat/a a $nume_firma SRL, incepand cu data de $data_contract.");
        $this->Ln(5);
        $this->MultiCell(185,10,"Precizam ca intre $perioada_inceput - $perioada_sfarsit contractul de munca s-a derulat in forma continua.");
        $this->Ln(5);
        $this->MultiCell(185,10,"Prezenta adeverinta se elibereaza spre a-i servi la $motiv si are o valabilitate de 30 zile de la data emiterii.");
        $this->Ln(20);
    }

    public function venitFooter()
    {
        $this->SetFont('Arial');
        $this->Cell(100,10,'    Reprezentant legal',0,0,'L');
        $this->Cell(80,10,'Semnatura',0,0,'R');
        $this->Ln(20);
        $this->SetLeftMargin(27);
        $this->Cell(100,0,'HR',0,0,'L');
        $this->Image('images/signature.jpg',150,180,50,20);
        $this->Ln(20);
    }

    public function genereazaAdeverintaVenitPDF()
    {
        $this->Output('I');
    }

    public function savePDF($numeAngajat)
    {   $path = 'Documente angajati';
        $data = date("d-m-Y");
        $this->Output('F',$path.'/'.$numeAngajat.'/'.'Adeverinta_venit_'.$data.'.pdf');
    }






    //ADEVERINTA VENIT CNAS






    //ADEVERINTA SALARIAT







}