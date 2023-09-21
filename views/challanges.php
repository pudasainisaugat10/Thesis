<?php
// Process event application form submission and display a success alert when the 'submit' button is clicked.
$article = new DatabaseTable('applied_events');

if (isset($_POST['submit'])) {

  $data = [
    'name' => $_POST['name'],
    'contact' => $_POST['contact'],
    'email' => $_POST['email'],
    'event' => $_POST['event'],
    'date' => $_POST['date']
  ];

  $article->save($data, 'id');
  echo '<script language="javascript">';
  echo 'alert("Event Successfully Applied...")';
  echo '</script>';
}
?>

<section class="p-4 sm:p-6 md:p-8 lg:p-10 xl:p-12">
  <div class="flex flex-col mx-auto py-4">
    <div class="flex justify-center items-center mb-6">
      <hr class="h-1 w-16 bg-green-600 mx-2" />
      <h1 class="text-4xl font-bold">Health Programs and Events</h1>
      <hr class="h-1 w-16 bg-blue-600 mx-2" />
    </div>

    <!-- Content 1 -->
    <?php
    $event = new DatabaseTable('events');
    $row = $event->findAll();
    foreach ($row as $row1) {
    ?>
      <div class="flex bg-green-300 w-2/3 mx-auto rounded-lg hover:bg-red-200 hover:scale-110 hover:shadow-xl transform duration-300">
        <h1 class="px-20 py-14 text-xl font-medium"><?php echo $row1['name']; ?></h1>

        <div class="flex-1 mt-24 -ml-40">
          <h1>
            <?php echo $row1['content']; ?>
          </h1>
          <div class="flex flex-row justify-evenly mt-5">
            <div class="flex flex-col items-center">
              <div class="font-light text-blue-500 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-calendar-range mt-1" viewBox="0 0 16 16">
                  <path d="M9 7a1 1 0 0 1 1-1h5v2h-5a1 1 0 0 1-1-1zM1 9h4a1 1 0 0 1 0 2H1V9z" />
                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                </svg>
                <span class="ml-1">Date:</span>
              </div>
              <p class="text-gray-600"><?php echo $row1['date']; ?></p>
            </div>

            <div class="flex flex-col items-center">
              <div class="font-light text-blue-500 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                  <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                </svg>
                <span class="ml-1">Time:</span>
              </div>
              <p class="text-gray-600"><?php echo $row1['time']; ?></p>
            </div>

            <div class="flex flex-col items-center">
              <div class="font-light text-blue-500 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                  <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                </svg>
                <span class="ml-1">Location:</span>
              </div>
              <p class="text-gray-600"><?php echo $row1['location']; ?></p>
            </div>

            <div class="flex flex-col items-center">
              <div class="font-light text-blue-500 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                  <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                </svg>
                <span class="ml-1">Contact:</span>
              </div>
              <p class="text-gray-600"><?php echo $row1['contact']; ?></p>
            </div>
          </div>
        </div>

        <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($row1['image']) ?>" alt="" class="w-96 h-auto" />
      </div>
      <br>
      <hr>
      <br>


    <?php
    }
    ?>


    <div class="flex justify-center items-center px-10 mt-10">
      <button onclick="showJoinForm()" class="bg-green-500 text-white font-medium rounded-md py-2 px-4 shadow-sm hover:bg-gray-600">
        Join Events
      </button>
    </div>
    <div id="joinForm" class="hidden fixed inset-0 flex items-center justify-center">
      <!-- Existing backdrop and form container -->

      <!-- Form Content -->
      <div class="relative bg-white p-8 shadow-lg rounded-lg w-1/2">
        <h2 class="text-2xl font-semibold mb-4 flex justify-center">
          Join the Event
        </h2>
        <form action="" method="POST">
          <div class="mb-4">
            <label class="block font-semibold mb-2">Name:</label>
            <input type="text" name="name" class="border rounded px-2 py-1 w-1/2" required />
          </div>

          <div class="mb-4">
            <label class="block font-semibold mb-2">Contact Number:</label>
            <input type="tel" name="contact" class="border rounded px-2 py-1 w-1/2" required />
          </div>

          <div class="mb-4">
            <label class="block font-semibold mb-2">Email:</label>
            <input type="email" name="email" class="border rounded px-2 py-1 w-1/2" required />
          </div>

          <div class="mb-4 py-2">
            <label class="block font-semibold mb-2">Select Events:</label>
            <div class="flex flex-col">

              <?php
              $event = new DatabaseTable('events');
              $row = $event->findAll();
              foreach ($row as $row1) {
              ?>
                <label>
                  <input type="checkbox" name="event" value="<?php echo $row1['name']; ?>" class="mr-1" />
                  <?php echo $row1['name']; ?>
                </label>

              <?php } ?>
              <br>
              <div class="mb-4 flex flex-row space-x-4">
                <label for="dob" class="block mb-1">Date:</label>
                <input type="date" name="date" id="date" class="w-1/2 p-2 border border-gray-300 rounded bg-white" required />
              </div>
            </div>
          </div>

          <div class="flex justify-center">
            <input type="submit" name="submit" value="Submit" class="bg-green-500 text-white font-medium rounded-md py-2 px-4 shadow-sm hover:bg-gray-500">
            <button onclick="hideJoinForm()" class="ml-4 bg-red-500 text-white text-base font-medium rounded-md py-2 px-4 shadow-sm hover:bg-red-600">
              Close
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    // Variables for handling the join form and buttons.
    const joinButton = document.getElementById("join-button");
    const joinForm = document.getElementById("join-form");
    const closeButton = document.getElementById("close-button");

    joinButton.addEventListener("click", () => {
      joinForm.classList.remove("hidden");
    });

    closeButton.addEventListener("click", () => {
      joinForm.classList.add("hidden");
    });

    function showJoinForm() {
      document.getElementById("joinForm").classList.remove("hidden");
    }

    function hideJoinForm() {
      document.getElementById("joinForm").classList.add("hidden");
    }
  </script>

</section>
</body>