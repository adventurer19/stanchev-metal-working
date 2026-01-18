<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    /**
     * Test that contact page loads successfully
     */
    public function test_contact_page_loads(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertViewIs('contact');
    }

    /**
     * Test that contact form validation works
     */
    public function test_contact_form_validation_requires_fields(): void
    {
        $response = $this->post('/contact', []);

        $response->assertSessionHasErrors(['name', 'email', 'message']);
    }

    /**
     * Test that contact form validates email format
     */
    public function test_contact_form_validates_email_format(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Test User',
            'email' => 'invalid-email',
            'message' => 'Test message',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    /**
     * Test that contact form accepts valid data and redirects
     */
    public function test_contact_form_accepts_valid_data(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Иван Иванов',
            'email' => 'ivan@example.com',
            'phone' => '+359 888 123 456',
            'message' => 'Това е тестово съобщение от контактната форма.',
        ]);

        $response->assertRedirect('/contact');
        $response->assertSessionHas('success');
    }

    /**
     * Test that contact form works without phone (optional field)
     */
    public function test_contact_form_works_without_phone(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'message' => 'Test message without phone',
        ]);

        $response->assertRedirect('/contact');
        $response->assertSessionHas('success');
    }

    /**
     * Test that contact form enforces max length on message
     */
    public function test_contact_form_validates_message_max_length(): void
    {
        $longMessage = str_repeat('a', 2001); // Exceeds 2000 character limit

        $response = $this->post('/contact', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'message' => $longMessage,
        ]);

        $response->assertSessionHasErrors(['message']);
    }

    /**
     * Test that mail configuration is correct
     */
    public function test_mail_configuration_is_set(): void
    {
        $this->assertNotEmpty(config('mail.default'));
        $this->assertNotEmpty(config('mail.from.address'));
        $this->assertNotEmpty(config('mail.from.name'));
    }

    /**
     * Test that email view exists
     */
    public function test_email_template_exists(): void
    {
        $this->assertTrue(
            view()->exists('emails.contact'),
            'Email template emails.contact does not exist'
        );
    }

    /**
     * Test that email template renders correctly
     */
    public function test_email_template_renders_correctly(): void
    {
        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '+359 888 123 456',
            'messageContent' => 'This is a test message',
            'timestamp' => now()->format('d.m.Y H:i:s'),
        ];

        $view = view('emails.contact', $data)->render();

        $this->assertStringContainsString('Test User', $view);
        $this->assertStringContainsString('test@example.com', $view);
        $this->assertStringContainsString('+359 888 123 456', $view);
        $this->assertStringContainsString('This is a test message', $view);
    }
}
