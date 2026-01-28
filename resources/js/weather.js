// Weather App JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Add smooth scroll behavior
    document.documentElement.style.scrollBehavior = 'smooth';

    // Animate detail cards on load
    animateDetailCards();

    // Add input validation
    const searchInput = document.querySelector('.search-box input');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            this.value = this.value.trim();
        });
    }

    // Add keyboard support for search
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                this.closest('form').submit();
            }
        });
    }

    // Add ripple effect to buttons
    addRippleEffect();
});

function animateDetailCards() {
    const cards = document.querySelectorAll('.detail-card');
    cards.forEach((card, index) => {
        card.style.animation = `slideIn 0.5s ease-out ${index * 0.05}s backwards`;
    });
}

function addRippleEffect() {
    const buttons = document.querySelectorAll('button');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');

            // Remove any existing ripple
            const existing = this.querySelector('.ripple');
            if (existing) existing.remove();

            this.appendChild(ripple);
        });
    });
}

// Add CSS for ripple effect
const style = document.createElement('style');
style.textContent = `
    button {
        position: relative;
        overflow: hidden;
    }

    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple-animation 0.6s ease-out;
        pointer-events: none;
    }

    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Add progressive enhancement for better UX
window.addEventListener('load', function() {
    // Add loaded state to container
    const container = document.querySelector('.weather-container');
    if (container) {
        container.style.opacity = '1';
    }
});
