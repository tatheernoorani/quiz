/**
 * File main.js.
 *
 */

( function() {

	function toggleMenu() {

		const mobileNav = document.getElementById( 'mobile-navigation' );
		if ( ! mobileNav ) {
			return;
		}

		const body = document.body,
		menu = mobileNav.querySelector( 'ul' ),
		menuToggle = document.querySelector( '.mobile-header .menu-toggle' ),
		closePanel = document.getElementById( 'side-panel-close'),
		overlay = document.getElementById( 'side-panel-overlay');

		menu.setAttribute( 'aria-expanded', 'false' );

		menuToggle.addEventListener( 'click', () => {
			if ( mobileNav.classList.contains( 'is-open' ) ) {
				menuToggle.setAttribute( 'aria-expanded', 'false' );
				menu.setAttribute( 'aria-expanded', 'false' );
			} else {
				menuToggle.setAttribute( 'aria-expanded', 'true' );
				menu.setAttribute( 'aria-expanded', 'true' );
			}
			mobileNav.classList.toggle( 'is-open' );
			body.classList.toggle( 'side-panel-open' );
			closePanel.focus();
		} );

		closePanel.addEventListener( 'click', () => {
			menuToggle.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
			mobileNav.classList.toggle( 'is-open' );
			body.classList.toggle( 'side-panel-open' );
		} );

		overlay.addEventListener( 'click', () => {
			menuToggle.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
			mobileNav.classList.toggle( 'is-open' );
			body.classList.toggle( 'side-panel-open' );
		} );

	}

	function trapFocusModal() {
		var sidePanel = document.getElementById( 'side-panel' );
		var focusableEls = sidePanel.querySelectorAll( 'a, button');

		var firstFocusableEl = focusableEls[0];
		var lastFocusableEl = focusableEls[focusableEls.length - 1];
		var KEYCODE_TAB = 9;

		sidePanel.addEventListener('keydown', function(e) {
			var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

			if (!isTabPressed) {
				return;
			}

			if ( e.shiftKey ) /* shift + tab */ {
				if (document.activeElement === firstFocusableEl) {
					lastFocusableEl.focus();
					e.preventDefault();
				}
			} else /* tab */ {
				if (document.activeElement === lastFocusableEl) {
					firstFocusableEl.focus();
					e.preventDefault();
				}
			}
		});
	}

	function trapFocusSearchPopup() {
		var siteHeader = document.getElementById( 'masthead' );
		var searchPopup = siteHeader.querySelector( '.search-popup-inner' );
		var focusableEls = searchPopup.querySelectorAll( 'input, button');

		var firstFocusableEl = focusableEls[0];
		var lastFocusableEl = focusableEls[focusableEls.length - 1];
		var KEYCODE_TAB = 9;

		searchPopup.addEventListener('keydown', function(e) {
			var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

			if (!isTabPressed) {
				return;
			}

			if ( e.shiftKey ) /* shift + tab */ {
				if (document.activeElement === firstFocusableEl) {
					lastFocusableEl.focus();
					e.preventDefault();
				}
			} else /* tab */ {
				if (document.activeElement === lastFocusableEl) {
					firstFocusableEl.focus();
					e.preventDefault();
				}
			}
		});
	}

	function toggleSubmenu() {
		const mobileNav = document.getElementById( 'mobile-navigation' );
		if ( ! mobileNav ) {
			return;
		}

		const buttons = [...mobileNav.querySelectorAll( '.sub-menu-toggle' )];

		buttons.forEach( button => {
			button.addEventListener( 'click', e => {
				e.preventDefault();
				const a = button.previousElementSibling, li = a.closest( 'li' );
				if ( li.classList.contains( 'is-open' ) ) {
					button.setAttribute( 'aria-expanded', 'false' );
					a.setAttribute( 'aria-expanded', 'false' );
				} else {
					button.setAttribute( 'aria-expanded', 'true' );
					a.setAttribute( 'aria-expanded', 'true' );
				}
				li.classList.toggle( 'is-open' );
			} );
		} );
	}

	function goToTop() {
		const button = document.getElementById( 'back-to-top' );

		if ( ! button ) {
			return;
		}

		window.addEventListener( 'scroll', () => {
			if ( window.scrollY > 480 ) {
				button.classList.add( 'is-visible' );
			} else {
				button.classList.remove( 'is-visible' );
			}
		} );

		button.addEventListener( 'click', e => {
			e.preventDefault();
			window.scrollTo( { top: 0, left: 0, behavior: 'smooth' } );
		} );
	}

	function openSearch() {
		const siteHeader = document.getElementById( 'masthead' );
		const openButtons = siteHeader.querySelectorAll( '.site-header .search-open' );

		if ( ! openButtons ) {
			return;
		}

		const searchItems = siteHeader.querySelectorAll( '.search-popup' ),
			inputFields = siteHeader.querySelectorAll( '.search-field' );

		openButtons.forEach( openButton => {
			openButton.addEventListener( 'click', e => {
				e.preventDefault();
				openButton.setAttribute( 'aria-expanded', 'true' );
				searchItems.forEach( function( searchItem ) {
					searchItem.classList.add( 'active' );
				} );
				inputFields.forEach( function( inputField ) {
					inputField.focus();
				} );
			} );
		} );
	}

	function closeSearch() {
		const siteHeader = document.getElementById( 'masthead' );
		const closeButtons = siteHeader.querySelectorAll( '.site-header .search-close' );

		if ( ! closeButtons ) {
			return;
		}

		const searchItems = siteHeader.querySelectorAll( '.search-popup' ),
			openButtons = siteHeader.querySelectorAll( '.site-header .search-open' );

		closeButtons.forEach( closeButton => {
			closeButton.addEventListener( 'click', e => {
				e.preventDefault();
				searchItems.forEach( function( searchItem ) {
					searchItem.classList.remove( 'active' );
				} );
				openButtons.forEach( function( openButton ) {
					openButton.focus();
					openButton.setAttribute( 'aria-expanded', 'false' );
				} );
			} );
		} );
	}

	function getAdminBarHeight() {
		const adminBar = document.getElementById( 'wpadminbar' );

		if ( ! adminBar ) {
			return;
		}

		adminBarHeight = adminBar.getBoundingClientRect().height;
		return Number( adminBarHeight );
	}

	function stickyHeader() {
		const header  = document.getElementById( 'masthead' );
		const headerSticky = header.querySelector( '.is-fixed' );

		if ( ! headerSticky ) {
			return;
		}

		var paddingTop = 60;
		var headerHeight = Number( headerSticky.getBoundingClientRect().height );
		const sidePanel = document.getElementById( 'side-panel' );
		let isMobile = window.matchMedia("only screen and (max-width: 600px)").matches;

		if ( getAdminBarHeight() && ! isMobile ) {
			paddingTop = getAdminBarHeight() + 60;
			headerSticky.style.setProperty( 'top', getAdminBarHeight() + 'px' );
		}

		window.addEventListener( 'scroll', event => {
			const { scrollTop } = event.target.scrollingElement;
			headerSticky.classList.toggle( 'sticky-header', scrollTop >= headerHeight );
			if (  scrollTop >= headerHeight ) {
				document.body.style.setProperty( 'padding-top', paddingTop + 'px' );
				if ( getAdminBarHeight() && isMobile ) {
					sidePanel.style.setProperty( 'top', 0 );
				}
			} else {
				document.body.style.removeProperty( 'padding-top' );
				if ( getAdminBarHeight() && isMobile ) {
					sidePanel.style.removeProperty( 'top' );
				}
			}
		} );
	}

	/**
	 * Enables TAB key navigation support for dropdown menus.
	 */
	function tabKeyNavigation() {
		const siteNavigation = document.getElementById( 'site-navigation' );

		// Return early if the navigation don't exist.
		if ( ! siteNavigation ) {
			return;
		}

		const menu = siteNavigation.querySelector( '.main-menu' );

		// Get all the link elements within the menu.
		const links = menu.getElementsByTagName( 'a' );

		// Get all the link elements with children within the menu.
		const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		// Toggle focus each time a menu link is focused or blurred.
		for ( const link of links ) {
			link.addEventListener( 'focus', toggleFocus, true );
			link.addEventListener( 'blur', toggleFocus, true );
		}

		// Toggle focus each time a menu link with children receive a touch event.
		for ( const link of linksWithChildren ) {
			link.addEventListener( 'touchstart', toggleFocus, false );
		}
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		if ( event.type === 'focus' || event.type === 'blur' ) {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while ( ! self.classList.contains( 'main-menu' ) ) {
				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					self.classList.toggle( 'focus' );
				}
				self = self.parentNode;
			}
		}

		if ( event.type === 'touchstart' ) {
			const menuItem = this.parentNode;
			event.preventDefault();
			for ( const link of menuItem.parentNode.children ) {
				if ( menuItem !== link ) {
					link.classList.remove( 'focus' );
				}
			}
			menuItem.classList.toggle( 'focus' );
		}
	}

	toggleMenu();
	trapFocusModal();
	trapFocusSearchPopup();
	toggleSubmenu();
	goToTop();
	openSearch();
	closeSearch();
	stickyHeader();
	tabKeyNavigation();

}() );
