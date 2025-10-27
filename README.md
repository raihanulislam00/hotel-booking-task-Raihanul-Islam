# Hotel Booking System

A comprehensive hotel booking system built with PHP/Laravel framework featuring room categories, weekend pricing, consecutive night discounts, and availability management.

## Features

### Room Categories & Pricing
- **Premium Deluxe** - ৳12,000 BDT per night
- **Super Deluxe** - ৳10,000 BDT per night  
- **Standard Deluxe** - ৳8,000 BDT per night

### Pricing Rules
- **Weekend Surcharge**: +20% on Friday and Saturday
- **Consecutive Discount**: 10% off for 3+ consecutive nights
- **Real-time Pricing**: Dynamic calculation with breakdown display

### Booking Management
- Customer information validation (email, phone regex)
- Date validation (no past dates)
- Room availability tracking (3 rooms per category)
- Booking reference generation
- Comprehensive booking confirmation

### User Interface
- Clean, responsive Bootstrap 5 design
- Interactive date selection
- Real-time price calculations
- Detailed booking confirmation page
- Print-friendly confirmation

## Technical Requirements

- PHP 8.1+
- Laravel 10+
- MySQL/PostgreSQL
- Composer

## Installation & Setup

### 1. Clone the Repository
```bash
git clone https://github.com/raihanulislam00/hotel-booking-task-Raihanul-Islam.git
cd hotel-booking-task-Raihanul-Islam
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Configuration
Edit `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hotel_booking
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. Create Database
Create a database named `hotel_booking` in your MySQL/PostgreSQL server.

### 6. Run Migrations & Seeders
```bash
php artisan migrate
php artisan db:seed
```

### 7. Set Directory Permissions
```bash
chmod -R 775 storage bootstrap/cache
```

### 8. Start Development Server
```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## Database Schema

### Tables Created
1. **room_categories** - Stores room types and base prices
2. **rooms** - Individual room records linked to categories  
3. **bookings** - Customer bookings with pricing details
4. **room_availabilities** - Daily availability tracking

### Initial Data
- 3 room categories with predefined pricing
- 9 rooms total (3 per category)
- Room numbering: PD001-PD003, SD001-SD003, ST001-ST003

## Application Structure

### Models
- `RoomCategory` - Handles pricing logic and availability
- `Room` - Individual room management
- `Booking` - Booking records and calculations
- `RoomAvailability` - Daily availability tracking

### Controllers
- `BookingController` - Main booking flow management

### Views
- `booking/index.blade.php` - Main booking form
- `booking/availability.blade.php` - Available rooms display
- `booking/confirmation.blade.php` - Booking confirmation

## Booking Flow

1. **Customer Information**: Name, email, phone validation
2. **Date Selection**: Check-in/out with past date prevention
3. **Availability Check**: Real-time room availability
4. **Room Selection**: Display available categories with pricing
5. **Price Calculation**: Base price + weekend surcharge - consecutive discount
6. **Booking Confirmation**: Generate reference and confirmation page

## Validation Rules

### Customer Data
- Name: Required, max 255 characters
- Email: Required, valid email format
- Phone: Required, regex validation, 10-15 digits

### Booking Dates
- Check-in: Required, not in past, valid date
- Check-out: Required, after check-in date

### Business Rules
- Maximum 3 rooms per category per day
- Weekend pricing applies to Friday/Saturday
- Consecutive discount applies to 3+ nights
- No overbooking prevention

## Price Calculation Logic

```php
// Weekend Check
if ($date->isFriday() || $date->isSaturday()) {
    $price = $basePrice * 1.2; // +20%
}

// Consecutive Discount
if ($totalNights >= 3) {
    $discount = $totalPrice * 0.1; // -10%
}

$finalPrice = $totalPrice - $discount;
```

## API Endpoints

- `GET /` - Booking form
- `POST /booking/check-availability` - Check room availability  
- `POST /booking/store` - Process booking
- `GET /booking/confirmation/{reference}` - Booking confirmation
- `GET /booking/disabled-dates` - Get fully booked dates (JSON)

## File Structure

```
├── app/
│   ├── Http/Controllers/BookingController.php
│   ├── Models/
│   │   ├── RoomCategory.php
│   │   ├── Room.php
│   │   ├── Booking.php
│   │   └── RoomAvailability.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/views/
│   ├── layout.blade.php
│   └── booking/
│       ├── index.blade.php
│       ├── availability.blade.php
│       └── confirmation.blade.php
└── routes/web.php
```

## Testing

Test the complete booking flow:
1. Fill customer information
2. Select future dates
3. Verify pricing calculations
4. Complete booking
5. Check confirmation details

## Production Deployment

1. Set `APP_ENV=production` in `.env`
2. Set `APP_DEBUG=false`
3. Configure proper database credentials
4. Set up web server (Apache/Nginx)
5. Configure SSL certificate
6. Set up caching and optimization

## Contributing

1. Fork the repository
2. Create feature branch
3. Follow Laravel coding standards
4. Write clean, documented code
5. Submit pull request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Contact

For questions or support, please contact:
- Email: support@hotelbooking.com
- Phone: +880 123 456 7890

---

**Note**: This is a demonstration project showcasing Laravel development skills for hotel booking system requirements.