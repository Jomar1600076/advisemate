<div class="sidebar-fixed position-fixed d-flex flex-column">
    <div class="list-group list-group-flush mt-5">
        <a href="#" class="list-group-item waves-effect disabled">
        <i class="fas fa-user mr-3"></i><?php echo $_SESSION["ad_fname"]; ?>
        </a>
    </div>
    <div class="list-group list-group-flush mt-5" id="sidebar">
      <a href="#students" class="list-group-item list-group-item-action waves-effect" data-toggle="collapse">
        <i class="fas fa-users mr-3"></i>Student List <i class="fas fa-chevron-down ml-4"></i></a>
        <ul id="students">
            <a href="ad_students.php" class="list-group-item list-group-item-action">
                <i class="fas fa-chalkboard-teacher mr-3"></i>All Students</a>
            <a href="ad_good_students.php" class="list-group-item list-group-item-action">
                <i class="fas fa-users mr-3"></i>Outstanding St</a>
            <a href="ad_prob_students.php" class="list-group-item list-group-item-action">
                <i class="fas fa-book-open mr-3"></i>OP St</a>
        </ul>
      <a href="ad_student_grades.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-book-open mr-3"></i>Verify Grades</a>
      <a href="ad_prospectus.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-book-open mr-3"></i>Prospectus</a>
    </div>
</div>
