<?php
    include 'db_connection.php'; // Include the database connection
    require 'vendor/autoload.php'; // Load PHPMailer

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    date_default_timezone_set('Asia/Kuala_Lumpur'); // Set your timezone

    // Get the current date and time
    $current_date = date('Y-m-d'); // Format: YYYY-MM-DD
    $current_time = date('H:i:s'); // Format: 24-hour time

    // Fetch parents whose scheduled date and time match the current date and time (within a 5-minute window)
    $query = "SELECT * FROM parents WHERE scheduled_date = ? AND scheduled_time BETWEEN ? AND ?";
    $stmt = $conn->prepare($query);

    // Check the time window (e.g., 5 minutes before and after the current time)
    $time_start = date('H:i:s', strtotime($current_time) - 300); // 5 minutes before
    $time_end = date('H:i:s', strtotime($current_time) + 300); // 5 minutes after

    $stmt->bind_param('sss', $current_date, $time_start, $time_end);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $parent_email = $row['email'];
            $parent_name = $row['parent_name'];
            $child_name = $row['child_name'];
            
            // Send email reminder
            $mail = new PHPMailer(true);
            try {
                // SMTP server configuration
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'stephooi2000@gmail.com'; // Your Gmail address
                $mail->Password = 'yerw bczk csna ilir'; // Your app password for Gmail
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                
                // Recipients
                $mail->setFrom('stephooi2000@gmail.com', 'Brain Training Admin');
                $mail->addAddress($parent_email, $parent_name);
                
                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Reminder: Payment for Brain Training';
                $mail->Body    = "<p>Dear $parent_name,</p>
                                <p>This is a reminder that your child's ($child_name) brain training fee is due for the month.</p>
                                <p>Do kindly make the payment. Thanks you!</p>";
                                
                $mail->send();
                echo 'Reminder email sent to ' . $parent_email;
            } catch (Exception $e) {
                echo "Failed to send email to $parent_email. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    } else {
        echo 'No reminders to send.';
    }

    $conn->close();
    ?>