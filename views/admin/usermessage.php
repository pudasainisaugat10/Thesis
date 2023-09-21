<?php
// Process a form submission to update a message's reply in the 'messages' table and display a success alert.
if (isset($_POST['submit'])) {
    $message = new DatabaseTable('messages');
    $data = [
        'reply' => $_POST['reply'],
        'id' => $_POST['id']
    ];
    $message->update($data, 'id');
    echo '<script language="javascript">';
    echo 'alert("Message replyed successfully")';

    echo '</script>';
}

?>

<div class="w-3/4 p-8 overflow-y-auto">
    <div class="mt-6">
        <div class="flex justify-between">
            <span class="text-xl font-medium text-textBlack">
                USER MESSAGE LIST
            </span>
            <div class="relative">
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
                                            User Name:
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Message:
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Date:
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Reply:
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Action:
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php
                                    $event = new DatabaseTable('messages');
                                    $row = $event->findAll();
                                    foreach ($row as $row1) {
                                    ?>

                                        <tr>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="">
                                                        <div class="text-sm font-medium text-gray-900 capitalize">

                                                            <?php
                                                            $user = new DatabaseTable('users');
                                                            $row = $user->find('id', $row1['user_id']);
                                                            $data = $row->fetch();


                                                            echo $data['name']; ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 capitalize">
                                                    <?php echo $row1['message']; ?>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 capitalize">
                                                    <?php echo $row1['date']; ?>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <?php
                                                if (isset($row1['reply'])) {

                                                ?>
                                                    <div class="text-sm text-gray-900 capitalize">
                                                        <?php echo $row1['reply']; ?>
                                                    </div>
                                                <?php } else {

                                                ?>

                                                    <form action="" method="POST">
                                                        <input type="hidden" name="id" value=" <?php echo $row1['id']; ?>">
                                                        <textarea id="content" name="reply" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required></textarea>
                                                        <input type="submit" name="submit" value="Reply" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                    </form>
                                                <?php } ?>
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
</div>
