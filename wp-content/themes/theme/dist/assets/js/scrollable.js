document.addEventListener('DOMContentLoaded', function () {
    const scrollableContainer = document.querySelector('.scrollable');

    let isDown = false;
    let startX;
    let scrollLeft;

    // Bắt đầu kéo
    scrollableContainer.addEventListener('mousedown', (e) => {
        isDown = true;
        scrollableContainer.classList.add('active'); // Thêm class cho hiệu ứng (nếu cần)
        startX = e.pageX - scrollableContainer.offsetLeft;
        scrollLeft = scrollableContainer.scrollLeft;
    });

    // Khi nhả chuột, dừng kéo
    document.addEventListener('mouseup', () => {
        isDown = false;
        scrollableContainer.classList.remove('active');
    });

    // Thực hiện kéo
    scrollableContainer.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - scrollableContainer.offsetLeft;
        const walk = (x - startX) * 2; // Tốc độ kéo (số nhân này có thể điều chỉnh)
        scrollableContainer.scrollLeft = scrollLeft - walk;
    });
});
