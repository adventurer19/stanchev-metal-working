<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class TestMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:test {email? : Email адрес за тестване (по подразбиране: nezull02@abv.bg)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Изпраща тестов имейл за проверка на mail конфигурацията';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $testEmail = $this->argument('email') ?? 'stanchev_sin2025@abv.bg';

        $this->info('🔍 Mail Configuration:');
        $this->line('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->table(
            ['Setting', 'Value'],
            [
                ['MAIL_MAILER', Config::get('mail.default')],
                ['MAIL_HOST', Config::get('mail.mailers.smtp.host')],
                ['MAIL_PORT', Config::get('mail.mailers.smtp.port')],
                ['MAIL_USERNAME', Config::get('mail.mailers.smtp.username')],
                ['MAIL_ENCRYPTION', Config::get('mail.mailers.smtp.encryption')],
                ['MAIL_FROM_ADDRESS', Config::get('mail.from.address')],
                ['MAIL_FROM_NAME', Config::get('mail.from.name')],
            ]
        );

        $this->line('');
        $this->info("📤 Изпращане на тестов имейл към: {$testEmail}");
        $this->line('');

        try {
            $data = [
                'name' => 'Test User',
                'email' => $testEmail,
                'phone' => '+359 888 123 456',
                'messageContent' => "Това е тестово съобщение от контактната форма.\n\nАко виждате този имейл, значи mail конфигурацията работи отлично!\n\n✅ SMTP Host: " . Config::get('mail.mailers.smtp.host') . "\n✅ Port: " . Config::get('mail.mailers.smtp.port') . "\n✅ Encryption: " . Config::get('mail.mailers.smtp.encryption'),
                'timestamp' => now()->format('d.m.Y H:i:s'),
            ];

            // Не задаваме from() експлицитно - оставяме Laravel да използва MAIL_FROM_ADDRESS
            Mail::send('emails.contact', $data, function ($message) use ($testEmail) {
                $message->to($testEmail)
                    ->subject('🧪 Тестово съобщение - Контактна форма')
                    ->replyTo($testEmail, 'Test User');
            });

            $this->newLine();
            $this->info('✅ Тестовият имейл е изпратен успешно!');
            $this->line('');
            $this->comment("📧 Проверете: {$testEmail}");
            $this->comment('⏰ Изчакайте 1-3 минути');
            $this->comment('📂 Проверете и SPAM/JUNK папката');
            $this->line('');

            return Command::SUCCESS;

        } catch (\Exception $e) {
            $this->newLine();
            $this->error('❌ Грешка при изпращане на имейл!');
            $this->line('');
            $this->error('Съобщение: ' . $e->getMessage());
            $this->line('');
            $this->warn('💡 Възможни причини:');
            $this->line('  • Невалидни SMTP настройки в .env файла');
            $this->line('  • Грешна парола');
            $this->line('  • SMTP портът е блокиран');
            $this->line('  • SSL/TLS конфигурацията е неправилна');
            $this->line('');

            return Command::FAILURE;
        }
    }
}
