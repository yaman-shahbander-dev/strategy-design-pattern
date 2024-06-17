# Strategy Design Pattern
## What is the Strategy Design Pattern?

The Strategy design pattern is a behavioral design pattern that allows you to define a family of algorithms, encapsulate each one, and make them interchangeable. It enables the selection of an algorithm at runtime, allowing the algorithm to vary independently from the clients that use it.

## Benefits of the Strategy Design Pattern
**Flexibility**: The Strategy pattern allows you to change the algorithm or strategy used by an object at runtime, making your code more flexible and adaptable to changing requirements.

**Reusability**: The pattern promotes code reuse by encapsulating different algorithms or strategies into separate classes, which can be easily swapped in and out as needed.

**Maintainability**: By separating the algorithm implementation from the context that uses it, the Strategy pattern makes your code more modular and easier to maintain.

**Testability**: The pattern makes it easier to test each algorithm or strategy in isolation, as they are decoupled from the main logic.

## Example Implementation
In the provided example, we have an implementation of the Strategy design pattern to handle different notification channels.

The key components are:

**1. NotificationChannel Interface**: This interface defines the contract for sending notifications, with a notify method.

**2. Concrete Notification Channel Classes**: These classes (EmailNotification, PushNotification, and SMSNotification) implement the NotificationChannel interface, each with its own implementation of the notify method.

**3. NotificationService Class**: This class acts as the context, allowing the client to set the specific NotificationChannel implementation to be used. It has a setChannel method to set the channel, and a sendNotification method to send the notification using the selected channel.

```
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
```

In this example, the NotificationService class is the client that can use different notification channels. By using the Strategy pattern, the client can easily switch between different notification channels without modifying the main logic of the NotificationService class.

This approach makes the code more flexible, maintainable, and testable, as each notification channel is encapsulated in its own class and can be easily swapped in and out as needed.
