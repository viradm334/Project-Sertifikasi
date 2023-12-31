<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">DigitalDaily</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Home" ? 'active' : '') }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Product" ? 'active' : '') }}" href="/products">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "categories" ? 'active' : '') }}" href="/categories">Category</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Welcome back, {{ auth()->user()->name }}!
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/profile"><i class="bi bi-file-earmark-person"></i> Profile</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/my-orders"><i class="bi bi-layout-text-sidebar-reverse"></i> My Orders</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="POST">
                      @csrf
                      <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                </li>
                </ul>
              </li>
            @else
            <li class="nav-item">
              <a href="/login" class="nav-link {{ ($title === "login" ? 'active' : '') }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
            @endauth
        </ul>

      </div>
    </div>
  </nav>
