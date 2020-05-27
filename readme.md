# Card game based on Heartstone Cards

This is a simple game. The user has 5 cards to coose from, so does the machine. The card you choose is discovered when you click on it and the machine chooses one. The cards fight and the player with a card alive wins.

The fight mechanic goes like this: each card has a health and an attack value (bottom right and left numbers respectively). Cards attack each other until one of them or both dies. If both cards die, then it's a tie.

The game is hosted http://onemaggie.com/hs/ in case you want to demo without installing.

Thanks for playing!

## Installation

I'm using docker for this project, along with PHPUnit for tests. To install the vendor files with composer please use the command:

```
sh install.sh
```

To run the tests use the command:

```
sh test.sh
```

To run the project use: 

```
sh run.sh
```

and navigate to http://localhost/