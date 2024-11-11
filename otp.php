<?php
session_start();
if (!isset($_SESSION['temp_user_data'])) {
    header("Location: register.php");
    exit(0);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification Form</title>
    <link rel="stylesheet" href="assets/CSS/otp.css">
    <style>
        /* Add these styles for the button states */
        button:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
            opacity: 0.7;
        }
        
        button:enabled {
            background-color: #4070f4;
            cursor: pointer;
        }

        .input-field input::-webkit-inner-spin-button,
        .input-field input::-webkit-outer-spin-button {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <header><i class="bx bxs-check-shield"></i></header>
        <h4>Enter OTP Code</h4>
        <?php
        if(isset($_SESSION['message'])) {
            echo "<div class='alert'>" . $_SESSION['message'] . "</div>";
            unset($_SESSION['message']);
        }
        ?>
        <form action="verify_otp.php" method="POST" id="otpForm">
            <div class="input-field">
                <input type="number" name="otp[]" class="otp-input" maxlength="1" required>
                <input type="number" name="otp[]" class="otp-input" maxlength="1" required>
                <input type="number" name="otp[]" class="otp-input" maxlength="1" required>
                <input type="number" name="otp[]" class="otp-input" maxlength="1" required>
                <input type="number" name="otp[]" class="otp-input" maxlength="1" required>
                <input type="number" name="otp[]" class="otp-input" maxlength="1" required>
            </div>
            <button type="submit" name="verify_otp" id="verifyButton" disabled>Verify OTP</button>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('otpForm');
        const inputs = document.querySelectorAll('.otp-input');
        const button = document.getElementById('verifyButton');

        // Focus first input on load
        inputs[0].focus();

        inputs.forEach((input, index) => {
            // Prevent non-numeric input
            input.addEventListener('keypress', function(e) {
                if (e.key < '0' || e.key > '9') {
                    e.preventDefault();
                }
            });

            // Handle input
            input.addEventListener('input', function(e) {
                // Ensure only one digit
                if (this.value.length > 1) {
                    this.value = this.value.slice(0, 1);
                }

                // Move to next input if available
                if (this.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }

                checkInputs();
            });

            // Handle backspace
            input.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace') {
                    if (!this.value && index > 0) {
                        inputs[index - 1].focus();
                        inputs[index - 1].value = '';
                    } else {
                        this.value = '';
                    }
                    checkInputs();
                }
            });

            // Prevent paste except numbers
            input.addEventListener('paste', function(e) {
                e.preventDefault();
                const pastedData = e.clipboardData.getData('text');
                const numbers = pastedData.match(/\d/g);
                
                if (numbers) {
                    numbers.forEach((num, i) => {
                        if (index + i < inputs.length) {
                            inputs[index + i].value = num;
                        }
                    });
                    checkInputs();
                }
            });
        });

        function checkInputs() {
            const allFilled = Array.from(inputs).every(input => input.value.length === 1);
            button.disabled = !allFilled;
            
            if (allFilled) {
                button.style.backgroundColor = '#4070f4';
                button.style.cursor = 'pointer';
            } else {
                button.style.backgroundColor = '#cccccc';
                button.style.cursor = 'not-allowed';
            }
        }

        // Handle form submission
        form.addEventListener('submit', function(e) {
            const allFilled = Array.from(inputs).every(input => input.value.length === 1);
            if (!allFilled) {
                e.preventDefault();
                alert('Please fill in all OTP digits');
            }
        });
    });
    </script>
</body>
</html>
