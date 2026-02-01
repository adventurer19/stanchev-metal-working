<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\ContactSubmission;

// Create test submissions
$submissions = [
    [
        'name' => 'Иван Петров',
        'email' => 'ivan.petrov@example.com',
        'phone' => '+359 888 123 456',
        'message' => 'Здравейте, интересувам се от услугите ви за CNC обработка. Имам проект за 50 метални детайла. Бихте ли могли да ми изпратите оферта?',
        'ip_address' => '192.168.1.100',
        'is_read' => false,
    ],
    [
        'name' => 'Мария Георгиева',
        'email' => 'maria.g@company.bg',
        'phone' => '+359 877 555 888',
        'message' => 'Добър ден, търсим партньор за заваряване на метални конструкции. Имате ли свободен капацитет за серийно производство?',
        'ip_address' => '192.168.1.101',
        'is_read' => false,
    ],
    [
        'name' => 'Георги Димитров',
        'email' => 'g.dimitrov@mail.bg',
        'phone' => null,
        'message' => 'Здравейте, бих искал да попитам за цени на фрезоване. Работите ли с алуминий?',
        'ip_address' => '192.168.1.102',
        'is_read' => true,
    ],
    [
        'name' => 'Стефан Иванов',
        'email' => 'stefan.ivanov@industrial.com',
        'phone' => '+359 899 777 333',
        'message' => 'Добър ден, представлявам машиностроителна фирма. Имаме нужда от прецизна обработка на 200 детайла. Можем ли да уговорим среща за обсъждане на детайли и сроковете за изпълнение?',
        'ip_address' => '192.168.1.103',
        'is_read' => true,
    ],
    [
        'name' => 'Елена Николова',
        'email' => 'elena.nikolova@abv.bg',
        'phone' => '+359 888 999 222',
        'message' => 'Интересувам се от лазерно рязане на метал. Какви са вашите цени за малки поръчки?',
        'ip_address' => '192.168.1.104',
        'is_read' => false,
    ],
];

foreach ($submissions as $submission) {
    ContactSubmission::create($submission);
    echo "✓ Създадено: {$submission['name']}\n";
}

echo "\n✅ Всички 5 тестови submissions са създадени успешно!\n";
