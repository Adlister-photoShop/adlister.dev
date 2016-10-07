<div class="modal fade" id="postPhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Sell Your Photo</h4>
      </div>
      <div class="modal-body">

        <div class="postPhoto">
            <form method="POST" class="editForm">
                <input type="text" name="title" placeholder="Title" class="inputs" required="true">
                <input type="number" name="price" placeholder="Asing Price" class="inputs" required="true">
                <textarea name="description" placeholder="Description" class="inputs"></textarea>
                <label for="catagories">What is the Genre of your photo?</label>
                <select class="catagories" name="forms">
                    <option value="0">Animals</option>
                    <option value="1" selected>Architectural</option>
                    <option value="2">Cars</option>
                    <option value="3" selected>Nature</option>
                    <option value="4">Portraits</option>
                    <option value="5" selected>Sports</option>
                </select>
                <input type="file" name="img_url" class="fileSubmit" required="true">
                <button type="submit" class="logInBtn">Post</button>
            </form>
        </div>

      </div>
    </div>
  </div>
</div>

