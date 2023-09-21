<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet" />
  <title>Admin Dashboard</title>
</head>

<body>
  <!-- Top Bar -->
  <div class="bg-green-600 py-8 px-6 shadow-md">
    <div class="bg-primary flex justify-end items-center mx-auto px-4 h-16 absolute inset-x-0 top-0 space-x-4">
      <span class=" flex-1 text-lg font-normal text-white uppercase">Admin Panel</span>

      <div class="flex justify-end">
        <span class="text-base font-bold text-white mr-2 mt-2">
          Admin
          <!-- Replace this with the actual admin's name -->
        </span>
        <img src="https://images.pexels.com/photos/4009599/pexels-photo-4009599.jpeg?auto=compress&cs=tinysrgb&w=500&h=500&dpr=2" alt="user_image" class="h-10 w-10 bg-white rounded-full shadow" />
      </div>
      <div class="flex items-center">
        <span class="text-base font-bold text-white mr-2">
          Logout</span>
        <a href="?page=logout">
          <div class="w-8 h-8 flex items-center justify-center bg-white hover:bg-red-400 text-primary hover:text-white rounded-lg cursor-pointer shadow hover:scale-110 hover:shadow-xl transform duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path d="M16 13v-2H7V8l-5 4 5 4v-3z" />
              <path d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z" />
            </svg>
          </div>
        </a>
      </div>
    </div>
  </div>

  <!-- Main Content -->

  <div class="flex h-screen">
    <!-- Side Bar -->
    <div class="bg-green-600 text-white w-1/5 p-6 flex h-screen">
      <div class="w-20 bg-white h-full flex flex-col items-center justify-between pb-5 shadow rounded-lg space-y-2">
        <!-- Admin Dashboard Link -->
        <div>
          <a href="?page=home" class="w-12 h-12 flex items-center justify-center hover:bg-red-500 rounded-lg cursor-pointer shadow mt-2 hover:scale-110 hover:shadow-xl transform duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z" />
            </svg>
          </a>
          <p class="text-center text-sm mt-2 text-black">Dash</p>
        </div>

        <!-- userlist Link -->
        <div>
          <a href="?page=users" class="w-12 h-12 flex items-center justify-center hover:bg-yellow-500 hover:text-white rounded-lg text-primary cursor-pointer shadow mt-2 hover:scale-110 hover:shadow-xl transform duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0-2-.897-2-2V6c0-1.103-.897-2-2-2zM8.715 8c1.151 0 2 .849 2 2s-.849 2-2 2-2-.849-2-2 .848-2 2-2zm3.715 8H5v-.465c0-1.373 1.676-2.785 3.715-2.785s3.715 1.412 3.715 2.785V16zM19 15h-4v-2h4v2zm0-4h-5V9h5v2z" />
            </svg>
          </a>
          <p class="text-center text-sm mt-2 text-black">
            UserList</p>
        </div>

        <!-- form list Link -->
        <div>
          <a href="?page=appliedplan" class="w-12 h-12 flex items-center justify-center hover:bg-green-500 hover:text-white rounded-lg text-primary cursor-pointer shadow mt-2 hover:scale-110 hover:shadow-xl transform duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path d="M15 15H3v2h12v-2zm0-8H3v2h12V7zM3 13h18v-2H3v2zm0 8h18v-2H3v2zM3 3v2h18V3H3z" />
            </svg>
          </a>
          <p class="text-center text-sam mt-2 text-black">
            PlanList</p>
        </div>

        <!--article list link -->
        <div>
          <a href="?page=article" class="w-12 h-12 flex items-center justify-center hover:bg-purple-500 hover:text-white rounded-lg text-primary cursor-pointer shadow mt-2 hover:scale-110 hover:shadow-xl transform duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <g>
                <path fill="none" d="M0 0h24v24H0z" />
                <path d="M20 22H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1zM7 6v4h4V6H7zm0 6v2h10v-2H7zm0 4v2h10v-2H7zm6-9v2h4V7h-4z" />
              </g>
            </svg>
          </a>
          <p class="text-center mt-2 text-sm text-black">
            Articles</p>
        </div>

        <!-- event list Link -->
        <div>
          <a href="?page=events" class="w-12 h-12 flex items-center justify-center hover:bg-pink-500 hover:text-white rounded-lg text-primary cursor-pointer shadow mt-2 hover:scale-110 hover:shadow-xl transform duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path d="M19 4h-3V2h-2v2h-4V2H8v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zM5 20V7h14V6l.002 14H5z" />
              <path d="M7 10v2h10V9H7z" />
            </svg>

          </a>
          <p class="text-center mt-2 text-sm text-black">
            Events</p>
        </div>

        <!-- appointment list Link -->
        <div>
          <a href="?page=appointment" class="w-12 h-12 flex items-center justify-center hover:bg-blue-500 hover:text-white rounded-lg text-primary cursor-pointer shadow mt-2 hover:scale-110 hover:shadow-xl transform duration-300">
            <svg width="24" height="24" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2H13.5C14.3284 2 15 2.67157 15 3.5V13.5C15 14.3284 14.3284 15 13.5 15H1.5C0.671573 15 0 14.3284 0 13.5V3.5C0 2.67157 0.671573 2 1.5 2H3V0H4V2H11V0H12V2ZM6 8H3V7H6V8ZM12 7H9V8H12V7ZM6 11H3V10H6V11ZM9 11H12V10H9V11Z" fill="black" />
            </svg>
          </a>
          <p class="text-center text-sm mt-2 text-black">
            ApptList</p>
        </div>

        <!-- provider list Link -->
        <div>
          <a href="?page=provider" class="w-12 h-12 flex items-center justify-center hover:bg-red-200 hover:text-white rounded-lg text-primary cursor-pointer shadow mt-2 hover:scale-110 hover:shadow-xl transform duration-300">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M6 7C6 6.44771 6.44772 6 7 6H16C16.5523 6 17 6.44772 17 7V16C17 16.5523 16.5523 17 16 17H7C6.44771 17 6 16.5523 6 16V7ZM31 32C31 31.4477 31.4477 31 32 31H41C41.5523 31 42 31.4477 42 32V41C42 41.5523 41.5523 42 41 42H32C31.4477 42 31 41.5523 31 41V32ZM30.3913 28.9771L27.2071 25.7929L25.7929 27.2071L28.9771 30.3913L30.3913 28.9771ZM21.6774 20.2632L25.6545 24.2403L24.2403 25.6545L20.2632 21.6774V25.8947H18.2632V18.2632H25.8947V20.2632H21.6774Z" fill="#333333" />
            </svg>
          </a>
          <p class="text-center text-sm mt-2 text-black">
            Provider</p>
        </div>

        <!-- Settings Link -->
        <div>
          <a href="?page=usermessage" class="w-12 h-12 flex items-center justify-center hover:bg-gray-400 hover:text-white rounded-lg text-primary cursor-pointer shadow mt-2 hover:scale-110 hover:shadow-xl transform duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black" class="bi bi-chat" viewBox="0 0 16 16">
              <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
            </svg>
          </a>
          <p class="text-center text-sm mt-2 text-black">
            Message</p>
        </div>
      </div>
    </div>


    </a>
    <?php echo $content; ?> <!-- Notification -->
    <!-- <div>
      <div
        aria-live="assertive"
        class="fixed top-12 inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start"
      >
        <div class="w-full flex flex-col items-center right-4 sm:items-end">
          <div
            class="max-w-sm w-full bg-white mt-2 shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden"
          >
            <div class="p-4">
              <div class="flex items-start">
                <div class="flex-shrink-0">
                  <svg
                    class="h-6 w-6 text-green-400"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    aria-hidden="true"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                  </svg>
                  <svg
                    class="h-6 w-6 text-red-400 fill-red-400"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1"
                    aria-hidden="true"
                  >
                    <path
                      d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"
                    />
                    <path
                      d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"
                    />
                  </svg>
                </div>
                <div class="ml-3 w-0 flex-1 pt-0.5">
                  <p class="text-sm font-medium text-gray-900">
                    New Form Alert
                  </p>
                  <p class="mt-1 text-sm text-gray-500">
                    Usser has applied for healthservice
                  </p>
                </div>
                <div class="ml-4 flex-shrink-0 flex">
                  <button
                    type="button"
                    class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                  >
                    <span class="sr-only">Close</span>
                    <svg
                      class="h-5 w-5"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                      aria-hidden="true"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                      />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
</body>

</html>