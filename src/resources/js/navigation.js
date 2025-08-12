const burgerBtn = document.getElementById('burgerBtn');
const sidebar = document.getElementById('sidebar');
const closeBtn = document.getElementById('closeSidebar');

burgerBtn.addEventListener('click', () => {
    sidebar.style.transform = 'translateX(0)';
});

closeBtn.addEventListener('click', () => {
    sidebar.style.transform = 'translateX(100%)';
});

window.addEventListener('click', (e) => {
    if (!sidebar.contains(e.target) && !burgerBtn.contains(e.target)) {
        sidebar.style.transform = 'translateX(100%)';
    }
});
