window.onscroll = function () {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("progressBar").style.width = scrolled + "%";
  };
  const doctorList = [
    {
      name: "Dr. Emily Lawson",
      specialization: "Cardiology",
      experience: 12,
      fee: 300,
      image: "./images/doctor.png"
    },
    {
      name: "Dr. James Carter",
      specialization: "Gaynocologist",
      experience: 8,
      fee: 400,
      image: "./images/doctor.png"
    },
    {
      name: "Dr. Olivia Patel",
      specialization: "Dermatologist",
      experience: 10,
      fee: 500,
      image: "./images/doctor.png"
    },
    {
    name: "Dr. William Adams",
      specialization: "ENT",
      experience: 9,
      fee: 600,
      image: "./images/doctor.png"
    },
    {
    name: "Dr. Sophia Chen",
      specialization: "Pediatrics",
      experience: 8,
      fee: 700,
      image: "./images/doctor.png"
    },
    {
    name: "Dr. Liam Murphy",
      specialization: "Cardiology",
      experience: 5,
      fee: 800,
      image: "./images/doctor.png"
    },
    {
    name: "Dr. Michael Lee",
      specialization: "Dermatologist",
      experience: 13,
      fee: 900,
      image: "./images/doctor.png"
    },
    {
    name: "Dr. Emma Flores",
      specialization: "Gynacologist",
      experience: 14,
      fee: 1000,
      image: "./images/doctor.png"
    },
    {
    name: "Dr. Lucas Perez",
      specialization: "ENT",
      experience: 15,
      fee: 150,
      image: "./images/doctor.png"
    },{
        name: "Dr. Ravi Sharma",
        specialization: "Pediatrics",
        experience: 11,
        fee: 250,
        image: "./images/doctor.png"
      },
    {
        name: "Dr. Neha Kapoor",
        specialization: "Cardiology",
        experience: 5,
        fee: 100,
        image: "./images/doctor.png"
      },
    {
        name: "Dr. Anil Mehta",
        specialization: "Pediatrics",
        experience: 6,
        fee: 350,
        image: "./images/doctor.png"
      },
    {
        name: "Dr. Arpita Singh",
        specialization: "Dermatologist",
        experience: 7,
        fee: 450,
        image: "./images/doctor.png"
    },
    {
        name: "Dr. Sneha Tiwari",
        specialization: "Gynacologist",
        experience: 8,
        fee: 550,
        image: "./images/doctor.png"
      },
    {
        name: "Dr. Rahul Desai",
        specialization: "ENT",
        experience: 9,
        fee: 650,
        image: "./images/doctor.png"
      },
    {
        name: "Dr. Kiran Sinha",
        specialization: "Pediatrics",
        experience: 10,
        fee: 750,
        image: "./images/doctor.png"
      },
    {
        name: "Dr. Meera Patel",
        specialization: "Cardiology",
        experience: 11,
        fee: 850,
        image: "./images/doctor.png"
      },
    {
        name: "Dr. Akash Verma",
        specialization: "Gynacologist",
        experience: 12,
        fee: 950,
        image: "./images/doctor.png"
      },
    {
        name: "Dr. Nisha Saxena",
        specialization: "ENT",
        experience: 13,
        fee: 200,
        image: "./images/doctor.png"
      },
    {
        name: "Dr. Vikas Rao",
        specialization: "Dermatologist",
        experience: 14,
        fee: 300,
        image: "./images/doctor.png"
      },
    {
        name: "Dr. Preeti Joshi",
        specialization: "Pediatrics",
        experience: 16,
        fee: 400,
        image: "./images/doctor.png"
    },
    {
        name: "Dr. Arjun Singh",
        specialization: "Cardiologist",
        experience: 10,
        fee: 200,
        image: "./images/doctor.png"
      },
    {
        name: "Dr. Manju Reddy",
        specialization: "Pediatrics",
        experience: 9,
        fee: 500,
        image: "./images/doctor.png"
      },
    {
        name: "Dr. Kamini Bhatt",
        specialization: "Dermatologist",
        experience: 8,
        fee: 600,
        image: "./images/doctor.png"
      },
    {
        name: "Dr. Sanjay Kulkarni",
        specialization: "Pediatrics",
        experience: 7,
        fee: 700,
        image: "./images/doctor.png"
      },
    {
        name: "Dr. Rekha Jain",
        specialization: "ENT",
        experience: 6,
        fee: 800,
        image: "./images/doctor.png"
    },
    {
        name: "Dr. Sonali Gupta",
        specialization: "Dermatologist",
        experience: 5,
        fee: 900,
        image: "./images/doctor.png"
      },
    {
        name: "Dr. Mukesh Bhardwaj",
        specialization: "Cardiologist",
        experience: 5,
        fee: 1000,
        image: "./images/doctor.png"
      },
    {
        name: "Dr. Kavita Rao",
        specialization: "ENT",
        experience: 10,
        fee: 100,
        image: "./images/doctor.png"
      },
    {
        name: "Dr. Rajiv Chawla",
        specialization: "Gynacologist",
        experience: 11,
        fee: 300,
        image: "./images/doctor.png"
      },
    
    
  ];

  function renderDoctorList(doctors) {
    const doctorListElement = document.getElementById("doctor-list");
    doctorListElement.innerHTML = "";


doctors.forEach(doctor => {
const doctorItem = document.createElement("li");
doctorItem.innerHTML = `
  <div class="content">
    <h4>${doctor.name}</h4>
    <p>Specialization: ${doctor.specialization}</p>
    <p>Experience: ${doctor.experience} years</p>
    <p>Fee: Rs${doctor.fee}</p>
  </div>
  ${doctor.image ? `<img src="${doctor.image}" alt="${doctor.name}" style="width: 80px; height: auto; border-radius: 50%;">` : ""}
`;


doctorItem.addEventListener('click', () => {
  window.location.href = 'appointment.html';
});

doctorListElement.appendChild(doctorItem);
});

  }

  function filterDoctors() {
    const experienceFilter = document.getElementById("experience-filter").value;
    const feeFilter = document.getElementById("fee-filter").value;

    let filteredDoctors = doctorList.filter(doctor => {
      return (
        (experienceFilter === "" || doctor.experience >= experienceFilter) &&
        doctor.fee >= feeFilter
      );
    });

    renderDoctorList(filteredDoctors);
  }

  function sortDoctorsByFee() {
    doctorList.sort((a, b) => a.fee - b.fee);
    renderDoctorList(doctorList);
  }

  document.getElementById("experience-filter").addEventListener("change", filterDoctors);
  document.getElementById("fee-filter").addEventListener("input", () => {
    document.getElementById("fee-value").textContent = document.getElementById("fee-filter").value;
    filterDoctors();
  });

  document.getElementById("sort-btn").addEventListener("click", sortDoctorsByFee);

  renderDoctorList(doctorList);

  window.addEventListener("load", () => {
    const loader = document.querySelector(".pre");
    loader.classList.add("pre--hidden");
    loader.addEventListener("transitionend", () => {
      document.body.removeChild(loader);
    });
  });

  window.addEventListener("load", () => {
    const loader = document.querySelector(".loader");
    loader.classList.add("loader--hidden");
    loader.addEventListener("transitionend", () => {
      document.body.removeChild(loader);
    });
  });
  var currentYear = new Date().getFullYear();
  document.getElementById('year').textContent = currentYear;
    document.addEventListener("DOMContentLoaded", function () {
      const backToTopButton = document.getElementById('back-to-top-container');

      function checkButtonVisibility() {
        if (window.innerWidth > 100 && window.scrollY > 100) {
          backToTopButton.style.display = 'block';
        } else {
          backToTopButton.style.display = 'none';
        }
      }

      window.addEventListener('scroll', checkButtonVisibility);
      window.addEventListener('resize', checkButtonVisibility);

      backToTopButton.addEventListener('click', function () {
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      });
      checkButtonVisibility();
    });
    const hamburger = document.querySelector('.hamburger');
    const navbar = document.querySelector('.header_container');
    const nav = document.querySelector('.nav_link');
    hamburger.addEventListener('click', () => {
      navbar.classList.toggle('nav-h');
      nav.classList.toggle('vis-h');
    })
    document.getElementById('subscribeForm').addEventListener('submit', function(event) {
        event.preventDefault(); 
        var email = document.getElementById('emailInput').value;
        document.getElementById('subscribeBanner').style.display = 'block';
        document.getElementById('subscribeForm').reset();
        setTimeout(function() {
          document.getElementById('subscribeBanner').style.display = 'none';
        }, 5000);
      });