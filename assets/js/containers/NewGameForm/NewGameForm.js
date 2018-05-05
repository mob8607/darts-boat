import React from 'react';
import {observer} from 'mobx-react';
import {observable} from 'mobx';
import Select from '../../components/Select';
import Button from '../../components/Button';
import Input from '../../components/Input';
import GameStore from '../../stores/GameStore';
import { Redirect } from 'react-router-dom';

@observer
export default class NewGameForm extends React.Component {
    @observable playerName;
    @observable gameType;
    @observable players = [
        {
            'name': '',
        },
    ];

    handleSubmit = (event) => {
        event.preventDefault();
        GameStore.startGame(this.players, this.gameType);
    };

    handleChangeGame = (gameType) => {
        this.gameType = gameType;
    };

    handlePlayerNameChange = (playerName, index) => {
        this.players[index].name = playerName;
    };

    handleAddPlayer = () => {
        this.players.push({'name': ''});
    };

    handleRemovePlayer = (index) => {
        this.players = this.players.filter((player, i, players) => index !== i || players.length === 1);
    };

    renderPlayerInputs = () => {
        let inputs = [];
        for (let i = 0; i < this.players.length; i++) {
            inputs.push(
                <div key={'playerNameContainer_' + i}>
                    <Input
                        onChange={(playerName) => { this.handlePlayerNameChange(playerName, i); }}
                        key={'playerName_' + i}
                        name={'playerName_' + i}
                        value={this.players[i].name}
                    />
                    <Button
                        type="button"
                        key={'playerRemove_' + i}
                        onClick={(playerName) => { this.handleRemovePlayer(i); }}
                    >
                        Remove Player
                    </Button>
                </div>);
        }

        return inputs;
    }

    render() {
        if (GameStore.gameToken) {
            return <Redirect to="/game" />;
        }

        return (
            <div>
                {
                    <form onSubmit={this.handleSubmit}>
                        <Select onChange={this.handleChangeGame} name='gameType' />

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
