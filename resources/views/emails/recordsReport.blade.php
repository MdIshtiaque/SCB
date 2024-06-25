<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Records Report</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            width: 80%;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #eaeaea;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            margin: 30px 0;
        }
        .content p {
            line-height: 1.6;
            color: #333333;
        }
        .content .greeting {
            font-size: 18px;
            font-weight: bold;
        }
        .content .signature {
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            border-top: 1px solid #eaeaea;
            margin-top: 40px;
            font-size: 12px;
            color: #888888;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #0070c9;
            border-radius: 5px;
            text-decoration: none;
        }
        .button:hover {
            background-color: #005bb5;
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
        <p class="signature">Best regards</p>
    </div>
    <div class="footer">
        <p>© Standard Chartered 2024</p>
    </div>
</div>
</body>
</html>
