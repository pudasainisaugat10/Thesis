<?php
require 'database/dbconnect.php';


if (isset($_POST['submit'])) {
  unset($_POST['submit']);
  $user = $pdo->prepare('SELECT * FROM users WHERE email = :email');
  $data = [
    'email' => $_POST['email']
  ];
  $user->execute($data);
  if ($user->rowCount() > 0) {
    $user = $user->fetch();
    if ($user['email'] == $_POST['email'] && password_verify($_POST['password'], $user['password'])) {
      // if ($user['username'] == $_POST['username'] && $user['password'] =="rup") {
      if ($user['type'] == 'admin') {
        $_SESSION['adminlogin'] = true;
        $_SESSION['userlogin'] = true;
        $_SESSION['login'] = $user['id'];
      } elseif ($user['type'] == 'user') {
        $_SESSION['stafflogin'] = true;
        $_SESSION['userlogin'] = true;
        $_SESSION['login'] = $user['id'];
      }

      header('Location:/public');
    } else {
      echo '<script language="javascript">';
      echo 'alert(" Password Incorrect")';
      echo '</script>';
    }
  } else {

    echo '<script language="javascript">';
    echo 'alert(" User name or password do not match.")';
    echo '</script>';
  }
}

?>


<section class="relative overflow-x-hidden">
  <div class="container px-4 mx-auto">
    <div class="flex flex-wrap items-center">
      <div class="w-full lg:w-2/6 mt-10 px-4 lg:mb-0 ml-16">
        <div class="py-20 text-center">
          <a class="inline-block mb-14 text-3xl font-bold font-heading" href="#">
            <img src="images/image.jpg" alt="Image description" class="w-36 h-36 -mt-10" />
          </a>
          <h3 class="mb-8 -mt-20 text-4xl md:text-5xl font-bold font-heading">
            Signing up
          </h3>
          <p class="mb-6 text-sm">
            Join our fitness community and achieve your dream body. Get
            started with Healthfulhub today!
          </p>
          <form action="" method="POST">

            <input class="w-full mb-4 px-12 py-6 border border-gray-200 rounded-md" type="email" placeholder="Email" name="email" required autocomplete="email" autofocus />
            <input class="w-full mb-4 px-12 py-6 border border-gray-200 rounded-md" type="password" placeholder="Password" name="password" required autocomplete="current-password" />

            <input type="submit" name="submit" class="mt-5 md:mt-6 bg-blue-800 hover:bg-blue-900 text-white font-bold font-heading py-5 px-8 rounded-md uppercase">
            LOGIN TO HEALTHFUL HUB
            </button>
          </form>
          <div class="mt-3 text-sm font-medium flex flex-row justify-center text-black">
            Don't have an account?
            <a href="?page=register" class="text-green-500 px-1 underline">
              Create one
            </a>
          </div>
          <div class="mt-3 text-sm font-medium flex flex-row justify-center text-black">
            Back to
            <a href="?page=home" class="text-red-500 px-1 underline">
              HOME 
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="border-4 border-green-200 rounded-3xl hidden lg:block lg:absolute top-0 bottom-0 right-0 lg:w-1/2 mr-20 bg-center bg-cover bg-no-repeat mt-10">
    <img src="images/image.jpg" alt="Image description" class="w-full h-full rounded-3xl" />
  </div>