<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link <?= routeName() === 'index.php' ? 'active' : ''?>" href="index.php">
          <span data-feather="message-circle"></span>
          Aspirasi
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= routeName() === 'penduduks.php' ? 'active' : ''?>" href="penduduks.php">
          <span data-feather="users"></span>
          Penduduk
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= routeName() === 'categories.php' ? 'active' : ''?>" href="categories.php">
          <span data-feather="list"></span>
          Category
        </a>
      </li>
    </ul>
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Settings</span>
          <span data-feather="settings"></span>
    </h6>
    <ul class="nav flex-column">
      <li>
        <a class="nav-link <?= routeName() === 'history.php' ? 'active' : ''?>" href="history.php">
          <span data-feather="activity"></span>
          History
        </a>
      </li>
    </ul>
  </div>
</nav>
