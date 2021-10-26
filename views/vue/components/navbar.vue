<nav id="navbar">
    <div v-show="!mobileState" class="brand-div">
      <a href="index.php?controller=home">
        <img src="../assets/brand.png" alt="brand-img" class="brand-img"/>
      </a>
    </div>
    <div class="logo-div">
      <img src="../assets/logo.png" alt="logo-img" class="logo-img"/>
    </div>
    <div v-show="!mobileState" class="nav-links-div">
      <?php include(ROOT.'/views/navbar/navbar_menu.html'); ?>
    </div>

    <div v-show="mobileState" class="nav-mobile">
      <img @click="toggleMobileNav" src="../../assets/bars.svg" id="nav-mobile-icon" :class="{'icon-active': mobileNav}">
      <transition name="sub-menu-transition">
        <div v-show="mobileNav" class="nav-links-mobile">
          <?php include(ROOT.'/views/navbar/navbar_menu.html'); ?>
        </div>
      </transition>
    </div>
</nav>
<script type="application/javascript" src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script type="module" src="../views/js/Navbar.js"></script>
