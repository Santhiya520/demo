<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Contact</title>

</head>

<body>
    <div class="container mt-5 p-3" style="width:40%;margin-left:30%">
        <form method="POST" action="">
            <div class="row card p-3">
                <h1 align="center">Login</h1>
                <div class="col-12">
                    <h6>Name</h6>
                    <input type="text" name="name" class="input-field form-control" placeholder="name" required>
                </div>
                <div class="col-12">
                    <h6>Select</h6>
                    <select class="input-field form-control" name="select" required>
                        <option hidden>--Select--</option>
                        <option value="website">Website</option>
                        <option value="rework">Re-work</option>
                    </select>
                </div>
                <div class="col-12">
                    <h6>Area</h6>
                    <input type="text" name="area" class="input-field form-control" placeholder="area" required>
                </div>
                <div class="col-12 mt-3" align="center">
                    <button type="submit" name="submit" class=" submit-btn btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <?php
    $servername = "localhost"; // your MySQL server
    $username = "root";        // MySQL username
    $password = "";            // MySQL password
    $dbname = "interview";        // Database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['submit'])) {
        $id = 0;
        $name = $_POST['name'];
        $select = $_POST['select'];
        $area = $_POST['area'];

        // Insert into the database
        $sql = "INSERT INTO contact (name,selects,area) VALUES ('$name', '$select','$area')";
        echo $sql;
        if ($conn->query($sql) === TRUE) {
           
// Include PHPMailer files
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');
// Use PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Create a new PHPMailer instance
$mail = new PHPMailer(true); // Passing `true` enables exceptions

try {
    //Server settings
    $mail->isSMTP();                                // Set mailer to use SMTP
    $mail->Host = 'smtp.example.com';                // Specify the SMTP server (e.g., Gmail, SMTP server of your provider)
    $mail->SMTPAuth = true;                          // Enable SMTP authentication
    $mail->Username = 'your_email@example.com';      // SMTP username
    $mail->Password = 'your_password';               // SMTP password (use app password for Gmail if 2FA enabled)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
    $mail->Port = 587;                              // TCP port to connect to (usually 587 for TLS)

    //Recipients
    $mail->setFrom('your_email@example.com', 'Mailer'); // Sender's email address
    $mail->addAddress('recipient@example.com', 'Joe User'); // Recipient's email address

    // Content
    $mail->isHTML(true);                              // Set email format to HTML
    $mail->Subject = 'Notification: Action Successful'; // Email subject
    $mail->Body    = 'Hello,<br><br>Your action has been completed successfully.<br><br>Best regards,<br>Team'; // HTML content of the email
    $mail->AltBody = 'Hello, your action has been completed successfully. Best regards, Team'; // Plain text for non-HTML email clients

    // Send the email
    $mail->send();
    echo 'Email has been sent successfully!';
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

        } else {
            echo "
            <div class='row'>
            <div class='col-12'>
            <h4 style='color:red' align='center'>Something Went Wrong!</h4>
            </div>
            </div>
            
            ";
        }

        
    }



    $conn->close();
    ?>

</body>

</html>