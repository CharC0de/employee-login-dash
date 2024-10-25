<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="icon" type="image/png" sizes="96x96" href="images/icon.png">
	<link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/profile.css">

	<title>Ucheque</title>
	<!-- <script src="calendar.js" type="text/javascript"></script> -->
	
</head>
    <body>
        <div class="sidebar">
          <div class="logo"><img src="../images/logoall-light.png" alt=""></div>
            <ul class="menu">
                <li>
                    <a href="index.php">
                      <i class="bx bxs-dashboard"></i>
                      <span>dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="user.php">
                      <i class="bx bxs-group"></i>
                      <span>user management</span>
                    </a>
                </li>
                <li>
                  <a href="itl.php">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span>employee ITL</span>
                  </a>
               </li>
                <li>
                    <a href="dtr.php">
                      <i class='bx bxs-time' ></i>
                      <span>employee DTR</span>
                    </a>
                </li>
                <li>
                  <a href="reports.php">
                      <i class='bx bxs-book-alt'></i>
                    <span>reports</span>
                  </a>
                </li>
                <li class="switch">
                    <a href="/loginas.php">
                      <i class='bx bx-code'></i>
                      <span>switch</span>
                    </a>
                </li>
            </ul>
           
        </div>

        <div class="main--content">
            <div class="header--wrapper">
              <div class="header--title">
                <h2>My profile</h2>
              </div>
             <div class="user--info">
              <div class="profile-dropdown">
                <div onclick="toggle()" class="profile-dropdown-btn">
                  <div class="profile-img"></div>
                  <i class="bx bx-chevron-down"></i>
                </div>
            
                <ul class="profile-dropdown-list">
                  <li class="profile-dropdown-list-item">
                  <a href="profile.php">
                    <i class="bx bxs-user"></i>
                    My Profile
                  </a>
                  </li>
            
                  <li class="profile-dropdown-list-item">
                  <a href="/login.html">
                    <i class="bx bxs-log-out"></i>
                    Log out
                  </a>
                  </li>
                </ul>
                </div>
             </div>
              </div>
              <div class="tabular--wrapper">
                    <div class="profile-container">
                        <div class="sidebar2">
                            <div class="profile-info">
                                <img src="/images/people.jpg" alt="Profile Picture" class="profile-pic">
                                <h2>Shakira Morales</h2>
                                <p>Admin</p>
                            </div>
                           <div class="sidebar-links">
                                <!-- <div class="info-section">
                                    <h3>Info</h3> 
                                    <p><strong>Associate professor 1</strong><br>Designation</p>
                                    <p><strong>Regular</strong><br>Employment</p>
                                </div>
                                <div class="info-section">
                                    <h3>Contact</h3>
                                    <p><strong>Email</strong> <br>shak@gmail.com</p>
                                    <p><strong>Phone</strong><br> +639123456789</p>
                                </div>-->     <br> 
                                
                            </div> 
                        </div>
                        <div class="main-content">
                          <div class="edit-profile">
                            <a href="profile.html">Profile Details</a>
                            <a href="edit-profile.html">Edit Profile</a>
                            <a href="pass.html">Password & Security</a>
                          </div> <br>
                            <form class="profile-form">
                                <div class="form-section">
                                    <!-- <h3>Profile details</h3> -->
                                    <label>First Name</label>
                                    <input type="text" placeholder="Shakira">
                                    <label>Middle Name</label>
                                    <input type="text" placeholder="Morales">
                                    <label>Last Name</label>
                                    <input type="text" placeholder="Morales">
                                    <label>Email</label>
                                    <input type="text" placeholder="Morales@gmail.com">
                                    <label>Contact Number</label>
                                    <input type="text" placeholder="09123456789">
                                    <!-- <label>Gender</label>
                                    <input type="text" placeholder="Female"> -->
                                    <!-- <label>Date of Birth</label>
                                    <input type="date">
                                    <label>Address</label>
                                    <input type="text" placeholder="Cagayan de Oro City">
                                    <label>City</label>
                                    <input type="text" placeholder="City">
                                    <label>State</label>
                                    <input type="text" placeholder="State"> -->
                                </div>
                                <!-- <div class="form-section">
                                    <h3>Employment (View only)</h3>
                                    <label>Employment ID</label>
                                    <input type="text" placeholder="Employment ID">
                                    <label>Position</label>
                                    <input type="text" placeholder="Position">
                                    <label>Designation</label>
                                    <input type="text" placeholder="Designation">
                                    <label>Department</label>
                                    <input type="text" placeholder="Department">
                                    <label>Type of Employment</label>
                                    <input type="text" placeholder="Type of Employment">
                                   
                                </div> -->
                            </form>
                        </div>
                    </div>
               </div>
                          
             
            
            </div>
            
    </body>
    
    <script>
        
      let profileDropdownList = document.querySelector(".profile-dropdown-list");
      let btn = document.querySelector(".profile-dropdown-btn");

      let classList = profileDropdownList.classList;

      const toggle = () => classList.toggle("active");

      window.addEventListener("click", function (e) {
      if (!btn.contains(e.target)) classList.remove("active");
      });
    </script>

</html>   