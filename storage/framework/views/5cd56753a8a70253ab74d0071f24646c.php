<?php $__env->startSection('title', 'LuxeStay Hotel - Book Your Perfect Stay'); ?>

<?php $__env->startSection('content'); ?>
<div class="hero-section">
    <div class="hero-content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="display-3 fw-bold text-white mb-4">
                        Experience Luxury Like Never Before
                    </h1>
                    <p class="lead text-white-50 mb-4 fs-5">
                        Discover world-class amenities, exceptional service, and unforgettable moments at LuxeStay Hotel. Your perfect getaway awaits.
                    </p>
                    <div class="d-flex flex-wrap gap-3 mb-4">
                        <div class="d-flex align-items-center text-white">
                            <i class="bi bi-star-fill text-warning me-2"></i>
                            <span class="fw-semibold">4.9 Rating</span>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <i class="bi bi-geo-alt-fill text-info me-2"></i>
                            <span class="fw-semibold">Prime Location</span>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <i class="bi bi-wifi text-success me-2"></i>
                            <span class="fw-semibold">Free WiFi</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="card glass-card shadow-lg border-0" style="border-radius: 20px; backdrop-filter: blur(20px); background: rgba(255, 255, 255, 0.95);">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3" style="box-shadow: 0 4px 15px rgba(37, 99, 235, 0.15);">
                                    <i class="bi bi-calendar-heart text-primary" style="font-size: 2rem;"></i>
                                </div>
                                <h3 class="card-title fw-bold mb-2" style="background: linear-gradient(135deg, #2563eb, #7c3aed); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                                    Book Your Stay
                                </h3>
                                <p class="text-muted mb-0" style="font-size: 0.95rem;">Check availability and reserve your perfect room</p>
                            </div>
                            
                            <?php if(session('error')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i><?php echo e(session('error')); ?>

                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            <?php endif; ?></div>

                            
                            <form action="<?php echo e(route('booking.check-availability')); ?>" method="POST" id="availabilityForm">
                                <?php echo csrf_field(); ?>
                                
                                <!-- Customer Information -->
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-3 pb-2 border-bottom">
                                        <div class="bg-primary rounded-circle p-2 me-2" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-person-circle text-white" style="font-size: 1rem;"></i>
                                        </div>
                                        <h6 class="fw-bold mb-0 text-dark">Guest Information</h6>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-floating position-relative">
                                                <input type="text" class="form-control <?php $__errorArgs = ['customer_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                       id="customer_name" name="customer_name" placeholder="John Doe" 
                                                       value="<?php echo e(old('customer_name')); ?>" required
                                                       style="height: 52px; border-radius: 14px; font-size: 0.95rem; border: 2px solid #e5e7eb; background: #ffffff;"
                                                       data-validation="name">
                                                <label for="customer_name" style="font-size: 0.9rem; padding-top: 0.85rem; color: #6b7280;">
                                                    <i class="bi bi-person me-2 text-primary"></i>Full Name *
                                                </label>
                                                <div class="valid-feedback">
                                                    <i class="bi bi-check-circle me-1"></i>Looks good!
                                                </div>
                                                <?php $__errorArgs = ['customer_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <small class="text-muted form-text">Enter your full name as it appears on your ID</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-floating position-relative">
                                                <input type="email" class="form-control <?php $__errorArgs = ['customer_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                       id="customer_email" name="customer_email" placeholder="john@example.com" 
                                                       value="<?php echo e(old('customer_email')); ?>" required
                                                       style="height: 52px; border-radius: 14px; font-size: 0.95rem; border: 2px solid #e5e7eb; background: #ffffff;"
                                                       data-validation="email">
                                                <label for="customer_email" style="font-size: 0.9rem; padding-top: 0.85rem; color: #6b7280;">
                                                    <i class="bi bi-envelope me-2 text-primary"></i>Email Address *
                                                </label>
                                                <div class="valid-feedback">
                                                    <i class="bi bi-check-circle me-1"></i>Valid email format!
                                                </div>
                                                <?php $__errorArgs = ['customer_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <small class="text-muted form-text" style="font-size: 0.75rem;">Confirmation email</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-2 position-relative">
                                        <input type="tel" class="form-control <?php $__errorArgs = ['customer_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               id="customer_phone" name="customer_phone" placeholder="+880 123 456 7890" 
                                               value="<?php echo e(old('customer_phone')); ?>" required
                                               style="height: 52px; border-radius: 14px; font-size: 0.95rem; border: 2px solid #e5e7eb; background: #ffffff;"
                                               data-validation="phone" 
                                               pattern="[+]?[0-9\s\-\(\)]{10,}">
                                        <label for="customer_phone" style="font-size: 0.9rem; padding-top: 0.85rem; color: #6b7280;">
                                            <i class="bi bi-telephone me-2 text-primary"></i>Phone Number *
                                        </label>
                                        <div class="valid-feedback">
                                            <i class="bi bi-check-circle me-1"></i>Valid!
                                        </div>
                                        <?php $__errorArgs = ['customer_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <small class="text-muted form-text" style="font-size: 0.75rem;">Include country code</small>
                                    </div>
                                </div>
                                
                                <!-- Booking Dates -->
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-3 pb-2 border-bottom">
                                        <div class="bg-success rounded-circle p-2 me-2" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-calendar-range text-white" style="font-size: 1rem;"></i>
                                        </div>
                                        <h6 class="fw-bold mb-0 text-dark">Stay Duration</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-floating position-relative">
                                                <input type="date" class="form-control <?php $__errorArgs = ['check_in_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                       id="check_in_date" name="check_in_date" 
                                                       value="<?php echo e(old('check_in_date', date('Y-m-d'))); ?>" 
                                                       min="<?php echo e(date('Y-m-d')); ?>" 
                                                       max="<?php echo e(date('Y-m-d', strtotime('+2 years'))); ?>"
                                                       required
                                                       style="height: 52px; border-radius: 14px; font-size: 0.95rem; border: 2px solid #e5e7eb; background: #ffffff;"
                                                       data-validation="checkin">
                                                <label for="check_in_date" style="font-size: 0.9rem; padding-top: 0.85rem; color: #6b7280;">
                                                    <i class="bi bi-calendar-plus me-2 text-success"></i>Check-in Date *
                                                </label>
                                                <div class="valid-feedback">
                                                    <i class="bi bi-check-circle me-1"></i>Valid!
                                                </div>
                                                <?php $__errorArgs = ['check_in_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <small class="text-muted form-text" style="font-size: 0.75rem;">3:00 PM onwards</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-floating position-relative">
                                                <input type="date" class="form-control <?php $__errorArgs = ['check_out_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                       id="check_out_date" name="check_out_date" 
                                                       value="<?php echo e(old('check_out_date', date('Y-m-d', strtotime('+1 day')))); ?>" 
                                                       min="<?php echo e(date('Y-m-d', strtotime('+1 day'))); ?>"
                                                       max="<?php echo e(date('Y-m-d', strtotime('+2 years'))); ?>"
                                                       required
                                                       style="height: 52px; border-radius: 14px; font-size: 0.95rem; border: 2px solid #e5e7eb; background: #ffffff;"
                                                       data-validation="checkout">
                                                <label for="check_out_date" style="font-size: 0.9rem; padding-top: 0.85rem; color: #6b7280;">
                                                    <i class="bi bi-calendar-minus me-2 text-danger"></i>Check-out Date *
                                                </label>
                                                <div class="valid-feedback">
                                                    <i class="bi bi-check-circle me-1"></i>Valid!
                                                </div>
                                                <?php $__errorArgs = ['check_out_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <small class="text-muted form-text" style="font-size: 0.75rem;">11:00 AM</small>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Stay Duration Display -->
                                    <div class="alert border-0 rounded-4 mb-3" id="durationDisplay" style="display: none; background: linear-gradient(135deg, #dbeafe, #e0e7ff); box-shadow: 0 2px 10px rgba(37, 99, 235, 0.1);">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-info-circle me-2 text-primary"></i>
                                            <span id="durationText" style="font-size: 0.9rem;"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Form Progress -->
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <small class="text-muted fw-semibold" style="font-size: 0.8rem;">Form Completion</small>
                                        <small class="fw-bold" id="progressText" style="font-size: 0.8rem; color: #2563eb;">0%</small>
                                    </div>
                                    <div class="progress" style="height: 6px; border-radius: 10px; background: #e5e7eb;">
                                        <div class="progress-bar" id="formProgress" role="progressbar" 
                                             style="width: 0%; background: linear-gradient(90deg, #2563eb, #10b981); border-radius: 10px; box-shadow: 0 0 10px rgba(37, 99, 235, 0.5);" 
                                             aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                
                                <div class="d-grid mb-3">
                                    <button type="submit" class="btn btn-primary fw-bold position-relative" id="submitBtn"
                                            style="height: 54px; border-radius: 14px; font-size: 1.05rem; background: linear-gradient(135deg, #2563eb, #1d4ed8); border: none; box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3); transition: all 0.3s ease; text-transform: uppercase; letter-spacing: 0.5px;">
                                        <span class="btn-text">
                                            <i class="bi bi-search me-2" style="font-size: 1.2rem;"></i>Check Availability
                                        </span>
                                        <span class="btn-loading d-none">
                                            <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                            Searching...
                                        </span>
                                    </button>
                                </div>
                            </form>
                            
                            <!-- Security & Trust Badges -->
                            <div class="mb-3">
                                <div class="row g-2">
                                    <div class="col-4">
                                        <div class="text-center p-2 rounded-3" style="background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2);">
                                            <i class="bi bi-shield-check text-success" style="font-size: 1.5rem;"></i>
                                            <small class="d-block text-success fw-semibold mt-1" style="font-size: 0.75rem;">Secure</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="text-center p-2 rounded-3" style="background: rgba(59, 130, 246, 0.1); border: 1px solid rgba(59, 130, 246, 0.2);">
                                            <i class="bi bi-eye-slash text-info" style="font-size: 1.5rem;"></i>
                                            <small class="d-block text-info fw-semibold mt-1" style="font-size: 0.75rem;">No Fees</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="text-center p-2 rounded-3" style="background: rgba(245, 158, 11, 0.1); border: 1px solid rgba(245, 158, 11, 0.2);">
                                            <i class="bi bi-lightning text-warning" style="font-size: 1.5rem;"></i>
                                            <small class="d-block text-warning fw-semibold mt-1" style="font-size: 0.75rem;">Instant</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Quick Tips -->
                            <div class="rounded-3 p-3" style="background: linear-gradient(135deg, #fef3c7, #fde68a); border: 1px solid #fbbf24;">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-lightbulb-fill text-warning me-2" style="font-size: 1.2rem;"></i>
                                    <div>
                                        <small class="fw-bold text-dark d-block mb-1" style="font-size: 0.85rem;">💡 Pro Tips</small>
                                        <small class="text-dark" style="font-size: 0.8rem; line-height: 1.6;">
                                            3+ nights = <strong>10% discount</strong> • Weekends +20% • Free cancellation
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Room Categories Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5" data-aos="fade-up">
                <span class="badge bg-primary rounded-pill px-3 py-2 mb-3">Our Accommodations</span>
                <h2 class="display-4 fw-bold mb-3">Luxury Room Categories</h2>
                <p class="lead text-muted mx-auto" style="max-width: 600px;">
                    Each room is thoughtfully designed with premium amenities and elegant furnishings to ensure your comfort and satisfaction.
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <?php
            $rooms = [
                ['name' => 'Premium Deluxe', 'price' => 12000, 'description' => 'Luxury amenities with stunning city views and premium furnishings', 'amenities' => 'King Bed, City View, Mini Bar, Wi-Fi, AC, Room Service'],
                ['name' => 'Super Deluxe', 'price' => 10000, 'description' => 'Comfortable and spacious rooms with modern conveniences', 'amenities' => 'Queen Bed, Garden View, Wi-Fi, AC, Complimentary Breakfast'],
                ['name' => 'Standard Deluxe', 'price' => 8000, 'description' => 'Quality accommodation with essential amenities', 'amenities' => 'Double Bed, Street View, Wi-Fi, AC, Daily Housekeeping']
            ];
            ?>
            
            <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo e($index * 100); ?>">
                    <div class="card room-category-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h4 class="card-title fw-bold mb-1"><?php echo e($room['name']); ?></h4>
                                    <div class="d-flex align-items-center text-muted">
                                        <i class="bi bi-people me-1"></i>
                                        <small>Up to 4 guests</small>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div class="badge bg-success rounded-pill">Available</div>
                                </div>
                            </div>
                            
                            <p class="card-text text-muted mb-4"><?php echo e($room['description']); ?></p>
                            
                            <div class="price-section mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-semibold">Starting from</span>
                                    <div class="text-end">
                                        <span class="h4 mb-0 text-primary fw-bold">৳<?php echo e(number_format($room['price'])); ?></span>
                                        <small class="text-muted d-block">per night</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="weekend-badge">+20% weekends</span>
                                    <span class="discount-badge">10% off 3+ nights</span>
                                </div>
                            </div>
                            
                            <div class="amenities-section">
                                <h6 class="fw-semibold mb-3 d-flex align-items-center">
                                    <i class="bi bi-star me-2 text-warning"></i>Premium Amenities
                                </h6>
                                <div class="d-flex flex-wrap gap-2">
                                    <?php $__currentLoopData = explode(',', $room['amenities']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge bg-light text-dark border">
                                            <i class="bi bi-check2 me-1 text-success"></i><?php echo e(trim($amenity)); ?>

                                        </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0 p-4 pt-0">
                            <button class="btn btn-outline-primary w-100" onclick="selectRoom('<?php echo e($room['name']); ?>')">Select This Room</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<!-- Features Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="badge bg-primary rounded-pill px-3 py-2 mb-3">Why Choose Us</span>
                <h3 class="display-5 fw-bold mb-4">Exceptional Experience Awaits</h3>
                <p class="lead text-muted mb-4">
                    At LuxeStay Hotel, we go above and beyond to ensure your stay exceeds expectations with our world-class services and amenities.
                </p>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-primary rounded-circle p-2">
                                    <i class="bi bi-headset text-white"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-1">24/7 Concierge</h6>
                                <small class="text-muted">Round-the-clock assistance</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-success rounded-circle p-2">
                                    <i class="bi bi-wifi text-white"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-1">High-Speed WiFi</h6>
                                <small class="text-muted">Complimentary internet access</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-info rounded-circle p-2">
                                    <i class="bi bi-car-front text-white"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-1">Free Parking</h6>
                                <small class="text-muted">Secure valet parking</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-warning rounded-circle p-2">
                                    <i class="bi bi-geo-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-1">Prime Location</h6>
                                <small class="text-muted">City center accessibility</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="position-relative">
                    <div class="bg-primary rounded-4 p-5 text-white text-center">
                        <i class="bi bi-building display-1 mb-4"></i>
                        <h4 class="fw-bold mb-3">Special Offers</h4>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="bg-white bg-opacity-10 rounded-3 p-3">
                                    <h5 class="fw-bold mb-1">20%</h5>
                                    <small>Weekend Premium</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-white bg-opacity-10 rounded-3 p-3">
                                    <h5 class="fw-bold mb-1">10%</h5>
                                    <small>3+ Nights Discount</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-primary text-white">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="zoom-in">
                <h3 class="display-5 fw-bold mb-3">Ready to Book Your Stay?</h3>
                <p class="lead mb-4">
                    Don't miss out on our exclusive rates and premium accommodations. Book now and experience luxury at its finest.
                </p>
                <button class="btn btn-light btn-lg px-5" onclick="scrollToBooking()">
                    <i class="bi bi-calendar-check me-2"></i>Book Now
                </button>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Form validation and user experience enhancements
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('availabilityForm');
        const inputs = form.querySelectorAll('input[required]');
        const progressBar = document.getElementById('formProgress');
        const progressText = document.getElementById('progressText');
        const submitBtn = document.getElementById('submitBtn');
        
        // Real-time validation
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                validateField(this);
                updateProgress();
                updateSubmitButton();
            });
            
            input.addEventListener('blur', function() {
                validateField(this);
            });
        });
        
        // Field validation function
        function validateField(field) {
            const value = field.value.trim();
            const type = field.getAttribute('data-validation');
            
            field.classList.remove('is-valid', 'is-invalid');
            
            if (!value) return;
            
            let isValid = false;
            
            switch(type) {
                case 'name':
                    isValid = value.length >= 2 && /^[a-zA-Z\s]+$/.test(value);
                    break;
                case 'email':
                    isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
                    break;
                case 'phone':
                    isValid = /^[+]?[0-9\s\-\(\)]{10,}$/.test(value);
                    break;
                case 'checkin':
                case 'checkout':
                    isValid = value !== '';
                    break;
            }
            
            field.classList.add(isValid ? 'is-valid' : 'is-invalid');
        }
        
        // Progress bar update
        function updateProgress() {
            const validInputs = form.querySelectorAll('input.is-valid').length;
            const totalInputs = inputs.length;
            const progress = (validInputs / totalInputs) * 100;
            
            progressBar.style.width = progress + '%';
            progressText.textContent = Math.round(progress) + '% Complete';
            
            if (progress === 100) {
                progressBar.classList.add('bg-success');
                progressText.classList.add('text-success');
                progressText.innerHTML = '<i class="bi bi-check-circle me-1"></i>Ready to submit!';
            } else {
                progressBar.classList.remove('bg-success');
                progressText.classList.remove('text-success');
            }
        }
        
        // Submit button state
        function updateSubmitButton() {
            const validInputs = form.querySelectorAll('input.is-valid').length;
            const isComplete = validInputs === inputs.length;
            
            if (isComplete) {
                submitBtn.classList.add('btn-success');
                submitBtn.classList.remove('btn-primary');
                submitBtn.style.background = 'linear-gradient(135deg, #10b981, #059669)';
            } else {
                submitBtn.classList.remove('btn-success');
                submitBtn.classList.add('btn-primary');
                submitBtn.style.background = 'linear-gradient(135deg, #2563eb, #1d4ed8)';
            }
        }
        
        // Form submission
        form.addEventListener('submit', function(e) {
            const btnText = submitBtn.querySelector('.btn-text');
            const btnLoading = submitBtn.querySelector('.btn-loading');
            
            btnText.classList.add('d-none');
            btnLoading.classList.remove('d-none');
            submitBtn.disabled = true;
        });
    });
    
    // Update check-out date minimum when check-in date changes
    document.getElementById('check_in_date').addEventListener('change', function() {
        const checkInDate = new Date(this.value);
        const checkOutDate = new Date(checkInDate);
        checkOutDate.setDate(checkOutDate.getDate() + 1);
        
        const checkOutInput = document.getElementById('check_out_date');
        checkOutInput.min = checkOutDate.toISOString().split('T')[0];
        
        // Update check-out date if it's before the new minimum
        if (new Date(checkOutInput.value) <= checkInDate) {
            checkOutInput.value = checkOutDate.toISOString().split('T')[0];
        }
        
        updateDurationDisplay();
    });
    
    // Update duration display
    function updateDurationDisplay() {
        const checkIn = document.getElementById('check_in_date').value;
        const checkOut = document.getElementById('check_out_date').value;
        const display = document.getElementById('durationDisplay');
        const text = document.getElementById('durationText');
        
        if (checkIn && checkOut) {
            const startDate = new Date(checkIn);
            const endDate = new Date(checkOut);
            const nights = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
            
            if (nights > 0) {
                display.style.display = 'block';
                let message = `Your stay: ${nights} night${nights > 1 ? 's' : ''}`;
                
                if (nights >= 3) {
                    message += ' 🎉 You qualify for a 10% consecutive nights discount!';
                    display.className = 'alert alert-success border-0 rounded-3 mb-4';
                } else {
                    display.className = 'alert alert-info border-0 rounded-3 mb-4';
                }
                
                text.textContent = message;
            } else {
                display.style.display = 'none';
            }
        } else {
            display.style.display = 'none';
        }
    }
    
    document.getElementById('check_out_date').addEventListener('change', updateDurationDisplay);
    
    // Select room function
    function selectRoom(roomName) {
        // Auto-fill dates if not selected
        const checkIn = document.getElementById('check_in_date');
        const checkOut = document.getElementById('check_out_date');
        
        if (!checkIn.value) {
            const today = new Date();
            checkIn.value = today.toISOString().split('T')[0];
        }
        
        if (!checkOut.value) {
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            checkOut.value = tomorrow.toISOString().split('T')[0];
        }
        
        // Scroll to booking form
        scrollToBooking();
        
        // Highlight the form
        const form = document.getElementById('availabilityForm');
        form.style.animation = 'pulse 1s ease-in-out';
        setTimeout(() => {
            form.style.animation = '';
        }, 1000);
    }
    
    // Scroll to booking section
    function scrollToBooking() {
        document.querySelector('.hero-section').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
    
    // Add pulse animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.02); }
            100% { transform: scale(1); }
        }
    `;
    document.head.appendChild(style);
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/raihanulislma/Desktop/hotel-booking-task-Raihanul-Islam/resources/views/booking/index.blade.php ENDPATH**/ ?>