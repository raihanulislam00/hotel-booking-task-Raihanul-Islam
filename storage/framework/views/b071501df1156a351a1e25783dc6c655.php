<?php $__env->startSection('title', 'Booking Confirmed - LuxeStay Hotel'); ?>

<?php $__env->startSection('content'); ?>
<!-- Success Header -->
<section class="py-5 text-white position-relative" style="background: linear-gradient(135deg, #10b981, #059669);">
    <div class="position-absolute top-0 start-0 w-100 h-100 opacity-25">
        <div class="d-flex align-items-center justify-content-center h-100">
            <i class="bi bi-check-circle" style="font-size: 20rem; opacity: 0.1;"></i>
        </div>
    </div>
    <div class="container text-center position-relative" data-aos="zoom-in">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="mb-4">
                    <div class="bg-white rounded-circle p-4 d-inline-flex mb-4">
                        <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                    </div>
                </div>
                <h1 class="display-3 fw-bold mb-4">Booking Confirmed!</h1>
                <p class="lead fs-4 mb-4">
                    Congratulations, <span class="fw-bold"><?php echo e($booking->customer_name); ?></span>! Your luxury stay has been successfully reserved.
                </p>
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                    <div class="d-flex align-items-center bg-white bg-opacity-20 rounded-pill px-3 py-2">
                        <i class="bi bi-bookmark-star me-2"></i>
                        <span class="fw-semibold">Ref: <?php echo e($booking->booking_reference); ?></span>
                    </div>
                    <div class="d-flex align-items-center bg-white bg-opacity-20 rounded-pill px-3 py-2">
                        <i class="bi bi-calendar-check me-2"></i>
                        <span><?php echo e($booking->formatted_check_in); ?></span>
                    </div>
                    <div class="d-flex align-items-center bg-white bg-opacity-20 rounded-pill px-3 py-2">
                        <i class="bi bi-house-door me-2"></i>
                        <span>Room <?php echo e($booking->room->room_number); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Booking Summary Cards -->
            <div class="row g-4 mb-5">
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="card text-center border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="bg-primary rounded-circle p-3 d-inline-flex mb-3">
                                <i class="bi bi-bookmark-star text-white fs-4"></i>
                            </div>
                            <h6 class="fw-bold mb-2">Reference</h6>
                            <p class="text-primary fw-bold mb-0"><?php echo e($booking->booking_reference); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="card text-center border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="bg-info rounded-circle p-3 d-inline-flex mb-3">
                                <i class="bi bi-house-door text-white fs-4"></i>
                            </div>
                            <h6 class="fw-bold mb-2">Room</h6>
                            <p class="text-info fw-bold mb-0"><?php echo e($booking->room->room_number); ?></p>
                            <small class="text-muted"><?php echo e($booking->roomCategory->name); ?></small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="card text-center border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="bg-warning rounded-circle p-3 d-inline-flex mb-3">
                                <i class="bi bi-moon text-white fs-4"></i>
                            </div>
                            <h6 class="fw-bold mb-2">Duration</h6>
                            <p class="text-warning fw-bold mb-0"><?php echo e($booking->duration); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="card text-center border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="bg-success rounded-circle p-3 d-inline-flex mb-3">
                                <i class="bi bi-currency-dollar text-white fs-4"></i>
                            </div>
                            <h6 class="fw-bold mb-2">Total Paid</h6>
                            <p class="text-success fw-bold mb-0">৳<?php echo e(number_format($booking->total_amount)); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Booking Information -->
            <div class="card shadow-sm mb-5" data-aos="fade-up">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary rounded-circle p-2 me-3">
                            <i class="bi bi-calendar-event text-white"></i>
                        </div>
                        <h4 class="mb-0 fw-bold">Stay Details</h4>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="border rounded-3 p-4 h-100">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-calendar-plus text-success fs-4 me-2"></i>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">Check-in</h6>
                                        <small class="text-muted">From 3:00 PM onwards</small>
                                    </div>
                                </div>
                                <h4 class="text-success fw-bold mb-2"><?php echo e($booking->formatted_check_in); ?></h4>
                                <p class="text-muted mb-0">Early check-in available upon request</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="border rounded-3 p-4 h-100">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-calendar-minus text-danger fs-4 me-2"></i>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">Check-out</h6>
                                        <small class="text-muted">Until 11:00 AM</small>
                                    </div>
                                </div>
                                <h4 class="text-danger fw-bold mb-2"><?php echo e($booking->formatted_check_out); ?></h4>
                                <p class="text-muted mb-0">Late check-out available upon request</p>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-house-door-fill text-primary fs-4 me-3"></i>
                                <div>
                                    <h6 class="mb-0 fw-semibold">Accommodation</h6>
                                    <p class="mb-0 text-muted"><?php echo e($booking->roomCategory->name); ?></p>
                                    <small class="badge bg-success"><?php echo e(ucfirst($booking->status)); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-key-fill text-warning fs-4 me-3"></i>
                                <div>
                                    <h6 class="mb-0 fw-semibold">Room Assignment</h6>
                                    <p class="mb-0 text-muted">Room <?php echo e($booking->room->room_number); ?></p>
                                    <small class="text-success"><i class="bi bi-check-circle"></i> Reserved</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- Guest & Payment Information -->
            <div class="row g-4 mb-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="card shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-info rounded-circle p-2 me-3">
                                    <i class="bi bi-person-check text-white"></i>
                                </div>
                                <h4 class="mb-0 fw-bold">Guest Information</h4>
                            </div>
                            
                            <div class="space-y-3">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-person-fill text-muted me-2 mt-1"></i>
                                    <div>
                                        <small class="text-muted d-block">Primary Guest</small>
                                        <p class="fw-semibold mb-0"><?php echo e($booking->customer_name); ?></p>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-envelope-fill text-muted me-2 mt-1"></i>
                                    <div>
                                        <small class="text-muted d-block">Email Address</small>
                                        <p class="mb-0"><?php echo e($booking->customer_email); ?></p>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-telephone-fill text-muted me-2 mt-1"></i>
                                    <div>
                                        <small class="text-muted d-block">Contact Number</small>
                                        <p class="mb-0"><?php echo e($booking->customer_phone); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="card shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-warning rounded-circle p-2 me-3">
                                    <i class="bi bi-credit-card text-white"></i>
                                </div>
                                <h4 class="mb-0 fw-bold">Payment Summary</h4>
                            </div>
                            
                            <div class="bg-light rounded-3 p-3 mb-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Base Rate (<?php echo e($booking->total_nights); ?> <?php echo e($booking->total_nights == 1 ? 'night' : 'nights'); ?>)</span>
                                    <span class="fw-semibold">৳<?php echo e(number_format($booking->base_price * $booking->total_nights)); ?></span>
                                </div>
                                
                                <?php if($booking->weekend_surcharge > 0): ?>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-danger">
                                            <span class="weekend-badge me-1">Weekend</span>Surcharge
                                        </span>
                                        <span class="text-danger fw-semibold">+৳<?php echo e(number_format($booking->weekend_surcharge)); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if($booking->consecutive_discount > 0): ?>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-success">
                                            <span class="discount-badge me-1">3+ Nights</span>Discount
                                        </span>
                                        <span class="text-success fw-semibold">-৳<?php echo e(number_format($booking->consecutive_discount)); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center p-3 bg-success bg-opacity-10 rounded-3">
                                <span class="fw-bold">Total Paid</span>
                                <div class="text-end">
                                    <div class="h4 mb-0 text-success fw-bold">৳<?php echo e(number_format($booking->total_amount)); ?></div>
                                    <small class="text-muted">৳<?php echo e(number_format($booking->total_amount / $booking->total_nights)); ?>/night avg</small>
                                </div>
                            </div>
                            
                            <div class="mt-3 text-center">
                                <small class="text-success">
                                    <i class="bi bi-shield-check me-1"></i>Payment Confirmed & Secured
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <!-- Next Steps -->
            <div class="card shadow-sm mb-5" data-aos="fade-up">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <div class="bg-secondary rounded-circle p-3 d-inline-flex mb-3">
                            <i class="bi bi-list-check text-white fs-4"></i>
                        </div>
                        <h4 class="fw-bold">What Happens Next?</h4>
                        <p class="text-muted">Here's what you can expect before your arrival</p>
                    </div>
                    
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="border rounded-3 p-4 h-100">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success rounded-circle p-2 me-3">
                                        <i class="bi bi-check2-all text-white"></i>
                                    </div>
                                    <h6 class="mb-0 fw-bold">Confirmation Sent</h6>
                                </div>
                                <div class="space-y-2">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                        <small>Email confirmation delivered</small>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                        <small>SMS notification sent</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                        <small>Room secured in your name</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="border rounded-3 p-4 h-100">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-info rounded-circle p-2 me-3">
                                        <i class="bi bi-suitcase text-white"></i>
                                    </div>
                                    <h6 class="mb-0 fw-bold">Before Your Arrival</h6>
                                </div>
                                <div class="space-y-2">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-info-circle text-info me-2"></i>
                                        <small>Bring valid photo identification</small>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-info-circle text-info me-2"></i>
                                        <small>Check-in available from 3:00 PM</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-info-circle text-info me-2"></i>
                                        <small>Early check-in upon availability</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact & Support -->
            <div class="row g-4">
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="card shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-primary rounded-circle p-3 me-3">
                                    <i class="bi bi-headset text-white fs-4"></i>
                                </div>
                                <div>
                                    <h4 class="mb-0 fw-bold">Need Assistance?</h4>
                                    <p class="text-muted mb-0">Our support team is here to help 24/7</p>
                                </div>
                            </div>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center p-3 border rounded-3">
                                        <i class="bi bi-telephone-fill text-primary fs-4 me-3"></i>
                                        <div>
                                            <h6 class="mb-0 fw-semibold">Phone Support</h6>
                                            <a href="tel:+8801234567890" class="text-decoration-none">
                                                +880 123 456 7890
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center p-3 border rounded-3">
                                        <i class="bi bi-envelope-fill text-success fs-4 me-3"></i>
                                        <div>
                                            <h6 class="mb-0 fw-semibold">Email Support</h6>
                                            <a href="mailto:support@luxestay.com" class="text-decoration-none">
                                                support@luxestay.com
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center p-3 border rounded-3">
                                        <i class="bi bi-chat-dots-fill text-info fs-4 me-3"></i>
                                        <div>
                                            <h6 class="mb-0 fw-semibold">Live Chat</h6>
                                            <small class="text-muted">Available on our website</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center p-3 border rounded-3">
                                        <i class="bi bi-whatsapp text-success fs-4 me-3"></i>
                                        <div>
                                            <h6 class="mb-0 fw-semibold">WhatsApp</h6>
                                            <small class="text-muted">Instant messaging support</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4" data-aos="fade-left">
                    <div class="card shadow-sm h-100">
                        <div class="card-body p-4 text-center">
                            <div class="bg-gradient rounded-circle p-3 d-inline-flex mb-3" style="background: linear-gradient(135deg, #667eea, #764ba2);">
                                <i class="bi bi-star-fill text-white fs-4"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Quick Actions</h5>
                            
                            <div class="d-grid gap-3">
                                <a href="<?php echo e(route('booking.index')); ?>" class="btn btn-primary btn-lg">
                                    <i class="bi bi-plus-circle me-2"></i>Book Another Stay
                                </a>
                                <button onclick="window.print()" class="btn btn-outline-secondary btn-lg">
                                    <i class="bi bi-printer me-2"></i>Print Confirmation
                                </button>
                                <button onclick="shareBooking()" class="btn btn-outline-primary">
                                    <i class="bi bi-share me-2"></i>Share Booking
                                </button>
                            </div>
                            
                            <hr class="my-4">
                            
                            <div class="text-start">
                                <small class="text-muted d-block mb-2">Booking Reference:</small>
                                <div class="d-flex align-items-center justify-content-between">
                                    <code class="bg-light px-2 py-1 rounded"><?php echo e($booking->booking_reference); ?></code>
                                    <button onclick="copyToClipboard('<?php echo e($booking->booking_reference); ?>')" class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Copy booking reference to clipboard
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            // Show success message
            const toast = document.createElement('div');
            toast.className = 'alert alert-success position-fixed top-0 end-0 m-3';
            toast.style.zIndex = '9999';
            toast.innerHTML = '<i class="bi bi-check-circle me-2"></i>Booking reference copied to clipboard!';
            document.body.appendChild(toast);
            
            // Auto-remove after 3 seconds
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }).catch(function(err) {
            console.error('Failed to copy text: ', err);
        });
    }
    
    // Share booking details
    function shareBooking() {
        if (navigator.share) {
            navigator.share({
                title: 'Hotel Booking Confirmation',
                text: 'My hotel booking at LuxeStay Hotel - Reference: <?php echo e($booking->booking_reference); ?>',
                url: window.location.href
            });
        } else {
            // Fallback: copy URL to clipboard
            copyToClipboard(window.location.href);
        }
    }
    
    // Add print styles
    const printStyles = `
        @media print {
            .btn, .navbar, footer { display: none !important; }
            .card { border: 1px solid #000 !important; box-shadow: none !important; }
            .container { max-width: 100% !important; }
        }
    `;
    const styleSheet = document.createElement('style');
    styleSheet.textContent = printStyles;
    document.head.appendChild(styleSheet);
    
    // Celebration animation on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Add confetti effect (simple version)
        setTimeout(() => {
            createConfetti();
        }, 500);
    });
    
    function createConfetti() {
        const confettiContainer = document.createElement('div');
        confettiContainer.style.position = 'fixed';
        confettiContainer.style.top = '0';
        confettiContainer.style.left = '0';
        confettiContainer.style.width = '100%';
        confettiContainer.style.height = '100%';
        confettiContainer.style.pointerEvents = 'none';
        confettiContainer.style.zIndex = '9998';
        document.body.appendChild(confettiContainer);
        
        const colors = ['#ff6b6b', '#4ecdc4', '#45b7d1', '#96ceb4', '#ffd93d'];
        
        for (let i = 0; i < 50; i++) {
            const confetti = document.createElement('div');
            confetti.style.position = 'absolute';
            confetti.style.width = '10px';
            confetti.style.height = '10px';
            confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
            confetti.style.left = Math.random() * 100 + '%';
            confetti.style.top = '-10px';
            confetti.style.borderRadius = '50%';
            confetti.style.animation = `confettiFall ${2 + Math.random() * 3}s linear forwards`;
            confettiContainer.appendChild(confetti);
        }
        
        // Remove confetti container after animation
        setTimeout(() => {
            confettiContainer.remove();
        }, 5000);
    }
    
    // Add confetti animation keyframes
    const confettiStyles = `
        @keyframes confettiFall {
            0% {
                transform: translateY(-10px) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(calc(100vh + 10px)) rotate(360deg);
                opacity: 0;
            }
        }
    `;
    const confettiStyleSheet = document.createElement('style');
    confettiStyleSheet.textContent = confettiStyles;
    document.head.appendChild(confettiStyleSheet);
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/raihanulislma/Desktop/hotel-booking-task-Raihanul-Islam/resources/views/booking/confirmation.blade.php ENDPATH**/ ?>