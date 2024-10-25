<?php
// Connect to the database
include('../config/config.php'); // Assuming your config file has the database connection

// Query to fetch all users with their roles
$query = "
    SELECT u.*, GROUP_CONCAT(r.role_name SEPARATOR ', ') AS roles
    FROM users u
    LEFT JOIN user_roles ur ON u.id = ur.user_id
    LEFT JOIN roles r ON ur.role_id = r.id
    GROUP BY u.id
";

$result = mysqli_query($conn, $query);
?>

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
    <link rel="stylesheet" href="../assets/pagination.css">

    <title>Ucheque</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo"><img src="../images/logoall-light.png" alt=""></div>
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
                    <i class='bx bxs-time'></i>
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
                        <option value="" disabled selected>Select Role</option>
                        <option value="option1">Staff</option>
                        <option value="option2">Faculty</option>
                        <option value="option3">HR</option>
                    </select>
                </div>
                <a href="import.html" class="btn-add">
                    <i class='bx bxs-file-import'></i>
                    <span class="text">Import User</span>
                </a>
                <a href="add-user.php" class="btn-add">
                    <i class='bx bxs-user-plus'></i>
                    <span class="text">Add User</span>
                </a>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Roles</th> 
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Check if there are any users in the database
                        if(mysqli_num_rows($result) > 0) {
                            // Fetch each user as an associative array
                            while($row = mysqli_fetch_assoc($result)) {
                                // Display the user data in a table row
                                echo "<tr>";
                                echo "<td>" . $row['employee_id'] . "</td>";
                                echo "<td>" . $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['contact'] . "</td>";
                                echo "<td>" . ($row['roles'] ? $row['roles'] : 'No Role Assigned') . "</td>"; // Display roles
                                $status = isset($row['status']) ? $row['status'] : 'Inactive'; // Default to 'Inactive' if status is not set
                                echo "<td><span class='status " . strtolower($status) . "'>" . ucfirst($status) . "</span></td>";
                                echo "<td><a href='../admin/edit-act.php?id=" . $row['employee_id'] . "' class='action'>Edit</a><a href='/admin/archive.php?id=" . $row['employee_id'] . "' class='action'>Archive</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            // If no users are found
                            echo "<tr><td colspan='7'>No users found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="/assets/pagination.js"></script>
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
