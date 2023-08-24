import { Controller } from 'stimulus'
import { disableScroll, enableScroll }  from '../utils'

export default class NavController extends Controller {

  static targets = ['link']

	connect() {
    this.body = document.body;
    this.scrollUp = "scroll-up";
    this.scrollDown = "scroll-down";
    this.lastScroll = 0
  }

	click(e) {
		this.linkTargets.forEach((link, i) => {
			link.classList.remove('active')
		})
		e.currentTarget.classList.add('active');
    this.closeNav()
	}

	toggleNav(e) {
    if (e) e.preventDefault()
    if (document.querySelector('body').classList.contains('is-menu-open')) {
      this.closeNav()
    } else {
      this.openNav()
    }
  }

  closeNav() {
    document.querySelector('body').classList.remove('is-menu-open')
    enableScroll()
  }

  openNav() {
    document.querySelector('body').classList.add('is-menu-open')
    disableScroll()
  }
  hideHeader() {
    const currentScroll = window.pageYOffset;
    // const showNav = window.matchMedia('(max-width: 768px)').matches ? 60 : 170

    if (currentScroll <= 100) {
      this.body.classList.remove(this.scrollUp);
      this.element.classList.remove('is-scroll')
      return;
    }
    if (
      currentScroll > this.lastScroll &&
      !this.body.classList.contains(this.scrollDown)
    ) {
      // down
      this.body.classList.remove(this.scrollUp);
      this.body.classList.add(this.scrollDown);
    } else if (
      currentScroll < this.lastScroll &&
      this.body.classList.contains(this.scrollDown)
    ) {
      // up
      this.body.classList.remove(this.scrollDown);
      this.body.classList.add(this.scrollUp);
    }
    this.element.classList.add('is-scroll')
    this.lastScroll = currentScroll;
  }
}

