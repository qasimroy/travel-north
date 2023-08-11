<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Successful</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <table class="table"
        style="max-width: 600px; margin: 0 auto; font-family: Arial, sans-serif; border-collapse: collapse;">
        <tr>
            <td class="bg-primary" style="padding: 20px; text-align: center;">
                <img src="{{ asset('images/logo.png') }}" alt="Company Logo" style="max-width: 150px;">
            </td>
        </tr>
        <tr>
            <td style="padding: 30px; background-color: #ffffff;">
                <h1 class="display-4">Booking Successful!</h1>
                <p class="lead">Dear {{ $user->name }},</p>
                <p class="lead">We are excited to inform you that your booking has been successfully created. Here are
                    the details:</p>

                <ul class="list-unstyled">
                    <li><strong>Start Date:</strong> {{ $booking->start_date }}</li>
                    <li><strong>End Date:</strong> {{ $booking->end_date }}</li>
                    <li><strong>Origin:</strong> {{ $booking->origin }}</li>
                    <li><strong>Destination:</strong> {{ $booking->destination }}</li>
                    <li><strong>No. of Persons:</strong> {{ $booking->person }}</li>
                    <li><strong>Price:</strong> {{ $booking->price }}</li>
                </ul>

                <div class="text-center mt-4">
                    <a href="{{ $url }}" class="btn btn-primary text-white">View Booking</a>
                </div>

                <p class="mt-4">Thank you for choosing {{ config('app.name') }} for your travel experience!</p>

                <p class="text-muted">For any inquiries, please contact us at <a
                        href="mailto:support@travel-north.com">{{ 'support@travel-north.com' }}</a>.</p>
            </td>
        </tr>
        <tr>
            <td class="bg-light" style="padding: 20px; text-align: center;">
                <p class="small text-muted">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                </p>
            </td>
        </tr>
    </table>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
