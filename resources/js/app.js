

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('countUp', (target, suffix = '') => ({
    current: 0,
    hasAnimated: false,
    target,
    suffix,

    init() {
        const observer = new IntersectionObserver(([entry]) => {
            if (entry.isIntersecting && ! this.hasAnimated) {
                this.hasAnimated = true;
                this.animate();
                observer.disconnect();
            }
        }, { threshold: 0.35 });

        observer.observe(this.$el);
    },

    animate() {
        const duration = 1300;
        const startTime = performance.now();

        const tick = (now) => {
            const progress = Math.min((now - startTime) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);

            this.current = Math.floor(this.target * eased);

            if (progress < 1) {
                requestAnimationFrame(tick);
            } else {
                this.current = this.target;
            }
        };

        requestAnimationFrame(tick);
    },

    formatted() {
        return new Intl.NumberFormat('id-ID').format(this.current) + this.suffix;
    },
}));

Alpine.start();
