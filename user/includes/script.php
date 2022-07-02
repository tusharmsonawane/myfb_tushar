
<!-------------------------- post modal start------------------------------>


<div class="modal fade" id="examplePost" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Post</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="file" class="form-control" name="image">
        </div>
        <div class="modal-footer d-flex justify-content-center">
           <button class="form-control" type="submit" name="Post">Post</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-------------------------- post modal end------------------------------>

<script src="asset/js/all.min.js"></script>
<script src="asset/js/fontawesome.min.js"></script>
<script src="asset/js/search.js"></script>
<script src="asset/js/mdb.min.js"></script>
<script src="asset/js/bootstrap.bundle.min.js"></script>
