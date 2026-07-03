<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New Inquiry — Bali Coconut Art</title>
</head>
<body style="margin:0;padding:0;background-color:#f6f6f4;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif;">

    {{-- Outer wrapper --}}
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f6f6f4;padding:48px 16px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" border="0" style="max-width:600px;width:100%;">

                    {{-- ── HEADER ── --}}
                    <tr>
                        <td style="padding-bottom:0;">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                style="background-color:#ffffff;border-top:3px solid #8CC63F;border-radius:4px 4px 0 0;">
                                <tr>
                                    <td style="padding:36px 48px 28px;">

                                        {{-- Wordmark --}}
                                        <p style="margin:0 0 24px 0;font-size:11px;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;color:#8CC63F;">
                                            Bali Coconut Art
                                        </p>

                                        {{-- Title --}}
                                        <h1 style="margin:0;font-size:22px;font-weight:700;color:#0f1d06;letter-spacing:-0.01em;line-height:1.3;">
                                            New Event Inquiry
                                        </h1>
                                        <p style="margin:6px 0 0;font-size:14px;color:#6b7280;line-height:1.5;">
                                            Submitted via balicoconutart.com
                                        </p>

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- ── DIVIDER LINE ── --}}
                    <tr>
                        <td style="background-color:#ffffff;padding:0 48px;">
                            <div style="height:1px;background-color:#e5e7eb;"></div>
                        </td>
                    </tr>

                    {{-- ── BODY ── --}}
                    <tr>
                        <td style="background-color:#ffffff;padding:32px 48px 0;">

                            {{-- Intro --}}
                            <p style="margin:0 0 32px;font-size:14px;color:#4b5563;line-height:1.7;">
                                A new inquiry has been submitted. Review the details below
                                and hit <strong style="color:#0f1d06;">Reply</strong> to respond directly to the client.
                            </p>

                        </td>
                    </tr>

                    {{-- ── PERSONAL INFORMATION ── --}}
                    <tr>
                        <td style="background-color:#ffffff;padding:0 48px;">

                            <p style="margin:0 0 12px;font-size:10px;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;color:#9ca3af;">
                                Personal Information
                            </p>

                            <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                style="border:1px solid #e5e7eb;border-radius:4px;">

                                <tr>
                                    <td width="40%" style="padding:14px 20px;border-bottom:1px solid #f3f4f6;font-size:12px;color:#9ca3af;font-weight:500;">
                                        Full Name
                                    </td>
                                    <td width="60%" style="padding:14px 20px;border-bottom:1px solid #f3f4f6;font-size:13px;color:#111827;font-weight:600;">
                                        {{ $data['name'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:14px 20px;border-bottom:1px solid #f3f4f6;font-size:12px;color:#9ca3af;font-weight:500;">
                                        Email Address
                                    </td>
                                    <td style="padding:14px 20px;border-bottom:1px solid #f3f4f6;font-size:13px;font-weight:600;">
                                        <a href="mailto:{{ $data['email'] }}" style="color:#5B8C2A;text-decoration:none;">
                                            {{ $data['email'] }}
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:14px 20px;font-size:12px;color:#9ca3af;font-weight:500;">
                                        Phone Number
                                    </td>
                                    <td style="padding:14px 20px;font-size:13px;color:#111827;font-weight:600;">
                                        {{ $data['phone'] }}
                                    </td>
                                </tr>

                            </table>

                        </td>
                    </tr>

                    {{-- ── EVENT INFORMATION ── --}}
                    <tr>
                        <td style="background-color:#ffffff;padding:28px 48px 0;">

                            <p style="margin:0 0 12px;font-size:10px;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;color:#9ca3af;">
                                Event Information
                            </p>

                            <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                style="border:1px solid #e5e7eb;border-radius:4px;">

                                <tr>
                                    <td width="40%" style="padding:14px 20px;border-bottom:1px solid #f3f4f6;font-size:12px;color:#9ca3af;font-weight:500;">
                                        Event / Brand Name
                                    </td>
                                    <td width="60%" style="padding:14px 20px;border-bottom:1px solid #f3f4f6;font-size:13px;color:#111827;font-weight:600;">
                                        {{ $data['event_name'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:14px 20px;border-bottom:1px solid #f3f4f6;font-size:12px;color:#9ca3af;font-weight:500;">
                                        Event Date
                                    </td>
                                    <td style="padding:14px 20px;border-bottom:1px solid #f3f4f6;font-size:13px;color:#111827;font-weight:600;">
                                        {{ \Carbon\Carbon::parse($data['event_date'])->format('d F Y') }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:14px 20px;border-bottom:1px solid #f3f4f6;font-size:12px;color:#9ca3af;font-weight:500;">
                                        Number of Coconuts
                                    </td>
                                    <td style="padding:14px 20px;border-bottom:1px solid #f3f4f6;">
                                        <span style="display:inline-block;background-color:#f0f7e6;color:#3B6D11;font-size:12px;font-weight:700;padding:3px 10px;border-radius:20px;letter-spacing:0.02em;">
                                            {{ number_format($data['coconut_count']) }} pcs
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:14px 20px;font-size:12px;color:#9ca3af;font-weight:500;">
                                        Location
                                    </td>
                                    <td style="padding:14px 20px;font-size:13px;color:#111827;font-weight:600;">
                                        {{ $data['location'] }}
                                    </td>
                                </tr>

                            </table>

                        </td>
                    </tr>

                    {{-- ── ADDITIONAL NOTES (conditional) ── --}}
                    @if (!empty($data['message']))
                    <tr>
                        <td style="background-color:#ffffff;padding:28px 48px 0;">

                            <p style="margin:0 0 12px;font-size:10px;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;color:#9ca3af;">
                                Additional Notes
                            </p>

                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="border:1px solid #e5e7eb;border-left:3px solid #8CC63F;border-radius:0 4px 4px 0;padding:16px 20px;background-color:#fafafa;">
                                        <p style="margin:0;font-size:13px;color:#374151;line-height:1.8;">
                                            {{ $data['message'] }}
                                        </p>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    @endif

                    {{-- ── CTA REPLY ── --}}
                    <tr>
                        <td style="background-color:#ffffff;padding:32px 48px 40px;">

                            <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                style="background-color:#f9fafb;border:1px solid #e5e7eb;border-radius:4px;">
                                <tr>
                                    <td style="padding:24px 28px;">

                                        <p style="margin:0 0 4px;font-size:13px;font-weight:600;color:#111827;">
                                            Ready to respond?
                                        </p>
                                        <p style="margin:0 0 20px;font-size:12px;color:#6b7280;line-height:1.6;">
                                            Hit <strong>Reply</strong> on this email to reach
                                            <strong style="color:#0f1d06;">{{ $data['name'] }}</strong> directly at
                                            <span style="color:#5B8C2A;">{{ $data['email'] }}</span>
                                        </p>

                                        <a href="mailto:{{ $data['email'] }}?subject=Re: Your Inquiry — {{ $data['event_name'] }}"
                                            style="display:inline-block;background-color:#0f1d06;color:#ffffff;text-decoration:none;
                                                   font-size:11px;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;
                                                   padding:12px 24px;border-radius:4px;">
                                            Reply to {{ $data['name'] }} &rarr;
                                        </a>

                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    {{-- ── FOOTER ── --}}
                    <tr>
                        <td style="background-color:#f6f6f4;border-top:1px solid #e5e7eb;padding:28px 48px;border-radius:0 0 4px 4px;">

                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td>
                                        <p style="margin:0 0 4px;font-size:11px;color:#9ca3af;line-height:1.6;">
                                            This is an automated notification from
                                            <a href="https://balicoconutart.com" style="color:#6b7280;text-decoration:underline;">balicoconutart.com</a>
                                        </p>
                                        <p style="margin:0;font-size:11px;color:#d1d5db;">
                                            &copy; {{ date('Y') }} Bali Coconut Art. All rights reserved.
                                        </p>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>