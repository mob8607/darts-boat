import React from 'react';
import GameForm from '../../containers/GameForm';
import GameStyles from './_game.scss';

export default class Game extends React.Component {
    componentDidMount() {
        document.title = 'Game';
    }

    loadSpeachRecognition() {
        if (annyang) {
            var scorePlayer1 = 0;
            var scorePlayer2 = 0;
            var activePlayer1 = true;
            var activePlayer2 = false;

            // Let's define our first command. First the text we expect, and then the function it should call
            var commands = {
                'add score *score': function (score) {
                    score = parseInt(score);
                    console.log(score);
                    if (typeof score === 'number') {
                        if (activePlayer1 === true) {
                            scorePlayer1 = scorePlayer1 + score;
                            activePlayer1 = false;
                            activePlayer2 = true;

                            console.log('player one: ' + activePlayer1);
                            console.log('player two: ' + activePlayer2);
                        }

                        if (activePlayer2 === true) {
                            scorePlayer2 = scorePlayer2 + score;
                            activePlayer1 = true;
                            activePlayer2 = false;

                            console.log('player one: ' + activePlayer1);
                            console.log('player two: ' + activePlayer2);
                        }
                    } else {
                        alert('only numbers pls');
                    }
                },

                'remove score now': function () {
                    console.log('remove score now');
                }
            };

            // Add our commands to annyang
            annyang.addCommands(commands);

            // Start listening. You can call this here, or attach this call to an event, button, etc.
            annyang.start({autoRestart: false, continuous: true});
        }
    }

    render() {
        this.loadSpeachRecognition();

        return (<div>
            <GameForm/>

            <section class="background"></section>

            <section class="intro">
                <div class="intro-content">
                    <div class="intro-title">
                        <h1>Welcome to Vart!</h1>
                        <p>
                            The voice recognition web application that will finally make dart enjoyable for you
                        </p>
                    </div>

                    <div class="score">
                        <div class="score-title">
                            <p>
                                You can add a single dart score by using the voice command "add score" following the amount of
                                points your dart hit.
                            </p>
                        </div>

                        <div class="score-amount waiting js-score-amount">
                            <h2>Player One</h2>

                            <div class="score-amount-inner">
                                <div class="score-amount-item hit">
                                    120 Points!
                                </div>
                            </div>
                        </div>

                        <div class="score-amount js-score-amount">
                            <h2>Player Two</h2>

                            <div class="score-amount-inner">
                                <div class="score-amount-item no-score">
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
