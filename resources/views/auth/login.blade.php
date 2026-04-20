<main class="hero-shell">
    <section class="hero-copy">
        <span class="eyebrow">Social Auth Lab</span>
        <h1>Đăng nhập nhanh với giao diện gọn, hiện đại và dễ nhìn.</h1>
        <p class="hero-text">
            Truy cập hệ thống bằng Google hoặc Facebook để xem hồ sơ sinh viên, ảnh đại diện
            và thông tin tài khoản sau khi xác thực.
        </p>

        <div class="hero-points">
            <div class="point-card">
                <strong>Xác thực nhanh</strong>
                <p>Kết nối Socialite với Google và Facebook trong cùng một trải nghiệm.</p>
            </div>
            <div class="point-card">
                <strong>Giao diện đồng bộ</strong>
                <p>Màn hình trước và sau đăng nhập dùng cùng ngôn ngữ thiết kế.</p>
            </div>
            <div class="point-card">
                <strong>Dễ demo</strong>
                <p>Phù hợp trình bày bài tập, báo cáo môn học và thử nghiệm local với ngrok.</p>
            </div>
        </div>
    </section>

    <section class="login-panel">
        <div class="login-card">
            <span class="card-badge">Welcome</span>
            <h2>Bắt đầu đăng nhập</h2>
            <p class="panel-text">Chọn nhà cung cấp tài khoản bạn muốn sử dụng.</p>

            @if (session('error'))
                <div class="alert-box">
                    {{ session('error') }}
                </div>
            @endif

            <div class="social-actions">
                <a href="{{ route('social.redirect', 'google') }}" class="social-btn google-btn">
                    <span class="social-icon">G</span>
                    <span>Đăng nhập bằng Google</span>
                </a>

                <a href="{{ route('social.redirect', 'facebook') }}" class="social-btn facebook-btn">
                    <span class="social-icon">f</span>
                    <span>Đăng nhập bằng Facebook</span>
                </a>
            </div>

            <div class="panel-footer">
                <span>Laravel Socialite</span>
                <span>Google + Facebook</span>
            </div>
        </div>
    </section>
</main>
