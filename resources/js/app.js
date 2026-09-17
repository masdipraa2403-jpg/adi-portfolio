document.addEventListener('DOMContentLoaded', () => {
    const navToggle = document.querySelector('.nav-toggle');
    const navLinks = document.querySelector('.nav-links');

    if (navToggle && navLinks) {
        navToggle.addEventListener('click', () => {
            const open = navLinks.classList.toggle('mobile-open');
            navToggle.setAttribute('aria-expanded', String(open));
        });

        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('mobile-open');
                navToggle.setAttribute('aria-expanded', 'false');
            });
        });

        document.addEventListener('click', event => {
            if (!navLinks.contains(event.target) && !navToggle.contains(event.target)) {
                navLinks.classList.remove('mobile-open');
                navToggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    const path = window.location.pathname.replace(/\/+$/, '') || '/';

    document.querySelectorAll('[data-nav]').forEach(link => {
        const key = link.dataset.nav;
        const matches =
            (key === 'home' && path === '') ||
            (key === 'home' && path === '/') ||
            (key !== 'home' && path === `/${key}`) ||
            (key === 'projects' && path.startsWith('/projects'));

        if (matches) link.classList.add('active');
    });

    const adminSidebar = document.querySelector('.admin-sidebar');
    const adminToggle = document.querySelector('.admin-mobile-toggle');

    if (adminSidebar && adminToggle) {
        adminToggle.addEventListener('click', () => {
            const open = adminSidebar.classList.toggle('mobile-open');
            adminToggle.setAttribute('aria-expanded', String(open));
        });

        adminSidebar.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                adminSidebar.classList.remove('mobile-open');
                adminToggle.setAttribute('aria-expanded', 'false');
            });
        });

        document.addEventListener('click', event => {
            if (!adminSidebar.contains(event.target) && !adminToggle.contains(event.target)) {
                adminSidebar.classList.remove('mobile-open');
                adminToggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    document.querySelectorAll('[data-admin-nav]').forEach(link => {
        const key = link.dataset.adminNav;
        const adminPath = path.startsWith('/admin') ? path : '';

        if (
            (key === 'dashboard' && adminPath === '/admin/dashboard') ||
            (key !== 'dashboard' && adminPath.startsWith(`/admin/content/${key}`)) ||
            (key === 'messages' && adminPath.startsWith('/admin/messages'))
        ) {
            link.classList.add('active');
        }
    });

    const certificateInput = document.getElementById('certificate_file');
    const certificatePreview = document.getElementById('certificate-preview');
    const certificateContent = document.getElementById('certificate-preview-content');
    const removeCertificate = document.getElementById('remove-certificate');

    if (certificateInput && certificatePreview && certificateContent) {
        certificateInput.addEventListener('change', () => {
            const file = certificateInput.files?.[0];

            if (!file) {
                certificatePreview.style.display = 'none';
                certificateContent.innerHTML = '';
                return;
            }

            const extension = file.name.split('.').pop().toLowerCase();
            const size = (file.size / (1024 * 1024)).toFixed(2);
            const imageExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

            let html = `
                <div class="selected-file-info">
                    <strong>${escapeHtml(file.name)}</strong>
                    <small>${size} MB</small>
                </div>
            `;

            if (imageExtensions.includes(extension)) {
                const url = URL.createObjectURL(file);
                html += `<div class="new-certificate-image"><img src="${url}" alt="Preview sertifikat"></div>`;
            } else {
                html += `
                    <div class="new-certificate-pdf">
                        <div class="pdf-icon">PDF</div>
                        <div>
                            <strong>Dokumen PDF</strong>
                            <small>File siap diupload</small>
                        </div>
                    </div>
                `;
            }

            certificatePreview.style.display = 'block';
            certificateContent.innerHTML = html;
        });

        removeCertificate?.addEventListener('click', () => {
            certificateInput.value = '';
            certificatePreview.style.display = 'none';
            certificateContent.innerHTML = '';
        });
    }

    function escapeHtml(value) {
        return String(value)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }
});
