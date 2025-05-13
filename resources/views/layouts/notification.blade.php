<!-- Create this as notifications.blade.php in resources/views/components/ directory -->

@if (session('success') || session('error') || session('warning') || session('info'))
    <div class="notification-container">
        @if (session('success'))
            <div class="notification notification-success" id="notification-success">
                <div class="notification-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="notification-content">
                    <h4 class="notification-title">Success</h4>
                    <p class="notification-message">{{ session('success') }}</p>
                </div>
                <button class="notification-close" onclick="closeNotification('notification-success')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="notification notification-error" id="notification-error">
                <div class="notification-icon">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="notification-content">
                    <h4 class="notification-title">Error</h4>
                    <p class="notification-message">{{ session('error') }}</p>
                </div>
                <button class="notification-close" onclick="closeNotification('notification-error')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        @if (session('warning'))
            <div class="notification notification-warning" id="notification-warning">
                <div class="notification-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="notification-content">
                    <h4 class="notification-title">Warning</h4>
                    <p class="notification-message">{{ session('warning') }}</p>
                </div>
                <button class="notification-close" onclick="closeNotification('notification-warning')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        @if (session('info'))
            <div class="notification notification-info" id="notification-info">
                <div class="notification-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="notification-content">
                    <h4 class="notification-title">Information</h4>
                    <p class="notification-message">{{ session('info') }}</p>
                </div>
                <button class="notification-close" onclick="closeNotification('notification-info')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
    </div>

    <style>
        .notification-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            max-width: 400px;
            width: 100%;
        }

        .notification {
            display: flex;
            align-items: flex-start;
            background-color: white;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            animation: slideIn 0.5s ease-out forwards;
            position: relative;
            overflow: hidden;
            border-left: 4px solid #ccc;
        }

        .notification::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: rgba(0,0,0,0.1);
            animation: countdown 5s linear forwards;
        }

        .notification-success {
            border-left-color: #28a745;
        }

        .notification-success .notification-icon {
            color: #28a745;
        }

        .notification-error {
            border-left-color: #dc3545;
        }

        .notification-error .notification-icon {
            color: #dc3545;
        }

        .notification-warning {
            border-left-color: #ffc107;
        }

        .notification-warning .notification-icon {
            color: #ffc107;
        }

        .notification-info {
            border-left-color: #17a2b8;
        }

        .notification-info .notification-icon {
            color: #17a2b8;
        }

        .notification-icon {
            margin-right: 16px;
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification-content {
            flex: 1;
        }

        .notification-title {
            margin: 0 0 5px 0;
            font-size: 16px;
            font-weight: 600;
            color: #333;
        }

        .notification-message {
            margin: 0;
            color: #666;
            font-size: 14px;
            line-height: 1.5;
        }

        .notification-close {
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            font-size: 16px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s;
        }

        .notification-close:hover {
            color: #333;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }

        @keyframes countdown {
            from {
                width: 100%;
            }
            to {
                width: 0;
            }
        }

        .notification.closing {
            animation: slideOut 0.5s ease-in forwards;
        }
    </style>

    <script>
        // Auto-close notifications after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const notifications = document.querySelectorAll('.notification');

            notifications.forEach(notification => {
                setTimeout(() => {
                    closeNotification(notification.id);
                }, 5000);
            });
        });

        function closeNotification(id) {
            const notification = document.getElementById(id);
            if (notification) {
                notification.classList.add('closing');
                setTimeout(() => {
                    notification.remove();
                }, 500);
            }
        }
    </script>
@endif
