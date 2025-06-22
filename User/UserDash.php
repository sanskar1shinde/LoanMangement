<?php
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

     $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'loan_mg';

     $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

     if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

     $sql = "SELECT * FROM user WHERE email = '$email'";

     $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $custDetails = $result->fetch_assoc(); 
    } else {
         
        $custDetails = [];
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case where the session variable is not set
    $custDetails = [];
}
?>



 <!Doctype html>
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER  Dashboard</title>

 
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
 <link rel="stylesheet" href="css/dashstyle.css">

  
 </head>
 <body> 
<div class="wrapper">

    <div class="sidebar">
         <h1 style="color: red;"><?php echo $custDetails['name']; ?>  </h1>
         <ul>
            <li><a href="#" onclick="displaySection('home-section')"><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="#" onclick="displaySection('profile-section')"><i class="fas fa-user"></i>Information</a></li>
            <li><a href="#" onclick="displaySection('status-section')"><i class="fas fa-user"></i>Status</a></li>
            <li><a href="#" onclick="displaySection('about-section')"><i class="fas fa-eye"></i>Application </a></li>
            <li><a href="#" onclick="displaySection('portfolio-section')"><i class="fas fa-eye"></i> EMI - Calculator</a></li>
             

        </ul>
        <div class="social_media">
            <a href="../index.php"><i class="fa fa-power-off"></i> Logout</a>
        </div>
    </div>
            

    <div class="main_content">

            <header class="header1">
                <h1>Welcome to user Dashboard</h1>
                
            </header>
            <div class="info" id="home-section1">
            <?php
                            $dbservername = "localhost";
                            $dbusername = "root";
                            $dbpassword = "";
                            $dbname = "loan_mg";

                            try {
 
                                $conn = new PDO("mysql:host=$dbservername;dbname=$dbname", $dbusername, $dbpassword);

                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                 
                                $queryUser = "SELECT COUNT(*) AS ucount FROM user";
                                $UserCount = $conn->query($queryUser)->fetchColumn();

                                $queryappli = "SELECT COUNT(*) AS acount FROM borrower ";
                                $appliCount = $conn->query($queryappli)->fetchColumn();

                               
                            }
                            catch(PDOException $e) {
                                echo "Connection failed: " . $e->getMessage();
                            }
                    ?>
            <div id="home-section">
            <div class="count-container">
                        <div class="count-box">
                            <i class="fas fa-users"></i>
                            <h3 style="color:Black;">Active loans</h3>
                            <p><?php echo $UserCount; ?></p>
                        </div>
                        
                        <div class="count-box">
                            <i class="fas fa-shopping-cart"></i>
                            <h3 style="color:Black;">Application count</h3>
                            <p><?php echo $appliCount; ?></p>
                        </div>
                    </div>
                  
            </div>

            <div id="profile-section">
                
                <section class="home1" id="home1">

                    <div class="content">
                        <h3>Loan Type</h3>
                    </div>
                
                </section>
        
                 <!-- features section starts  -->
        
                <section class="features" id="features">
        
                <h1 class="heading"><span>Loan Type</span> </h1>
        
                <div class="box-container">
        
                    <div class="box">
            
                    All the information is displayed below.......
                    
                    </div>
            </div>
        
        </section>
         
        </div>

        <div id="atatus-section">
                
                <section class="home1" id="home1">

                    <div class="content">
                        
                    </div>
                
                </section>
        
                 <!-- features section starts  -->
        
                <section class="features" id="features">
        
                
        
                 </section>
         
        </div>

        <div id="about-section">
            <div class="container">
                <form method="post" action="borrowerinsert.php" enctype="multipart/form-data">
                    <div class="loan-type-selection">
                        <label for="loanType">Select Loan Type:</label>
                        <select name="loanType" id="loanType" onchange="toggleForms()">
                            <option value="">-- Select Loan Type --</option>
                            <option value="Home">Home Loan</option>
                            <option value="Cash">Cash Loan</option>
                            <option value="Student">Student Loan</option>
                        </select>
                    </div>

                    <!-- Borrower Loan Form -->
                    <div class="borrower-loan-form" style="display:none;">
                        <h2>Personal Details</h2>

                        <input type="text" name="selectedLoanType" id="selectedLoanTypeBorrower" value="">


                        <label for="fullName">Full Name</label>
                        <input type="text" name="fullName" id="fullName" placeholder="Full Name" required><br>
                        
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" required><br>
                        
                        <label for="email">Enter Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter Email"><br>
                        
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" placeholder="Address"><br>
                        
                        <label for="dob">Date of Birth</label>
                        <input type="date" name="dob" id="dob"><br>
                        
                        <label for="aadharNumber">Aadhar Number</label>
                        <input type="text" name="aadharNumber" id="aadharNumber" placeholder="Aadhar Number"><br>
                        
                        <label for="panNumber">PAN Number</label>
                        <input type="text" name="panNumber" id="panNumber" placeholder="PAN Number"><br>
                        
                        <label for="occupation">Occupation</label>
                        <input type="text" name="occupation" id="occupation" placeholder="Occupation"><br>
                        
                        <!-- Loan-specific fields -->
                        <label for="loanPlan">Select Loan Plan</label>
                        <select name="loanPlan" id="loanPlan">
                            <option value="">-- Select Loan Plan --</option>
                            <option value="1">Plan 1</option>
                            <option value="2">Plan 2</option>
                            <option value="3">Plan 3</option>
                            <option value="4">Plan 4</option>
                            <option value="5">Plan 5</option>
                        </select><br><br>

                        <!-- Document upload section for Cash/Home Loan -->
                        <h2>Documents for Cash/Home Loan</h2>
                        <label for="salarySlip">Upload Salary Slip</label>
                        <input type="file" name="salarySlip" id="salarySlip"><br><br>
                        
                        <label for="itr">Upload ITR</label>
                        <input type="file" name="itr" id="itr"><br><br>
                        
                        <label for="addressProof">Upload Address Proof</label>
                        <input type="file" name="addressProof" id="addressProof"><br><br>

                        <div class="btn-box">
                          <input type="reset" value="Reset">
                          <input type="submit" value="Submit">
                        </div>
                    </div>

                    <!-- Student Loan Form -->
                    <div class="student-loan-form" style="display:none;">
                     
                        <!-- Student details fields -->
                        <h2>Student Details</h2>

                        <input type="text" name="selectedLoanType" id="selectedLoanTypeStudent" value="">

                        <label for="studentName">Student Name</label>
                        <input type="text" name="studentName" id="studentName" placeholder="Student Name"><br>
                                                                         
                        <label for="schoolName">School/College Name</label>
                        <input type="text" name="schoolName" id="schoolName" placeholder="School/College Name"><br>
                        
                        <label for="studentPhone">Phone Number</label>
                        <input type="text" name="studentPhone" id="studentPhone" placeholder="Phone Number"><br>
                        
                        <label for="studentEmail">Enter Email</label>
                        <input type="text" name="studentEmail" id="studentEmail" placeholder="Enter Email"><br>
                        
                        <label for="personalAddress">Personal Address</label>
                        <input type="text" name="personalAddress" id="personalAddress" placeholder="Personal Address"><br>
                        
                        <label for="schoolAddress">School/College Address</label>
                        <input type="text" name="schoolAddress" id="schoolAddress" placeholder="School/College Address"><br>
                        
                        <label for="startYear">School Start Year</label>
                        <input type="text" name="startYear" id="startYear" placeholder="School Start Year"><br>
                        
                        <label for="studentClass">Class</label>
                        <input type="text" name="studentClass" id="studentClass" placeholder="Class"><br>
                        
                        <label for="studentDob">Date of Birth</label>
                        <input type="date" name="studentDob" id="studentDob"><br>
                        
                        <label for="studentAadharNumber">Aadhar Number</label>
                        <input type="text" name="studentAadharNumber" id="studentAadharNumber" placeholder="Aadhar Number"><br>
                        
                        <label for="studentPanNumber">PAN Number</label>
                        <input type="text" name="studentPanNumber" id="studentPanNumber" placeholder="PAN Number"><br>
                        
                        <!-- Loan-specific fields for Student Loan -->
                        <label for="loanDuration">Loan Duration (in years)</label>
                        <select name="loanDuration" id="loanDuration">
                            <option value="">-- Select Loan Duration --</option>
                            <option value="1">1 Year</option>
                            <option value="2">2 Years</option>
                            <option value="3">3 Years</option>
                            <option value="4">4 Years</option>
                        </select><br><br>

                        <!-- Document upload section for Student Loan -->
                        <h2>Documents for Student Loan</h2>
                        <label for="aadharPhoto">Upload Aadhar Photo</label>
                        <input type="file" name="aadharPhoto" id="aadharPhoto"><br><br>
                        
                        <label for="panPhoto">Upload PAN Card Photo</label>
                        <input type="file" name="panPhoto" id="panPhoto"><br><br>
                        
                        <label for="bonafideCert">Upload Bonafide Certificate</label>
                        <input type="file" name="bonafideCert" id="bonafideCert"><br><br>


                        <div class="btn-box">
                            <input type="submit" value="Submit">
                            <input type="reset" value="Reset">
                        </div>
                        
                    </div>
                </form>
            </div>

            <script>
                function toggleForms() {
                    const loanType = document.getElementById('loanType').value;
                    const borrowerLoanForm = document.querySelector('.borrower-loan-form');
                    const studentLoanForm = document.querySelector('.student-loan-form');
                    const loanTypeSelection = document.querySelector('.loan-type-selection');

                    if (loanType === 'Home' || loanType === 'Cash') {
                        borrowerLoanForm.style.display = 'block';
                        studentLoanForm.style.display = 'none';
                        document.getElementById('selectedLoanTypeBorrower').value = loanType;
                    } else if (loanType === 'Student') {
                        borrowerLoanForm.style.display = 'none';
                        studentLoanForm.style.display = 'block';
                        document.getElementById('selectedLoanTypeStudent').value = loanType;
                    } else {
                        borrowerLoanForm.style.display = 'none';
                        studentLoanForm.style.display = 'none';
                    }

                    loanTypeSelection.style.display = 'none';
                }
            </script>

        </div>
        <div id="portfolio-section">
            <h1>EMI Calculator</h1> 
                <div class="container5">
                    <h1>Loan Calculator</h1>
                    <div class="wrapper5">
                        <div>
                            <p>Loan Amount (₹)</p>
                            <input id="amount" type="number">
                        </div>
                        <div>
                            <p>Interest Rate(%)</p>
                            <input id="interest" type="number">
                        </div>
                        <div>
                            <p>Tenure(in months)</p>
                            <input id="tenure" type="number">
                        </div>
                    </div>
                    <h2 id="emi"></h2>
                    <h2 id="totalAmount"></h2>
                    <h2 id="totalInterest"></h2>
                </div>
                <script>
                    window.onload = () =>{
                        const inputs = document.querySelectorAll("input");

                        inputs.forEach(input => {
                            input.addEventListener('change',calculateLoan)
                        })
                    }

                    function calculateLoan () {
                        const principal  = document.querySelector('#amount').value;
                        const interestRate = document.querySelector('#interest').value;
                        const tenure = document.querySelector('#tenure').value;

                        if(!principal || !interestRate || !tenure) return;  

                        const monthlyInterest = interestRate / 100 / 12;
                        const emi = principal * monthlyInterest * Math.pow(1 + monthlyInterest,tenure) /  (Math.pow(1 + monthlyInterest,tenure)-1);

                        const totalAmount = emi * tenure;
                        const totalInterest = totalAmount - principal;

                        document.querySelector('#emi').innerText = 'EMI: ₹' + emi.toFixed(2);
                        document.querySelector('#totalAmount').innerText = 'Total Amount ₹' + totalAmount.toFixed(2);
                        document.querySelector('#totalInterest').innerHTML = 'Total Interest ₹' + totalInterest.toFixed(2);


    
}
                    </script>
            
             
</div>

<script>
    // Function to display a specific section
        function displaySection(sectionId) {
            // Get all section elements
            const sections = document.getElementsByClassName('info')[0].children;

            // Hide all sections
            for (let i = 0; i < sections.length; i++) {
                sections[i].style.display = 'none';
            }

            // Show the selected section
            document.getElementById(sectionId).style.display = 'block';
        }

        // Retrieve the previously selected section on page load
        window.addEventListener('load', function () {
            const selectedSection = localStorage.getItem('selectedSection');
            if (selectedSection) {
                displaySection(selectedSection);
            } else {
                // If there's no previously selected section, display the "home-section"
                displaySection('home-section');
            }
        });

        // Save the currently displayed section in local storage
        window.addEventListener('beforeunload', function () {
            const displayedSection = document.querySelector('.info > div[style*="display: block"]');
            if (displayedSection) {
                localStorage.setItem('selectedSection', displayedSection.id);
            }
        });
 
    </script>

    </body>
</html>