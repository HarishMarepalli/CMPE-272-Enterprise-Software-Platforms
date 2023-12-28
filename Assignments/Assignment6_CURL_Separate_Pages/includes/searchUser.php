<!-- The Modal -->
<div class="modal fade" id="searchModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Enter any of the details below to search</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="users.php" method="post">
            <input type="text" class="form-control" name="searchName" placeholder="Name"><br/>
            <input type="email" class="form-control" name="searchEmailID" placeholder="Email"><br/>
            <input type="tel" class="form-control" name="searchPhone" placeholder="Phone"><br/>
            <div class="searchContainer">
                <input type="submit" name="Search" class="searchSubmitBtn searchmodal-submit" value="Submit">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>