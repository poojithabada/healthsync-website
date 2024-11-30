var swiper = new Swiper(".mySwiperservices", {
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      700: {
        slidesPerView: 2,
        spaceBetween: 40,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 50,
      },
    },
  });
/--team--/
var swiper = new Swiper(".mySwiperteam", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      560: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      950: {
        slidesPerView: 3,
        spaceBetween: 40,
      },
      1250: {
        slidesPerView: 4,
        spaceBetween: 40,
      },
    },
  });
/--testimonials--/
  var swiper = new Swiper(".mySwipertesti", {
    pagination: {
      el: ".swiper-pagination",
    },
  });
document.addEventListener("DOMContentLoaded", function() {
    const subscribeButton = document.getElementById("subscribeButton");
    const emailInput = document.getElementById("emailInput");

    subscribeButton.addEventListener("click", function() {
        const email = emailInput.value.trim();

        if (validateEmail(email)) {
            if (isSubscribed(email)) {
                alert("You are already subscribed with this email: " + email);
            } else {
                addSubscription(email);
                alert("Thank you for subscribing with " + email + "!");
                emailInput.value = ""; 
            }
        } else {
            alert("Please enter a valid email address.");
        }
    });

    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    function isSubscribed(email) {
        const subscribedEmails = JSON.parse(localStorage.getItem("subscribedEmails")) || [];
        return subscribedEmails.includes(email);
    }

    function addSubscription(email) {
        const subscribedEmails = JSON.parse(localStorage.getItem("subscribedEmails")) || [];
        subscribedEmails.push(email);
        localStorage.setItem("subscribedEmails", JSON.stringify(subscribedEmails));
    }
});