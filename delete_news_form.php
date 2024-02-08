<form method="post" action="delete_news.php">
    <h2>Delete News</h2>
    <label for="delete_news_id">Select news to delete:</label>
    <select name="delete_news_id" required>
        <?php foreach ($news as $item) : ?>
            <option value="<?= $item['id']; ?>"><?= $item['title']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Delete</button>
</form>