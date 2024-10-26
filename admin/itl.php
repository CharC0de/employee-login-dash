<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="icon" type="image/png" sizes="96x96" href="images/icon.png">
	<link rel="stylesheet" href="/assets/style.css">

	<title>Ucheque</title>
	<!-- <script src="calendar.js" type="text/javascript"></script> -->
	
</head>
    <body>
        <div class="sidebar">
          <div class="logo"><img src="/images/logoall-light.png" alt=""></div>
            <ul class="menu">
                <li>
                    <a href="index.html">
                      <i class="bx bxs-dashboard"></i>
                      <span>dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="user.html">
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
                  <a href="reports.html">
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
                <h2>user management</h2>
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
                <div class="add">
                  <div class="filter">
                        <select id="role">
                        <option value="" disabled selected>Select Designation</option>
                        <option value="option1">Assoc.Prof.1</option>
                        <option value="option2">Assoc.Prof.2</option>
                        <option value="option3">Assoc.Prof.3</option>
                        </select>
                  </div>
                  <div class="filter">
                        <select id="role">
                            <option value="" disabled selected>Select Academic Year</option>
                            <option value="option1">2024-2025</option>
                            <option value="option2">2025-2026</option>
                            <option value="option3">2026-2027</option>
                        </select>
                  </div>
                  <div class="filter">
                        <select id="role">
                            <option value="" disabled selected>Select Academic Semester</option>
                            <option value="option1">1st Semester</option>
                            <option value="option2">2nd Semester</option>
                        </select>
                  </div>
                  
                  
                </div>
                          
             
               <div class="table-container">
                  <table>
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Desig.</th>
                        <th>Faculty Cr.</th>
                        <th>Desig. Load Rel.</th>
                        <th>ITL File</th>
                        <th>action</th>
                      </tr>
                      <tbody>
                        <tr>
                          <td>202412345</td>
                          <td>Jc Vanny Mill saledaien</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><i class='bx bxs-cloud-upload'></i><i class='bx bx-trash' ></i></td>
                        </tr>
                        <tr>
                            <td>202412345</td>
                            <td>Jay Noel Rojo</td>
                            <td><span class="status credit">Assoc.Prof. 1</span></td>
                            <td><span class="status credit">8.50</span></td>
                            <td><span class="status credit">18.0</span></td>
                            <td><span class="status file">itl.file</span></td>  
                            <td><i class='bx bxs-cloud-upload'></i><i class='bx bx-trash' ></i></td>
								
                        </tr>
                        <tr>
                          <td>202412345</td>
                          <td>Petal May Dal</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><i class='bx bxs-cloud-upload'></i><i class='bx bx-trash' ></i></td>
                        </tr>
                        <tr>
                            <td>202412345</td>
                            <td>Shakira Morales</td>
                            <td><span class="status credit">none</span></td>
                            <td><span class="status credit">9.50</span></td>
                            <td><span class="status credit">0.0</span></td>
                            <td><span class="status file">itl.file</span></td>  
                            <td><i class='bx bxs-cloud-upload'></i><i class='bx bx-trash' ></i></td>
                        </tr>
                      </tbody>
                    </thead>
                  </table>
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
    

 