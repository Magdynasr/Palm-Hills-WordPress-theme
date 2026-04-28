</main><!-- #main-content -->

<!-- =============================================
     FOOTER
     ============================================= -->
<footer class="footer">

    <!-- Newsletter Banner -->
    <div class="footer-newsletter">
        <div class="container">
            <div class="footer-newsletter__inner fade-up">
                <div class="footer-newsletter__text">
                    <h3><?php esc_html_e( 'Stay Connected with Palm Hills', 'palm-hills-school' ); ?></h3>
                    <p><?php esc_html_e( 'Subscribe for school updates, events, and important announcements.', 'palm-hills-school' ); ?></p>
                </div>
                <form class="footer-newsletter__form" action="#" method="post">
                    <?php wp_nonce_field( 'palm_newsletter', 'palm_newsletter_nonce' ); ?>
                    <input type="email" name="newsletter_email" placeholder="<?php esc_attr_e( 'Enter your email address', 'palm-hills-school' ); ?>" required aria-label="<?php esc_attr_e( 'Email address', 'palm-hills-school' ); ?>">
                    <button type="submit" class="btn btn--primary">
                        <?php esc_html_e( 'Subscribe', 'palm-hills-school' ); ?>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Footer -->
    <div class="footer__main">
        <div class="container">
            <div class="footer__grid">

                <!-- Brand Column -->
                <div class="footer__brand fade-up">
                    <?php if ( has_custom_logo() ) :
                        the_custom_logo();
                    else : ?>
                        <div class="nav__logo-text footer__logo-text">
                            <span class="nav__logo-main">Palm Hills</span>
                            <span class="nav__logo-sub">Online School</span>
                        </div>
                    <?php endif; ?>
                    <p class="footer__tagline">
                        <?php esc_html_e( 'Empowering the next generation of Egyptian leaders through excellence in online education.', 'palm-hills-school' ); ?>
                    </p>
                    <?php echo palm_social_links(); ?>
                    <div class="footer__accreditation">
                        <span><?php esc_html_e( 'Accredited by', 'palm-hills-school' ); ?></span>
                        <strong><?php esc_html_e( 'Ministry of Education — Egypt', 'palm-hills-school' ); ?></strong>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="footer__col fade-up delay-1">
                    <h4 class="footer__heading"><?php esc_html_e( 'Quick Links', 'palm-hills-school' ); ?></h4>
                    <ul class="footer__links">
                        <li><a href="/about"><?php esc_html_e( 'About Us', 'palm-hills-school' ); ?></a></li>
                        <li><a href="/programs"><?php esc_html_e( 'Our Programs', 'palm-hills-school' ); ?></a></li>
                        <li><a href="/admissions"><?php esc_html_e( 'Admissions', 'palm-hills-school' ); ?></a></li>
                        <li><a href="/news"><?php esc_html_e( 'News &amp; Events', 'palm-hills-school' ); ?></a></li>
                        <li><a href="/faculty"><?php esc_html_e( 'Our Faculty', 'palm-hills-school' ); ?></a></li>
                        <li><a href="/contact"><?php esc_html_e( 'Contact Us', 'palm-hills-school' ); ?></a></li>
                    </ul>
                </div>

                <!-- Programs -->
                <div class="footer__col fade-up delay-2">
                    <h4 class="footer__heading"><?php esc_html_e( 'Programs', 'palm-hills-school' ); ?></h4>
                    <ul class="footer__links">
                        <li><a href="/programs/primary"><?php esc_html_e( 'Primary School (Gr. 1–5)', 'palm-hills-school' ); ?></a></li>
                        <li><a href="/programs/middle"><?php esc_html_e( 'Middle School (Gr. 6–8)', 'palm-hills-school' ); ?></a></li>
                        <li><a href="/programs/high"><?php esc_html_e( 'High School (Gr. 9–12)', 'palm-hills-school' ); ?></a></li>
                        <li><a href="/programs/igcse"><?php esc_html_e( 'IGCSE Track', 'palm-hills-school' ); ?></a></li>
                        <li><a href="/programs/stem"><?php esc_html_e( 'STEM Enrichment', 'palm-hills-school' ); ?></a></li>
                        <li><a href="/programs/arabic"><?php esc_html_e( 'Arabic &amp; Islamic Studies', 'palm-hills-school' ); ?></a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="footer__col fade-up delay-3">
                    <h4 class="footer__heading"><?php esc_html_e( 'Contact Us', 'palm-hills-school' ); ?></h4>
                    <ul class="footer__contact">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            <span><?php echo esc_html( palm_get_option( 'palm_address', 'Palm Hills, 6th of October City, Giza, Egypt' ) ); ?></span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.6a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 3h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 10.6a16 16 0 0 0 6 6l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', palm_get_option( 'palm_phone', '+20101234567' ) ) ); ?>">
                                <?php echo esc_html( palm_get_option( 'palm_phone', '+20 10 1234 5678' ) ); ?>
                            </a>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            <a href="mailto:<?php echo esc_attr( palm_get_option( 'palm_email', 'info@palmhillsschool.edu.eg' ) ); ?>">
                                <?php echo esc_html( palm_get_option( 'palm_email', 'info@palmhillsschool.edu.eg' ) ); ?>
                            </a>
                        </li>
                    </ul>
                    <div class="footer__hours">
                        <strong><?php esc_html_e( 'Support Hours', 'palm-hills-school' ); ?></strong>
                        <p><?php esc_html_e( 'Sunday – Thursday: 8:00 AM – 4:00 PM', 'palm-hills-school' ); ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer__bottom">
        <div class="container">
            <div class="footer__bottom-inner">
                <p class="footer__copyright">
                    &copy; <?php echo date( 'Y' ); ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>.
                    <?php esc_html_e( 'All rights reserved.', 'palm-hills-school' ); ?>
                </p>
                <nav class="footer__legal" aria-label="<?php esc_attr_e( 'Legal', 'palm-hills-school' ); ?>">
                    <a href="/privacy-policy"><?php esc_html_e( 'Privacy Policy', 'palm-hills-school' ); ?></a>
                    <a href="/terms"><?php esc_html_e( 'Terms of Use', 'palm-hills-school' ); ?></a>
                    <a href="/accessibility"><?php esc_html_e( 'Accessibility', 'palm-hills-school' ); ?></a>
                </nav>
            </div>
        </div>
    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
