document.addEventListener("DOMContentLoaded", function () {
  const counters = document.querySelectorAll(".text");
  const speed = 100; // Adjust speed for animation

  const animateCount = (counter) => {
      const target = +counter.getAttribute("data-count");
      const count = +counter.innerText;
      const increment = target / speed;

      if (count < target) {
          counter.innerText = Math.ceil(count + increment);
          setTimeout(() => animateCount(counter), 30);
      } else {
          counter.innerText = `${target}+`; // Add "+" sign when counting is complete
      }
  };

  const observeCounters = (entries, observer) => {
      entries.forEach((entry) => {
          if (entry.isIntersecting) {
              animateCount(entry.target);
              observer.unobserve(entry.target); // Stop observing once animation starts
          }
      });
  };

  const observer = new IntersectionObserver(observeCounters, { threshold: 0.5 });

  counters.forEach((counter) => {
      observer.observe(counter);
  });
});
