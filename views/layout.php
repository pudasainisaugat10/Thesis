<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <title>Home</title>
</head>

<body>
  <nav class="bg-green-600 h-[60px] md:px-20 px-2 flex justify-between items-center">
    <h1 class="text-white font-medium">HEALTHFUL HUB</h1>
    <div class="hidden xl:flex items-center">
      <ul class="flex">
        <li class="mx-4">
          <a class="text-white hover:text-black font-medium" href="?page=home">Home</a>
        </li>
        <?php
        if (isset($_SESSION['login'])) {
        ?>
          <li class="mx-4">

            <a class="text-white hover:text-black font-medium" href="?page=profile">Profile</a>
          </li>
        <?php } ?>
        <li class="mx-4">
          <a class="text-white hover:text-black font-medium" href="?page=service">Services</a>
        </li>
        <li class="mx-4">
          <a class="text-white hover:text-black font-medium" href="?page=nutrition">Nutrition</a>
        </li>
        <li class="mx-4">
          <a class="text-white hover:text-black font-medium" href="?page=challenges">Challanges/Events</a>
        </li>
        <li class="mx-4">
          <a class="text-white hover:text-black font-medium" href="?page=article">Articles</a>
        </li>
        <li class="mx-4">
          <a class="text-white hover:text-black font-medium" href="?page=support">Community/Support</a>
        </li>
      </ul>
      <div>
        <?php
        if (isset($_SESSION['login'])) {
        ?>

          <a class="hidden xl:flex items-center px-12 border-l font-semibold font-heading text-white hover:text-black" href="?page=logout">
            <svg class="mr-3" width="32" height="31" viewBox="0 0 32 31" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.0006 16.3154C19.1303 16.3154 21.6673 13.799 21.6673 10.6948C21.6673 7.59064 19.1303 5.07422 16.0006 5.07422C12.871 5.07422 10.334 7.59064 10.334 10.6948C10.334 13.799 12.871 16.3154 16.0006 16.3154Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M24.4225 23.8963C23.6678 22.3507 22.4756 21.0445 20.9845 20.1298C19.4934 19.2151 17.7647 18.7295 15.9998 18.7295C14.2349 18.7295 12.5063 19.2151 11.0152 20.1298C9.52406 21.0445 8.33179 22.3507 7.57715 23.8963" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <span>Logout</span>
          </a>
        <?php } else { ?>
          <a class="hidden xl:flex items-center px-12 border-l font-semibold font-heading text-white hover:text-black" href="?page=login">
            <svg class="mr-3" width="32" height="31" viewBox="0 0 32 31" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.0006 16.3154C19.1303 16.3154 21.6673 13.799 21.6673 10.6948C21.6673 7.59064 19.1303 5.07422 16.0006 5.07422C12.871 5.07422 10.334 7.59064 10.334 10.6948C10.334 13.799 12.871 16.3154 16.0006 16.3154Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M24.4225 23.8963C23.6678 22.3507 22.4756 21.0445 20.9845 20.1298C19.4934 19.2151 17.7647 18.7295 15.9998 18.7295C14.2349 18.7295 12.5063 19.2151 11.0152 20.1298C9.52406 21.0445 8.33179 22.3507 7.57715 23.8963" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <span>Sign In</span>
          </a>
        <?php } ?>
      </div>
      <!-- Notification -->
      <!-- <div>
          <div
            aria-live="assertive"
            class="fixed top-6 inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start"
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
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                      <p class="text-sm font-medium text-gray-900">Alert</p>
                      <p class="mt-1 text-sm text-gray-500">
                        Admin approved tou paln
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
    </div>
    <button class="navbar-burger self-center xl:hidden">
      <svg width="35" height="35" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect class="text-white" width="32" height="32" rx="6" fill="currentColor"></rect>
        <path class="text-coolGray-500" d="M7 12H25C25.2652 12 25.5196 11.8946 25.7071 11.7071C25.8946 11.5196 26 11.2652 26 11C26 10.7348 25.8946 10.4804 25.7071 10.2929C25.5196 10.1054 25.2652 10 25 10H7C6.73478 10 6.48043 10.1054 6.29289 10.2929C6.10536 10.4804 6 10.7348 6 11C6 11.2652 6.10536 11.5196 6.29289 11.7071C6.48043 11.8946 6.73478 12 7 12ZM25 15H7C6.73478 15 6.48043 15.1054 6.29289 15.2929C6.10536 15.4804 6 15.7348 6 16C6 16.2652 6.10536 16.5196 6.29289 16.7071C6.48043 16.8946 6.73478 17 7 17H25C25.2652 17 25.5196 16.8946 25.7071 16.7071C25.8946 16.5196 26 16.2652 26 16C26 15.7348 25.8946 15.4804 25.7071 15.2929C25.5196 15.1054 25.2652 15 25 15ZM25 20H7C6.73478 20 6.48043 20.1054 6.29289 20.2929C6.10536 20.4804 6 20.7348 6 21C6 21.2652 6.10536 21.5196 6.29289 21.7071C6.48043 21.8946 6.73478 22 7 22H25C25.2652 22 25.5196 21.8946 25.7071 21.7071C25.8946 21.5196 26 21.2652 26 21C26 20.7348 25.8946 20.4804 25.7071 20.2929C25.5196 20.1054 25.2652 20 25 20Z" fill="currentColor"></path>
      </svg>
    </button>
  </nav>

  <?php echo $content; ?>


  <footer>
    <section>
      <div class="bg-green-600 h-[60px] md:px-20 px-2 flex justify-between items-center text-white">
        <span class="text-sm md:text-base">
          © 2023 HealthFul-Hub. All rights reserved.
        </span>

        <div class="flex justify-center items-center space-x-4 py-4">
          <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" class="text-white hover:text-gray-700">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M13.77 9.14h-2.01v3.3h2.01v9.72h4.38v-9.72h2.95l.35-3.3h-3.3V6.19c0-.8.22-1.34 1.37-1.34h1.98V.31h-2.67c-2.87 0-4.18 1.36-4.18 3.8v2.03H9.04v3.3h2.03v9.73z"></path>
            </svg>
          </a>
          <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer" class="text-white hover:text-gray-700">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M17.5 4.5H6.5a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-11a2 2 0 0 0-2-2zm-1.1 2.9a.9.9 0 1 1 1.8 0 .9.9 0 0 1-1.8 0zM12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 1.8a3.2 3.2 0 1 1 0 6.4 3.2 3.2 0 0 1 0-6.4z"></path>
            </svg>
          </a>
          <a href="https://www.twitter.com" target="_blank" rel="noopener noreferrer" class="text-white hover:text-gray-700">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M22.46 5.37a9.77 9.77 0 0 1-2.8.77 4.88 4.88 0 0 0 2.14-2.7 9.75 9.75 0 0 1-3.1 1.2 4.88 4.88 0 0 0-8.3 4.44A13.87 13.87 0 0 1 2 4.73a4.87 4.87 0 0 0 1.5 6.5A4.84 4.84 0 0 1 0 11.64v.06a4.88 4.88 0 0 0 2.2 4.08 4.88 4.88 0 0 1-2.21-.61v.06a4.87 4.87 0 0 0 3.9 4.77 4.86 4.86 0 0 1-2.2.08 4.88 4.88 0 0 0 4.55 3.38A9.84 9.84 0 0 1 0 22.44 13.8 13.8 0 0 0 7.54 24c9.09 0 14.07-7.53 14.07-14.07 0-.21 0-.42-.01-.63A9.93 9.93 0 0 0 24 5.43v-.46a7.1 7.1 0 0 0 1.63-1.79l-.6-.29A4.9 4.9 0 0 1 22.46 5.37z"></path>
            </svg>
          </a>
        </div>
        <span class="text-sm md:text-base">
          <span>Powered by</span>
          <span class="ml-1">Company </span>
        </span>
      </div>

    </section>
  </footer>

</html>