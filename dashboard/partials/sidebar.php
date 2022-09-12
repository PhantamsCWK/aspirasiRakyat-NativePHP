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
  </div>
</nav>
