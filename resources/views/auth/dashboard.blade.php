<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng điều khiển</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body class="dashboard-page">
    <main class="dashboard-shell">
        <section class="profile-hero">
            <div class="profile-copy">
                <span class="eyebrow">Đăng nhập thành công</span>
                <h1>Xin chào, {{ Auth::user()->name }}</h1>
                <p>
                    Bạn đã xác thực tài khoản thành công. Dưới đây là thông tin hồ sơ được lấy
                    từ nhà cung cấp đăng nhập xã hội.
                </p>
            </div>

            <div class="hero-meta">
                <span>{{ strtoupper(Auth::user()->provider ?? 'SOCIAL') }}</span>
                <span>Mã SV: {{ Auth::user()->student_id }}</span>
            </div>
        </section>

        <section class="profile-grid">
            <article class="profile-card profile-card-main">
                <div class="avatar-wrap">
                    <img src="{{ Auth::user()->avatar }}" alt="Avatar người dùng">
                </div>
                <div>
                    <p class="label">Tài khoản</p>
                    <h2>{{ Auth::user()->name }}</h2>
                    <p class="muted">{{ Auth::user()->email }}</p>
                </div>
            </article>

            <article class="profile-card">
                <p class="label">Thông tin sinh viên</p>
                <ul class="info-list">
                    <li><span>Họ tên</span><strong>{{ Auth::user()->name }}</strong></li>
                    <li><span>Mã sinh viên</span><strong>{{ Auth::user()->student_id }}</strong></li>
                    <li><span>Nhà cung cấp</span><strong>{{ Auth::user()->provider }}</strong></li>
                    <li><span>Provider ID</span><strong>{{ Auth::user()->provider_id }}</strong></li>
                </ul>
            </article>

            <article class="profile-card">
                <p class="label">Thao tác nhanh</p>
                <div class="action-stack">
                    <a href="/" class="ghost-link">Quay lại trang đăng nhập</a>
                </div>
            </article>
        </section>
    </main>
</body>
</html>
