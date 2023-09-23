<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<?php
// Process a form submission to save a message in the 'messages' table and display a success alert.
$message = new DatabaseTable('messages');


?>

<div class="bg-gray-100 min-h-screen py-12 px-4">
  <div class="max-w-3xl mx-auto bg-white rounded shadow p-6">
    <h1 class="text-2xl font-semibold mb-4">Support</h1>
    <p class="mb-6">
      Need help? Find answers to common questions or reach out to our
      support team for assistance.
    </p>
    <div class="bg-gray-200 p-4 rounded">
      <h2 class="text-lg font-semibold mb-2">Frequently Asked Questions</h2>
      <p class="mb-4 text-gray-600">
        Check out these common questions to find solutions to your issues.
      </p>
      <ul class="list-disc pl-6">
        <li id="resetPasswordLink" class="cursor-pointer text-blue-500 underline">How do I reset my password?</li>
        <div id="passwordResetModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
          <div class="absolute bg-black opacity-60 inset-0"></div>
          <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <!-- Modal content goes here -->
            <div class="modal-content py-4 text-left px-6 flex flex-col">
              <p class="text-xl font-medium py-2">Instructions on how to reset your password</p>
              <p1 class="font-light">1. Go to profile page.</p1>
              <p2 class="font-light">2. Go to Account Settings and click setting button.</p2>
              <p3 class="font-light">3. Click on change your account password.</p3>
              <p4 class="font-light">4. Enter your current password.</p4>
              <p5 class="font-light">5. Enter new password and then confirm your password.</p5>
              <p6 class="font-light">6. Then click save & change button to change password. </p6>
            </div>
            <div class="flex justify-end p-3">
              <button onclick="handleHide()" class="bg-green-600 hover:bg-gray-600 text-white text-base font-medium rounded-md py-2 px-4 shadow-sm ">
                Close
              </button>
            </div>
          </div>
        </div>
        <li id="paymentLink" class="cursor-pointer text-blue-500 underline">What payment methods do you accept?</li>
        <div id="paymentModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
          <div class="absolute bg-black opacity-60 inset-0"></div>
          <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <!-- Modal content goes here -->
            <div class="modal-content py-4 text-left px-6 flex flex-col">
              <p class="text-xl font-medium py-2">Pyment Methods we accept</p>
              <p1 class="font-light">1. Online khali Payment</p1>
            </div>
            <div class="flex justify-end p-3">
              <button onclick="handleHidePayment()" class="bg-green-600 hover:bg-gray-600 text-white text-base font-medium rounded-md py-2 px-4 shadow-sm ">
                Close
              </button>
            </div>
          </div>
        </div>
      </ul>
    </div>
    <div class="mt-4 bg-gray-200 p-4 rounded">
      <h2 class="text-lg font-semibold mb-2">Contact Us</h2>
      <p class="mb-4 text-gray-600">
        If you couldn't find an answer in our FAQs, feel free to get in
        touch.
      </p>
      <p class="mb-2">Email: support@healthfulhub.com</p>
      <p>Phone: 9812345678</p>
    </div>
    <div class="mt-4 bg-gray-200 p-4 rounded">
      <h2 class="text-lg font-semibold mb-2">Chat Support</h2>
      <p class="mb-4 text-gray-600">
        Chat with our support team for any queries.
      </p>
      <div class="container mx-auto mt-8">
        <?php
        if (isset($_SESSION['login'])) {
        ?>

          <button id="showChatBtn" class="bg-red-500 hover:bg-gray-600 text-white font-semibold px-4 py-2 rounded">
            Open Chat
          </button>
        <?php } else {

        ?>
          <a href="?page=login" class="bg-red-500 hover:bg-gray-600 text-white font-semibold px-4 py-2 rounded">
            Login to Chat
          </a>
        <?php } ?>
      </div>
      <?php
      if (isset($_SESSION['login'])) {
      ?>
        <div id="chatBox" class="fixed bottom-0 right-4 w-72 bg-white border-t border-gray-300 transform translate-y-full transition duration-300 ease-in-out">
          <div class="px-4 py-2 bg-red-500 text-white font-semibold">
            Admin Chat
            <button id="closeChatBtn" class="float-right text-sm ">
              Close
            </button>
          </div>
          <div class="px-4 py-2 h-48 overflow-y-auto border-t border-gray-300">
            <!-- Chat messages will go here -->
            <div class="mb-2">
              <div class="text-sm font-semibold">Admin:</div>
              <div class="bg-gray-100 p-2 rounded-lg">
                Hello! How can I assist you today?
              </div>
            </div>

            <?php

            $event = new DatabaseTable('messages');
            $row = $event->findMultiple();

            foreach ($row as $row1) {
            ?>
              <div class="mb-2 float-right">

                <div class="bg-blue-100 p-2 rounded-lg">
                  <?php echo $row1['message']; ?>
                </div>
              </div>

              <?php if (isset($row1['reply'])) { ?>
                <div class="mb-2 mt-10">
                  <div class="text-sm font-semibold">Admin:</div>
                  <div class="bg-gray-100 p-2 rounded-lg">
                    <?php echo $row1['reply']; ?>
                  </div>
                </div>
            <?php }
            } ?>
            <br>

            <div class="mb-2 float-right">

              <div class="bg-blue-100 p-2 rounded-lg" id="dm" style="display: none;">
                <div class="append-message"> &nbsp; </div>
              </div>
            </div>

            <div class="mb-2 mt-10" id="adminmessage" style="display: none;">
              <div class="text-sm font-semibold">Admin:</div>
              <div class="bg-gray-100 p-2 rounded-lg">
                Hi, How can I help you?
              </div>
            </div>



          </div>
          <div class="px-4 py-2 border-t border-gray-300">

            <input type="text" name="message" id="message" placeholder="Type your message..." class="w-full border rounded px-2 py-1" />
            <input type="submit" name="submit" id="submit" value="send" class="mt-2 bg-red-500 text-white font-semibold px-3 py-1 rounded float-right">


          </div>
        </div>

      <?php } ?>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    $("#submit").click(function() {

      var message = $("#message").val();


      $.ajax({
        type: "POST",
        url: "?page=submitMessage",
        data: {
          message: message
        },
        cache: false,
        success: function(data) {

          $("#dm").show();
          $(".append-message").append(message);
          $("#adminmessage").show();
          $("#message").val("");

        },
        error: function(xhr, status, error) {
          console.error(xhr);
        }
      });

    });

  });
</script>



<script>
  // Functions to hide modal elements by adding the "hidden" class.
  function handleHide() {
    document.getElementById("passwordResetModal").classList.add("hidden");
  }

  function handleHidePayment() {
    document.getElementById("paymentModal").classList.add("hidden");
  }
  // Variables for showing and hiding a chat box and buttons.
  const showChatBtn = document.getElementById("showChatBtn");
  const chatBox = document.getElementById("chatBox");
  const closeChatBtn = document.getElementById("closeChatBtn");

  // Event listeners to show and hide the chat box by adding or removing the "translate-y-full" class.
  showChatBtn.addEventListener("click", () => {
    chatBox.classList.remove("translate-y-full");
  });

  closeChatBtn.addEventListener("click", () => {
    chatBox.classList.add("translate-y-full");
  });

  // Event listener to display the password reset modal by removing the "hidden" class.
  const resetPasswordLink = document.getElementById('resetPasswordLink');
  const passwordResetModal = document.getElementById('passwordResetModal');

  resetPasswordLink.addEventListener('click', () => {
    passwordResetModal.classList.remove('hidden');
  });

  // Event listener to display the payment modal by removing the "hidden" class.
  const paymentLink = document.getElementById('paymentLink');
  const paymentModal = document.getElementById('paymentModal');

  paymentLink.addEventListener('click', () => {
    paymentModal.classList.remove('hidden');
  });
</script>

</body>