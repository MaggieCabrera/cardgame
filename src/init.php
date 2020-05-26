<?php 

include "autoload.php";

$game = new Game(5);
$deck = $game->get_deck();

?>


<div class="wrapper">
<?php foreach($deck as $card): ?>
	<div class="card-container">
		<div class="back">
			<img src="<?php  echo $card->image?>" alt="">
		</div>
		<div class="front">
			<img src="https://d15f34w2p8l1cc.cloudfront.net/hearthstone/d3f71926ea0fe653aebd2dac3e9b533a4db43407b75a7dbf93deb13eb8bbe108.png" alt="">
		</div>
	</div>
<?php endforeach; ?>

</div>

<style>
.wrapper {
	margin: 70px 50px;
}





.card-container, .front, .back {
}
.card-container {
	margin: 5rem;
}
.front, .back {
	box-sizing: border-box;
}
.back {
	position: absolute;
    bottom: 1%;
    left: -1%;
    transform: scale(1.11);
}

.card-container {
	position: relative;
	display: inline-block;
}
.front, .back {
	backface-visibility: hidden;
	/*overflow: hidden;*/
	transition: transform .8s ease;
}
.back {
	transform: rotateY(180deg) scale(1.11);
}
.card-container:hover .front {
	transform: rotateY(-180deg);
}
.card-container:hover .back {
	transform: rotateY(0deg) scale(1.11);
}

.card-container {
	perspective: 75rem;
}

</style>