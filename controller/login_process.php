<?php
session_start();
include '../config/config.php'; // Database configuration file

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $emailAddress = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to retrieve user details and roles
    $login_query = "
        SELECT
            e.userId,
            e.firstName,
            e.middleName,
            e.lastName,
            e.password,
            e.emailAddress,
            e.userStatus,
            r.roleName
        FROM
            employee AS e
        JOIN
            employee_role AS er ON e.userId = er.employee_id
        JOIN
            role AS r ON er.role_id = r.roleId
        WHERE
            e.emailAddress = ?
    ";

    if ($stmt = $conn->prepare($login_query)) {
        $stmt->bind_param("s", $emailAddress);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $roles = [];
            $userData = null;

            while ($row = $result->fetch_assoc()) {
                if (!$userData) {
                    $userData = $row;
                }
                $roles[] = $row['roleName'];
            }

            if (password_verify($password, $userData['password'])) {
                $_SESSION['auth'] = true;
                $_SESSION['userstatus'] = $userData['userStatus'];
                $_SESSION['roles'] = $roles;
                $_SESSION['auth_user'] = [
                    'userId' => $userData['userId'],
                    'fullName' => $userData['firstName'] . ' ' . $userData['lastName'],
                    'email' => $userData['emailAddress']
                ];

                if ($userData['userStatus'] == 'Inactive') {
                    $message = "Your account is inactive!";
                    header("Location: ../login.php?status=" . urlencode($message) . "&status_code=warning");
                    exit();
                } elseif ($userData['userStatus'] == 'Pending') {
                    $message = "Your account is still pending";
                    header("Location: ../login.php?status=" . urlencode($message) . "&status_code=info");
                    exit();
                } elseif ($userData['userStatus'] == 'Active') {
                    $message = "Welcome " . $userData['firstName'] . "!";
                    header("Location: ../loginas.php?status=" . urlencode($message) . "&status_code=success");
                    exit();
                }
            } else {
                $message = "Invalid Password.";
                header("Location: ../login.php?status=" . urlencode($message) . "&status_code=error");
                exit();
            }
        } else {
            $message = "No user found with this email.";
            header("Location: ../login.php?status=" . urlencode($message) . "&status_code=error");
            exit();
        }
        $stmt->close();
    } else {
        $message = "Error in login query.";
        header("Location: ../login.php?status=" . urlencode($message) . "&status_code=error");
        exit();
    }
} else {
    $message = "Invalid request method.";
    header("Location: ../login.php?status=" . urlencode($message) . "&status_code=error");
    exit();
}

$conn->close();