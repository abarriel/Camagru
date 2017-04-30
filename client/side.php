<?php
$data = 'iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABl'
. 'BMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDr'
. 'EX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r'
. '8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==';
$data = base64_decode($data);

$im = imagecreatefromstring($data);
if ($im !== false) {
ob_start();
imagepng($im);
// Capture the output
$imagedata = ob_get_contents();
// Clear the output buffer
ob_end_clean();
print '<p>'.base64_encode($imagedata).'</p>';
// ob_end_clean();

}
else {
	echo 'An error occurred.';
}

?>