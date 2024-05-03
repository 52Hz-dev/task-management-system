<div class="topnav">
  <a id="homeLink" class="active" href="http://localhost/task-management/Home">Home</a>
  <a id="categoryLink" href="http://localhost/task-management/Category">Category</a>
  <div class="search-container">
    <form method="POST" action="../Home/searchTask">
      <input type="text" placeholder="Search.." id="getName" name="getName">
      <button type="submit" id="searchButton" name="btnSearch"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
<hr width="100%" size="10px" />
<script>
  $(document).ready(function() {
    $('#getName').on("keyup", function() {
      var getName = $(this).val();
      if (getName.length > 5) {
        setTimeout(document.getElementById("searchButton").click(), 10000);
      }
    });
  });
</script>