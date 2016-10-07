<div class="editUserPhotos">
	<img src="/img/placeholder-small.png" class="editPhoto">
    <form method="POST" class="editForm">
        <input type="text" name="name" placeholder="Title" class="inputs" required="true">
        <input type="number" name="price" placeholder="Asking Price" class="inputs" required="true">
        <textarea name="description" placeholder="Description" class="inputs"></textarea>
        <label for="catagories">What is the Genre of your photo?</label>
        <select class="catagories" name="category">
            <option value="animals">Animals</option>
            <option value="architectural" selected>Architectural</option>
            <option value="cars">Cars</option>
            <option value="nature" selected>Nature</option>
            <option value="portraits">Portraits</option>
            <option value="sports" selected>Sports</option>
            <option value="other" selected>Other</option>
        </select>
        <br>
        <button type="submit" class="logInBtn">Edit</button>
    </form>
</div>
