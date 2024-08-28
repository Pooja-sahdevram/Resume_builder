<?php
require('./fpdf186/fpdf.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $education = $_POST['education'];
    $github = $_POST['github'];
    $linkedin = $_POST['linkedin'];
    $personal_homepage = $_POST['personal-homepage'];

    $pdf = new FPDF();
    $pdf->AddPage();
    
    // Set margins
    $pdf->SetMargins(20, 20, 20);

    // Title
    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(0, 10, $name, 0, 1, 'C');
    $pdf->Ln(5);

    // Contact Information
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Email: ' . $email, 0, 1);
    $pdf->Cell(0, 10, 'Phone: ' . $phone, 0, 1);
    $pdf->Cell(0, 10, 'Address: ' . $address, 0, 1);
    $pdf->Ln(10);

    // Separator Line
    $pdf->SetLineWidth(0.5);
    $pdf->Line(20, $pdf->GetY(), 190, $pdf->GetY());
    $pdf->Ln(10);

    // Education
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Education', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $education);
    $pdf->Ln(10);

    // Separator Line
    $pdf->SetLineWidth(0.5);
    $pdf->Line(20, $pdf->GetY(), 190, $pdf->GetY());
    $pdf->Ln(10);

    // Experience
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Experience', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    for ($i = 1; isset($_POST["experience-$i-title"]); $i++) {
        $title = $_POST["experience-$i-title"];
        $company = $_POST["experience-$i-company"];
        $details = $_POST["experience-$i-details"];

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Job Title: ' . $title, 0, 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Company: ' . $company, 0, 1);
        $pdf->MultiCell(0, 10, 'Details: ' . $details);
        $pdf->Ln(5);
    }
    $pdf->Ln(10);

    // Separator Line
    $pdf->SetLineWidth(0.5);
    $pdf->Line(20, $pdf->GetY(), 190, $pdf->GetY());
    $pdf->Ln(10);

    // Projects
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Projects', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    for ($i = 1; isset($_POST["project-$i-title"]); $i++) {
        $project_title = $_POST["project-$i-title"];
        $project_description = $_POST["project-$i-description"];
        $project_url = $_POST["project-$i-url"];

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Project Title: ' . $project_title, 0, 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, 10, 'Description: ' . $project_description);
        if (!empty($project_url)) {
            $pdf->Cell(0, 10, 'Project URL: ' . $project_url, 0, 1);
        }
        $pdf->Ln(5);
    }
    $pdf->Ln(10);

    // Separator Line
    $pdf->SetLineWidth(0.5);
    $pdf->Line(20, $pdf->GetY(), 190, $pdf->GetY());
    $pdf->Ln(10);

    // Skills
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Skills', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    for ($i = 1; isset($_POST["skill-$i"]); $i++) {
        $skill = $_POST["skill-$i"];
        $pdf->Cell(0, 10, '- ' . $skill, 0, 1);
    }
    $pdf->Ln(10);

    // Separator Line
    $pdf->SetLineWidth(0.5);
    $pdf->Line(20, $pdf->GetY(), 190, $pdf->GetY());
    $pdf->Ln(10);

    // Social Media
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Social Media', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $socialMediaLinks = [];
    if (!empty($github)) {
        $socialMediaLinks[] = 'GitHub: ' . $github;
    }
    if (!empty($linkedin)) {
        $socialMediaLinks[] = 'LinkedIn: ' . $linkedin;
    }
    if (!empty($personal_homepage)) {
        $socialMediaLinks[] = 'Personal Homepage: ' . $personal_homepage;
    }

    if (!empty($socialMediaLinks)) {
        $pdf->SetFont('Arial', '', 12);
        foreach ($socialMediaLinks as $link) {
            $pdf->Cell(0, 10, '- ' . $link, 0, 1);
        }
    } else {
        $pdf->Cell(0, 10, 'No social media links provided.', 0, 1);
    }

    // Output the PDF to the browser
    $pdf->Output('I', 'resume.pdf');
}
?>
