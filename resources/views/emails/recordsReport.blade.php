<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Records Report</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap');

        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 90%;
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #00a859;
        }
        .header img {
            max-width: 120px;
        }
        .content {
            margin: 30px 0;
        }
        .content p {
            line-height: 1.6;
            color: #333333;
            font-size: 16px;
        }
        .content .greeting {
            font-size: 20px;
            font-weight: 600;
            color: #00a859;
        }
        .content .signature {
            margin-top: 30px;
            font-style: italic;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            border-top: 2px solid #00a859;
            margin-top: 40px;
            font-size: 14px;
            color: #777777;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            margin-top: 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #00a859;
            border-radius: 5px;
            text-decoration: none;
        }
        .button:hover {
            background-color: #007a4b;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <img src="{{ $message->embed(public_path('assets/images/logo-sm.png')) }}" alt="Standard Chartered Bank">
    </div>
    <div class="content">
        <p class="greeting">Dear Sir,</p>
        <p>Please find attached the daily priority list report for Standard Chartered Bank.</p>
        <p>We appreciate your attention to these priority matters. Should you have any questions or need further assistance, please do not hesitate to reach out.</p>
        <p class="signature">Best regards,<br>Standard Chartered Bank</p>
    </div>
    <div class="footer">
        <p>© Standard Chartered 2024. All rights reserved.</p>
    </div>
</div>
</body>
</html>
