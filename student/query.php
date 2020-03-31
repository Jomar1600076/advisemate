<?php
#get students number
"SELECT a.sub_code, a.sub_desc, a.sub_prereq, a.sub_unit, a.sub_year, a.sub_sem, b.grade, c.student_id FROM subjects a, grades b, students c WHERE a.sub_code = b.sub_code AND c.student_id = b.student_id"



"SELECT 
subjects.sub_code,
subjects.sub_desc,
subjects.sub_prereq,
grades.grade
FROM subjects
	LEFT JOIN grades ON (grades.sub_code = subjects.sub_code && grades.student_id='1600076');"

"SELECT
  yourTable.ColumnA,
  subTable.ColumnB,
  subTable.ColumnC
FROM
  yourTable
CROSS APPLY
(
  SELECT yourTable.Column1 AS ColumnB, yourTable.Column3 AS ColumnC WHERE yourTable.ColumnA IS NULL
  UNION ALL
  SELECT yourTable.Column2 AS ColumnB, yourTable.Column4 AS ColumnC WHERE yourTable.ColumnA IS NOT NULL
)
  AS subTable"
?>