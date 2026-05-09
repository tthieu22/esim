# International Travel eSIM E-commerce Platform

[![WordPress](https://img.shields.io/badge/Platform-WordPress%20%7C%20WooCommerce-21759b?style=for-the-badge&logo=wordpress)](https://wordpress.org/)
[![PHP](https://img.shields.io/badge/Language-PHP%20%7C%20JavaScript-777bb4?style=for-the-badge&logo=php)](https://www.php.net/)
[![Theme](https://img.shields.io/badge/Framework-Flatsome%20Child%20Theme-orange?style=for-the-badge)](https://uxthemes.com/)

Hệ thống thương mại điện tử chuyên biệt cho dịch vụ eSIM du lịch quốc tế, được xây dựng trên nền tảng **WordPress/WooCommerce** với kiến trúc tối ưu hiệu năng và trải nghiệm người dùng (UX). Dự án tập trung vào việc tùy biến sâu logic nghiệp vụ và giao diện thông qua Flatsome Child Theme.

---

## 🚀 Điểm Nhấn Kỹ Thuật (Technical Highlights)

Dự án triển khai hơn **25KB logic tùy chỉnh** trong `functions.php`, giải quyết các bài toán phức tạp về tìm kiếm, tương tác sản phẩm và tối ưu chuyển đổi:

1.  **Kiến trúc Flatsome Child Theme Nâng Cao**: Xây dựng hệ thống ổn định, dễ bảo trì, tách biệt hoàn toàn logic tùy chỉnh khỏi core theme.
2.  **AJAX Search & Filter Engine**: Hệ thống tìm kiếm eSIM theo quốc gia/khu vực theo thời gian thực (Real-time). Tối ưu hóa truy vấn `WP_Query` giúp trả về kết quả ngay lập tức mà không cần tải lại trang.
3.  **Modern Product Variations Interface**: Tái cấu trúc hoàn toàn giao diện biến thể mặc định của WooCommerce. Thay thế dropdown bằng hệ thống Selectable Cards hiện đại, tự động cập nhật mô tả và giá gói cước dựa trên tiền tệ người dùng (Multi-currency support).
4.  **Conversion Rate Optimization (CRO)**:
    *   **Quick Buy**: Cho phép người dùng thanh toán ngay lập tức từ trang sản phẩm.
    *   **AJAX Cart Fragments**: Cập nhật giỏ hàng và mini-cart tự động, giảm thiểu friction trong luồng mua hàng.
5.  **Custom UX Builder Modules**: Phát triển bộ Shortcodes độc quyền tích hợp trực tiếp vào Flatsome UX Builder, giúp quản trị viên cấu hình các module phức tạp (Listings, Trustpilot Reviews, Destinations) một cách trực quan.

---

## 🛠 Công Nghệ Sử Dụng (Tech Stack)

-   **Core**: WordPress, PHP 7.4+, MySQL.
-   **E-commerce**: WooCommerce.
-   **Frontend**: JavaScript (ES6), jQuery (AJAX), SASS/CSS3.
-   **Theme Framework**: Flatsome & UX Builder.
-   **Tools**: Git, Composer (nếu có).

---

## 📦 Các Tính Năng Chi Tiết

### 🔍 1. Hệ thống Tìm kiếm Thông minh (AJAX Search)
- Tích hợp `wp_ajax` để xử lý tìm kiếm sản phẩm theo quốc gia.
- Giao diện tìm kiếm dạng overlay/dropdown thân thiện với thiết bị di động.
- Hiển thị kết quả kèm hình ảnh quốc kỳ và mô tả ngắn gọn.

### 💳 2. Tối ưu hóa Quy trình Thanh toán
- **AJAX Add to Cart**: Thêm sản phẩm vào giỏ hàng không reload.
- **Quick Checkout**: Bỏ qua các bước trung gian không cần thiết để tăng tốc độ checkout.
- **Custom My Account**: Tùy biến trang quản lý tài khoản, thêm tính năng đổi mật khẩu tùy chỉnh và theo dõi trạng thái đơn hàng chi tiết với các nhãn (status badges) chuyên nghiệp.

### 🎨 3. Giao diện Tương tác Biến thể (Advanced Variations)
- Chuyển đổi dropdown thành các khối tương tác (UI Blocks).
- Hiển thị giá khuyến mãi (sale price) và giá gốc đồng thời.
- Tích hợp logic xử lý đa tiền tệ (VND, USD) tự động làm tròn giá cho phù hợp với thị trường.

### 🛠 4. Khả năng Mở rộng (Extensibility)
- **Trustpilot Integration**: Module hiển thị đánh giá từ Trustpilot thông qua Shortcode tùy chỉnh.
- **Destination Flags**: Hiển thị danh sách quốc gia với icon quốc kỳ được tối ưu hóa lazy-load.

---

## 📂 Cấu trúc Thư mục Quan trọng

```text
flatsome-child/
├── assets/js/          # Script xử lý AJAX Search & Variations logic
├── woocommerce/        # Giao diện WooCommerce đã được override
├── functions.php       # Core logic của hệ thống (>25KB)
├── search-form.php     # Template cho hệ thống tìm kiếm
└── trust-pilot-item.php # Module đánh giá tùy chỉnh
```

---

## 👨‍💻 Thông tin Tác giả

**WordPress Developer**
- **GitHub**: [github.com/tthieu22](https://github.com/tthieu22)
- **Dự án thực hiện**: 03/2024 - 05/2024

---
*Dự án này là minh chứng cho khả năng tùy biến sâu (Deep Customization) trên nền tảng WordPress để đáp ứng các yêu cầu kinh doanh khắt khe trong lĩnh vực du lịch và công nghệ số.*
