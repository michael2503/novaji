<!DOCTYPE html>
<html lang="en">
<head>
    <title>Email Verification</title>
</head>
<body style="background:#f8f8f8; width: 100%; padding: 0;margin: 0;overflow-x: hidden; font-family:calibri; font-weight: 400px; font-size: 16px">
    <section style="background: #fff; max-width:600px; margin: auto; margin-top: 40px; padding: 5px; border-top-left-radius: 20px; border-top-right-radius: 20px; border: 1px solid #f2f2f2">
        <div style="background:#f2f6ff; height:68px; border-top-left-radius: 20px; border-top-right-radius: 20px; text-align: center">
            <h3>NOVAJI INTROSERVE</h3>
        </div>

        <div style="padding: 10px; margin-top: 10px; border-radius: 5px; margin-bottom: 70px;">
            <h2>Account verification</h2>

            <p style="font-size: 17px; line-height: 25px;">Hi <b>{{ $mailData['name'] }}</b>, Thank you for signing up! Please verify your email address so you can get started with Sodium.</p>

            <div style="margin-top: 40px;">
                <a href="{{ $mailData['link'] }}" target="_blank" style="background: #1e52e7; color: #fff; padding: 12px 20px; font-size: 14px; text-decoration: none; border-radius: 8px;">Verify Email</a>
            </div>

            <hr style="margin-top: 70px; border: 1px solid #ccc;">

            <p style="font-size: 17px; line-height: 25px;">Trouble with the link above? Copy and paste the link below into your browser to verify</p>
            <a href="{{ $mailData['link'] }}" target="_blank" style="font-size: 17px;">{{ $mailData['link'] }}</a>
        </div>

    </section>

</body>
</html>
