<div class="mx-auto py-12">
    <div class="flex justify-center items-center mb-6">
        <hr class="h-1 w-16 bg-purple-600 mx-2" />
        <h1 class="text-4xl font-bold">Health Article</h1>
        <hr class="h-1 w-16 bg-pink-600 mx-2" />
    </div>
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3 py-24 mx-10 space-x-4">
    <?php
    // Retrieve all records from the 'article' table and iterate through them using a foreach loop.
    $event = new DatabaseTable('article');
    $row = $event->findAll();
    foreach ($row as $row1) {
    ?>
        <div class="bg-white rounded-lg shadow-xl p-6 mb-4 hover:scale-110 hover:shadow-xl transform duration-300 space-x-4">
            <h2 class="text-2xl font-bold mb-2"><?php echo $row1['title']; ?></h2>
            <p class="text-gray-600 mb-4">
            <?php echo $row1['content']; ?>
            </p>
            <div class="flex justify-end space-x-4">
                <div class="font-light text-blue-500 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                    <span class="text-sm font-light ml-1"><?php echo $row1['author']; ?></span>
                </div>
                <div class="font-light text-blue-500 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-calendar-range" viewBox="0 0 16 16">
                        <path d="M9 7a1 1 0 0 1 1-1h5v2h-5a1 1 0 0 1-1-1zM1 9h4a1 1 0 0 1 0 2H1V9z" />
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                    </svg>
                    <span class="text-sm font-light ml-1"><?php echo $row1['publishdate']; ?></span>
                </div>
            </div>
            <a href="#" class="text-blue-500 hover:underline">Read More</a>
        </div>
        <?php } ?>
    
    </div>
</div>