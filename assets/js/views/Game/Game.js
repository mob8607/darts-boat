import React from 'react';
import GameForm from '../../containers/GameForm';
import gameStyles from './_game.scss';
import { observable } from 'mobx';
import { observer } from 'mobx-react';
import GameStore from '../../stores/GameStore';

@observer
export default class Game extends React.Component {
    @observable score;

    componentDidMount() {
        document.title = 'Game';
        this.loadSpeachRecognition();
    }

    loadSpeachRecognition() {
        if (annyang) {
            annyang.setLanguage('de-DE');
            let commands = {
                'hello': function () {
                    console.log('hi');
                },
                'wurf *score': (newScore) => this.updateScore(newScore),

                'senden': () => {
                    GameStore.submitScore(this.score);
                },

                'remove score now': function () {
                    console.log('remove score now');
                },
            };

            // Add our commands to annyang
            annyang.addCommands(commands);

            // Start listening. You can call this here, or attach this call to an event, button, etc.
            annyang.start({autoRestart: false, continuous: true});
        }
    }

    updateScore = (newScore) => {
        this.score = newScore;
    };

    renderPlayers = () => {
        let elements = [];
        if (GameStore.players) {

            GameStore.players.map((player) => {
                elements.push(
                    <div key={player.id} className={gameStyles.scoreAmount + ' js-score-amount waiting'}>
                        <h2>{player.name}</h2>

                        <div className={gameStyles.scoreAmountInner}>
                            <div className={gameStyles.scoreAmountItem + ' hit'}>
                                {player.remaining_score}
                            </div>
                        </div>
                    </div>
                );
            })
        }

        return elements;
    };

    render() {
        return (<div>
            <section className={gameStyles.background}></section>

            <section className={gameStyles.intro}>
                <div className={gameStyles.introContent}>
                    <div className={gameStyles.introTitle}>
                        <h1>Welcome to Vart!</h1>
                        <p>
                            The voice recognition web application that will finally make dart enjoyable for you
                        </p>
                    </div>

                    <div className={gameStyles.score}>
                        <div className={gameStyles.scoreTitle}>
                            <p>
                                You can add a single dart score by using the voice command "add score" following the
                                amount of
                                points your dart hit.
                            </p>
                        </div>

                        <div className={gameStyles.gameForm}>
                            <GameForm score={this.score} setScore={(score) => this.score = score} />
                        </div>

                        {this.renderPlayers()}
                    </div>
                </div>
            </section>
        </div>);
    }
}
