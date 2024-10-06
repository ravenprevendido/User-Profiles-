<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "user_profiles";

// Create connection
$conn = @new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Sample Slider</title>
  <!-- CSS Link -->
   <link rel="stylesheet" href="style.css">
   
   <!-- Icon Link -->
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <!-- Swiperjs CSS Link -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
   <style>
    
     /* Modal styling */
     .modal {
       display: none; /* Hidden by default */
       position: fixed;
       z-index: 1;
       left: 0;
       top: 0;
       width: 100%;
       height: 100%;
       overflow: auto;
       background-color: #b3ebf2;
       perspective: 1500px; /* Perspective for 3D effect */
       transition: opacity 0.3s ease;
     }


     .modal-content {
      display: flex;
      flex-direction: column;
      background-color: #fefefe;
      margin: 5% auto;
      width: 80%;
      max-width: 50%;
      height: 80vh; /* Adjust height to fit within the viewport */
      border-radius: 25px;
      position: relative;
      overflow: hidden; 

     }

     .modal-header {
      position: sticky; /* Keep header sticky at the top */
      top: 0;
      width: 100%;
      background-color: #00039d;
      color: #fff;
      padding: 15px;
      border-radius: 25px 25px 0 0;
      z-index: 10; /* Ensure header stays on top */
    }


     
     .close {
       color: #aaa;
       float: right;
       font-size: 28px;
       font-weight: bold;
       padding: 7px;
       width: fit-content;
       margin:0 auto;
       cursor: pointer;
      text-align: center;
       border: 1px solid #00039d;
       color: #00039d;
       display: block;
     }
     
    

     .close:hover,
     .close:focus {
       color: white;
       text-decoration: none;
       cursor: pointer;
       background: #00039d;
       border-radius: 10px;
       transition: .2s ease-in-out;
     }

    
     
     
   </style>
</head>
<body>

  <div class="container-slide swiper">
    <div class="slider-wrapper">
      <div class="card-box swiper-wrapper">
        <?php if ($result->num_rows > 0): ?>
          <?php while($user = $result->fetch_assoc()): ?>
          <!-- Dynamically generated card for each user -->
          <div class="card swiper-slide">
            <div class="content-img">
              <span class="overlay"></span>
              <div class="card-img">
              <?php
              
                $imagePath = "img" . $user['id'] . ".png";
                if (file_exists($imagePath)) {
                  echo "<img decoding='async' src='$imagePath' alt='User Image' class='card-image' data-id='{$user['id']}'>";
                } else {
                  echo "<img decoding='async' src='default.png' alt='Default Image' class='card-image' data-id='{$user['id']}'>"; // Default image if the file is missing
                }
                ?>
              </div>
            </div>
            <div class="content-box">
              <h2 class="username"><?php echo $user['name']; ?></h2>
              <!-- <ul class="social-icon">
                <li><a href="#"><i class='bx bxl-facebook'></i></a></li>
                <li><a href="#"><i class='bx bxl-linkedin'></i></a></li>
                <li><a href="#"><i class='bx bxl-instagram'></i></a></li>
                <li><a href="#"><i class='bx bxl-twitter'></i></a></li>
              </ul> -->
              <!-- Button with data-id for AJAX -->
              <button class="btn view-profile-btn" data-id="<?php echo $user['id']; ?>">View Profile</button>
            </div>
          </div>
          
          <?php endwhile; ?>
        <?php else: ?>
          <p>No users found.</p>
        <?php endif; ?>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-slide-button swiper-button-prev"></div>
      <div class="swiper-slide-button swiper-button-next"></div>
    </div>
  </div>

  <!-- Modal Structure -->
  <div id="myModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
      <div class="content-one">
        <span class="overtent"></span>
        </div>
      </div>
      
      <div id="modal-body">

        <!-- User details will be displayed here -->
      </div>
      <span class="close">
        <i class="fas fa-arrow-left"></i> 
      </span>
    </div>
  </div>

  <!-- Swiper JS Script -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
  <!-- scroll trigger for animation -->
   <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>

  <!-- Custom JS Script -->
   <script src="script..js"></script>
  <script>
   
   document.addEventListener('DOMContentLoaded', function() {
  // Modal elements
  var modal = document.getElementById("myModal");
  var modalContent = document.querySelector(".modal-content");
  var closeBtn = document.getElementsByClassName("close")[0];

  // Function to open modal
  function openModal(userId) {
    fetchUserData(userId); // Fetch user data and update modal content
    modal.style.display = "block";
    setTimeout(function() {
      modalContent.classList.add("show"); // Add class for animation
    }, 10); // Slight delay to ensure styles are applied
  }

  // Function to close modal
  function closeModal() {
    modalContent.classList.remove("show"); // Remove class for animation
    setTimeout(function() {
      modal.style.display = "none";
    }, 500); // Match the timeout with the CSS transition duration
  }

  // Close the modal when the close button is clicked
  closeBtn.onclick = function() {
    closeModal();
  }

  // Close the modal if clicked outside of the modal-content
  window.onclick = function(event) {
    if (event.target == modal) {
      closeModal();
    }
  }

  // Fetch user data and update the modal content
  function fetchUserData(userId) {
    fetch('fetch_user.php?id=' + userId)
      .then(response => response.json())
      .then(data => {
        if (data.error) {
          document.getElementById('modal-body').innerHTML = `<p>${data.error}</p>`;
        } else {
          var imageUrl = data.image ? data.image : `img${data.id}.png`;

          document.getElementById('modal-body').innerHTML = `
            <img src="${imageUrl}" alt="User Image" class="modal-image">
            <p><strong>Name:</strong> ${data.name}</p>
            <p><strong>Age:</strong> ${data.age}</p>
            <p><strong>Birthday:</strong> ${data.birthday}</p>
            <p><strong>Address:</strong> ${data.address}</p>
            <p><strong>City:</strong> ${data.city}</p>
            <p><strong>Favorite Color:</strong> ${data.favorite_color}</p>
            <p><strong>Bio:</strong> ${data.bio}</p>
          `;
        }
      })
      .catch(error => console.error('Error fetching user data:', error));
  }

  // Add event listeners to the profile buttons and images
  document.querySelectorAll('.view-profile-btn, .card-image').forEach(element => {
    element.addEventListener('click', function() {
      var userId = this.getAttribute('data-id');
      openModal(userId);
    });
  });


  
  // Optional: Handle keyboard navigation
  document.addEventListener('keydown', function(event) {
    if (event.keyCode === 39) { // Right arrow key
      swiper.slideNext();
    } else if (event.keyCode === 37) { // Left arrow key
      swiper.slidePrev();
    }
  });
});

window.onload = function() {
    gsap.from(".card", { duration: 1, y: 30, opacity: 0, stagger: 0.2, ease: "power3.out" });
  };
  </script>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>

