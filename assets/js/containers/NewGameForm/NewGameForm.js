import React from 'react';
import {observer} from 'mobx-react';
import Select from '../../components/Select';
import Button from '../../components/Button';
import Input from '../../components/Input';
import GameStore from '../../stores/GameStore';

@observer
export default class NewGameForm extends React.Component {
    handleSubmit = (event) => {
        event.preventDefault();
        GameStore.startGame('Mr User', 'x01');
    };

    handleChangeGame = (event) => {
    };

    handlePlayerNameChange = (event) => {
    };

    render() {
        return (
            <div>
                {
                    <form onSubmit={this.handleSubmit}>
                        <Select onChange={this.handleChangeGame} name="game" />

                        <Input onChange={this.handlePlayerNameChange} name="playerName" />

                        <Button type="submit">
                            Start
                        </Button>
                    </form>
                }
            </div>
        );
    }
}
