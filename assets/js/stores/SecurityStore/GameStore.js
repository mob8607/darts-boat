import {observable, action} from 'mobx';
import Requester from '../../services/Requester';

class GameStore {
    @observable loading = false;
    @observable error;
    @observable game;

    @action startGame = (name, gameMode) => {
        this.setLoading(true);
        this.setError(null);

        try {
            Requester.post(
                '/api/games',
                {
                    "teams": [
                        {
                            "name": "Team 1",
                            "players": [
                                {
                                    "name" : "Markus"
                                }
                            ]
                        },
                        {
                            "name": "Team 2",
                            "players": [
                                {
                                    "name" : "Patrick"
                                }
                            ]
                        }
                    ],
                    "gameType": "default"
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
