import React from 'react';
import { observer } from 'mobx-react';
import { observable } from 'mobx';
import Button from '../../components/Button';
import Input from '../../components/Input';
import GameStore from '../../stores/GameStore';

@observer
export default class GameForm extends React.Component {
    handleSubmit = (event) => {
        event.preventDefault();
        GameStore.submitScore(this.props.score);
    };

    handleChangeScore = (score) => {
        this.props.setScore(score);
    };

    render() {
        return (
            <div>
                <form onSubmit={this.handleSubmit}>
                    <Input
                        name="score"
                        placeholder="Score"
                        value={this.props.score}
                        onChange={this.handleChangeScore}
                    />

                    <Button type="submit">
                        Submit
                    </Button>
                </form>
            </div>
        );
    }
}
