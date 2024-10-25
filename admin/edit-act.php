<?php
// Include the database configuration file
include '../config/config.php';

// Check if employee_id is set in the URL
if (isset($_GET['employee_id'])) {
    $employee_id = $_GET['employee_id'];

    // Prepare a statement to fetch user details
    $stmt = $conn->prepare("SELECT * FROM users WHERE employee_id = ?");
    $stmt->bind_param("s", $employee_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Split roles into an array for easier processing
        $userRoles = explode(',', $user['role']);
    } else {
        echo "User not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="icon" type="image/png" sizes="96x96" href="../images/icon.png">
    <link rel="stylesheet" href="../assets/style.css">

    <title>Ucheque - Edit User</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo"><img src="../images/logoall-light.png" alt=""></div>
        <ul class="menu">
            <li><a href="index.php"><i class="bx bxs-dashboard"></i><span>dashboard</span></a></li>
            <li><a href="user.php"><i class="bx bxs-group"></i><span>user management</span></a></li>
            <li><a href="itl.html"><i class='bx bxs-doughnut-chart'></i><span>employee ITL</span></a></li>
            <li><a href="dtr.html"><i class='bx bxs-time'></i><span>employee DTR</span></a></li>
            <li><a href="reports.html"><i class='bx bxs-book-alt'></i><span>reports</span></a></li>
            <li class="switch"><a href="/loginas.html"><i class='bx bx-code'></i><span>switch</span></a></li>
        </ul>
    </div>

    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <h2>Edit User</h2>
            </div>
            <div class="user--info">
                <div class="profile-dropdown">
                    <div onclick="toggle()" class="profile-dropdown-btn">
                        <div class="profile-img"></div>
                        <i class="bx bx-chevron-down"></i>
                    </div>
                    <ul class="profile-dropdown-list">
                        <li class="profile-dropdown-list-item"><a href="profile.html"><i class="bx bxs-user"></i>My Profile</a></li>
                        <li class="profile-dropdown-list-item"><a href="/login.html"><i class="bx bxs-log-out"></i>Log out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="tabular--wrapper">
            <div class="table-container">
            <form action="../controller/update_user.php" method="POST">
            <input type="hidden" name="employee_id" value="<?php echo htmlspecialchars($user['employee_id']); ?>">
            <table>
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input class="edt-email" type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                        </td>
                        <td>
                            <div class="role-group">
                                <button type="button" class="role-btn <?php echo in_array('Staff', $userRoles) ? 'staff-selected' : ''; ?>" onclick="toggleRole(this, 'Staff')">Staff</button>
                                <button type="button" class="role-btn <?php echo in_array('Faculty', $userRoles) ? 'faculty-selected' : ''; ?>" onclick="toggleRole(this, 'Faculty')">Faculty</button>
                                <button type="button" class="role-btn <?php echo in_array('HR', $userRoles) ? 'hr-selected' : ''; ?>" onclick="toggleRole(this, 'HR')">HR</button>
                            </div>
                            <input type="hidden" name="roles" id="roles" value="<?php echo htmlspecialchars(implode(',', $userRoles)); ?>">
                        </td>
                        <td>
                            <select name="status" required>
                                <option value="active" <?php echo ($user['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                                <option value="inactive" <?php echo ($user['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="action">Save</button>
                            <a href="user.php" class="action">Cancel</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>

        <script>
        function toggleRole(button, role) {
            const rolesInput = document.getElementById('roles');
            let roles = rolesInput.value.split(',');

            // Toggle role selection
            if (roles.includes(role)) {
                roles = roles.filter(r => r !== role);
                button.classList.remove(role.toLowerCase() + '-selected');
            } else {
                roles.push(role);
                button.classList.add(role.toLowerCase() + '-selected');
            }

            rolesInput.value = roles.join(',');
        }
        </script>

</body>
</html>


<script>
        let profileDropdownList = document.querySelector(".profile-dropdown-list");
        let btn = document.querySelector(".profile-dropdown-btn");

        let classList = profileDropdownList.classList;

        const toggle = () => classList.toggle("active");

        window.addEventListener("click", function (e) {
            if (!btn.contains(e.target)) classList.remove("active");
        });
    </script>