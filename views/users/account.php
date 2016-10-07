<div class="modal fade" id="userAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Account</h4>
        <a class="profileEdit">Edit</a>
      </div>
      <div class="modal-body">
        
        <div class="container-fluid userPhotos">
            Your Photos
            <table>
                <tr>
                    <td><img src="/img/placeholder-small.png" class="itemsImg"></td>
                    <td><img src="/img/placeholder-small.png" class="itemsImg"></td>
                    <td><img src="/img/placeholder-small.png" class="itemsImg"></td>
                </tr>
            </table>
        </div>

        <div class="editAcc">
            <form method="POST" class="editForm" action="/userEdit">
                <input type="text" value="<?=$name?>" name="name" placeholder="Your Name" class="inputs" required="true">
                <input type="hidden" value="<?=$email?>" name="email" placeholder="Email" class="inputs" required="true">
                <input type="password" name="password" placeholder="Password" class="inputs">
                <input type="password" name="newPassword" placeholder="New Password" class="inputs" required="true">
                <input type="password" name="conPassword" placeholder="Confirm Password" class="inputs" required="true">
                <a href="/userEdit" title=""><button  type="submit" class="logInBtn">Submit</button></a>
            </form>
        </div>

      </div>
    </div>
  </div>
</div>