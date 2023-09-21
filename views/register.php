<?php
$user = new DatabaseTable('users');

if (isset($_POST['submit'])) {
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  if ($_POST['password'] == $_POST['password_confirmation']) {
  $data = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'password' => $password,
    'phone' => $_POST['phone'],
    'address' => $_POST['address'],
    'type' => 'user',
    'dob' => $_POST['dob'],
    'gender' => $_POST['gender'],
    'reg_date' => date('Y-m-d'),
    'status' => 'Active'

  ];

  $user->save($data, 'id');
  echo '<script language="javascript">';
  echo 'alert("User Registered Successfully")';
  echo '</script>';
  }
  else{
    echo '<script language="javascript">';
    echo 'alert("Confirm Password Not Matched")';
    echo '</script>';
  }
}

?>

<body>
  <div class="bg-gray-200 flex items-center justify-center py-14">
    <div class="modal-content bg-gray-400 rounded-lg shadow-lg grid grid-cols-2 p-6 mt-10">
      <div>
        <h3 class="text-lg font-semibold mb-4">REGISTER ACCOUNT</h3>
        <form action="" method="POST">

          <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
              <label for="firstName" class="block mb-1"> Name: </label>
              <input type="text" id="firstName" placeholder="First Name" class="w-full p-2 border border-gray-300 rounded bg-white" name="name" required />
            </div>

          </div>
          <div>
            <label for="email" class="block mb-1">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" class="w-full p-2 border border-gray-300 rounded bg-white" required />
          </div>
          <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
              <label for="password" class="block mb-1">Password:</label>
              <input type="password" id="password" name="password" placeholder="Password" class="w-full p-2 border border-gray-300 rounded bg-white" required />
            </div>
            <div>
              <label for="confirmPassword" class="block mb-1">Confirm Password:</label>
              <input type="password" id="confirmPassword" name="password_confirmation" placeholder="Confirm Password" class="w-full p-2 border border-gray-300 rounded bg-white" required />
            </div>
          </div>
          <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
              <label for="address" class="block mb-1">Address:</label>
              <input type="text" id="address" name="address" placeholder="Address" class="w-full p-2 border border-gray-300 rounded bg-white" required />
            </div>
            <div>
              <label for="contact" class="block mb-1">Contact:</label>
              <input type="tel" id="contact" name="phone" placeholder="Contact" class="w-full p-2 border border-gray-300 rounded bg-white" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required />
            </div>
          </div>
          <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
              <label for="dob" class="block mb-1">Date of Birth:</label>
              <input type="date" id="dob" name="dob" class="w-full p-2 border border-gray-300 rounded bg-white" required />
            </div>
            <div>
              <label for="gender" class="block mb-1">Gender:</label>
              <select name="gender" id="gender" class="w-full p-2 border border-gray-300 rounded bg-white" required>
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>
            </div>
          </div>
          <div class="flex items-center mt-4">
            <input type="checkbox" id="terms" class="mr-2" />
            <label for="terms" class="text-sm"> I accept the </label>
            <a href="#" class="text-red-700 px-1 underline">
              terms and conditions.
            </a>
          </div>
          <div>
            <input type="submit" name="submit" class="w-1/3 mt-5 py-2 bg-green-600 text-white rounded hover:bg-gray-700" value="Register">


            <a href="?page=login" class="w-1/3 mt-5 p-10 py-2 bg-red-400 text-white rounded hover:bg-gray-700">
              Sign Up
            </a>
          </div>

          <div class="text-red-500">
            <!-- Error message here -->
          </div>
        </form>
      </div>
      <div class="ml-10 bg-slate-300 text-center p-4 rounded">
        <img src="images/medical.jpg" alt="Image description" class="w-96 h-96 -mt-10" />
        <p class="-mt-2 font-serif italic text-black">
          "The greatest wealth is health"
        </p>
      </div>
    </div>
  </div>