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
                'hello': function(){
                    console.log('hi');
                },
                'wurf *score': (newScore) => {
                    let newScoreNumber = parseInt(newScore);
                    if (typeof newScoreNumber !== 'number') {
                        alert('only numbers pls');
                    } else {
                        this.score = newScore;
                    }
                },

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

                        <div className={gameStyles.scoreAmount + ' js-score-amount waiting'}>
                            <h2>Player One</h2>

                            <div className={gameStyles.scoreAmountInner}>
                                <div className={gameStyles.scoreAmountItem + ' hit'}>
                                    120 Points!
                                </div>
                            </div>
                        </div>

                        <div className={gameStyles.scoreAmount + ' js-score-amount'}>
                            <h2>Player Two</h2>

                            <div className={gameStyles.scoreAmountInner}>
                                <div className={gameStyles.scoreAmountItem + ' no-score'}>
                                    Throw the first dart to begin!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>);
    }
}
