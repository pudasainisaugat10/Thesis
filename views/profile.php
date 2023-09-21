<?php

// If the 'submit' button is clicked, update user profile data in the 'users' table and display a success alert.
if (isset($_POST['submit'])) {
  $user = new DatabaseTable('users');
  $data = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'dob' => $_POST['dob'],
    'id' => $_SESSION['login']
  ];
  $user->update($data, 'id');
  echo '<script language="javascript">';
  echo 'alert("Profile Updated Successfully")';

  echo '</script>';
}

// If the 'submit1' button is clicked, update user profile data (height, weight, gender, and age) in the 'users' table and display a success alert.
if (isset($_POST['submit1'])) {
  $user = new DatabaseTable('users');
  $data = [
    'height' => $_POST['height'],
    'weight' => $_POST['weight'],
    'gender' => $_POST['gender'],
    'age' => $_POST['age'],
    'id' => $_SESSION['login']
  ];
  $user->update($data, 'id');
  echo '<script language="javascript">';
  echo 'alert("Profile Updated Successfully")';

  echo '</script>';
}

// If 'submit3' button is clicked, update user password if the current password is verified, and display appropriate alerts based on the outcome.
if (isset($_POST['submit3'])) {
  $getid = $_SESSION['login'];
  $user1 = new DatabaseTable('users');
  $row = $user1->find('id', $getid);
  $query = $row->fetch();
  $user = new DatabaseTable('users');
  if ($_POST['newpassword'] == $_POST['confirmnewpassword']) {
    if (password_verify($_POST['currentpassword'], $query['password'])) {
      $password = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
      $data = [

        'password' => $password,
        'id' => $_SESSION['login']
      ];
      $user->update($data, 'id');
      echo '<script language="javascript">';
      echo 'alert("Profile Updated Successfully")';

      echo '</script>';
    } else {
      echo '<script language="javascript">';
      echo 'alert("Current Password Not Matched")';
      echo '</script>';
    }
  } else {
    echo '<script language="javascript">';
    echo 'alert("New Password Not Matched")';
    echo '</script>';
  }
}

?>


<section class="w-full h-full bg-red-50 py-4">
  <div class="w-2/3 mx-auto bg-gradient-to-r from-red-200 via-orange-200 to-green-200 p-8 shadow-lg rounded-lg mt-8">
    <div class="flex justify-center mb-4">
      <div class="bg-white w-32 h-32 rounded-full border-4 border-gray-300 relative">
        <!-- Profile Picture Rendering -->
        <img src="URL_TO_PROFILE_PICTURE" alt="" class="w-full h-full rounded-full bg-contain" />
      </div>
      <!-- <div class="top-0 -right-10 mt-2 mr-2">
        <label for="image-upload" class="cursor-pointer">
          <input type="file" id="image-upload" accept="image/*" class="sr-only" />
          <div class="flex items-center">
            <label for="image-upload" class="cursor-pointer">
              <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 h-8 text-black hover:text-blue-700">
                <path d="M5 2H3v3H0v2h3v3h2V7h3V5H5V2zm12 1h-7v2h5v2h5v12H5v-7H3v9h19V5h-5V3zm-7 6h4v2h2v4h-2v2h-4v-2h4v-4h-4V9zm-2 2h2v4H8v-4z" fill="currentColor" />
              </svg>
            </label>
            <button class="bg-gray-500 hover:bg-red-400 text-white px-2 py-1 rounded">
              <svg xmlns="http://www.w3.org/2000/svg" width="" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
              </svg>
            </button>
          </div>
        </label>
      </div> -->
    </div>

    <!-- User personal Info-->
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
      <div class="bg-white p-4 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-4 flex justify-center">
          Personal Information
        </h2>

        <?php
        // Retrieve user data based on the 'id' stored in the 'login' session variable.
        $getid = $_SESSION['login'];
        $user = new DatabaseTable('users');
        $row = $user->find('id', $getid);
        $user = $row->fetch();
        ?>
        <form action="" method="POST">

          <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
              <label for="firstName" class="block mb-1"> Name: </label>
              <input type="text" value="<?php echo $user['name']; ?>" id="firstName" placeholder="First Name" class="w-full p-2 border border-gray-300 rounded bg-white" name="name" required />
            </div>
            <div>
              <label for="email" class="block mb-1">Email:</label>
              <input type="email" value="<?php echo $user['email']; ?>" id="email" name="email" placeholder="Email" class="w-full p-2 border border-gray-300 rounded bg-white" required />
            </div>
          </div>

          <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
              <label for="address" class="block mb-1">Address:</label>
              <input type="text" id="address" value="<?php echo $user['address']; ?>" name="address" placeholder="Address" class="w-full p-2 border border-gray-300 rounded bg-white" required />
            </div>
            <div>
              <label for="contact" class="block mb-1">Contact:</label>
              <input type="tel" id="contact" value="<?php echo $user['phone']; ?>" name="phone" placeholder="Contact" class="w-full p-2 border border-gray-300 rounded bg-white" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required />
            </div>
          </div>

          <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
              <label for="dob" class="block mb-1">Date of Birth:</label>
              <input type="date" id="dob" value="<?php echo $user['dob']; ?>" name="dob" class="w-full p-2 border border-gray-300 rounded bg-white" required />
            </div>

          </div>

          <div class="text-red-500">
            <!-- Error message here -->
          </div>

          <button type="submit" name="submit" class="bg-pink-500 hover:bg-green-500 text-white font-semibold px-4 py-2 rounded mt-4 flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil mt-1 mr-1" viewBox="0 0 16 16">
              <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
            </svg>
            Update
          </button>
        </form>
      </div>
      <!-- user physcial info-->
      <div class="bg-white p-4 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-4 flex justify-center">
          Physical Information
        </h2>
        <form action="" method="POST">
          <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
              <label for="height" class="block mb-1">Height:</label>
              <input type="number" id="height" name="height" placeholder="Height" value="<?php echo $user['height']; ?>" class="w-full p-2 border border-gray-300 rounded bg-white" required />
            </div>
            <div>
              <label for="contact" class="block mb-1">Weight:</label>
              <input type="number" id="weight" name="weight" placeholder="Weight" value="<?php echo $user['weight']; ?>" class="w-full p-2 border border-gray-300 rounded bg-white" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required />
            </div>
          </div>
          <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
              <label for="contact" class="block mb-1">Age:</label>
              <input type="number" id="age" name="age" placeholder="Age" value="<?php echo $user['age']; ?>" class="w-full p-2 border border-gray-300 rounded bg-white" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required />
            </div>
            <div>
              <label for="gender" class="block mb-1">Gender:</label>
              <input name="gender" id="gender" value="<?php echo $user['gender']; ?>" class="w-full p-2 border border-gray-300 rounded bg-white" required />
            </div>
          </div>


          <button type="submit" name="submit1" class="bg-purple-500 hover:bg-green-500 text-white font-semibold px-4 py-2 rounded mt-4 flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil mr-1 mt-1" viewBox="0 0 16 16">
              <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
            </svg>
            Update
          </button>
        </form>
      </div>
      <!--User Account Seeting-->
      <section>
        <div class="bg-white p-4 rounded-lg shadow-lg md:col-span-2">
          <h2 class="text-xl font-semibold mb-4">Account Settings</h2>
          <button onclick="openSettings()" class="bg-blue-500 hover:bg-green-500 text-white font-semibold px-4 py-2 rounded flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings mr-1">
              <circle cx="12" cy="12" r="3"></circle>
              <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
            </svg>
            Settings
          </button>
        </div>

        <div id="settingsOverlay" class="hidden fixed inset-0 flex items-center justify-center">
          <div class="absolute bg-black opacity-60 inset-0"></div>
          <div class="relative bg-white p-8 shadow-lg rounded-lg w-1/3">
            <h1 class="text-2xl font-semibold mb-4">Account Settings</h1>
            <form action="" method="POST">
              <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">Change Password</h2>
                <a href="javascript:void(0);" id="togglePasswordForm" class="text-blue-500 underline">
                  Change your account password.
                </a>
                <div id="passwordForm" style="display: none">
                  <div class="mb-4">
                    <label for="currentPassword" class="block text-sm font-medium text-gray-700">Current Password</label>
                    <input type="password" id="currentPassword" name="currentpassword" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-200 focus:border-blue-300" placeholder="Enter current password" />
                  </div>

                  <div class="mb-4">
                    <label for="newPassword" class="block text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" id="newPassword" name="newpassword" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-200 focus:border-blue-300" placeholder="Enter new password" />
                  </div>

                  <div class="mb-4">
                    <label for="confirmNewPassword" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                    <input type="password" id="confirmNewPassword" name="confirmnewpassword" class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-200 focus:border-blue-300" placeholder="Confirm new password" />
                  </div>
                </div>
              </div>
              <div class="flex justify-end">
                <button type="submit" name="submit3" class="bg-green-500 hover:bg-gray-500 text-white py-2 px-4 rounded mr-2 flex">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save mr-1 mt-1" viewBox="0 0 16 16">
                    <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
                  </svg>
                  Save Changes
                </button>
                <button onclick="handleCancel()" class="bg-gray-300 hover:bg-red-400 py-2 px-4 rounded">
                  Cancel
                </button>
              </div>
            </form>
          </div>
        </div>
      </section>
      <!--User plan details-->
      <section>
        <div class="bg-white p-4 rounded-lg shadow-lg md:col-span-2">
          <h2 class="text-xl font-semibold mb-4">View My Plans</h2>
          <div class="flex flex-row space-x-4">
            <button onclick="viewHealthPlan()" class="bg-red-400 hover:bg-green-500 text-white font-semibold px-4 py-2 rounded flex">
              <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" class="mr-2" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 20L21.8243 16.1757C21.9368 16.0632 22 15.9106 22 15.7515V10.5C22 9.67157 21.3284 9 20.5 9V9C19.6716 9 19 9.67157 19 10.5V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M18 16L18.8581 15.1419C18.949 15.051 19 14.9278 19 14.7994V14.7994C19 14.6159 18.8963 14.4482 18.7322 14.3661L18.2893 14.1447C17.5194 13.7597 16.5894 13.9106 15.9807 14.5193L15.0858 15.4142C14.7107 15.7893 14.5 16.298 14.5 16.8284V20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M6 20L2.17574 16.1757C2.06321 16.0632 2 15.9106 2 15.7515V10.5C2 9.67157 2.67157 9 3.5 9V9C4.32843 9 5 9.67157 5 10.5V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M6 16L5.14187 15.1419C5.05103 15.051 5 14.9278 5 14.7994V14.7994C5 14.6159 5.10366 14.4482 5.26776 14.3661L5.71067 14.1447C6.48064 13.7597 7.41059 13.9106 8.01931 14.5193L8.91421 15.4142C9.28929 15.7893 9.5 16.298 9.5 16.8284V20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M13.6667 12H10.3333V9.66667H8V6.33333H10.3333V4H13.6667V6.33333H16V9.66667H13.6667V12Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />

              </svg>
              Health / Nutrition Service
            </button>
          </div>
        </div>
        <div id="planOverlay" class="hidden fixed inset-0 flex items-center justify-center space-x-4">
          <div class="absolute bg-black opacity-60 inset-0"></div>
          <div class="relative bg-white p-8 shadow-lg rounded-lg w-full">
            <h1 class="text-2xl font-semibold mb-4">View Health / Nutriton Service Plan</h1>

            <div class="w-3/2 p-8 overflow-y-auto">
              <div class="mt-6">
                <div class="flex justify-between">
                  <span class="text-xl font-medium text-textBlack">MY PLANS</span>
                  <div class="relative">
                    <svg class="h-6 w-6 fill-gray-500 absolute left-2.5 top-2" viewBox="0 0 24 24">
                      <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z" />
                    </svg>
                    <input id="search" type="text" class="h-10 w-80 border bg-transparent border-gray-500 rounded-lg placeholder-text-gray-400 pl-10 pr-2 py-1" placeholder="Search" />
                  </div>
                </div>

                <div>
                  <!-- list -->
                  <div class="flex flex-col mt-6">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                          <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                              <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Plan Category
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Height
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  weight
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Classes Time
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Selected Facilities
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Fitness Goals
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Submitted Date
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  PAYMENT
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Status
                                </th>

                              </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                              <?php
                              // Retrieve user data based on the 'id' stored in the 'login' session variable and find applied plans associated with the user's name.
                              $getid = $_SESSION['login'];
                              $user1 = new DatabaseTable('users');
                              $row = $user1->find('id', $getid);
                              $query = $row->fetch();

                              $plan = new DatabaseTable('applied_plans');
                              $plan = $plan->find('user_name', $query['name']);

                              foreach ($plan as $pln) {
                              ?>
                                <tr>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 capitalize">
                                      <?php echo $pln['category']; ?>
                                    </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 capitalize">
                                      <?php echo $pln['height']; ?>ft
                                    </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 capitalize">
                                      <?php echo $pln['weight']; ?>kg
                                    </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> <?php echo $pln['class_time']; ?></div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                      <?php echo $pln['facility']; ?>
                                    </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                      <?php echo $pln['goals']; ?>
                                    </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> <?php echo $pln['date']; ?></div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> <?php echo $pln['payment']; ?></div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs font-normal rounded-full capitalize">
                                      <?php echo $pln['status']; ?>
                                    </span>
                                  </td>

                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="flex justify-end mt-5">

                <button onclick="handleCancelPlan()" class="bg-gray-300 hover:bg-red-400 py-2 px-4 rounded">
                  Cancel
                </button>
              </div>
            </div>
          </div>
        </div>


      </section>
      <!--user events and appointments details-->
      <section>
        <div class="bg-white p-4 rounded-lg shadow-lg md:col-span-2">
          <h2 class="text-xl font-semibold mb-4">View Events And Appointments</h2>
          <div class="flex flex-row space-x-4">
            <button onclick="viewEvent()" class="bg-gray-500 hover:bg-green-500 text-white font-semibold px-4 py-2 rounded flex">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calendar-event mr-2" viewBox="0 0 16 16">
                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
              </svg>
              My Events
            </button>
            <button onclick="viewAppointment()" class="bg-red-500 hover:bg-green-500 text-white font-semibold px-4 py-2 rounded flex">
              <svg width="24" height="24" class="mr-2" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2H13.5C14.3284 2 15 2.67157 15 3.5V13.5C15 14.3284 14.3284 15 13.5 15H1.5C0.671573 15 0 14.3284 0 13.5V3.5C0 2.67157 0.671573 2 1.5 2H3V0H4V2H11V0H12V2ZM6 8H3V7H6V8ZM12 7H9V8H12V7ZM6 11H3V10H6V11ZM9 11H12V10H9V11Z" fill="white" />
              </svg>
              My Appointments
            </button>

          </div>
        </div>
        <div id="EventOverlay" class="hidden fixed inset-0 flex items-center justify-center space-x-4">
          <div class="absolute bg-black opacity-60 inset-0"></div>
          <div class="relative bg-white p-8 shadow-lg rounded-lg w-full">
            <h1 class="text-2xl font-semibold mb-4">View Events And Appointments</h1>

            <div class="w-3/2 p-8 overflow-y-auto">
              <div class="mt-6">
                <div class="flex justify-between">
                  <span class="text-xl font-medium text-textBlack"> EVENT LIST</span>
                  <div class="relative">
                    <svg class="h-6 w-6 fill-gray-500 absolute left-2.5 top-2" viewBox="0 0 24 24">
                      <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z" />
                    </svg>
                    <input id="search" type="text" class="h-10 w-80 border bg-transparent border-gray-500 rounded-lg placeholder-text-gray-400 pl-10 pr-2 py-1" placeholder="Search" />
                  </div>
                </div>

                <div>
                  <!-- list -->
                  <div class="flex flex-col mt-6">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                          <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                              <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  EVENT NAME:
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  DATE:
                                </th>

                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  CONTACT:
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  EMAIL:
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  STATUS:
                                </th>

                              </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                              <?php
                              // Retrieve rows from the 'applied_events' table based on the user's name stored in the $query variable.
                              $event = new DatabaseTable('applied_events');
                              $row = $event->find('name', $query['name']);
                              foreach ($row as $row1) {
                              ?>
                                <tr>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 capitalize">
                                      <?php echo $row1['event']; ?>
                                    </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 capitalize">
                                      <?php echo $row1['date']; ?>
                                    </div>
                                  </td>


                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> <?php echo $row1['contact']; ?></div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                      <?php echo $row1['email']; ?>
                                    </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs font-normal rounded-full capitalize">
                                      Approved
                                    </span>
                                  </td>

                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="flex justify-end mt-5">

                <button onclick="handelEvent()" class="bg-gray-300 hover:bg-red-400 py-2 px-4 rounded">
                  Cancel
                </button>
              </div>
            </div>
          </div>
        </div>
        <!--Nutrition Plan-->
        <div id="AppointmentOverlay" class="hidden fixed inset-0 flex items-center justify-center space-x-4">
          <div class="absolute bg-black opacity-60 inset-0"></div>
          <div class="relative bg-white p-8 shadow-lg rounded-lg w-full">
            <h1 class="text-2xl font-semibold mb-4">View My Appointments</h1>

            <div class="w-full p-8 overflow-y-auto">
              <div class="mt-6">
                <div class="flex justify-between">
                  <span class="text-xl font-medium text-textBlack">MY APPOINTMENTS</span>
                  <div class="relative">
                    <svg class="h-6 w-6 fill-gray-500 absolute left-2.5 top-2" viewBox="0 0 24 24">
                      <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z" />
                    </svg>
                    <input id="search" type="text" class="h-10 w-80 border bg-transparent border-gray-500 rounded-lg placeholder-text-gray-400 pl-10 pr-2 py-1" placeholder="Search" />
                  </div>
                </div>

                <div>
                  <!-- list -->
                  <div class="flex flex-col mt-6">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                          <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                              <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  S.N
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Appointment With
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Department
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Appointment Date
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Appointment Time
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Contact
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Problem
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  STATUS
                                </th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                              <?php
                              // Retrieve rows from the 'appointment' table based on the user's name stored in the $query variable.
                              $event = new DatabaseTable('appointment');
                              $row = $event->find('username', $query['name']);
                              foreach ($row as $row1) {
                              ?>
                                <tr>
                                  <td class="px-6 py-4 whitespace-nowrap">1</td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <?php echo $row1['provider']; ?>
                                  </td>

                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 capitalize">
                                      Health Service Department
                                    </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> <?php echo $row1['date']; ?></div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> <?php echo $row1['time']; ?></div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> <?php echo $row1['contact']; ?></div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                      <?php echo $row1['problem']; ?>
                                    </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs font-normal rounded-full capitalize">
                                      <?php echo $row1['status']; ?>
                                    </span>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-4">
                                      <div class="bg-green-500 hover:bg-red-400 text-white px-2 py-1 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="flex justify-end mt-5">

              <button onclick="handelAppointment()" class="bg-gray-300 hover:bg-red-400 py-2 px-4 rounded">
                Cancel
              </button>
            </div>
          </div>
        </div>

      </section>
      <script>
        // Functions to open respective overlays by removing the "hidden" class from the corresponding elements.
        function openSettings() {
          var settingsOverlay =
            document.getElementById("settingsOverlay");
          settingsOverlay.classList.remove("hidden");
        }

        function viewHealthPlan() {
          var planOverlay =
            document.getElementById("planOverlay")
          planOverlay.classList.remove("hidden")
        }

        function viewNutritionPlan() {
          var NutritionPlanOverlay =
            document.getElementById("NutritionPlanOverlay")
          NutritionPlanOverlay.classList.remove("hidden")
        }

        function viewEvent() {
          var EventOverlay =
            document.getElementById("EventOverlay")
          EventOverlay.classList.remove("hidden")
        }

        function viewAppointment() {
          var AppointmentOverlay =
            document.getElementById("AppointmentOverlay")
          AppointmentOverlay.classList.remove("hidden")
        }
        // Function to handle saving changes and log a message to the console.
        function handleSave() {
          console.log("Changes saved!");
        }

        // Functions to handle cancelling changes, log a message to the console, and hide corresponding overlays.
        function handleCancel() {
          console.log("Changes cancelled");
          var settingsOverlay =
            document.getElementById("settingsOverlay");
          settingsOverlay.classList.add("hidden");
        }

        function handleCancelPlan() {
          console.log("Changes cancelled");
          var planOverlay =
            document.getElementById("planOverlay");
          planOverlay.classList.add("hidden");
        }

        function handelNutrition() {
          console.log("Changes cancelled")
          var NutritionPlanOverlay =
            document.getElementById("NutritionPlanOverlay")
          NutritionPlanOverlay.classList.add("hidden")
        }

        function handelEvent() {
          console.log("Changes cancelled")
          var EventOverlay =
            document.getElementById("EventOverlay")
          EventOverlay.classList.add("hidden")
        }

        function handelAppointment() {
          console.log("Changes cancelled")
          var AppointmentOverlay =
            document.getElementById("AppointmentOverlay")
          AppointmentOverlay.classList.add("hidden")
        }

        // Variables to toggle the visibility of the password form.
        const togglePasswordForm =
          document.getElementById("togglePasswordForm");
        const passwordForm = document.getElementById("passwordForm");

        // Event listener to toggle the display of the password form when 'togglePasswordForm' is clicked.
        togglePasswordForm.addEventListener("click", () => {
          if (passwordForm.style.display === "none") {
            passwordForm.style.display = "block";
          } else {
            passwordForm.style.display = "none";
          }
        });
      </script>
    </div>
  </div>
</section>