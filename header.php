<header class="hdr">
  <div class="container">
    <a href="/" class="logo">
      <img src="<?= isset($data->logo) ? $data->logo : '/images/logo.png' ?>" alt="<?= htmlspecialchars($data->title) ?>">
    </a>
    <button class="mobilemenu-toggle" aria-label="Toggle navigation">&#9776;</button>
    <nav class="nav-wrapper">
      <ul class="nav-level-1 list-categories"></ul>
    </nav>
    <ul class="mobilemenu list-categories-mobile"></ul>
    <div class="quick-login-section">
      <form id="quickLoginSidebar">
        <input type="text" id="quickLoginEmail" placeholder="E-mail">
        <div id="quickLoginInvalidEmail">Can't be blank</div>
        <input type="password" id="quickLoginPassword" placeholder="Password">
        <div id="quickLoginInvalidPassword">Can't be blank</div>
        <button type="submit">Login</button>
      </form>
    </div>
    <a id="login-sidebar-btn" href="/page/login.html">Login</a>
    <a id="register-sidebar-btn" href="/page/signup.html">Register</a>
    <a id="account-sidebar-btn" href="/account-details.html" style="display:none;">Account</a>
    <span id="welcomeUserSidebar" style="display:none;"></span>
    <a id="quickLoginLogout" href="#" style="display:none;">Logout</a>
  </div>
</header>
