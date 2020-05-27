{
    const body = document.body;
    class myDeck {
		constructor(el) {
            this.mycards = document.querySelectorAll(".my-cards .card-container");
            this.selected = null;
			this.initEvents();
		}
		initEvents() {
            this.mycards.forEach(item => {
                item.addEventListener('click', event => {
                    if(this.selected == null){
                        document.querySelector(".my-cards").classList.add("selected");
                        this.selected = item;
                        this.selectedCard(item)
                        let opponentDeck = new theirDeck();
                        let opponentSelectedId = Math.floor(Math.random() * opponentDeck.theircards.length);
                        let opponentSelected = document.querySelector('.card-container[data-opponentcard-id="'+opponentSelectedId+'"]');
                        opponentDeck.selectedCard(opponentSelected);
                        let that = this;
                        setTimeout(function(){ 
                            that.getWinner(item, opponentSelected);
                        }, 2000);
                    }
                })
            })
        }
        selectedCard(selected){
            selected.classList.add("active");
        }
        getWinner(myCard, hisCard){
            document.querySelector(".message").classList.add("active");
            let myHealth = myCard.getAttribute('data-health');
            let theirHealth = hisCard.getAttribute('data-health');
            let myAttack = myCard.getAttribute('data-attack');
            let theirAttack = hisCard.getAttribute('data-attack');
            this.fight(myHealth, myAttack, theirHealth, theirAttack);
        }
        fight(myHealth, myAttack, theirHealth, theirAttack) {
            myHealth -= theirAttack;
            theirHealth -= myAttack;

            switch (true) {
                case (myHealth > 0 && theirHealth < 0):
                    document.querySelector(".message .success").classList.add("active");
                    break;
                case (myHealth <= 0 && theirHealth <= 0):
                    document.querySelector(".message .tie").classList.add("active");
                    break;
                case (myHealth <= 0 && theirHealth > 0):
                    document.querySelector(".message .defeat").classList.add("active");
                    break;
                default:
                    this.fight(myHealth, myAttack, theirHealth, theirAttack);
                    break;
            }
        }
    }
    class theirDeck {
		constructor(el) {
            this.theircards = document.querySelectorAll(".their-cards .card-container");
            this.selected = null;
		}
        selectedCard(selected){
            setTimeout(function(){ 
                selected.classList.add("active");
            }, 1000);
        }
    }
    new myDeck();
}