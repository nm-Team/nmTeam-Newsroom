// Toggle header
function toggleHeader(to = undefined) {
    if (!to) {
        to = $('[data-nav-menu-extended]').attr('data-nav-menu-extended') === 'true' ? 'false' : 'true';
    }
    $('[data-nav-menu-extended]').attr('data-nav-menu-extended', to);
}

function toggleSidebarCategory() {
    $('.sidebar').toggleClass('show-hidden');
}

// Play animation on visible
const targetElements = document.querySelectorAll('.come-out-animation');

targetElements.forEach(targetElement => {
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                targetElement.setAttribute('data-come-out-animation', '');
            } else {
                targetElement.removeAttribute('data-come-out-animation');
            }
        });
    });

    observer.observe(targetElement);
});
