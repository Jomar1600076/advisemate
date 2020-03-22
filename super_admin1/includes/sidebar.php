<div class="sidebar-fixed position-fixed d-flex flex-column">
    <div class="list-group list-group-flush mt-5">
        <a href="#" class="list-group-item waves-effect disabled">
        <i class="fas fa-user mr-3"></i><?php echo $_SESSION["sAdmin_name"]; ?>
        </a>
    </div>

    <div class="list-group list-group-flush mt-5" id="sidebar">
      <a href="index.php" class="list-group-item list-group-item-action waves-effect">
        <i class="fas fa-chart-pie mr-3"></i>Home
      </a>
      <a href="saUnitChairs.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-chalkboard-teacher mr-3"></i>Unit Chair</a>
      <a href="saAdvisers.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users mr-3"></i>Adviser</a>
      <a href="saStudents.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-book-open mr-3"></i>Students</a>
    </div>
</div>
