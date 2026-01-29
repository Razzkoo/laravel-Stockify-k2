document.addEventListener("DOMContentLoaded", () => {

    /* ===============================
       NAVBAR 
    =============================== */
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", () => {
        navbar.classList.toggle(
            "navbar-scrolled",
            window.scrollY > 30
        );
    });


    /* ===============================
       SCROLL 
    =============================== */
    const revealEls = document.querySelectorAll(".animate-on-scroll");

    const observer = new IntersectionObserver(
        entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                }
            });
        },
        { threshold: 0.2 }
    );

    revealEls.forEach(el => observer.observe(el));


    /* ===============================
       HERO
    =============================== */
    const hero = document.querySelector(".hero-bg");

    hero.addEventListener("mousemove", e => {
        const { left, top, width, height } = hero.getBoundingClientRect();
        const x = ((e.clientX - left) / width) * 100;
        const y = ((e.clientY - top) / height) * 100;

        hero.style.setProperty("--x", `${x}%`);
        hero.style.setProperty("--y", `${y}%`);
    });


    /* ===============================
       BUTTON
    =============================== */
    document.querySelectorAll(".btn-primary").forEach(btn => {
        btn.addEventListener("mousemove", e => {
            const rect = btn.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;

            btn.style.transform = `translate(${x * 0.15}px, ${y * 0.15}px)`;
        });

        btn.addEventListener("mouseleave", () => {
            btn.style.transform = "translate(0,0)";
        });
    });


    /* ===============================
       SMOOTH ANCHOR
    =============================== */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener("click", e => {
            e.preventDefault();
            document.querySelector(anchor.getAttribute("href"))
                ?.scrollIntoView({ behavior: "smooth" });
        });
    });

});
