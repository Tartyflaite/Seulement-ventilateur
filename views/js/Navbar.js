new Vue({
  el: '#navbar',
  data: {
    mobileState: false,
    mobileNav: false
  },
  created() {
    window.addEventListener('resize', this.checkMobileState);
    this.checkMobileState();
  },
  methods: {
    toggleMobileNav(){
      this.mobileNav = !this.mobileNav;
    },
    checkMobileState(){
      if(window.innerWidth <= 800){
        this.mobileState = true;
        return;
      }
      this.mobileState = false;
      this.mobileNav = false;
    }
  }
});