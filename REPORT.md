# PlasticPollutions Web Application — Reflective Report

## Introduction

The PlasticPollutions web application was developed as a comprehensive platform for an environmental action group at Pentecost University dedicated to reducing plastic waste and protecting the environment. This report reflects on the development process, challenges encountered, solutions implemented, and recommendations for future improvements.

## What I Learned

This project provided invaluable experience in full-stack web development using PHP, MySQL, and JavaScript. I gained a deeper understanding of the Model-View-Controller (MVC) architecture principles, even within a procedural PHP context, by separating configuration, database logic, utility functions, and presentation layers into distinct files.

Working with PDO (PHP Data Objects) instead of the older MySQLi extension reinforced the importance of using prepared statements for security. I learned how to implement password hashing using PHP's `password_hash()` with the BCRYPT algorithm, which is significantly more secure than simple MD5 or SHA-1 hashes. The login lockout mechanism, which tracks failed attempts and enforces a three-minute cooldown after three failures, taught me practical account security beyond basic authentication.

On the frontend, I deepened my understanding of responsive design, CSS Grid and Flexbox layouts, and progressive enhancement through JavaScript. Building the animated counters, image slider, and interactive pledge system from scratch without external libraries improved my understanding of DOM manipulation, the Intersection Observer API, and asynchronous programming with the Fetch API.

The visitor registration ID generator (PU followed by six digits) was an interesting challenge in combining regular expressions for validation with database uniqueness checks, ensuring no duplicate IDs are ever assigned.

## Challenges Encountered

Several challenges arose during development. First, implementing the login lockout mechanism required careful handling of timestamps and timezone differences. Initially, the lockout comparison was inconsistent because the PHP server timezone differed from the MySQL server timezone. This was resolved by explicitly setting the timezone in the configuration file and using PHP's `date()` function consistently for all time comparisons.

Second, ensuring AJAX form submissions provided meaningful feedback while maintaining server-side validation was complex. The signup modal, donation form, and petition signing all required coordinated client-side validation (for immediate user feedback) and server-side validation (for security). I addressed this by implementing a dual-validation approach: JavaScript validates format and completeness before submission, while PHP validates data integrity and business rules on the server.

Third, creating a truly responsive design that works across mobile and desktop devices required significant iteration. The navigation menu, dashboard sidebar, and data tables all needed different layouts at different breakpoints. I solved this with CSS media queries and a mobile-first approach, using a hamburger menu for navigation and collapsible sidebar for the dashboard.

Fourth, preventing SQL injection and cross-site scripting (XSS) attacks required careful sanitization of all user inputs. Every input passes through the `sanitize()` function using `htmlspecialchars()` with `ENT_QUOTES`, and all database queries use parameterized prepared statements.

## Recommendations for Improvement

**Accessibility:** While the application includes ARIA labels, keyboard navigation, skip links, and screen reader-friendly markup, future improvements could include a high-contrast mode toggle, adjustable font sizes, and full WCAG 2.1 AA compliance testing with assistive technologies. Audio and video content should include proper captions and transcripts.

**Performance:** Implementing server-side caching (Redis or Memcached) for frequently accessed data like donation statistics and visitor counts would reduce database load. Image optimization through lazy loading, WebP format conversion, and a CDN would improve page load times. Minifying CSS and JavaScript files would reduce payload sizes.

**Scalability:** The current architecture could be improved by adopting a proper MVC framework such as Laravel, which would provide better routing, middleware support, ORM capabilities, and built-in security features. As the user base grows, database indexing strategies, connection pooling, and read replicas would become necessary. A RESTful API layer would enable future mobile application development and third-party integrations.

**Security Enhancements:** Implementing two-factor authentication (2FA), CSRF token validation on all forms, rate limiting for API endpoints, and Content Security Policy headers would strengthen the security posture. Regular security audits and automated vulnerability scanning should also be considered.

## Conclusion

This project demonstrated the power of combining web technologies to create a meaningful platform for environmental advocacy. The experience reinforced that building real-world applications requires balancing functionality, security, accessibility, and user experience — skills that are essential for any professional developer.

*Word Count: ~606 words*
