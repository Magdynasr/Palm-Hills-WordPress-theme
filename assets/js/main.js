/**
 * Palm Hills Online School — Main JavaScript
 */
( function() {
    'use strict';

    /* =============================================
       MOBILE MENU
       ============================================= */
    const hamburger  = document.querySelector( '.nav__hamburger' );
    const navOverlay = document.getElementById( 'nav-mobile' );
    const closeBtn   = document.querySelector( '.nav-overlay__close' );
    const body       = document.body;

    function openMenu() {
        hamburger && hamburger.classList.add( 'is-open' );
        hamburger && hamburger.setAttribute( 'aria-expanded', 'true' );
        navOverlay && navOverlay.classList.add( 'is-open' );
        navOverlay && navOverlay.setAttribute( 'aria-hidden', 'false' );
        body.style.overflow = 'hidden';
    }

    function closeMenu() {
        hamburger && hamburger.classList.remove( 'is-open' );
        hamburger && hamburger.setAttribute( 'aria-expanded', 'false' );
        navOverlay && navOverlay.classList.remove( 'is-open' );
        navOverlay && navOverlay.setAttribute( 'aria-hidden', 'true' );
        body.style.overflow = '';
    }

    hamburger && hamburger.addEventListener( 'click', openMenu );
    closeBtn  && closeBtn.addEventListener( 'click', closeMenu );

    navOverlay && navOverlay.addEventListener( 'click', function( e ) {
        if ( e.target === navOverlay ) closeMenu();
    } );

    document.addEventListener( 'keydown', function( e ) {
        if ( e.key === 'Escape' ) closeMenu();
    } );

    /* =============================================
       STICKY HEADER
       ============================================= */
    const header = document.getElementById( 'site-header' );

    if ( header ) {
        const onScroll = () => {
            header.classList.toggle( 'is-scrolled', window.scrollY > 60 );
        };
        window.addEventListener( 'scroll', onScroll, { passive: true } );
        onScroll();
    }

    /* =============================================
       SCROLL ANIMATIONS (Intersection Observer)
       ============================================= */
    const animElements = document.querySelectorAll( '.fade-up, .fade-in' );

    if ( animElements.length && 'IntersectionObserver' in window ) {
        const observer = new IntersectionObserver(
            ( entries ) => {
                entries.forEach( entry => {
                    if ( entry.isIntersecting ) {
                        entry.target.classList.add( 'is-visible' );
                        observer.unobserve( entry.target );
                    }
                } );
            },
            { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
        );

        animElements.forEach( el => observer.observe( el ) );
    } else {
        // Fallback: show everything
        animElements.forEach( el => el.classList.add( 'is-visible' ) );
    }

    /* =============================================
       SMOOTH SCROLL FOR ANCHOR LINKS
       ============================================= */
    document.querySelectorAll( 'a[href^="#"]' ).forEach( anchor => {
        anchor.addEventListener( 'click', function( e ) {
            const targetId = this.getAttribute( 'href' );
            if ( targetId === '#' ) return;
            const target = document.querySelector( targetId );
            if ( target ) {
                e.preventDefault();
                const offset = ( header ? header.offsetHeight : 80 ) + 20;
                const top = target.getBoundingClientRect().top + window.pageYOffset - offset;
                window.scrollTo( { top, behavior: 'smooth' } );
                closeMenu();
            }
        } );
    } );

    /* =============================================
       TESTIMONIALS SLIDER
       ============================================= */
    const track    = document.getElementById( 'testimonials-track' );
    const prevBtn  = document.getElementById( 'testimonials-prev' );
    const nextBtn  = document.getElementById( 'testimonials-next' );

    if ( track && prevBtn && nextBtn ) {
        const cards    = track.querySelectorAll( '.testimonial-card' );
        let current    = 0;
        let perPage    = getPerPage();

        function getPerPage() {
            if ( window.innerWidth <= 640 )  return 1;
            if ( window.innerWidth <= 1024 ) return 2;
            return 3;
        }

        function totalPages() {
            return Math.ceil( cards.length / perPage ) - 1;
        }

        function showPage( page ) {
            const offset = page * perPage;
            cards.forEach( ( card, i ) => {
                card.style.display = ( i >= offset && i < offset + perPage ) ? '' : 'none';
            } );
            prevBtn.disabled = page <= 0;
            nextBtn.disabled = page >= totalPages();
        }

        function updateLayout() {
            perPage  = getPerPage();
            current  = 0;
            showPage( current );
        }

        if ( window.innerWidth <= 1024 ) {
            showPage( current );
        }

        prevBtn.addEventListener( 'click', () => {
            if ( current > 0 ) { current--; showPage( current ); }
        } );

        nextBtn.addEventListener( 'click', () => {
            if ( current < totalPages() ) { current++; showPage( current ); }
        } );

        window.addEventListener( 'resize', updateLayout, { passive: true } );

        // Auto-play on mobile
        let autoPlay = null;
        function startAutoPlay() {
            if ( window.innerWidth <= 1024 ) {
                autoPlay = setInterval( () => {
                    if ( current < totalPages() ) { current++; }
                    else { current = 0; }
                    showPage( current );
                }, 5000 );
            }
        }

        function stopAutoPlay() { clearInterval( autoPlay ); }

        startAutoPlay();
        track.addEventListener( 'mouseenter', stopAutoPlay );
        track.addEventListener( 'mouseleave', startAutoPlay );
    }

    /* =============================================
       STAT COUNTER ANIMATION
       ============================================= */
    const statNumbers = document.querySelectorAll( '.stats__number' );

    if ( statNumbers.length && 'IntersectionObserver' in window ) {
        const counterObserver = new IntersectionObserver(
            ( entries ) => {
                entries.forEach( entry => {
                    if ( entry.isIntersecting ) {
                        animateCounter( entry.target );
                        counterObserver.unobserve( entry.target );
                    }
                } );
            },
            { threshold: 0.5 }
        );

        statNumbers.forEach( el => counterObserver.observe( el ) );
    }

    function animateCounter( el ) {
        const raw    = el.getAttribute( 'data-target' ) || el.textContent;
        const suffix = raw.replace( /[\d.]/g, '' );
        const target = parseFloat( raw.replace( /[^\d.]/g, '' ) );

        if ( isNaN( target ) ) return;

        const duration = 2000;
        const start    = performance.now();

        function update( now ) {
            const elapsed  = now - start;
            const progress = Math.min( elapsed / duration, 1 );
            const eased    = 1 - Math.pow( 1 - progress, 3 );
            const value    = Math.round( eased * target );

            el.textContent = value.toLocaleString() + suffix;

            if ( progress < 1 ) requestAnimationFrame( update );
        }

        requestAnimationFrame( update );
    }

    /* =============================================
       HERO PROGRESS BAR ANIMATION
       ============================================= */
    const heroBars = document.querySelectorAll( '.hero-card__bar div' );

    heroBars.forEach( bar => {
        const width = bar.style.width;
        bar.style.width = '0';
        setTimeout( () => { bar.style.width = width; }, 800 );
    } );

    /* =============================================
       DROPDOWN KEYBOARD NAVIGATION
       ============================================= */
    document.querySelectorAll( '.nav__item' ).forEach( item => {
        const link     = item.querySelector( '.nav__link' );
        const dropdown = item.querySelector( '.nav__dropdown' );

        if ( ! dropdown ) return;

        link && link.addEventListener( 'keydown', function( e ) {
            if ( e.key === 'Enter' || e.key === ' ' ) {
                e.preventDefault();
                const isOpen = dropdown.style.visibility === 'visible';
                dropdown.style.opacity    = isOpen ? '' : '1';
                dropdown.style.visibility = isOpen ? '' : 'visible';
                dropdown.style.transform  = isOpen ? '' : 'translateX(-50%) translateY(0)';
            }
        } );
    } );

    /* =============================================
       NEWSLETTER FORM
       ============================================= */
    const newsletterForm = document.querySelector( '.footer-newsletter__form' );

    if ( newsletterForm ) {
        newsletterForm.addEventListener( 'submit', function( e ) {
            e.preventDefault();
            const input  = this.querySelector( 'input[type="email"]' );
            const btn    = this.querySelector( 'button[type="submit"]' );
            const email  = input ? input.value.trim() : '';

            if ( ! email ) return;

            const origText   = btn.textContent;
            btn.textContent  = 'Subscribing…';
            btn.disabled     = true;

            // Simulate API call — replace with real WP AJAX
            setTimeout( () => {
                btn.textContent = '✓ Subscribed!';
                input.value     = '';
                setTimeout( () => {
                    btn.textContent = origText;
                    btn.disabled    = false;
                }, 3000 );
            }, 1200 );
        } );
    }

    /* =============================================
       LAZY LOAD IMAGES (fallback for older browsers)
       ============================================= */
    if ( 'loading' in HTMLImageElement.prototype ) {
        // Native lazy loading supported — nothing needed
    } else if ( 'IntersectionObserver' in window ) {
        const lazyImages = document.querySelectorAll( 'img[loading="lazy"]' );
        const imgObserver = new IntersectionObserver( entries => {
            entries.forEach( entry => {
                if ( entry.isIntersecting ) {
                    const img = entry.target;
                    if ( img.dataset.src ) { img.src = img.dataset.src; }
                    imgObserver.unobserve( img );
                }
            } );
        } );
        lazyImages.forEach( img => imgObserver.observe( img ) );
    }

} )();
