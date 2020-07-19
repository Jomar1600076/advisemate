<div class="sidebar-fixed position-fixed d-flex flex-column">
    <div class="list-group list-group-flush mt-5">
        <a href="#" class="list-group-item waves-effect disabled">
        <i class="fas fa-user mr-3"></i><?php echo $_SESSION["chair_fname"]; ?>
        </a>
    </div>

    <div class="list-group list-group-flush mt-5" id="sidebar">
      <a href="index.php" class="list-group-item"
     aria-controls="students">
        <i class="fas fa-chart-pie mr-3"></i>Dashboard
      </a>
      <a href="chair_adviser.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-chalkboard-teacher mr-3"></i>Advisers</a>

    
      <a href="#students" class="list-group-item list-group-item-action waves-effect" data-toggle="collapse">
          <i class="fas fa-users mr-3"></i>Student List <i class="fas fa-chevron-down ml-4"></i></a>
            <ul id="students">
                <a href="chair_students.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-chalkboard-teacher mr-3"></i>All Students</a>
                <a href="chair_good_students.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-users mr-3"></i>Outstanding St</a>
                <a href="chair_op_students.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-book-open mr-3"></i>OP St</a>
            </ul>
      <a href="chair_subjects.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-book-open mr-3"></i>Subjects</a>
    </div>
</div>
<script>
    $('.collapse').collapse();
</script>
