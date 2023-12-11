<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              My Posts
            </a>
          </li>
      </ul>

      @can('admin')

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>ADMINISTRATOR</span>
      </h6>
      <ul class="nav flex-col">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <i class="bi bi-grid"></i>
            Post Categories
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
            <i class="bi bi-person-arms-up"></i>
            Users
          </a>
        </li>
      </ul>

      @endcan
    </div>
  </nav>
