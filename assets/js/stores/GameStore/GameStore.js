import { observable, action } from 'mobx';
import Requester from '../../services/Requester/index';

class GameStore {
    @observable loading = false;
    @observable error;
    @observable gameToken;
    @observable players = [];

    @action startGame = (players, gameMode) => {
        this.setLoading(true);
        this.setError(null);

        try {
            Requester.post(
                '/api/games',
                {
                    'players': players,
                    'gameType': gameMode,
                }
            ).then((value) => {
                let players = [];
                this.setLoading(false);
                this.gameToken = value.gameToken;
                value.players.map((player, index) => {
                    player.isActive = false;
                    player.shootCounter = 0;
                    if (index === 0) {
                        player.isActive = true;
                    }
                    players.push(player);
                });

                this.players = players;
            });
        } catch (e) {
            this.setError(e);
            this.setLoading();
        }
    };

    @action submitScore = (score) => {
        this.setLoading(true);
        this.setError(null);

        let activePlayer = this.players.filter((player) => {
            return player.isActive;
        });

        try {
            Requester.post(
                '/api/shoots',
                {
                    'gameToken': this.gameToken,
                    'score': parseInt(score),
                    'multiplier': 1,
                    'player': activePlayer[0]
                }
            ).then((value) => {
                this.setLoading(false);
                this.increaseShootCounter();
                console.log(value);
            });
        } catch (e) {
            this.setError(e);
            this.setLoading();
        }
    };

    @action increaseShootCounter() {
        this.players.map((player) => {
            if (player.isActive) {
                player.shootCounter++;
            }

            if (player.shootCounter > 3) {
                this.makeNextActive();
            }
        })
    }

    @action makeNextActive() {
        this.players.map((player, index) => {
            if (player.isActive) {
                player.isActive = false;
                player.shootCounter = 0;

                if (index === this.players.length) {
                    this.players[0].isActive = true;
                } else {
                    this.players[index + 1].isActive = true;
                }
            }
        })
    }

    @action logout = () => {
        this.setUser(null);
        window.location.href = '/logout';
    };

    @action setGame(game) {
        this.game = game;
    }

    @action setLoading(loading) {
        this.loading = loading;
    }

    @action setError(error) {
        this.error = error;
    }
}

export default new GameStore();
