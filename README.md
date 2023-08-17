# Boktoso Enterprise, LLC. - Normalize Spam Phone Numbers

Hey guys! Are you tired of people typing in weird phone numbers to bypass filters and flags in your system? Are you
tired of seeing the "Call 5 five 5 zero 1 nine" numbers? Well here is the package for you!

This package includes a PHP Service Class to format any found numbers into an integer string for you to
process further.

Installation
```
composer require boktoso-enterprise/normalize-spam-phone-numbers
```

Examples:

* (90nine) 283-942zero
* (909)283-9 4 2zero

PHP Code Example:

````
use BoktosoEnterprise\NormalizeSpamPhoneNumbers\NormalizerService;

$message = '(90nine) 283-942zero';
$phoneNumber = NormalizerService::normalizePhoneNumber($message);

echo $phoneNumber; // 9092839420
````
