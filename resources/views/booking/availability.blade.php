@extends('layout')

@section('title', 'Available Rooms - LuxeStay Hotel')

@push('styles')
<style>
    .room-category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 50px rgba(0,0,0,0.15) !important;
    }
    
    .backdrop-blur {
        backdrop-filter: blur(10px);
    }
    
    .weekend-badge, .discount-badge {
        display: inline-block;
        padding: 2px 8px;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    
    .weekend-badge {
        background: linear-gradient(135deg, #fef3c7, #fde68a);
        color: #92400e;
        border: 1px solid #fbbf24;
    }
    
    .discount-badge {
        background: linear-gradient(135deg, #d1fae5, #a7f3d0);
        color: #065f46;
        border: 1px solid #10b981;
    }
</style>
@endpush

@section('content')
<!-- Header Section -->
<section class="py-5 text-white position-relative" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); overflow: hidden;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 0%, transparent 50%); pointer-events: none;"></div>
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-8" data-aos="fade-right">
                <h1 class="display-4 fw-bold mb-4" style="text-shadow: 0 2px 10px rgba(0,0,0,0.2);">
                    <i class="bi bi-calendar-check me-2"></i>Available Rooms
                </h1>
                <div class="d-flex flex-wrap gap-3 align-items-center">
                    <div class="d-flex align-items-center bg-white bg-opacity-20 rounded-pill px-4 py-2 backdrop-blur">
                        <i class="bi bi-calendar3 me-2 fs-5"></i>
                        <span class="fw-semibold">{{ $checkIn->format('M d, Y') }} - {{ $checkOut->format('M d, Y') }}</span>
                    </div>
                    <div class="d-flex align-items-center bg-white bg-opacity-20 rounded-pill px-4 py-2 backdrop-blur">
                        <i class="bi bi-moon-stars me-2 fs-5"></i>
                        <span class="fw-semibold">{{ $checkIn->diffInDays($checkOut) }} {{ $checkIn->diffInDays($checkOut) == 1 ? 'night' : 'nights' }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0" data-aos="fade-left">
                <a href="{{ route('booking.index') }}" class="btn btn-light btn-lg px-4 py-3 shadow-lg" style="border-radius: 12px;">
                    <i class="bi bi-arrow-left me-2"></i>Change Dates
                </a>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <!-- Guest Information Summary -->
    <div class="card mb-5 shadow-sm" data-aos="fade-up" style="border-radius: 16px; border: none; background: rgba(255,255,255,0.98);">
        <div class="card-body p-4 p-md-5">
            <div class="d-flex align-items-center mb-4">
                <div class="rounded-circle p-3 me-3" style="background: linear-gradient(135deg, #667eea, #764ba2);">
                    <i class="bi bi-person-check text-white fs-5"></i>
                </div>
                <h4 class="card-title mb-0 fw-bold" style="background: linear-gradient(135deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Guest Information</h4>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="d-flex align-items-center p-3 rounded-3" style="background: linear-gradient(135deg, #f8f9fa, #e9ecef); border-left: 4px solid #667eea;">
                        <i class="bi bi-person-fill me-3 text-primary fs-4"></i>
                        <div>
                            <small class="text-muted d-block mb-1" style="font-size: 0.8rem;">Full Name</small>
                            <span class="fw-semibold d-block" style="font-size: 1rem;">{{ $customerData['customer_name'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center p-3 rounded-3" style="background: linear-gradient(135deg, #f8f9fa, #e9ecef); border-left: 4px solid #10b981;">
                        <i class="bi bi-envelope-fill me-3 text-success fs-4"></i>
                        <div>
                            <small class="text-muted d-block mb-1" style="font-size: 0.8rem;">Email Address</small>
                            <span class="fw-semibold d-block" style="font-size: 0.95rem;">{{ $customerData['customer_email'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center p-3 rounded-3" style="background: linear-gradient(135deg, #f8f9fa, #e9ecef); border-left: 4px solid #f59e0b;">
                        <i class="bi bi-telephone-fill me-3 text-warning fs-4"></i>
                        <div>
                            <small class="text-muted d-block mb-1" style="font-size: 0.8rem;">Phone Number</small>
                            <span class="fw-semibold d-block" style="font-size: 1rem;">{{ $customerData['customer_phone'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(empty($availableCategories))
        <div class="text-center py-5" data-aos="zoom-in">
            <div class="mb-4">
                <i class="bi bi-calendar-x display-1 text-muted"></i>
            </div>
            <h3 class="fw-bold mb-3">No Rooms Available</h3>
            <p class="lead text-muted mb-4">Sorry, all rooms are booked for your selected dates. Please try different dates or contact our support team.</p>
            <div class="d-flex flex-wrap gap-3 justify-content-center">
                <a href="{{ route('booking.index') }}" class="btn btn-primary btn-lg">
                    <i class="bi bi-arrow-left me-2"></i>Select Different Dates
                </a>
                <button class="btn btn-outline-primary btn-lg" onclick="window.location.href='tel:+8801234567890'">
                    <i class="bi bi-telephone me-2"></i>Call Support
                </button>
            </div>
        </div>
    @else
        <!-- Available Room Categories -->
        <div class="row mb-5">
            <div class="col-12 text-center mb-5" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3" style="background: linear-gradient(135deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Choose Your Perfect Room</h2>
                <p class="lead text-muted fs-5">Select from our available luxury accommodations</p>
                <div class="d-inline-block mt-2" style="height: 4px; width: 80px; background: linear-gradient(90deg, #667eea, #764ba2); border-radius: 2px;"></div>
            </div>
        </div>
        <div class="row g-4">
            @foreach($availableCategories as $index => $item)
                @php
                    $category = $item['category'];
                    $pricing = $item['pricing'];
                @endphp
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="card room-category-card h-100 border-0" style="border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.1); transition: all 0.3s ease; background: rgba(255,255,255,0.98);">
                        <div class="position-relative">
                            <div class="card-header text-white p-4" style="background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 20px 20px 0 0; border: none;">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h5 class="mb-1 fw-bold" style="text-shadow: 0 2px 8px rgba(0,0,0,0.2);">
                                            <i class="bi bi-star-fill me-2"></i>{{ $category->name }}
                                        </h5>
                                        <small class="opacity-90">Luxury accommodation</small>
                                    </div>
                                    <div class="badge bg-white text-success rounded-pill px-3 py-2 fw-semibold" style="box-shadow: 0 2px 8px rgba(0,0,0,0.15);">Available</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="price-breakdown mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-primary rounded-circle p-2 me-2" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bi bi-calculator-fill text-white" style="font-size: 0.9rem;"></i>
                                    </div>
                                    <h6 class="mb-0 fw-bold" style="color: #667eea;">Price Breakdown</h6>
                                </div>
                                
                                <div class="rounded-3 p-3 mb-3" style="background: linear-gradient(135deg, #f8f9fa, #e9ecef); border: 1px solid #e5e7eb;">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Base Rate ({{ $pricing['total_nights'] }} {{ $pricing['total_nights'] == 1 ? 'night' : 'nights' }})</span>
                                        <span class="fw-semibold">৳{{ number_format($category->base_price * $pricing['total_nights']) }}</span>
                                    </div>
                                    
                                    @if($pricing['weekend_surcharge'] > 0)
                                        <div class="d-flex justify-content-between mb-2 text-danger">
                                            <span>
                                                <span class="weekend-badge me-1">Weekend</span>Surcharge (+20%)
                                            </span>
                                            <span class="fw-semibold">+৳{{ number_format($pricing['weekend_surcharge']) }}</span>
                                        </div>
                                    @endif
                                    
                                    @if($pricing['consecutive_discount'] > 0)
                                        <div class="d-flex justify-content-between mb-2 text-success">
                                            <span>
                                                <span class="discount-badge me-1">3+ Nights</span>Discount (-10%)
                                            </span>
                                            <span class="fw-semibold">-৳{{ number_format($pricing['consecutive_discount']) }}</span>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center p-3 rounded-3" style="background: linear-gradient(135deg, #667eea15, #764ba215); border: 2px solid #667eea;">
                                    <span class="fw-bold" style="font-size: 1.1rem;">Total Amount</span>
                                    <div class="text-end">
                                        <div class="h4 mb-0 fw-bold" style="background: linear-gradient(135deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">৳{{ number_format($pricing['final_total']) }}</div>
                                        <small class="text-muted fw-semibold">৳{{ number_format($pricing['final_total'] / $pricing['total_nights']) }}/night avg</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Daily Breakdown -->
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success rounded-circle p-2 me-2" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bi bi-calendar3 text-white" style="font-size: 0.9rem;"></i>
                                    </div>
                                    <h6 class="mb-0 fw-bold" style="color: #10b981;">Daily Rates</h6>
                                </div>
                                <div class="rounded-3 p-3" style="background: linear-gradient(135deg, #f8f9fa, #e9ecef); border: 1px solid #e5e7eb;">
                                    @foreach($pricing['daily_breakdown'] as $day)
                                        <div class="d-flex justify-content-between align-items-center {{ !$loop->last ? 'mb-2' : '' }}">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-calendar-day me-2 text-muted"></i>
                                                <span class="fw-medium">{{ \Carbon\Carbon::parse($day['date'])->format('M d, D') }}</span>
                                                @if($day['is_weekend'])
                                                    <span class="weekend-badge ms-2">Weekend</span>
                                                @endif
                                            </div>
                                            <span class="fw-semibold">৳{{ number_format($day['price']) }}</span>
                                        </div>
                                        @if(!$loop->last)
                                            <hr class="my-2 opacity-25">
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <!-- Book Now Form -->
                            <form action="{{ route('booking.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="room_category_id" value="{{ $category->id }}">
                                <input type="hidden" name="customer_name" value="{{ $customerData['customer_name'] }}">
                                <input type="hidden" name="customer_email" value="{{ $customerData['customer_email'] }}">
                                <input type="hidden" name="customer_phone" value="{{ $customerData['customer_phone'] }}">
                                <input type="hidden" name="check_in_date" value="{{ $checkIn->format('Y-m-d') }}">
                                <input type="hidden" name="check_out_date" value="{{ $checkOut->format('Y-m-d') }}">
                                
                                <button type="submit" class="btn btn-lg w-100 fw-bold text-uppercase" style="background: linear-gradient(135deg, #10b981, #059669); color: white; border: none; border-radius: 14px; padding: 16px; letter-spacing: 0.5px; box-shadow: 0 6px 20px rgba(16, 185, 129, 0.3); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(16, 185, 129, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 20px rgba(16, 185, 129, 0.3)';">
                                    <i class="bi bi-calendar-check me-2"></i>Book This Room
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Booking Information -->
        <section class="mt-5" data-aos="fade-up">
            <div class="card shadow-sm" style="border-radius: 20px; border: none; background: rgba(255,255,255,0.98);">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-5">
                        <div class="rounded-circle p-4 d-inline-flex mb-3" style="background: linear-gradient(135deg, #667eea, #764ba2);">
                            <i class="bi bi-shield-check text-white display-6"></i>
                        </div>
                        <h3 class="fw-bold mb-2" style="background: linear-gradient(135deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Why Book With Us?</h3>
                        <p class="text-muted fs-5">Your satisfaction is our top priority</p>
                        <div class="d-inline-block mt-2" style="height: 4px; width: 60px; background: linear-gradient(90deg, #667eea, #764ba2); border-radius: 2px;"></div>
                    </div>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start p-3 rounded-3" style="background: linear-gradient(135deg, #f0fdf4, #dcfce7); border-left: 4px solid #10b981;">
                                <div class="bg-success rounded-circle p-2 me-3 mt-1" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-clock text-white fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1" style="color: #059669;">Free Cancellation</h6>
                                    <small class="text-muted">Cancel up to 24 hours before check-in</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="bg-primary rounded-circle p-2 me-3 mt-1">
                                    <i class="bi bi-headset text-white"></i>
                                </div>
                                <div>
                                    <h6 class="fw-semibold mb-1">24/7 Support</h6>
                                    <small class="text-muted">Round-the-clock customer assistance</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="bg-info rounded-circle p-2 me-3 mt-1">
                                    <i class="bi bi-lightning text-white"></i>
                                </div>
                                <div>
                                    <h6 class="fw-semibold mb-1">Instant Confirmation</h6>
                                    <small class="text-muted">Immediate booking confirmation</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="bg-warning rounded-circle p-2 me-3 mt-1">
                                    <i class="bi bi-currency-dollar text-white"></i>
                                </div>
                                <div>
                                    <h6 class="fw-semibold mb-1">Best Rate Guarantee</h6>
                                    <small class="text-muted">We match any lower price you find</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="bg-secondary rounded-circle p-2 me-3 mt-1">
                                    <i class="bi bi-eye-slash text-white"></i>
                                </div>
                                <div>
                                    <h6 class="fw-semibold mb-1">No Hidden Fees</h6>
                                    <small class="text-muted">Transparent pricing, what you see is what you pay</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="bg-dark rounded-circle p-2 me-3 mt-1">
                                    <i class="bi bi-shield-lock text-white"></i>
                                </div>
                                <div>
                                    <h6 class="fw-semibold mb-1">Secure Payment</h6>
                                    <small class="text-muted">Your payment information is safe with us</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
@endsection