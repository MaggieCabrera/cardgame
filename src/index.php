<?php session_start(); ?> 
<?php require 'vendor/autoload.php'; ?> 
<?php include "init.php" ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Game</title> 
    <link rel="stylesheet" href="css/app.css">
</head>
<body>

    <div class="message">
        <div class="success">Victory</div>
        <div class="defeat">Defeat</div>
        <div class="tie">Tie</div>
    </div>

    <div class="decks-container">

        <div class="wrapper their-cards">
        <?php foreach($opponent_deck as $index => $card): ?>
            <div class="card-container" data-opponentcard-id="<?php echo $index?>" data-attack="<?php echo $card->attack?>" data-health="<?php echo $card->health?>">
                <div class="back">
                    <img src="<?php echo $card->image?>" alt="">
                </div>
                <div class="front">
                    <img src="https://d15f34w2p8l1cc.cloudfront.net/hearthstone/d3f71926ea0fe653aebd2dac3e9b533a4db43407b75a7dbf93deb13eb8bbe108.png" alt="">
                </div>
            </div>
        <?php endforeach; ?>
        </div>

        <div class="wrapper my-cards">
        <?php foreach($my_deck as $index => $card): ?>
            <div class="card-container" data-mycard-id="<?php echo $index?>" data-attack="<?php echo $card->attack?>" data-health="<?php echo $card->health?>">
                <div class="back">
                    <img src="<?php echo $card->image?>" alt="">
                </div>
                <div class="front">
                    <img src="https://d15f34w2p8l1cc.cloudfront.net/hearthstone/d3f71926ea0fe653aebd2dac3e9b533a4db43407b75a7dbf93deb13eb8bbe108.png" alt="">
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    <script src="js/app.js"></script>
</body>
</html>