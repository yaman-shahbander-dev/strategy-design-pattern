<?php

interface NotificationChannel
{
    public function notify(string $message, array $recipients): string;
}

class EmailNotification implements NotificationChannel
{
    public function notify(string $message, array $recipients): string
    {
        // Implement email notification logic
        return "Notification sent via email to " . implode(", ", $recipients) . PHP_EOL;
    }
}

class PushNotification implements NotificationChannel
{
    public function notify(string $message, array $recipients): string
    {
        // Implement push notification logic
        return "Notification sent via push to " . implode(", ", $recipients) . PHP_EOL;
    }
}

class SMSNotification implements NotificationChannel
{
    public function notify(string $message, array $recipients): string
    {
        // Implement SMS notification logic
        return "Notification sent via SMS to " . implode(", ", $recipients) . PHP_EOL;
    }
}

class NotificationService
{
    private NotificationChannel $channel;

    public function setChannel(NotificationChannel $channel): self
    {
        $this->channel = $channel;
        return $this;
    }

    public function sendNotification(string $message, array $recipients): string
    {
        return $this->channel->notify($message, $recipients);
    }
}

// Example usage
$notificationService = (new NotificationService())
    ->setChannel(new EmailNotification());

$result = $notificationService->sendNotification(
    "Your order has been shipped!",
    ["john@example.com", "jane@example.com"]
);

echo $result; // Output: Notification sent via email to john@example.com, jane@example.com

// Change the notification channel
$notificationService->setChannel(new PushNotification());

$result = $notificationService->sendNotification(
    "Your order has been delivered!",
    ["mobile_token_1", "mobile_token_2"]
);

echo $result; // Output: Notification sent via push to mobile_token_1, mobile_token_2