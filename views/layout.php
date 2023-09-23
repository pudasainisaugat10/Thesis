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
      
        <?php
        if (isset($_SESSION['login'])) {
        ?>
           
      
      <a class="hidden xl:flex items-center px-12 border-l font-semibold font-heading text-white hover:text-black" href="?page=notification">
        <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
          <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" fill="white"></path>
        </svg>
        <span>Notification</span>
        </a>
      

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
  
    </div>

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