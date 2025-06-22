<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loan_mg";

// Establishing a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loanType = $_POST['loanType'] ?? '';

    $targetDir = "uploads/";

    $loanTypeInsertQuery = "INSERT INTO loanType (loan_Type) VALUES ('$loanType')";
    $conn->query($loanTypeInsertQuery);

     $loanTypeId = $conn->insert_id;
    

    // Function to handle file upload
    function uploadFile($fileInputName, $targetDir)
    {
        $targetFilePath = $targetDir . basename($_FILES[$fileInputName]["name"]);
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        // Allowed file formats
        $allowTypes = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES[$fileInputName]["tmp_name"], $targetFilePath)) {
                return $targetFilePath; // Return the file path
            }
        }

        return ""; // Return empty string if upload fails
    }

    // Based on loan type, handle form data and file uploads
    // Assuming $loanType is already fetched from the POST request
if ($loanType === 'Home' || $loanType === 'Cash') {
    $fullName = $_POST['fullName'] ?? '';
    $phoneNumber = $_POST['phoneNumber'] ?? '';
    $email = $_POST['email'] ?? '';
    $address = $_POST['address'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $aadharNumber = $_POST['aadharNumber'] ?? '';
    $panNumber = $_POST['panNumber'] ?? '';
    $occupation = $_POST['occupation'] ?? '';
    $loanPlan = $_POST['loanPlan'] ?? '';

    $salarySlip = uploadFile('salarySlip', $targetDir);
    $itr = uploadFile('itr', $targetDir);
    $addressProof = uploadFile('addressProof', $targetDir);

    $borrowerQuery = "INSERT INTO borrower (loan_type_id, fullName, phoneNumber, email, address, dob, aadharNumber, panNumber, occupation, loanPlan, salarySlip, itr, addressProof) VALUES ('$loanTypeId', '$fullName', '$phoneNumber', '$email', '$address', '$dob', '$aadharNumber', '$panNumber', '$occupation', '$loanPlan', '$salarySlip', '$itr', '$addressProof')";

    $conn->query($borrowerQuery);

    if ($conn->query($borrowerQuery) === TRUE) {
        echo "Borrower data inserted successfully.";
    } else {
        echo "Error: " . $borrowerQuery . "<br>" . $conn->error;
    }
} elseif ($loanType === 'Student') {
    $studentName = $_POST['studentName'] ?? '';
    $schoolName = $_POST['schoolName'] ?? '';
    $studentPhone = $_POST['studentPhone'] ?? '';
    $studentEmail = $_POST['studentEmail'] ?? '';
    $personalAddress = $_POST['personalAddress'] ?? '';
    $schoolAddress = $_POST['schoolAddress'] ?? '';
    $studentClass = $_POST['studentClass'] ?? '';
    $studentAadharNumber = $_POST['studentAadharNumber'] ?? '';
    $studentPanNumber = $_POST['studentPanNumber'] ?? '';
    $loanDuration = $_POST['loanDuration'] ?? '';
    $startYear = $_POST['startYear'] ?? '';

    $aadharPhoto = uploadFile('aadharPhoto', $targetDir);
    $panPhoto = uploadFile('panPhoto', $targetDir);
    $bonafideCert = uploadFile('bonafideCert', $targetDir);

    $studentLoanQuery = "INSERT INTO studentloan (loan_type_id, studentName, schoolName, studentPhone, studentEmail, personalAddress, schoolAddress, startYear, studentClass, studentAadharNumber, studentPanNumber, loanDuration, aadharPhoto, panPhoto, bonafideCert) VALUES ('$loanTypeId', '$studentName', '$schoolName', '$studentPhone', '$studentEmail', '$personalAddress', '$schoolAddress', '$startYear', '$studentClass', '$studentAadharNumber', '$studentPanNumber', '$loanDuration', '$aadharPhoto', '$panPhoto', '$bonafideCert')";

    $conn->query($studentLoanQuery);

    if ($conn->query($studentLoanQuery) === TRUE) {
        echo "Student loan data inserted successfully.";
    } else {
        echo "Error: " . $studentLoanQuery . "<br>" . $conn->error;
    }
} else {
    echo "Invalid loan type.";
}

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>


 