<!DOCTYPE html>
<html>
<head>
    <title>Login Link</title>
    <style>
        /* CSS styles for the email template */
        body {
            font-family: Arial, sans-serif;
        }
        
        /* Adjust other styles as needed */
        
    </style>
</head>
<body>
    <!-- HTML structure for the email template -->
    <table border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <!-- Header -->
                <h1>Hello {{ $userName }},</h1>
            </td>
        </tr>
        <tr>
            <td>
                <!-- Content -->
                <p>You can login to your account by clicking the link below:</p>
                <a href="{{ $loginLink }}">Login to the application</a>


            </td>
        </tr>
        <tr>
            <td>
                <!-- Footer -->
                <p>Thanks, {{ config('app.name') }}</p>
            </td>
        </tr>
    </table>
</body>
</html>