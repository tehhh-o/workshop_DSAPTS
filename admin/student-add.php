<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Adding Student - UTeM</title>
  <link rel="stylesheet" href="../style/layout.css">
  <link rel="stylesheet" href="../style/admin.css">
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body>
  <div class="page-body main-gradient-bg">
    <?php
    $activePage = 'student';
    include("components/sidebar-admin.php");
    include("../models/functions.php");

    $error = '';
    $success = '';
    $advisors = getAllUser($conn, 'advisor');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $result = addStudent(
        $conn,
        trim($_POST['name']     ?? ''),
        trim($_POST['email']    ?? ''),
        trim($_POST['phone']    ?? ''),
        'student123',
        (int) ($_POST['advisor_id'] ?? 0),
        trim($_POST['address'] ?? ''),
      );

      if ($result['success']) {
        $success = $result['message'];
      } else {
        $error = $result['message'];
      }
    }
    ?>

    <main class="main-content main-rounded">
      <div class="title-row">
        <h1 class="content-title">Add Student</h1>
        <div class="back-button">
          <button style="background: transparent; border:none;" type="button" onclick="window.location.href='student.php'">
            <img src="../assets/icons/back.png" alt="" style="height: 25px;"></button>
        </div>
      </div>

      <div class="content">
        <?php if ($error): ?>
          <p style="color:red; margin-bottom:12px;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <?php if ($success): ?>
          <p style="color:green; margin-bottom:12px;"><?= htmlspecialchars($success) ?> — <a href="student.php">Back to Student list</a></p>
        <?php endif; ?>
        <form method="POST">
          <div class="edit-box">
            <div class="edit-wrapper">
              <div class="edit-list">
                <div class="edit-row">
                  <span>Name</span>
                  <input class="add-design" type="text" name="name" placeholder="Full name">
                </div>
                <div class="edit-row">
                  <span>Email</span>
                  <input class="add-design" type="email" name="email" placeholder="Email address">
                </div>
                <div class="edit-row">
                  <span>Phone Number</span>
                  <input class="add-design" type="text" name="phone" placeholder="e.g. 012-3456789">
                </div>
                <div class="edit-row">
                  <span>Address</span>
                  <input class="add-design" type="text" name="address" placeholder="e.g. House Number, State">
                </div>
                <div class="edit-row">
                  <span>Assign Advisor</span>
                  <select class="add-design" name="advisor_id">
                    <option value="">— Select Advisor —</option>
                    <?php foreach ($advisors as $adv): ?>
                      <option value="<?= $adv['user_id'] ?>"><?= htmlspecialchars($adv['name']) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <button class="add-submit" type="submit">Add</button>
              </div>
            </div>
          </div>
        </form>
    </main>
  </div>
</body>

</html>