const toggle = document.querySelector('.menu-toggle');
const navigation = document.querySelector('#navigation');
toggle?.addEventListener('click', () => {
    const expanded = toggle.getAttribute('aria-expanded') !== 'true';
    toggle.setAttribute('aria-expanded', String(expanded));
    navigation.classList.toggle('open', expanded);
});
navigation?.querySelectorAll('a').forEach(link => link.addEventListener('click', () => {
    toggle.setAttribute('aria-expanded', 'false');
    navigation.classList.remove('open');
}));
document.addEventListener('keydown', event => {
    if (event.key === 'Escape' && toggle?.getAttribute('aria-expanded') === 'true') {
        toggle.setAttribute('aria-expanded', 'false');
        navigation.classList.remove('open');
        toggle.focus();
    }
});

// Animate once on arrival; content stays visible if motion or JS is unavailable.
const motionPreference = window.matchMedia('(prefers-reduced-motion: reduce)');
const arrivalAnimations = new Set();

document.querySelectorAll('.accordions details').forEach(details => {
    const summary = details.querySelector('summary');
    let animation;
    let expanded = details.open;

    const finish = () => {
        details.open = expanded;
        details.style.height = '';
        details.style.overflow = '';
        delete details.dataset.expanded;
        animation = undefined;
    };

    summary.addEventListener('click', event => {
        event.preventDefault();
        const startHeight = details.getBoundingClientRect().height;
        animation?.cancel();
        expanded = !expanded;

        if (motionPreference.matches) {
            finish();
            return;
        }

        // Keep the native content rendered until the closing animation finishes.
        details.open = true;
        details.style.height = '';
        const borderHeight = parseFloat(getComputedStyle(details).borderTopWidth)
            + parseFloat(getComputedStyle(details).borderBottomWidth);
        const endHeight = expanded ? details.getBoundingClientRect().height
            : summary.getBoundingClientRect().height + borderHeight;
        details.dataset.expanded = String(expanded);
        details.style.overflow = 'hidden';
        details.style.height = `${endHeight}px`;
        animation = details.animate([
            { height: `${startHeight}px` },
            { height: `${endHeight}px` },
        ], { duration: 360, easing: 'cubic-bezier(0.22, 1, 0.36, 1)' });
        animation.onfinish = finish;
    });

    motionPreference.addEventListener('change', event => {
        if (event.matches && animation) {
            animation.cancel();
            finish();
        }
    });
});

if (!motionPreference.matches && 'IntersectionObserver' in window) {
    const arrivals = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            arrivals.unobserve(entry.target);
            if (motionPreference.matches) return;

            const animation = entry.target.animate([
                { opacity: 0, transform: 'translateY(12px)' },
                { opacity: 1, transform: 'translateY(0)' },
            ], {
                duration: 580,
                easing: 'cubic-bezier(0.22, 1, 0.36, 1)',
            });
            arrivalAnimations.add(animation);
            animation.finished.then(() => arrivalAnimations.delete(animation), () => {});
        });
    }, { threshold: 0, rootMargin: '0px 0px -24px 0px' });

    document.querySelectorAll(
        '.hero-copy, .hero-image, .preparation h2, .accordions, .clinic-visual, .clinic-copy, .contact h2, .contact-intro, .footer-grid'
    ).forEach(element => arrivals.observe(element));

    motionPreference.addEventListener('change', event => {
        if (!event.matches) return;
        arrivalAnimations.forEach(animation => animation.cancel());
        arrivalAnimations.clear();
        arrivals.disconnect();
    });
}
