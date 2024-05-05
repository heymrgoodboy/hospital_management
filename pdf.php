<?php
require_once ('tcpdf/tcpdf.php');

// Connect to the database
$conn = new mysqli("localhost", "root", "", "hospital");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['patient_id'])) {
    $pid = $_GET['patient_id'];
    // Query to fetch registration details from the user table
    $sql = "SELECT * FROM prescription WHERE p_id = $pid ORDER BY p_id DESC";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
}

// Close the database connection
$conn->close();

// Create new PDF instance
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Patient History');
$pdf->SetSubject('Patient Details');
$pdf->SetKeywords('Patient, History, PDF');

// Remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Add a page
$pdf->AddPage();

// Content
$html = '<h2>Patient Details</h2>
<table>
<tr>
    <th style=" padding: 10px; font-weight: bold;">Patient id</th>
    <th style=" padding: 10px; font-weight: bold;">Patient name</th>
    <th style=" padding: 10px; font-weight: bold;">Doctor name</th>
    <th style=" padding: 10px; font-weight: bold;">Issue</th>
    <th style=" padding: 10px; font-weight: bold;">Date</th>
</tr>
<tr style="">
    <td style=" padding: 10px;">' . $row['p_id'] . '</td>
    <td style=" padding: 10px;">' . $row['fullname'] . '</td>
    <td style=" padding: 10px;">' . $row['doctor_name'] . '</td>
    <td style=" padding: 10px;">' . $row['issue'] . '</td>
    <td style=" padding: 10px;">' . $row['date'] . '</td>
</tr>
<tr style="">
    <th style=" padding: 10px; font-weight: bold;">Registration number</th>
    <th style=" padding: 10px; font-weight: bold;">Medicine</th>
    <th style=" padding: 10px; font-weight: bold;">Strength</th>
    <th style=" padding: 10px; font-weight: bold;">Size</th>
    <th style=" padding: 10px; font-weight: bold;">Quantity</th>
</tr>
<tr style="">
    <td style=" padding: 10px;">' . $row['registration_no'] . '</td>
    <td style=" padding: 10px;">' . $row['medicine'] . '</td>
    <td style=" padding: 10px;">' . $row['strength'] . '</td>
    <td style=" padding: 10px;">' . $row['size'] . '</td>
    <td style=" padding: 10px;">' . $row['quantity'] . '</td>
</tr>
<tr style="">
    <th style="font-weight: bold;">Prescription</th>
</tr>
<tr style="">
    <td>' . $row['instruction'] . '</td>
</tr>
</table>';



// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('patient_history.pdf', 'D');
?>