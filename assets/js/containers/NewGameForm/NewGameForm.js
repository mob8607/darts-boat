import React from 'react';
import {observer} from 'mobx-react';
import {observable} from 'mobx';
import Select from '../../components/Select';
import Button from '../../components/Button';
import Input from '../../components/Input';
import GameStore from '../../stores/GameStore';

@observer
export default class NewGameForm extends React.Component {
    @observable playerName;
    @observable players = [
        {
            'name': '',
        },
    ];

    handleSubmit = (event) => {
        event.preventDefault();
        GameStore.startGame('Mr User', 'x01');
    };

    handleChangeGame = (event) => {
    };

    handlePlayerNameChange = (playerName, index) => {
        this.players[index].name = playerName;
    };

    handleAddPlayer = (event) => {
        this.players.push({'name': ''});
    };

    renderPlayerInputs = () => {
        let inputs = [];
        for (let i = 0; i < this.players.length; i++) {
            inputs.push(
                <Input
                    onChange={(playerName) => { this.handlePlayerNameChange(playerName, i); }}
                    key={'playerName_' + i}
                    name={'playerName_' + i}
                    value={this.players[i].name}
                />);
        }

        return inputs;
    }

    render() {
        return (
            <div>
                {
                    <form onSubmit={this.handleSubmit}>
                        <Select onChange={this.handleChangeGame} name='game' />

                        {this.renderPlayerInputs()}
                        <Button type="button" onClick={this.handleAddPlayer}>
                            Add Player
                        </Button>

                        <Button type="submit">
                            Start
                        </Button>
                    </form>
                }
            </div>
        );
    }
}
