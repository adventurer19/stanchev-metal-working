#!/bin/bash

# Скрипт за добавяне на порт 8080 в AWS Security Group

# Security Group ID от снимката
SECURITY_GROUP_ID="sg-0b5db88c9a72aa9a5"

echo "🔓 Добавяне на порт 8080 в Security Group: $SECURITY_GROUP_ID"

# Добавяне на inbound rule за порт 8080
aws ec2 authorize-security-group-ingress \
    --group-id $SECURITY_GROUP_ID \
    --protocol tcp \
    --port 8080 \
    --cidr 0.0.0.0/0 \
    --description "Metalworking website"

if [ $? -eq 0 ]; then
    echo "✅ Порт 8080 е успешно добавен!"
    echo "🌐 Сайтът трябва да е достъпен на: http://172.31.16.63:8080"
else
    echo "❌ Грешка при добавяне на правилото"
    echo "💡 Проверка дали правилото вече съществува:"
    aws ec2 describe-security-groups \
        --group-ids $SECURITY_GROUP_ID \
        --query 'SecurityGroups[0].IpPermissions[?FromPort==`8080`]'
fi



