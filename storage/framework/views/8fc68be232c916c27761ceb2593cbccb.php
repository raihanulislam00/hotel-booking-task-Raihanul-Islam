<?php $__env->startSection('title', 'Available Rooms - LuxeStay Hotel'); ?>

<?php $__env->startSection('content'); ?>
<!-- Header Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8" data-aos="fade-right">
                <h1 class="display-5 fw-bold mb-3">
                    <i class="bi bi-calendar-check me-2"></i>Available Rooms
                </h1>
                <div class="d-flex flex-wrap gap-3 align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-calendar3 me-2"></i>
                        <span class="fw-semibold"><?php echo e($checkIn->format('M d, Y')); ?> - <?php echo e($checkOut->format('M d, Y')); ?></span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-moon me-2"></i>
                        <span><?php echo e($checkIn->diffInDays($checkOut)); ?> <?php echo e($checkIn->diffInDays($checkOut) == 1 ? 'night' : 'nights'); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0" data-aos="fade-left">
                <a href="<?php echo e(route('booking.index')); ?>" class="btn btn-light btn-lg">
                    <i class="bi bi-arrow-left me-2"></i>Change Dates
                </a>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <!-- Guest Information Summary -->
    <div class="card mb-5 shadow" data-aos="fade-up">
        <div class="card-body p-4">
            <div class="d-flex align-items-center mb-3">
                <div class="bg-primary rounded-circle p-2 me-3">
                    <i class="bi bi-person-check text-white"></i>
                </div>
                <h5 class="card-title mb-0 fw-bold">Guest Information</h5>
            </div>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person me-2 text-muted"></i>
                        <div>
                            <small class="text-muted d-block">Full Name</small>
                            <span class="fw-semibold"><?php echo e($customerData['customer_name']); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-envelope me-2 text-muted"></i>
                        <div>
                            <small class="text-muted d-block">Email Address</small>
                            <span class="fw-semibold"><?php echo e($customerData['customer_email']); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-telephone me-2 text-muted"></i>
                        <div>
                            <small class="text-muted d-block">Phone Number</small>
                            <span class="fw-semibold"><?php echo e($customerData['customer_phone']); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(empty($availableCategories)): ?>
        <div class="text-center py-5" data-aos="zoom-in">
            <div class="mb-4">
                <i class="bi bi-calendar-x display-1 text-muted"></i>
            </div>
            <h3 class="fw-bold mb-3">No Rooms Available</h3>
            <p class="lead text-muted mb-4">Sorry, all rooms are booked for your selected dates. Please try different dates or contact our support team.</p>
            <div class="d-flex flex-wrap gap-3 justify-content-center">
                <a href="<?php echo e(route('booking.index')); ?>" class="btn btn-primary btn-lg">
                    <i class="bi bi-arrow-left me-2"></i>Select Different Dates
                </a>
                <button class="btn btn-outline-primary btn-lg" onclick="window.location.href='tel:+8801234567890'">
                    <i class="bi bi-telephone me-2"></i>Call Support
                </button>
            </div>
        </div>
    <?php else: ?>
        <!-- Available Room Categories -->
        <div class="row mb-5">
            <div class="col-12 text-center mb-5">
                <h2 class="display-6 fw-bold mb-3">Choose Your Perfect Room</h2>
                <p class="lead text-muted">Select from our available luxury accommodations</p>
            </div>
        </div>
        <div class="row g-4">
            <?php $__currentLoopData = $availableCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $category = $item['category'];
                    $pricing = $item['pricing'];
                ?>
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="<?php echo e($index * 100); ?>">
                    <div class="card room-category-card h-100 shadow-sm">
                        <div class="position-relative">
                            <div class="card-header bg-gradient text-white p-4" style="background: linear-gradient(135deg, #667eea, #764ba2);">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h5 class="mb-1 fw-bold">
                                            <i class="bi bi-star-fill me-2"></i><?php echo e($category->name); ?>

                                        </h5>
                                        <small class="opacity-75">Luxury accommodation</small>
                                    </div>
                                    <div class="badge bg-success rounded-pill">Available</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="price-breakdown mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-calculator-fill text-primary me-2"></i>
                                    <h6 class="mb-0 fw-bold">Price Breakdown</h6>
                                </div>
                                
                                <div class="bg-light rounded-3 p-3 mb-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Base Rate (<?php echo e($pricing['total_nights']); ?> <?php echo e($pricing['total_nights'] == 1 ? 'night' : 'nights'); ?>)</span>
                                        <span class="fw-semibold">৳<?php echo e(number_format($category->base_price * $pricing['total_nights'])); ?></span>
                                    </div>
                                    
                                    <?php if($pricing['weekend_surcharge'] > 0): ?>
                                        <div class="d-flex justify-content-between mb-2 text-danger">
                                            <span>
                                                <span class="weekend-badge me-1">Weekend</span>Surcharge (+20%)
                                            </span>
                                            <span class="fw-semibold">+৳<?php echo e(number_format($pricing['weekend_surcharge'])); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if($pricing['consecutive_discount'] > 0): ?>
                                        <div class="d-flex justify-content-between mb-2 text-success">
                                            <span>
                                                <span class="discount-badge me-1">3+ Nights</span>Discount (-10%)
                                            </span>
                                            <span class="fw-semibold">-৳<?php echo e(number_format($pricing['consecutive_discount'])); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center p-3 bg-primary bg-opacity-10 rounded-3">
                                    <span class="fw-bold">Total Amount</span>
                                    <div class="text-end">
                                        <div class="h4 mb-0 text-primary fw-bold">৳<?php echo e(number_format($pricing['final_total'])); ?></div>
                                        <small class="text-muted">৳<?php echo e(number_format($pricing['final_total'] / $pricing['total_nights'])); ?>/night avg</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Daily Breakdown -->
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-calendar3 text-primary me-2"></i>
                                    <h6 class="mb-0 fw-bold">Daily Rates</h6>
                                </div>
                                <div class="border rounded-3 p-3">
                                    <?php $__currentLoopData = $pricing['daily_breakdown']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="d-flex justify-content-between align-items-center <?php echo e(!$loop->last ? 'mb-2' : ''); ?>">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-calendar-day me-2 text-muted"></i>
                                                <span class="fw-medium"><?php echo e(\Carbon\Carbon::parse($day['date'])->format('M d, D')); ?></span>
                                                <?php if($day['is_weekend']): ?>
                                                    <span class="weekend-badge ms-2">Weekend</span>
                                                <?php endif; ?>
                                            </div>
                                            <span class="fw-semibold">৳<?php echo e(number_format($day['price'])); ?></span>
                                        </div>
                                        <?php if(!$loop->last): ?>
                                            <hr class="my-2 opacity-25">
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <!-- Book Now Form -->
                            <form action="<?php echo e(route('booking.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="room_category_id" value="<?php echo e($category->id); ?>">
                                <input type="hidden" name="customer_name" value="<?php echo e($customerData['customer_name']); ?>">
                                <input type="hidden" name="customer_email" value="<?php echo e($customerData['customer_email']); ?>">
                                <input type="hidden" name="customer_phone" value="<?php echo e($customerData['customer_phone']); ?>">
                                <input type="hidden" name="check_in_date" value="<?php echo e($checkIn->format('Y-m-d')); ?>">
                                <input type="hidden" name="check_out_date" value="<?php echo e($checkOut->format('Y-m-d')); ?>">
                                
                                <button type="submit" class="btn btn-success btn-lg w-100 fw-bold">
                                    <i class="bi bi-calendar-check me-2"></i>Book This Room
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Booking Information -->
        <section class="mt-5" data-aos="fade-up">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <div class="bg-primary rounded-circle p-3 d-inline-flex mb-3">
                            <i class="bi bi-shield-check text-white display-6"></i>
                        </div>
                        <h4 class="fw-bold">Why Book With Us?</h4>
                        <p class="text-muted">Your satisfaction is our top priority</p>
                    </div>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="bg-success rounded-circle p-2 me-3 mt-1">
                                    <i class="bi bi-clock text-white"></i>
                                </div>
                                <div>
                                    <h6 class="fw-semibold mb-1">Free Cancellation</h6>
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
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/raihanulislma/Desktop/hotel-booking-task-Raihanul-Islam/resources/views/booking/availability.blade.php ENDPATH**/ ?>