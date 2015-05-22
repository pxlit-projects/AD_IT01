<?php
    require_once 'medoo.min.php';
    $database = new medoo();
    require('fpdf.php');

    class PDF extends FPDF
    {
        function Header()
        {
            global $title;

            // Arial bold 15
            $this->SetFont('Arial','B',15);
            // Move to the right
            $this->Cell(80);
            // Title
            $this->Cell(30,10,$title,0,0,'C');
            // Line break
            $this->Ln(20);
        }

        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    if(isset($_GET['surveyuser']))
    {
        $survey1 = $database->get("surveyusers", "*", ["surveyUserid" => $_GET['surveyuser']]);
        $userid1 = $survey1['user'];
        $userid2 = $survey1['linkedUser'];
        $survey2 = $database->get("surveyusers", "*", ["user" => $userid2]);

        $user1 = $database->get("users", "*", ["userid" => $userid1]);
        $user2 = $database->get("users", "*", ["userid" => $userid2]);

        $title = 'Rapport: ' . $user1['firstName'] . ' ' . $user1['lastName'] . ' - ' . $user2['firstName'] . ' ' . $user2['lastName'];
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetTitle($title);  

        if($survey2['status'] == 2)
        {
            $antwoordenUser1 = $database->select("antwoorden", "*", ["userid" => $_GET['surveyuser']]);

            foreach ($antwoordenUser1 as $antwoordUser1) {
                $antwoordUser2 = $database->get("antwoorden", "*", ["AND" => ["userid" => $survey2['surveyUserid'], "vraagid" => $antwoordUser1['vraagid']]]);

                if($antwoordUser1['werk'] == 1 || $antwoordUser2['werk'] == 1)
                {
                    $vraag = $database->get("vragen", "*", ["vraagid" => $antwoordUser1['vraagid']]);
                    $pdf->SetFont('Times','U',12);
                    $pdf->Cell(0,10,$vraag['vraagKort'] . ':',0,1);
                    $pdf->SetFont('Times', '', 10);

                    if($antwoordUser1['antwoord'] == 3)
                    {
                        if($user1['rank'] == 1)
                        {
                            $pdf->Cell(10);
                            $pdf->Cell(0,10,"- Hinder voor client gerapporteerd door client.",0,1);
                        }
                        else
                        {
                            $pdf->Cell(10);
                            $pdf->Cell(0,10,"- Hinder voor client gerapporteerd door mantelzorger.",0,1);
                        }
                    }
                    else if($antwoordUser1['antwoord'] == 4)
                    {
                        if($user1['rank'] == 1)
                        {
                            $pdf->Cell(10);
                            $pdf->Cell(0,10,"- Hinder voor mantelzorger gerapporteerd door client.",0,1);
                        }
                        else
                        {
                            $pdf->Cell(10);
                            $pdf->Cell(0,10,"- Hinder voor mantelzorger gerapporteerd door mantelzorger.",0,1);
                        }
                    }
                    else if($antwoordUser1['antwoord'] == 5)
                    {
                        if($user1['rank'] == 1)
                        {
                            $pdf->Cell(10);
                            $pdf->Cell(0,10,"- Hinder voor beide gerapporteerd door client.",0,1);
                        }
                        else
                        {
                            $pdf->Cell(10);
                            $pdf->Cell(0,10,"- Hinder voor beide gerapporteerd door mantelzorger.",0,1);
                        }
                    }

                    if($antwoordUser2['antwoord'] == 3)
                    {
                        if($user2['rank'] == 1)
                        {
                            $pdf->Cell(10);
                            $pdf->Cell(0,10,"- Hinder voor client gerapporteerd door client.",0,1);
                        }
                        else
                        {
                            $pdf->Cell(10);
                            $pdf->Cell(0,10,"- Hinder voor client gerapporteerd door mantelzorger.",0,1);
                        }
                    }
                    else if($antwoordUser2['antwoord'] == 4)
                    {
                        if($user2['rank'] == 1)
                        {
                            $pdf->Cell(10);
                            $pdf->Cell(0,10,"- Hinder voor mantelzorger gerapporteerd door client.",0,1);
                        }
                        else
                        {
                            $pdf->Cell(10);
                            $pdf->Cell(0,10,"- Hinder voor mantelzorger gerapporteerd door mantelzorger.",0,1);
                        }
                    }
                    else if($antwoordUser2['antwoord'] == 5)
                    {
                        if($user2['rank'] == 1)
                        {
                            $pdf->Cell(10);
                            $pdf->Cell(0,10,"- Hinder voor beide gerapporteerd door client.",0,1);
                        }
                        else
                        {
                            $pdf->Cell(10);
                            $pdf->Cell(0,10,"- Hinder voor beide gerapporteerd door mantelzorger.",0,1);
                        }
                    }

                    if($antwoordUser1['werk'] == 1 && $antwoordUser2['werk'] == 1)
                    {
                        $pdf->Cell(10);
                        $pdf->SetFont('Times', 'B', 10);
                        $pdf->Cell(0,10,"- Hulpvraag gesteld door beide.",0,1);
                    }
                    else if($antwoordUser1['werk'] == 1)
                    {
                        if($user1['rank'] == 1)
                        {
                            $pdf->Cell(10);
                            $pdf->SetFont('Times', 'B', 10);
                            $pdf->Cell(0,10,"- Hulpvraag gesteld door client.",0,1);
                        }
                        else
                        {
                            $pdf->Cell(10);
                            $pdf->SetFont('Times', 'B', 10);
                            $pdf->Cell(0,10,"- Hulpvraag gesteld door mantelzorger.",0,1);
                        }
                    }
                    else if($antwoordUser2['werk'] == 1)
                    {
                        if($user2['rank'] == 1)
                        {
                            $pdf->Cell(10);
                            $pdf->SetFont('Times', 'B', 10);
                            $pdf->Cell(0,10,"- Hulpvraag gesteld door client.",0,1);
                        }
                        else
                        {
                            $pdf->Cell(10);
                            $pdf->SetFont('Times', 'B', 10);
                            $pdf->Cell(0,10,"- Hulpvraag gesteld door mantelzorger.",0,1);
                        }
                    }
                }
            } 
            
        }

        
              
        $pdf->Output();
    }
    
?>