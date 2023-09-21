<?php

// Process a form submission to update event information in the 'events' table, including handling image update, and display a success alert.
if (isset($_POST['submit'])) {
  $events = new DatabaseTable('events');
  $image = file_get_contents($_FILES['image']['tmp_name']);
  $data = [
    'name' => $_POST['name'],
    'date' => $_POST['date'],
    'time' => $_POST['time'],
    'contact' => $_POST['contact'],
    'location' => $_POST['location'],
    'content' => $_POST['content'],
    'status' => $_POST['status'],
    'image' => $image,
    'id' => $_POST['id']
  ];
  $events->update($data, 'id');
  echo '<script language="javascript">';
  echo 'alert("Event updated")';

  echo '</script>';
}

?>
<div class="w-3/4 p-8 overflow-y-auto">
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="text-xl font-medium text-textBlack mb-4">EDIT EVENTS</div>
    <div class="w-full">

      <?php
      // Retrieve event data based on the 'id' from the URL query parameter.
      $getid = $_GET['id'];
      $event = new DatabaseTable('events');
      $row = $event->find('id', $getid);
      $data = $row->fetch();
      ?>
      <input type="hidden" id="articleId" name="id" value="<?php echo $data['id']; ?>" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required />
    </div>
    <div class="w-1/2">
      <div class="w-full mt-4">
        <label for="title" class="block text-sm font-medium text-gray-700">Name:</label>
        <input type="text" id="title" value="<?php echo $data['name']; ?>" name="name" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required />
      </div>

      <div class="w-full mt-4">
        <label for="content" class="block text-sm font-medium text-gray-700">LOCATION:</label>
        <input type="text" id="content" value="<?php echo $data['location']; ?>" name="location" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required />
      </div>

      <div class="w-full mt-4">
        <label for="content" class="block text-sm font-medium text-gray-700">Content:</label>
        <textarea id="content" name="content" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required><?php echo $data['content']; ?> </textarea>
      </div>

      <div class="w-full mt-4">
        <label for="contact" class="block text-sm font-medium text-gray-700">CONTACT:</label>
        <input type="text" id="contact" value="<?php echo $data['contact']; ?>" name="contact" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required />
      </div>

      <div class="w-full mt-4">
        <label for="date" class="block text-sm font-medium text-gray-700">EVENT DATE:</label>
        <input type="date" name="date" id="date" value="<?php echo $data['date']; ?>" class="mt-1 p-2 border border-gray-300 rounded bg-white" required />
      </div>


      <div class="w-full mt-4">
        <label for="image" class="block text-sm font-medium text-gray-700">EVENT IMAGE:</label>
        <input type="file" name="image" id="image" class="mt-1 p-2 border border-gray-300 rounded bg-white" required />
      </div>

      <div class="w-full mt-4">
        <label for="time" class="block text-sm font-medium text-gray-700">EVENT TIME:</label>
        <input type="text" id="time" name="time" value="<?php echo $data['time']; ?>" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required />
      </div>



      <div class="w-full mt-4">
        <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
        <select id="status" name="status" class="border rounded px-2 py-1 w-1/2" required>
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>

        </select>
      </div>
      <div class="flex justify-center">
        <div class="mt-6">
          <input type="submit" name="submit" value="Update Event" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

        </div>
        <div class="mt-8">
          <a href="?page=events" class="ml-4 bg-red-500 text-white text-base font-medium rounded-md py-2 px-4 shadow-sm hover:bg-gray-600">
            Close
          </a>
        </div>
      </div>
    </div>
  </form>
</div>