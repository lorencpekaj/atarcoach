# AtarCoach
### An application that allows students to revise for exams

This year, I was a VCE student undertaking Units 3 and 4 of Software Development. It was fun. This was my school-asssessed taskwork (SAT) for my Software Development subject.

The exam is over today, and to remember this day, I am opensorucing this project that took time and effort. The overall outcome was compelling.

Had great fun doing this! Shout out to simon :D

## Developing environment

Laravel 5.3 with Vuejs.

## Installation

To install... Do the typical things.

```php
php artisan install
php artisan upgrade
php artisan migrate
php artisan seed --class=SubjectsTableSeeder 
```

To make yourself an admin, use SQL.
```sql
update users set is_admin=1 where name='{your name}' -- double check the users migration if this doesn't work
```

# Here's some previews

## Landing
![land](https://i.gyazo.com/77f5c91c5e278a70f7fa9ffed53aed72.gif)

## Subject selection
![subj](https://i.gyazo.com/fd06e78ca8281c8578261cc740f5a3a0.png)

## Create an exam
![create exam](https://i.gyazo.com/b722631640d11707e78658f7e1f80674.png)

## Progressing through an exam
![progress](https://i.gyazo.com/b5f3cec20e04d2d72ba72508c0e28fb8.png)

## Result of an exam
![results](https://i.gyazo.com/d6b82bbe5d2571e11fb6c301da33e744.png)

## Admin Panel
![panel](https://i.gyazo.com/036a0d69194b0c58896dd4154602c404.png)