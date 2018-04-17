<?php
    class GeneratePDF {
        protected $pdf;
        protected $header;
        protected $result;
        protected $fileName;
        
        public function __construct($result, $header, $fileName){
            $this->pdf = new FPDF();
            $this->result = $result;
            $this->header = $header;
            $this->fileName = $fileName;
        }//construct
        
        public function Execute(){
            $this->pdf->AliasNbPages();
            $this->pdf->AddPage();
            $this->FancyTable();
            return $this->pdf->Output('F', "public/files/$this->fileName.pdf");
        }//Execute
        
        private function FancyTable(){
            $this->pdf->SetFont('Arial','B', 10);
            $this->pdf->SetTextColor(255);
            $this->pdf->SetFillColor(27, 0, 255);
            $this->pdf->SetDrawColor(0);
            $this->pdf->SetLineWidth(0.3);
            $this->pdf->Ln(20);
            for($i = 0; $i < count($this->header); $i++)
                $this->pdf->Cell(45, 8, iconv("UTF-8", "ISO-8859-1", $this->header[$i]), 1, 0, 'C', true);
            $this->pdf->SetTextColor(0);
            $this->pdf->SetFillColor(236, 144, 28);
            $this->pdf->SetDrawColor(0);
            foreach($this->result as $row) 
            {
                $this->pdf->Ln();
                foreach($row as $column)
                {
                    $this->pdf->Cell(45, 15, iconv("UTF-8", "ISO-8859-1", $column), 1, 0, "C");
                }//foreach
            }//foreach
        }//FancyTable
    }//class GeneratePDF
?>
