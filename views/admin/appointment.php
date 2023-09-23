<?php
// Process a form submission to update the status of an appointment to 'approved' in the 'appointment' table and display a success alert.

if (isset($_POST['submit'])) {
    $article = new DatabaseTable('appointment');
    $data = [

        'status' => 'approved',
        'id' => $_POST['id']
    ];
    $article->update($data, 'id');
    echo '<script language="javascript">';
    echo 'alert("Appointment Approved Successfully")';

    echo '</script>';
}

?>

<div class="w-3/4 p-8 overflow-y-auto">
    <div class="mt-6">
        <div class="flex justify-between">
            <span class="text-xl font-medium text-textBlack">
                APPOINTMENT LIST
            </span>
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
                                            APPOINTMENT ID:
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            USER NAME:
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            PROVIDER:
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            APPOINTMENT DATE:
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            APPOINTMENT TIME:
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            PROBLEM STATEMENT:
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            CONTACT:
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            STATUS:
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php
                                    $appointment = new DatabaseTable('appointment');
                                    $row = $appointment->findAll();
                                    foreach ($row as $row1) {
                                    ?>
                                        <tr>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 capitalize">
                                                    <?php echo $row1['id']; ?>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 capitalize">
                                                    <?php echo $row1['username']; ?>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 capitalize">
                                                    <?php echo $row1['provider']; ?>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900"> <?php echo $row1['date']; ?></div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900"> <?php echo $row1['time']; ?></div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    <?php echo $row1['problem']; ?>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900"> <?php echo $row1['contact']; ?></div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 py-1 inline-flex text-xs font-normal rounded-full capitalize">
                                                    <?php echo $row1['status']; ?>
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex justify-end space-x-4">
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $row1['id']; ?>">
                                                        <?php if ($row1['status'] != 'approved') {

                                                        ?>

                                                            <input name="submit" type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="Approve">
                                                        <?php } ?>
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