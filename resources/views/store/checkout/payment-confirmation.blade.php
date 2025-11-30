<x-layouts.store-tw>
    <style>
        .confirmation-card {
            animation: slideIn 0.6s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-checkmark {
            animation: scaleCheck 0.5s ease-in-out 0.5s both;
        }

        @keyframes scaleCheck {
            0% {
                transform: scale(0);
            }
            70% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        .progress-bar {
            animation: fillProgress 1.5s ease-in-out 1s both;
        }

        @keyframes fillProgress {
            from {
                width: 0%;
            }
            to {
                width: 100%;
            }
        }

        .order-item {
            transition: all 0.3s ease;
        }

        .order-item:hover {
            transform: translateX(5px);
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #f59e0b;
            opacity: 0.7;
            border-radius: 50%;
        }
    </style>
    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 h-full">
        <!-- Success Confirmation -->
        <div class="max-w-4xl mx-auto text-center mb-12 relative overflow-hidden">
            <!-- Confetti Animation -->
            <div id="confetti-container" class="absolute inset-0 pointer-events-none"></div>

            <div class="confirmation-card  ui-card hover:shadow-none">
                <div
                    class="success-checkmark mx-auto mb-6 w-20 h-20 bg-success rounded-full flex items-center justify-center text-white">
                    <i data-lucide="check"></i>
                </div>

                <h1 class="text-4xl font-bold mb-4">Payment Successful!</h1>
                <p class="text-xl text-gray-600 mb-6">Thank you for your order. Your payment has been processed
                    successfully.</p>

                <div class="bg-primary/10 p-4 rounded-lg inline-block mb-6">
                    <p class="text-lg font-semibold">Order #AT-2023-78945</p>
                    <p class="text-sm text-gray-600">Placed on October 15, 2023 at 2:30 PM</p>
                </div>

                <div class="flex flex-col sm:flex-row justify-center gap-4 mb-8">
                    <button class="btn btn-primary">
                        <i class="fas fa-download mr-2"></i> Download Invoice
                    </button>
                    <button class="btn btn-outline">
                        <i class="fas fa-share-alt mr-2"></i> Share Order Details
                    </button>
                </div>
            </div>
        </div>
    </main>
    <script>
        // Confetti animation
        function createConfetti() {
            const container = document.getElementById('confetti-container');
            const colors = ['#f59e0b', '#ef4444', '#10b981', '#3b82f6', '#8b5cf6'];

            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.animationDelay = Math.random() * 2 + 's';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.transform = `scale(${Math.random() * 0.5 + 0.5})`;
                container.appendChild(confetti);

                // Animate confetti falling
                confetti.animate([
                    {transform: 'translateY(-100px) rotate(0deg)', opacity: 1},
                    {transform: `translateY(${window.innerHeight}px) rotate(${Math.random() * 360}deg)`, opacity: 0}
                ], {
                    duration: Math.random() * 3000 + 2000,
                    easing: 'cubic-bezier(0.215, 0.61, 0.355, 1)'
                });
            }
        }

        // Create confetti on page load
        window.addEventListener('load', createConfetti);

        // Download invoice functionality
        document.querySelector('button:first-child').addEventListener('click', function () {
            this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Downloading...';
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-check mr-2"></i> Downloaded!';
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-download mr-2"></i> Download Invoice';
                }, 2000);
            }, 1500);
        });

        // Share order details
        document.querySelector('button:nth-child(2)').addEventListener('click', function () {
            if (navigator.share) {
                navigator.share({
                    title: 'My AudioTech Order',
                    text: 'Check out my recent order from AudioTech!',
                    url: window.location.href,
                });
            } else {
                // Fallback for browsers that don't support Web Share API
                alert('Order details copied to clipboard!');
            }
        });
    </script>
</x-layouts.store-tw>
