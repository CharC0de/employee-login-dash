<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="icon" type="image/png" sizes="96x96" href="images/icon.png">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="../assets/style.css">

	<title>Ucheque</title>
	
	
</head>
    <body>
      <div class="sidebar">
        <div class="logo"><img src="../images/logoall-light.png" alt=""></div>
        <!-- <div class="logo"><img src="/images/logo-light.png" alt=""></div> -->
        <ul class="menu">
            <li class="active">
                <a href="#">
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
                <a href="itl.html">
                  <i class='bx bxs-doughnut-chart'></i>
                  <span>employee ITL</span>
                </a>
            </li>
            <li>
                <a href="dtr.html">
                  <i class='bx bxs-time' ></i>
                  <span>employee DTR</span>
                </a>
            </li>
            <li>
              <a href="#">
                  <i class='bx bxs-book-alt'></i>
                <span>reports</span>
              </a>
          </li>
            <li class="switch">
                <a href="/loginas.html">
                  <i class='bx bx-code'></i>
                  <span>switch</span>
                </a>
            </li>
        </ul>
       
    </div>

        <div class="main--content">
            <div class="header--wrapper">
              <div class="header--title">
                <h2>add user</h2>
              </div>
             <div class="user--info">
              <div class="profile-dropdown">
                <div onclick="toggle()" class="profile-dropdown-btn">
                  <div class="profile-img"></div>
                  <i class="bx bx-chevron-down"></i>
                </div>
            
                <ul class="profile-dropdown-list">
                  <li class="profile-dropdown-list-item">
                  <a href="profile.html">
                    <i class="bx bxs-user"></i>
                    My Profile
                  </a>
                  </li>
            
                  <li class="profile-dropdown-list-item">
                  <a href="#">
                    <i class="bx bxs-log-out"></i>
                    Log out
                  </a>
                  </li>
                </ul>
                </div>
             </div>
              </div>
              <div class="tabulars--wrapper">
                <div class="container mt-5">
                  <form method="POST" action="../controller/update_user.php">
                    <div class="card-body">
                      <h4 class="card-title">Personal Information</h4>
                      
                      <!-- Row 1 -->
                      <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="employeeId">Employee ID</label>
                                <input type="text" class="form-control" id="employeeId" placeholder="Enter Employee ID" required>
                            </div>
                          <div class="form-group col-md-6">
                              <label for="firstName">First Name</label>
                              <input type="text" class="form-control" id="firstName" placeholder="Enter First Name" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="middlename">Middle Name</label>
                            <input type="text" class="form-control" id="middlename" placeholder="Enter Middle Name">
                          </div>
                          <div class="form-group col-md-6">
                              <label for="lastname">Last Name</label>
                              <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Email" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="contact">Contact</label>
                            <input type="contact" class="form-control" id="contact" placeholder="Enter Contact Details">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="contact">Account Role</label>
                            <select class="role">
                              <option value="" disabled selected>Select Role</option>
                              <option value="option1">Admin</option>
                              <option value="option2">Staff</option>
                              <option value="option3">Faculty</option>
                              <option value="option4">HR</option>
                            </select> 
                          </div>
                      </div> <br>
                      </div>
                      <!-- Buttons -->
                      <div class="form-row">
                          <div class="col-md-12 text-right">
                              <button type="submit" class="btn btn-primary">Save</button>
                              <button type="button" class="btn btn-secondary">Cancel</button>
                          </div>
                      </div>
  
                  </div>
                  </form>
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
    

 