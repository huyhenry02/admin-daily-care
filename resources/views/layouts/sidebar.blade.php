<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
        <ul class="nav nav-secondary">
            <li class="nav-item">
                <a
                    data-bs-toggle="collapse"
                    href="#dashboard"
                    class="collapsed"
                    aria-expanded="false"
                >
                    <i class="fas fa-home"></i>
                    <p>Báo cáo thống kê</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse show" id="dashboard">
                    <ul class="nav nav-collapse show">
                        <li>
                            <a href="">
                                <span class="sub-item">Báo cáo Doanh số</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="sub-item">Báo cáo Khách hàng</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="sub-item">Báo cáo Đơn hàng</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href=" #base">
                    <i class="fas fa-layer-group"></i>
                    <p>Quản lý tài khoản</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse show" id="base">
                    <ul class="nav nav-collapse show">
                        <li>
                            <a href="{{ route('account.showIndex') }}">
                                <span class="sub-item">Danh sách</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('account.showCreate') }}">
                                <span class="sub-item">Thêm mới</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href=" #base">
                    <i class="fas fa-layer-group"></i>
                    <p>Quản lý Nhân viên</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse show" id="base">
                    <ul class="nav nav-collapse show">
                        <li>
                            <a href="{{ route('cleaner.showIndex') }}">
                                <span class="sub-item">Danh sách</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cleaner.showCreate') }}">
                                <span class="sub-item">Thêm mới</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
