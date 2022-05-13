<div class="sidebar-wrapper">
    <div>
      <div class="logo-wrapper"><a href="/quantrivien">Hệ Thống Admin Barber</a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
      </div>
      <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="/admin/assets/images/logo/logo-icon.png" alt=""></a></div>
      <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
          <ul class="sidebar-links" id="simple-bar">
            <li class="sidebar-main-title">
            </li>
            <li class="sidebar-list">
              <label class="badge badge-success"></label><a class="sidebar-link sidebar-title" href="#"><i data-feather="home"></i><span>Nhân Viên</span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{ Route('agent.Create')}}">Thêm Mới Nhân Viên</a></li>
                <li><a href="{{ Route('agent.Index')}}">Danh Sách Nhân Viên</a></li>
              </ul>
            </li>
            <li class="sidebar-list">
              <label class="badge badge-danger"></label><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>Combo Cắt Tóc</span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{ Route('combo.Create')}}">Tạo Combo</a></li>
                <li><a href="{{ Route('combo.Index')}}">Danh Sách Combo</a></li>
              </ul>
            </li>
            <li class="sidebar-list">
                <label class="badge badge-danger"></label><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>Danh sách lịch cắt tóc</span></a>
                <ul class="sidebar-submenu">
                  <li><a href="/admin/lichcat">Lịch Cắt</a></li>
                </ul>
              </li>
            {{-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html"><i data-feather="git-pull-request"> </i><span>File manager</span></a></li>
            <li class="sidebar-list">
              <label class="badge badge-info">Latest</label>
                <a class="sidebar-link sidebar-title link-nav" href="kanban.html"><i data-feather="monitor">
                    </i><span>kanban Board</span></a>
            </li> --}}
          </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </nav>
    </div>
  </div>
