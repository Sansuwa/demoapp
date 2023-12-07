<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>

</head>

<body>
    <h1>Registration Form</h1>

    @if(session('success'))
    <div class="alert alert-success" style="font-size: 20px; color: green; font-weight: bold;">
        {{ session('success') }}
    </div>
    @endif


    <form id='registrationForm' action=" /register" method="POST">
        @csrf

        <label for="firstname">First Name:</label><br>
        <input type="text" id="firstname" name="firstname"><br>


        <label for="lastname">Last Name:</label><br>
        <input type="text" id="lastname" name="lastname"><br>

        <label for="middlename">Middle Name:</label><br>
        <input type="text" id="middlename" name="middlename"><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>

        <label for="phone">Phone:</label><br>
        <input type="number" id="phone" name="phone" pattern="[0-9]{10}"><br>

        <label for="gender">Gender:</label><br>
        <select id="gender" name="gender">
            <option value="1">Male</option>
            <option value="2">Female</option>
            <option value="3">Other</option>
        </select><br>

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address"><br>
        <br><br>

        <input type="submit" value="Submit">
        </form>


        <script>
            document.getElementById('registrationForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent form submission

                var firstname = document.getElementById('firstname').value;
                var lastname = document.getElementById('lastname').value;
                var phone = document.getElementById('phone').value;
                var email = document.getElementById('email').value;

                var isValid = true;

                if (!firstname.match(/^[a-zA-Z]+$/)) {
                    isValid = false;
                    alert('Please enter a valid first name.');
                }

                if (!lastname.match(/^[a-zA-Z]+$/)) {
                    isValid = false;
                    alert('Please enter a valid last name.');
                }

                if (!phone.match(/^\d{10}$/)) {
                    isValid = false;
                    alert('Please enter a valid 10-digit phone number.');
                }

                if (!isValidEmail(email)) {
                    isValid = false;
                    alert('Please enter a valid email address.');
                }

                if (isValid) {
                    this.submit();
                }
            });

            function isValidEmail(email) {
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailPattern.test(email);
            }
        </script>

</body>

</html>