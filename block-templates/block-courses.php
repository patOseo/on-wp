<?php 

$filters = get_field('show_filters');
$courses = get_field('courses');


if(have_rows('courses')): ?>

	<?php if($filters == 1): ?>

		<?php if($courses): ?>

			<?php $course_areas = array(); ?>
			<?php foreach($courses as $course):
				$course_areas[] = $course['area'];
			endforeach; ?>

		<?php endif; ?>

		<?php $areas = array_unique($course_areas, SORT_REGULAR); ?>

		<div class="row mb-4">
			<div id="coursesFilter" class="mb-4 text-center">
				<button class="px-3 btn btn-sm btn-primary active" onclick="filterSelection('all')">All</button>
				<?php foreach($areas as $area): ?>
					<button class="px-3 btn btn-sm btn-primary" onclick="filterSelection('<?php echo $area['value']; ?>')"><?php echo $area['label']; ?></button>
				<?php endforeach; ?>
			</div>
		</div>

<script>
// Product Filter 
filterSelection("all");
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("course-box");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "d-block");
    w3AddClass(x[i], "d-none");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "d-block"), w3RemoveClass(x[i], "d-none");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current control button (highlight it)
var btnContainer = document.getElementById("coursesFilter");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>

	<?php endif; ?>

	<div class="row">
		<?php while(have_rows('courses')): the_row(); 
			$area = get_sub_field('area'); ?>
			<div class="col-md-6 mb-3 course-box all <?php echo $area['value']; ?>">
				<div class="shadowbox d-flex flex-column h-100 position-relative">
					<h3><?php the_sub_field('course_name'); ?></h3>
					<p class="my-3"><strong>Area:</strong> <?php echo $area['label']; ?></p>
					<div class="mb-3"><?php the_sub_field('course_desc'); ?></div>
					<a class="btn btn-md btn-primary d-inline-block mt-auto stretched-link" href="<?php the_sub_field('course_link'); ?>" target="_blank" rel="noopener,noreferrer">Course ID: <?php the_sub_field('course_id'); ?> <?php if(get_sub_field('course_link')): ?><i class="fa fa-external-link" aria-hidden="true"></i><?php endif; ?></a>
				</div>
			</div>
		<?php endwhile; ?>
	</div>

<?php endif;

