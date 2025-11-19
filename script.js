// Chức năng tab
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-btn');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Xóa class active khỏi tất cả các nút
            tabButtons.forEach(btn => btn.classList.remove('active'));
            // Thêm class active vào nút được click
            this.classList.add('active');
            
            // Có thể thêm AJAX để tải sản phẩm theo tab
            console.log('Tab được chọn:', this.textContent);
        });
    });
    
    // Chức năng thêm vào giỏ hàng
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productCard = this.closest('.product-card');
            const productName = productCard.querySelector('.product-name').textContent;
            
            // Hiệu ứng
            this.textContent = 'Đã thêm!';
            this.style.backgroundColor = '#45a049';
            
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng';
                this.style.backgroundColor = '';
            }, 1500);
            
            console.log('Đã thêm vào giỏ hàng:', productName);
        });
    });
});
