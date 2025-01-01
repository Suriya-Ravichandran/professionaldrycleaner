
    document.addEventListener("DOMContentLoaded", function () {
        const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

        navLinks.forEach((link) => {
            link.addEventListener("click", function () {
                // Remove active class from all links
                navLinks.forEach((item) => item.parentElement.classList.remove("active"));

                // Add active class to the clicked link's parent
                this.parentElement.classList.add("active");
            });
        });

        // Optionally, add smooth scrolling functionality
        document.querySelectorAll('[data-role="smoothscroll"]').forEach((anchor) => {
            anchor.addEventListener("click", function (event) {
                event.preventDefault();
                const targetId = this.getAttribute("href");
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: "smooth",
                        block: "start",
                    });
                }
            });
        });
    });