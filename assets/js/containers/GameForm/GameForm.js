import React from 'react';
import {observer} from 'mobx-react';
import Select from '../../components/Select';
import Button from '../../components/Button';
import GameStore from '../../stores/GameStore';

@observer
export default class GameForm extends React.Component {
    handleSubmit = (event) => {
        event.preventDefault();
        GameStore.startGame('Mr User', 'x01');
    };

    handleChangeGame = (event) => {
    };

    render() {
        return (
            <div>
                {
                    <form onSubmit={this.handleSubmit}>
                        <Select onChange={this.handleChangeGame} name="game" />

                        <Button type="submit">
                            Start
                        </Button>
                    </form>
                }
            </div>
        );
    }
}
