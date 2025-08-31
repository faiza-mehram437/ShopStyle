document.addEventListener("DOMContentLoaded", () => {
  const checkoutBtn = document.getElementById("checkoutBtn");
  const newsletterForm = document.getElementById("newsletterForm");
  const newsletterMessage = document.getElementById("newsletterMessage");

  // Checkout button
  if (checkoutBtn) {
    checkoutBtn.addEventListener("click", () => {
      alert("Checkout process not implemented yet. Redirect to payment gateway here.");
    });
  }

  // Newsletter subscription
  if (newsletterForm) {
    newsletterForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const email = document.getElementById("newsletterEmail").value;

      // Simulate success message
      newsletterMessage.textContent = `Thanks for subscribing, ${email}!`;
      newsletterMessage.style.color = "green";
      newsletterForm.reset();

      // OPTIONAL: send email to backend via AJAX/fetch
      /*
      fetch("newsletter.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "email=" + encodeURIComponent(email)
      })
      .then(res => res.text())
      .then(data => newsletterMessage.textContent = data);
      */
    });
  }
});
