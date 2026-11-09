document.addEventListener('click', (event) => {
    const passwordToggle = event.target.closest('[data-password-toggle]');

    if (passwordToggle) {
        const input = document.getElementById(passwordToggle.dataset.passwordToggle);

        if (input) {
            const shouldReveal = input.type === 'password';

            input.type = shouldReveal ? 'text' : 'password';
            passwordToggle.setAttribute('aria-pressed', String(shouldReveal));
            passwordToggle.setAttribute('aria-label', shouldReveal ? 'Ocultar contraseña' : 'Mostrar contraseña');
            passwordToggle.replaceChildren(createEyeIcon(shouldReveal));
        }
    }

    const openButton = event.target.closest('[data-modal-open]');

    if (openButton) {
        document.getElementById(openButton.dataset.modalOpen)?.showModal();
    }

    const closeButton = event.target.closest('[data-modal-close]');

    if (closeButton) {
        closeButton.closest('dialog')?.close();
    }

    if (event.target.closest('[data-demo-google]')) {
        showDemoNotice('Google es solo una opción visual de demostración. No se conectará ninguna cuenta.');
    }
});

document.querySelectorAll('.modal').forEach((modal) => {
    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.close();
        }
    });
});

function createEyeIcon(isVisible) {
    const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');

    svg.setAttribute('viewBox', '0 0 24 24');
    svg.setAttribute('width', '20');
    svg.setAttribute('height', '20');
    svg.setAttribute('fill', 'none');
    svg.setAttribute('stroke', 'currentColor');
    svg.setAttribute('stroke-width', '1.8');
    svg.setAttribute('stroke-linecap', 'round');
    svg.setAttribute('stroke-linejoin', 'round');
    svg.setAttribute('aria-hidden', 'true');

    if (isVisible) {
        path.setAttribute('d', 'M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Zm10-3a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z');
    } else {
        path.setAttribute('d', 'm3 3 18 18M10.6 10.6a2 2 0 0 0 2.8 2.8M9.9 5.2A10.4 10.4 0 0 1 12 5c6.4 0 10 7 10 7a16 16 0 0 1-3 3.8M6.2 6.2A17 17 0 0 0 2 12s3.6 7 10 7a10 10 0 0 0 4-.8');
    }

    svg.append(path);

    return svg;
}

function showDemoNotice(message) {
    let notice = document.querySelector('.demo-toast');

    if (!notice) {
        notice = document.createElement('div');
        notice.className = 'demo-toast';
        notice.setAttribute('role', 'status');
        notice.setAttribute('aria-live', 'polite');
        document.body.append(notice);
    }

    notice.textContent = message;
    notice.classList.add('is-visible');
    window.clearTimeout(Number(notice.dataset.timeoutId));
    notice.dataset.timeoutId = String(window.setTimeout(() => {
        notice.classList.remove('is-visible');
    }, 4200));
}
