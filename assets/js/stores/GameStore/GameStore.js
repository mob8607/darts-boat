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
                value.teams.map((team) => {
                    team.players.map((player) => {
                        players.push(player);
                    })
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

        try {
            Requester.post(
                '/api/shoots',
                {
                    'gameToken': this.gameToken,
                    'score': parseInt(score),
                    'multiplier': 3,
                    'player': {
                        'name': 'Mathias'
                    }
                }
            ).then((value) => {
                this.setLoading(false);
                console.log(value);
            });
        } catch (e) {
            this.setError(e);
            this.setLoading();
        }
    };

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
