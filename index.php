<?php
// Cấu hình trang
$page_title = "Long Hoàn - Cửa hàng thuốc tây";
$site_name = "Long Hoàn";
$hotline = "0123.456.7890";
$email = "longhoan@gmail.com";

// Danh sách danh mục
$categories = [
    ['icon' => 'fa-pills', 'name' => 'Thuốc theo đơn', 'has_submenu' => false],
    ['icon' => 'fa-capsules', 'name' => 'Hạ sốt giảm đau', 'has_submenu' => false],
    ['icon' => 'fa-heartbeat', 'name' => 'Chăm sóc sức khỏe', 'has_submenu' => true],
    ['icon' => 'fa-baby', 'name' => 'Dược mỹ phẩm', 'has_submenu' => true],
    ['icon' => 'fa-leaf', 'name' => 'Thực tế y tế', 'has_submenu' => true],
    ['icon' => 'fa-apple-alt', 'name' => 'Thực phẩm chức năng', 'has_submenu' => true],
    ['icon' => 'fa-spray-can', 'name' => 'Vitamin', 'has_submenu' => false],
    ['icon' => 'fa-child', 'name' => 'Thần ngoại ty khác', 'has_submenu' => false],
    ['icon' => 'fa-medkit', 'name' => 'Thuốc', 'has_submenu' => false],
];

// Danh sách menu
$menu_items = [
    'Trang chủ',
    'Thuốc',
    'Thực phẩm chức năng',
    'Dược mỹ phẩm',
    'Chăm sóc cá nhân',
    'Thiết bị y tế',
    'Sản phẩm',
    'Bán chạy nhất',
    'Liên hệ'
];

// Danh sách sản phẩm
$products = [
    [
        'id' => 1,
        'name' => 'Gel lăm VITAMIN E - Mango and Avocado Oil Ozone',
        'price' => '57.500đ',
        'rating' => 5,
        'image' => 'https://via.placeholder.com/200x200/f5f5f5/333?text=Product+1',
        'description' => 'Sản xuất với thành phần tự nhiên, sản phẩm có khả năng dưỡng ẩm, giúm mịn da, chống lão hóa da...'
    ],
    [
        'id' => 2,
        'name' => 'Xe đẩy 4 bánh Nuna Gold Rush SAFETY1ST',
        'price' => '3.639.300đ',
        'rating' => 5,
        'image' => 'https://via.placeholder.com/200x200/f5f5f5/333?text=Product+2',
        'description' => 'Thiết kế hiện đại, khung xe chắc chắn, dễ gấp gọn, bánh xe linh hoạt, an toàn cho bé. Sản phẩm...'
    ],
    [
        'id' => 3,
        'name' => 'Nestlé NAN Organic 1, 2 - 4 hộp 900g',
        'price' => '896.000đ',
        'rating' => 5,
        'image' => 'https://via.placeholder.com/200x200/f5f5f5/333?text=Product+3',
        'description' => 'Sản xuất theo tiêu chuẩn Hữu cơ Nestlé NAN Organic 1, 2 MBPS là sản phẩm dinh dưỡng dành cho...'
    ],
    [
        'id' => 4,
        'name' => 'Bột ngũ cốc cá cơi, gấm mại và hạt nạm nghiền - Heinz',
        'price' => '165.000đ',
        'rating' => 5,
        'image' => 'https://via.placeholder.com/200x200/f5f5f5/333?text=Product+4',
        'description' => 'Sản xuất theo tiêu chuẩn quốc tế, sản phẩm bổ sung các chất dinh dưỡng cần thiết cho bé từ 6 tháng tuổi...'
    ],
    [
        'id' => 5,
        'name' => 'Combo 2 lon WAKODO GUNGUN 3, 1y2 850g',
        'price' => '2.800.000đ',
        'rating' => 5,
        'image' => 'https://via.placeholder.com/200x200/f5f5f5/333?text=Product+5',
        'description' => 'Sản phẩm dinh dưỡng cao cấp từ Nhật Bản, giúp bé phát triển toàn diện...'
    ],
    [
        'id' => 6,
        'name' => 'Thùng thực phẩm bổ sung Metagenics A 350 viên',
        'price' => '395.000đ',
        'rating' => 5,
        'image' => 'https://via.placeholder.com/200x200/f5f5f5/333?text=Product+6',
        'description' => 'Thực phẩm bổ sung vitamin và khoáng chất thiết yếu cho cơ thể...'
    ],
    [
        'id' => 7,
        'name' => 'Thực phẩm dinh dưỡng y học Ensure Gold Vigor',
        'price' => '348.000đ',
        'rating' => 5,
        'image' => 'https://via.placeholder.com/200x200/f5f5f5/333?text=Product+7',
        'description' => 'Dinh dưỡng y học chuyên biệt, giúp tăng cường sức khỏe và năng lượng...'
    ],
    [
        'id' => 8,
        'name' => 'Abbott Grow 4 Hương Vani 900g',
        'price' => '1.080.000đ',
        'rating' => 5,
        'image' => 'https://via.placeholder.com/200x200/f5f5f5/333?text=Product+8',
        'description' => 'Sữa bột dinh dưỡng cho trẻ từ 3 tuổi trở lên, giúp bé phát triển chiều cao và trí não...'
    ],
];

// Danh sách bài viết
$articles = [
    [
        'id' => 1,
        'title' => 'Làm thế nào để quản lý căng thẳng và lo âu?',
        'excerpt' => 'Căng thẳng và lo âu là những vấn đề phổ biến trong cuộc sống hiện đại. Hãy cùng tìm hiểu các phương pháp giúp bạn quản lý tốt hơn...',
        'date' => '25 Th11',
        'image' => 'https://via.placeholder.com/350x250/e8f5e9/333?text=Article+1'
    ],
    [
        'id' => 2,
        'title' => 'Làm thế nào để quản lý căng thẳng và lo âu?',
        'excerpt' => 'Căng thẳng và lo âu là những vấn đề phổ biến trong cuộc sống hiện đại. Hãy cùng tìm hiểu các phương pháp giúp bạn quản lý tốt hơn...',
        'date' => '23 Th11',
        'image' => 'https://via.placeholder.com/350x250/fff3e0/333?text=Article+2'
    ],
    [
        'id' => 3,
        'title' => 'Bổ khỏe tiêu hóa, cùng mẹ khám phá Disney Land Nhật Bản',
        'excerpt' => 'Chăm sóc sức khỏe tiêu hóa cho bé là điều quan trọng. Cùng khám phá những mẹo hay và trải nghiệm thú vị tại Disney Land...',
        'date' => '20 Th11',
        'image' => 'https://via.placeholder.com/350x250/e3f2fd/333?text=Article+3'
    ],
];

// Tabs sản phẩm
$product_tabs = ['Tất cả', 'Quà tặng', 'Phổ biến', 'Đề xuất', 'Sản phẩm mới'];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Header Top -->
    <div class="header-top">
        <div class="container">
            <div class="header-top-left">
                <span><i class="fas fa-envelope"></i> <?php echo $email; ?></span>
                <span><i class="fas fa-phone"></i> <?php echo $hotline; ?></span>
            </div>
            <div class="header-top-right">
                <span>MIỄN PHÍ VẬN CHUYỂN CHO ĐƠN HÀNG TRÊN 500.000đ</span>
            </div>
        </div>
    </div>

    <!-- Header Main -->
    <header class="header-main">
        <div class="container">
            <div class="logo">
                <i class="fas fa-plus-circle"></i>
                <h1><?php echo $site_name; ?></h1>
            </div>
            
            <div class="search-bar">
                <input type="text" placeholder="Tìm sản phẩm, dược mỹ phẩm...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
            
            <div class="header-actions">
                <div class="action-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <small>Tìm</small>
                        <strong>Nhà thuốc</strong>
                    </div>
                </div>
                <div class="action-item">
                    <i class="fas fa-user"></i>
                    <div>
                        <small>Tài khoản</small>
                        <strong>Đăng nhập/Đăng ký</strong>
                    </div>
                </div>
                <div class="action-item">
                    <i class="fas fa-file-alt"></i>
                    <div>
                        <small>Yêu thích</small>
                        <strong>Danh sách yêu thích</strong>
                    </div>
                </div>
                <div class="action-item">
                    <i class="fas fa-shopping-cart"></i>
                    <div>
                        <small>Giỏ hàng</small>
                        <strong>0 sản phẩm</strong>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="main-nav">
        <div class="container">
            <ul class="nav-menu">
                <?php foreach ($menu_items as $menu_item): ?>
                    <li><a><?php echo $menu_item; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <div class="hotline">
                <i class="fas fa-phone-alt"></i> <?php echo $hotline; ?>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-main">
                <img src="https://via.placeholder.com/800x400/e8f5e9/333?text=How+to+manage+stress+and+anxiety" alt="Hero Banner">
                <div class="hero-text">
                    <h2>Làm thế nào để quản lý căng thẳng và lo âu?</h2>
                </div>
            </div>
            <div class="hero-sidebar">
                <div class="sidebar-banner">
                    <img src="https://via.placeholder.com/300x180/fff3e0/333?text=Eucerin+Daily+Routine" alt="Eucerin">
                </div>
                <div class="sidebar-banner">
                    <img src="https://via.placeholder.com/300x180/e8f5e9/333?text=VICHY+Dermatological+Beauty" alt="Vichy">
                </div>
            </div>
        </div>
    </section>

    <!-- Product Tabs -->
    <section class="product-section">
        <div class="container">
            <div class="product-tabs">
                <?php foreach ($product_tabs as $index => $tab): ?>
                    <button class="tab-btn <?php echo $index === 0 ? 'active' : ''; ?>">
                        <?php echo $tab; ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="product-layout">
                <!-- Sidebar Categories -->
                <aside class="sidebar-categories">
                    <h3>Danh mục sản phẩm</h3>
                    <p class="category-desc">Khám phá các danh mục sản phẩm đa dạng của chúng tôi</p>
                    
                    <ul class="category-list">
                        <?php foreach ($categories as $category): ?>
                            <li>
                                <a>
                                    <span>
                                        <i class="fas <?php echo $category['icon']; ?>"></i>
                                        <?php echo $category['name']; ?>
                                    </span>
                                    <?php if ($category['has_submenu']): ?>
                                        <i class="fas fa-chevron-right"></i>
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="sidebar-banner-ad">
                        <img src="https://via.placeholder.com/150x200/e3f2fd/333?text=Eucerin+Banner" alt="Eucerin">
                    </div>
                </aside>

                <!-- Products Main -->
                <div class="products-main">
                    <div class="products-grid">
                        <?php foreach ($products as $product): ?>
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                                </div>
                                <h3 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h3>
                                <div class="product-rating">
                                    <?php for ($i = 0; $i < $product['rating']; $i++): ?>
                                        <i class="fas fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                                <p class="product-price"><?php echo $product['price']; ?></p>
                                <button class="add-to-cart" data-product-id="<?php echo $product['id']; ?>">
                                    <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng
                                </button>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Product List View -->
                    <div class="products-list">
                        <?php foreach (array_slice($products, 0, 4) as $product): ?>
                            <div class="product-list-item">
                                <div class="product-list-image">
                                    <img src="<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                                </div>
                                <div class="product-list-info">
                                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                                    <div class="product-rating">
                                        <?php for ($i = 0; $i < $product['rating']; $i++): ?>
                                            <i class="fas fa-star"></i>
                                        <?php endfor; ?>
                                    </div>
                                    <p class="product-price"><?php echo $product['price']; ?></p>
                                    <p class="product-desc"><?php echo $product['description']; ?></p>
                                    <button class="add-to-cart" data-product-id="<?php echo $product['id']; ?>">
                                        <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Articles and Tips Section -->
    <section class="articles-section">
        <div class="container">
            <h2 class="section-title">Bài viết và Mẹo hay</h2>
            <p class="section-subtitle">Cập nhật những kiến thức hữu ích về sức khỏe và chăm sóc bản thân</p>
            
            <div class="articles-grid">
                <?php foreach ($articles as $article): ?>
                    <article class="article-card">
                        <div class="article-image">
                            <img src="<?php echo $article['image']; ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
                            <span class="article-date">
                                <i class="fas fa-calendar"></i> <?php echo $article['date']; ?>
                            </span>
                        </div>
                        <div class="article-content">
                            <h3><?php echo htmlspecialchars($article['title']); ?></h3>
                            <p><?php echo $article['excerpt']; ?></p>
                            <a class="read-more">Đọc thêm <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <p>Bạn cần tư vấn về thuốc và chăm sóc sức khỏe? Đừng ngần ngại!</p>
                <p class="cta-subtitle">Chúng tôi luôn hỗ trợ bạn 24/7 với đội ngũ dược sĩ chuyên nghiệp</p>
            </div>
            <div class="cta-buttons">
                <a class="cta-btn cta-phone" href="tel:<?php echo str_replace('.', '', $hotline); ?>">
                    <i class="fas fa-phone"></i> <?php echo $hotline; ?>
                </a>
                <a class="cta-btn cta-messenger">
                    <i class="fab fa-facebook-messenger"></i> Chat Messenger
                </a>
            </div>
        </div>
    </section>

    <!-- Banner Section -->
    <section class="banner-section">
        <div class="container">
            <img src="https://via.placeholder.com/1200x200/e3f2fd/333?text=Stay+Safe+Wear+a+Mask" alt="Safety Banner">
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-col">
                    <h3>Về <?php echo $site_name; ?></h3>
                    <ul>
                        <li><a>Giới thiệu</a></li>
                        <li><a>Hệ thống cửa hàng</a></li>
                        <li><a>Giấy phép kinh doanh</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Dịch vụ khách hàng</h3>
                    <ul>
                        <li><a>Chính sách đổi trả</a></li>
                        <li><a>Chính sách giao hàng</a></li>
                        <li><a>Hướng dẫn mua hàng</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Liên hệ</h3>
                    <ul>
                        <li><i class="fas fa-phone"></i> <?php echo $hotline; ?></li>
                        <li><i class="fas fa-envelope"></i> <?php echo $email; ?></li>
                        <li><i class="fas fa-map-marker-alt"></i> Địa chỉ cửa hàng</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Theo dõi chúng tôi</h3>
                    <div class="social-links">
                        <a><i class="fab fa-facebook"></i></a>
                        <a><i class="fab fa-instagram"></i></a>
                        <a><i class="fab fa-youtube"></i></a>
                        <a><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php echo $site_name; ?>. Bản quyền thuộc về <?php echo $site_name; ?>.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
