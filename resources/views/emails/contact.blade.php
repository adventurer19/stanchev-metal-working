<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ново съобщение от контактна форма</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
        }
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            padding: 40px 30px;
            text-align: center;
        }
        .email-header h1 {
            color: #38bdf8;
            margin: 0 0 10px 0;
            font-size: 28px;
            font-weight: 700;
        }
        .email-header p {
            color: #94a3b8;
            margin: 0;
            font-size: 14px;
        }
        .email-body {
            padding: 40px 30px;
            background-color: #ffffff;
        }
        .info-box {
            background-color: #f8fafc;
            border-left: 4px solid #38bdf8;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .info-row {
            margin-bottom: 15px;
        }
        .info-row:last-child {
            margin-bottom: 0;
        }
        .info-label {
            font-weight: 600;
            color: #475569;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }
        .info-value {
            color: #0f172a;
            font-size: 16px;
            word-break: break-word;
        }
        .message-box {
            background-color: #f1f5f9;
            padding: 25px;
            border-radius: 6px;
            margin-top: 25px;
            border: 1px solid #e2e8f0;
        }
        .message-label {
            font-weight: 600;
            color: #475569;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }
        .message-content {
            color: #1e293b;
            font-size: 15px;
            line-height: 1.6;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        .email-footer {
            background-color: #0f172a;
            padding: 30px;
            text-align: center;
            color: #94a3b8;
            font-size: 13px;
        }
        .email-footer strong {
            color: #38bdf8;
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
        }
        .reply-button {
            display: inline-block;
            background-color: #38bdf8;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 4px;
            font-weight: 600;
            margin: 20px 0;
            transition: background-color 0.3s;
        }
        .reply-button:hover {
            background-color: #0ea5e9;
        }
        .timestamp {
            color: #94a3b8;
            font-size: 12px;
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }
        @media only screen and (max-width: 600px) {
            .email-container {
                margin: 0;
                border-radius: 0;
            }
            .email-header, .email-body, .email-footer {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>📧 Ново Съобщение</h1>
            <p>Получено от контактната форма</p>
        </div>

        <!-- Body -->
        <div class="email-body">
            <p style="color: #475569; font-size: 15px; margin-bottom: 25px;">
                Имате ново съобщение от контактната форма на вашия уебсайт:
            </p>

            <!-- Contact Information -->
            <div class="info-box">
                <div class="info-row">
                    <div class="info-label">👤 Име</div>
                    <div class="info-value">{{ $name }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">✉️ Имейл</div>
                    <div class="info-value">
                        <a href="mailto:{{ $email }}" style="color: #38bdf8; text-decoration: none;">{{ $email }}</a>
                    </div>
                </div>
                @if($phone)
                <div class="info-row">
                    <div class="info-label">📞 Телефон</div>
                    <div class="info-value">
                        <a href="tel:{{ $phone }}" style="color: #38bdf8; text-decoration: none;">{{ $phone }}</a>
                    </div>
                </div>
                @endif
            </div>

            <!-- Message -->
            <div class="message-box">
                <div class="message-label">💬 Съобщение</div>
                <div class="message-content">{{ $messageContent }}</div>
            </div>

            <!-- Reply Button -->
            <div style="text-align: center;">
                <a href="mailto:{{ $email }}" class="reply-button">Отговори на {{ $name }}</a>
            </div>

            <!-- Timestamp -->
            <div class="timestamp">
                📅 Получено на: {{ $timestamp }}
            </div>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <strong>Станчев и Син 2025 ЕООД</strong>
            <p style="margin: 5px 0;">Металообработка и Зъботехника</p>
            <p style="margin: 5px 0;">Болтата, бул. Столетов 162</p>
            <p style="margin: 5px 0;">📞 +359 77855070</p>
            <p style="margin: 15px 0 0 0; font-size: 11px; color: #64748b;">
                Това съобщение е автоматично генерирано от контактната форма на вашия уебсайт.
            </p>
        </div>
    </div>
</body>
</html>
