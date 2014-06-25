The Carbon way
--------------
```php
// Carbon comes included with Laravel
use Carbon\Carbon;

Carbon::now()->diffForHumans(
    Carbon::parse("July 4th, 2014")
);
// => "1 week before"

// other cool things
Carbon::yesterday();
Carbon::now()->isWeekend();
Carbon::now()->subWeekdays(5);
```

