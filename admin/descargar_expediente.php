<?php

require('fpdf17/fpdf.php');


class PDF extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		
		$this->Rect($x,$y,$w,$h);

		$this->MultiCell($w,5,$data[$i],0,$a,'true');
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}

function Header()
{
    $this->Image('logo/UMS_logo.png' , 15 ,8, 24 , 28,'PNG');
	$this->Image('logo/letras_ums.png' , 45 ,13, 125 , 18,'PNG');
	$this->Image('logo/logo_medicos.jpg' , 173 ,7, 26 , 31,'JPG');
	
	$this->SetFont('Arial','',11);
	$this->Text(85,43,utf8_decode('"EXPEDIENTE MÉDICO"'),0,'C', 0);

	$this->Ln(27);
}


}

	$nom= $_GET['dos'];
	$pat= $_GET['tres'];
	$mat= $_GET['cuatro'];
	$edad= $_GET['seis'];
	$domicilio= $_GET['nueve'];
	$telefono= $_GET['diez'];
	$recomendo= $_GET['once'];
	$analisis= $_GET['doce'];
	
	
	$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	
	$pdf=new PDF('P','mm','A4');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	$pdf->SetAutoPageBreak(true,25); 
	$pdf->Ln(20);
	
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(0,6,utf8_decode('Fecha:'." ".date('d')." de ".$meses[date('n')-1]. " de ".date('Y')),0,1,'L');
	$pdf->Cell(0,6,utf8_decode('Paciente:'." ".$nom." ".$pat." ".$mat),0,0);
	$pdf->Cell(0,6,utf8_decode('Edad:'." ".$edad),0,1,'R');
	$pdf->Cell(0,6,utf8_decode('Domicilio:'." ".$domicilio),0);
	$pdf->Cell(0,6,utf8_decode('Teléfono:'." ".$telefono),0,1,'R');
	$pdf->Cell(0,6,utf8_decode('Recomendó:'." ".$recomendo),0,0);
	$pdf->Ln(18);
	
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,6,utf8_decode('Analisis Clínico:'),0,1);
	$pdf->Ln(10);
	
	
	
	$pdf->SetFont('Arial','',11);
	$pdf->MultiCell(177,6, utf8_decode($analisis) ,0,'J');

    $pdf->Ln(50);
	
	

$pdf->Output();
?>