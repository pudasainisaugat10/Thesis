<?php
// Process a form submission to save a new event in the 'events' table, including handling image upload, and display a success alert followed by a page refresh.

$article = new DatabaseTable('events');


if (isset($_POST['submit'])) {
  $image = file_get_contents($_FILES['image']['tmp_name']);
  $data = [
    'name' => $_POST['name'],
    'date' => $_POST['date'],
    'time' => $_POST['time'],
    'contact' => $_POST['contact'],
    'location' => $_POST['location'],
    'image' => $image,
    'content' => $_POST['content'],
    'status' => $_POST['status']

  ];

  $article->save($data, 'id');
  echo '<script language="javascript">';
  echo 'alert("New article added")';
  echo 'location.reload()';
  echo '</script>';
}

?>
<div class="w-3/4 p-8 overflow-y-auto">
  <div class="mt-6">
    <div class="flex justify-between">
      <span class="text-xl font-medium text-textBlack">
        Event LIST
      </span>
      <div class="relative">
        <a href="?page=appliedevents">View Applied Events</a>
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
                      Event Id:
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Name:
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Location:
                    </th>

                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Date:
                    </th>

                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Time:
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Contact:
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Status:
                    </th>
                    <th></th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <?php
                  $event = new DatabaseTable('events');
                  $row = $event->findAll();
                  foreach ($row as $row1) {
                  ?>
                    <tr>

                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                          <div class="">
                            <div class="text-sm font-medium text-gray-900 capitalize">
                              <?php echo $row1['id']; ?>
                              <img class="img-responsive" width="50px" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($row1['image']) ?>" alt="News">

                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 capitalize">
                          <?php echo $row1['name']; ?>
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 capitalize">
                          <?php echo $row1['location']; ?>
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 capitalize">
                          <?php echo $row1['date']; ?>
                        </div>
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"> <?php echo $row1['time']; ?></div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"> <?php echo $row1['contact']; ?></div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"> <?php echo $row1['status']; ?></div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end space-x-4">
                          <a href="?page=editevents&id=<?php echo $row1['id']; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil mt-1 mr-1" viewBox="0 0 16 16">
                              <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                            </svg>
                          </a>
                          <a href="?page=deleteevents&did=<?php echo $row1['id']; ?>" class="bg-green-500 hover:bg-red-400 text-white px-2 py-1 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                          </a>
                        </div>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-6">
    <div class="text-xl font-medium text-textBlack mb-4">ADD EVENT</div>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="w-1/2">
        <div class="w-full mt-4">
          <label for="title" class="block text-sm font-medium text-gray-700">Name:</label>
          <input type="text" id="title" name="name" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required />
        </div>

        <div class="w-full mt-4">
          <label for="content2" class="block text-sm font-medium text-gray-700">LOCATION:</label>
          <input type="text" id="content2" name="location" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required />
        </div>

        <div class="w-full mt-4">
          <label for="content" class="block text-sm font-medium text-gray-700">Content:</label>
          <textarea id="content" name="content" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required> </textarea>
        </div>

        <div class="w-full mt-4">
          <label for="contact" class="block text-sm font-medium text-gray-700">CONTACT:</label>
          <input type="text" id="contact" name="contact" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required />
        </div>

        <div class="w-full mt-4">
          <label for="date" class="block text-sm font-medium text-gray-700">EVENT DATE:</label>
          <input type="date" name="date" id="date" class="mt-1 p-2 border border-gray-300 rounded bg-white" required />
        </div>

        <div class="w-full mt-4">
          <label for="image" class="block text-sm font-medium text-gray-700">EVENT IMAGE:</label>
          <input type="file" name="image" id="image" class="mt-1 p-2 border border-gray-300 rounded bg-white" required />
        </div>

        <div class="w-full mt-4">
          <label for="time" class="block text-sm font-medium text-gray-700">EVENT TIME:</label>
          <input type="text" id="time" name="time" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required />
        </div>

        <div class="w-full mt-4">
          <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
          <select id="status" name="status" class="border rounded px-2 py-1 w-1/2" required>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>

          </select>
        </div>

        <div class="w-full mt-6">
          <input type="submit" name="submit" value="Add Event" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

        </div>
      </div>
    </form>
  </div>
</div>
</div>
</body>

</html>