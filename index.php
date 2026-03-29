<?php
// Simple PHP login page - no external dependencies required
session_start();

$error = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($email) || empty($password)) {
        $error = 'Please enter both email and password.';
    } else {
        // Demo authentication - replace with your actual auth logic
        // For demo: email: admin@example.com, password: admin123
        if ($email === 'admin@example.com' && $password === 'admin123') {
            $_SESSION['user_id'] = 1;
            $_SESSION['user_role'] = 'Admin';
            header('Location: dashboard.php');
            exit;
        } else {
            $error = 'Invalid email or password.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PPMP System</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="login-page">
    <div class="login-container">
        <!-- LEFT PANEL - Login Form -->
        <div class="login-left">
            <div class="system-branding">
                <h1>PPMP Monitoring &<br>Management System</h1>
                <p class="municipality">Municipality of Balilihan</p>
            </div>

            <div class="login-form-wrapper">
                <div class="welcome-text">
                    <h2>Welcome Back!</h2>
                    <p>Enter your credentials to access the system.<br>
                    Your role and department are pre-assigned by the Admin.</p>
                </div>

                <?php if ($error): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="" id="loginForm">
                    <div class="form-group">
                        <label for="email">Username</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" id="email" name="email" placeholder="maria.santos" 
                                   value="<?php echo htmlspecialchars($email); ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-wrapper password-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" placeholder="Enter your password" required>
                            <button type="button" class="toggle-password" onclick="togglePassword()">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-options">
                        <label class="remember-me">
                            <input type="checkbox" name="remember">
                            <span>Remember me</span>
                        </label>
                        <a href="#" class="forgot-password">Forgot password?</a>
                    </div>

                    <button type="submit" class="login-btn">
                        <i class="fas fa-sign-in-alt"></i>
                        Login to System
                    </button>
                </form>

                <div class="login-note">
                    <strong><i class="fas fa-info-circle"></i> NOTE:</strong>
                    <p>After login, automatic na ang imong dashboard based sa imong role.</p>
                </div>
            </div>
        </div>

        <!-- RIGHT PANEL - User Types -->
        <div class="login-right">
            <div class="panel-header">
                <h3>LOGIN PAGE</h3>
                <p>ALL USERS</p>
            </div>

            <div class="user-types-section">
                <h4>User Login Types</h4>
                <div class="user-types-grid">
                    <div class="user-type-card admin" data-role="Admin">
                        <div class="user-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="user-type-info">
                            <h5>Admin</h5>
                            <p>IT Administrator</p>
                        </div>
                    </div>
                    <div class="user-type-card staff" data-role="Staff">
                        <div class="user-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="user-type-info">
                            <h5>Staff</h5>
                            <p>Department Staff</p>
                        </div>
                    </div>
                    <div class="user-type-card dept-head" data-role="Department Head">
                        <div class="user-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="user-type-info">
                            <h5>Dept Head</h5>
                            <p>Department Head</p>
                        </div>
                    </div>
                    <div class="user-type-card budget" data-role="Budget Officer">
                        <div class="user-icon">
                            <i class="fas fa-calculator"></i>
                        </div>
                        <div class="user-type-info">
                            <h5>Budget Officer</h5>
                            <p>Budget Office</p>
                        </div>
                    </div>
                    <div class="user-type-card bac" data-role="BAC">
                        <div class="user-icon">
                            <i class="fas fa-gavel"></i>
                        </div>
                        <div class="user-type-info">
                            <h5>BAC</h5>
                            <p>Bids & Awards</p>
                        </div>
                    </div>
                    <div class="user-type-card mayor" data-role="Mayor">
                        <div class="user-icon">
                            <i class="fas fa-crown"></i>
                        </div>
                        <div class="user-type-info">
                            <h5>Mayor</h5>
                            <p>LCE / Mayor</p>
                        </div>
                    </div>
                    <div class="user-type-card treasurer" data-role="Treasurer">
                        <div class="user-icon">
                            <i class="fas fa-coins"></i>
                        </div>
                        <div class="user-type-info">
                            <h5>Treasurer</h5>
                            <p>Treasury Office</p>
                        </div>
                    </div>
                    <div class="user-type-card accounting" data-role="Accounting">
                        <div class="user-icon">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <div class="user-type-info">
                            <h5>Accounting</h5>
                            <p>Accounting Office</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="system-covers">
                <h4>SYSTEM COVERS</h4>
                <div class="covers-list">
                    <span><i class="fas fa-check-circle"></i> PPMP Planning</span>
                    <span><i class="fas fa-check-circle"></i> Multi-Level Approval</span>
                    <span><i class="fas fa-check-circle"></i> Fund Certification</span>
                    <span><i class="fas fa-check-circle"></i> Payment Monitoring</span>
                    <span><i class="fas fa-check-circle"></i> Report Generation</span>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/login.js"></script>
</body>
</html>
