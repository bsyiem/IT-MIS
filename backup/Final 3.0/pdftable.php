<?php
require_once "fpdf.php";

class tableGen extends FPDF
{
	function buildTable($w,$h,$header,$data)
	{
		$this->SetFillColor(255,255,255);
		$this->SetTextColor(0);
		$this->SetDrawColor(0);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		for($i=0;$i<count($header);$i++)
		{
			$this->Cell($w[$i],$h,$header[$i],1,0,'L',1);
		}
		$this->Ln();
		$this->SetFillColor(200);
		$this->SetTextColor(0);
		$this->SetFont('');
		$fill=true;
		$no=count($data)/count($header);
		$k=0;
		for($i=0;$i<$no;$i++)
		{
			for($j=0;$j<count($header);$j++)
			{	
				$this->Cell($w[$j],$h,$data[$k],'1',0,'L',$fill);//can use 'LR' in border field
				$k++;
			}
			$fill=!$fill;
			$this->Ln();
		}
		//$this->Cell(array_sum($w),0,'','T'); is used if border of above code was set to 'LR'
	}
}