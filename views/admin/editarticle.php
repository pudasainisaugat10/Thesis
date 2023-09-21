<?php
// Process a form submission to update an article in the 'article' table and display a success alert.

if (isset($_POST['submit'])) {
    $article = new DatabaseTable('article');
    $data = [
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'author' => $_POST['author'],
        'publishdate' => $_POST['publishdate'],
        'id' => $_POST['id']
    ];
    $article->update($data, 'id');
    echo '<script language="javascript">';
    echo 'alert("Article updated")';

    echo '</script>';
}

?>
<div class="w-3/4 p-8 overflow-y-auto">
    <form action="" method="POST">
        <div class="text-xl font-medium text-textBlack mb-4">EDIT ARTICLE</div>
        <div class="w-full">

            <?php
            // Retrieve article data based on the 'id' from the URL query parameter.

            $getid = $_GET['id'];
            $article = new DatabaseTable('article');
            $row = $article->find('id', $getid);
            $article = $row->fetch();
            ?>
            <input type="hidden" id="articleId" name="id" value="<?php echo $article['id']; ?>" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required />
        </div>
        <div class="w-1/2">
            <div class="w-full mt-4">
                <label for="title" class="block text-sm font-medium text-gray-700">TITLE:</label>
                <input type="text" id="title" name="title" value="<?php echo $article['title']; ?>" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required />
            </div>

            <div class="w-full mt-4">
                <label for="content" class="block text-sm font-medium text-gray-700">CONTENT:</label>
                <input type="text" id="content" name="content" value="<?php echo $article['content']; ?>" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required />
            </div>

            <div class="w-full mt-4">
                <label for="authorName" class="block text-sm font-medium text-gray-700">AUTHOR NAME:</label>
                <input type="text" id="authorName" name="author" value="<?php echo $article['author']; ?>" class="mt-1 px-3 py-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-700" required />
            </div>

            <div class="w-full mt-4">
                <label for="date" class="block text-sm font-medium text-gray-700">DATE:</label>
                <input type="date" name="publishdate" id="date" value="<?php echo $article['publishdate']; ?>" class="mt-1 p-2 border border-gray-300 rounded bg-white" required />
            </div>
            <div class="flex justify-center">
                <div class="mt-6">
                    <input name="submit" type="submit" value="Update Article" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mt-8">
                    <a href="?page=article" class="ml-4 bg-red-500 text-white text-base font-medium rounded-md py-2 px-4 shadow-sm hover:bg-gray-600">
                        Close
                    </a>
                </div>
            </div>


        </div>
    </form>
</div>