<!DOCTYPE html>
<html>
<head>
    <title>New Review Received</title>
</head>
<body style="font-family: 'Inter', sans-serif; color: #111827; line-height: 1.6; background-color: #F9F6F0; padding: 20px;">
    
    <div style="background-color: white; padding: 30px; border-radius: 12px; border: 1px solid #D4B895; max-width: 600px; margin: 0 auto;">
        <h2 style="color: #8B5E34; margin-top: 0;">New Client Review</h2>
        <p>Anda mendapatkan ulasan baru dari website Bali Coconut Art. Berikut detailnya:</p>
        
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #E5E7EB; width: 30%;"><strong>Nama Klien:</strong></td>
                <td style="padding: 10px; border-bottom: 1px solid #E5E7EB;">{{ $data['reviewer_name'] }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #E5E7EB;"><strong>Jenis Event:</strong></td>
                <td style="padding: 10px; border-bottom: 1px solid #E5E7EB;">{{ $data['event_type'] }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #E5E7EB;"><strong>Rating:</strong></td>
                <td style="padding: 10px; border-bottom: 1px solid #E5E7EB; color: #F59E0B; font-size: 18px;">
                    {{ str_repeat('★', $data['rating']) }}{{ str_repeat('☆', 5 - $data['rating']) }}
                </td>
            </tr>
            <tr>
                <td style="padding: 10px; vertical-align: top;"><strong>Ulasan:</strong></td>
                <td style="padding: 10px; font-style: italic; color: #4B5563;">"{{ $data['review_text'] }}"</td>
            </tr>
        </table>
    </div>

</body>
</html>