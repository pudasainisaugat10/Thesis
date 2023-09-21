<?php
// Process a form submission to save a new (provider) in the 'provider' table, then display a success alert and refresh the page.

$article = new DatabaseTable('provider');

if (isset($_POST['submit'])) {
    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'department' => $_POST['department'],
        'contact' => $_POST['contact'],
        'qualification' => $_POST['qualification'],
        'address' => $_POST['address'],
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
            <span class="text-xl font-medium text-textBlack">PROVIDER LIST
            </span>
        </div>

        <!-- list -->
        <div class="flex flex-col mt-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        PROVIDER ID:
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        FULL NAME:
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        DEPARTMENT:
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        EMAIL:
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ADDRESS:
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        CONTACT:
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        QUALIFICATION:
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        STAUS:
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php
                                $provider = new DatabaseTable('provider');
                                $row = $provider->findAll();
                                foreach ($row as $row1) {
                                ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">

                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 capitalize">
                                                        <?php echo $row1['id']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"> <?php echo $row1['name']; ?></div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                <?php echo $row1['department']; ?>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                <?php echo $row1['email']; ?>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"> <?php echo $row1['address']; ?></div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"> <?php echo $row1['contact']; ?></div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"> <?php echo $row1['qualification']; ?></div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 inline-flex text-xs font-normal rounded-full capitalize">
                                                <?php echo $row1['status']; ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex justify-end space-x-4">
                                                <a href="?page=editprovider&id=<?php echo $row1['id']; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil mt-1 mr-1" viewBox="0 0 16 16">
                                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                    </svg>
                                                </a>
                                                <a href="?page=deleteprovider&did=<?php echo $row1['id']; ?>" class="bg-green-500 hover:bg-red-400 text-white px-2 py-1 rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg>
                                                </a>
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

    <div class="mt-6">
        <div class="text-xl font-medium text-textBlack mb-4">ADD Provider</div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="w-1/2">
                <div class="w-full mt-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">NAME:</label>
                    <input type="text" id="title" name="name" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required />
                </div>

                <div class="w-full mt-4">
                    <label for="content2" class="block text-sm font-medium text-gray-700">EMAIL:</label>
                    <input type="text" id="content2" name="email" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required />
                </div>

                <div class="w-full mt-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">DEPARTMENT:</label>
                    <input type="text" id="content" name="department" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required />
                </div>

                <div class="w-full mt-4">
                    <label for="contact" class="block text-sm font-medium text-gray-700">CONTACT:</label>
                    <input type="text" id="contact" name="contact" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required />
                </div>

                <div class="w-full mt-4">
                    <label for="qui" class="block text-sm font-medium text-gray-700">QUALIFICATION:</label>
                    <input type="text" name="qualification" id="qui" class="mt-1 p-2 border border-gray-300 rounded bg-white" required />
                </div>

                <div class="w-full mt-4">
                    <label for="ad" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" id="ad" name="address" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required />
                </div>

                <div class="w-full mt-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
                    <select id="status" name="status" class="border rounded px-2 py-1 w-1/2" required>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>

                    </select>
                </div>

                <div class="w-full mt-6">
                    <input type="submit" name="submit" value="Add Provider" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                </div>
            </div>
        </form>
    </div>
</div>