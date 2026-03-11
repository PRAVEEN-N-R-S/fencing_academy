<?php
$res=$conn->query("SELECT * FROM gallery");

while($row=$res->fetch_assoc()){
echo "<img src='gallery/".$row['image']."' width='200'>";
}
?>

<section class="gallery-section">

<h2>Academy Gallery</h2>

<div class="slider">

<div class="slide">
<img src="coach1.jpg">
</div>

<div class="slide">
<img src="coach2.jpg">
</div>

<div class="slide">
<img src="coach3.jpg">
</div>

<button onclick="prevSlide()">❮</button>
<button onclick="nextSlide()">❯</button>

</div>

</section>