<?php
include('layouts/header.php');
?>
<!--------- Voice Recognition Commands Help Page ------------>
<section class="my-5 py-5">
	<div class="container text-center mt-3 pt-5">
		<h2 class="form-weight-bold">Voice Recognition Command Help</h2>
		<hr class="max-auto">
	</div>
	<div class="voicerecognitionhelpcontainer">
    <ul class="voicerecognitionhelpcommandlist">
      <li><span>"Open"</span> - Open a page</li>
      <li><span>"Close"</span> - Close the current page</li>
      <li><span>"Search"</span> followed by your query - Perform a search</li>
      <li><span>"Scroll Up"</span> - Scroll the page upwards</li>
      <li><span>"Scroll Down"</span> - Scroll the page downwards</li>
      <!-- Add more voice commands as needed -->
    </ul>
  </div>
</section>
<?php
include('layouts/footer.php');
?>