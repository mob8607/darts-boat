import React from 'react';
import {observer} from 'mobx-react';
import {observable} from 'mobx';
import Button from '../../components/Button';
import Input from '../../components/Input';
import GameStore from '../../stores/GameStore';

@observer
export default class GameForm extends React.Component {
   @observable score;

    handleSubmit = (event) => {
        event.preventDefault();
        GameStore.submitScore(this.score);
    };

    handleChangeScore = (score) => {
        console.log(score);
        this.score = score;
    };

    render() {
        return (
            <div>
                {
                    <form onSubmit={this.handleSubmit}>
                        <Input
                            name="score"
                            placeholder="Score"
                            value={this.score}
                            onChange={this.handleChangeScore}
                        />

                        <Button type="submit">
                            Start
                        </Button>
                    </form>
                }
            </div>
        );
    }
}
