class Header {
  constructor() {
    this.header = jQuery('#header');
    this.mobileMenu = jQuery('#mobile-menu');

    // execute on init
    this.handleWindowScroll();

    // event bindings
    jQuery(window).on('scroll', this.handleWindowScroll.bind(this));
    jQuery('.burger-toggle').on('click', this.handleBurgerToggle.bind(this));
  }

  handleWindowScroll() {
    if (jQuery(document).scrollTop() > 0) {
      this.header.addClass('scrolling');
    } else {
      this.header.removeClass('scrolling');
    }
  }

  handleBurgerToggle(e) {
    e.preventDefault();
    if (this.mobileMenu.hasClass('open')) {
      this.closeMobileMenu();
    } else {
      this.openMobileMenu();
    }
  }

  openMobileMenu() {
    this.mobileMenu.removeClass('hidden').addClass('open');
    jQuery('body').addClass('no-scroll');
  }

  closeMobileMenu() {
    this.mobileMenu.addClass('hidden').removeClass('open');
    jQuery('body').removeClass('no-scroll');
  }

  static getInstance() {
    if (this.instance == null) {
      this.instance = new Header();
    }
    return this.instance;
  }
}

// init
jQuery(() => Header.getInstance());
