# birthday-reminder

This is a web-based calendar for managing and reminding birthdays.

## Prerequisites

1. Copy the content of `config.txt` and create `config.php`.
2. Copy the content of `smtp.class.txt` and create `smtp.class.php`.

## Testing

To test the application, run:
```bash
php check.php
```

Alternatively, create a cron job to check every day.

## Cron Job Example

To create a cron job that runs every day at 9 AM, add the following line to your crontab:
```cron
0 9 * * * /usr/bin/php /path/to/your/project/check.php
```
