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

    handleSubmit = (event) => {
        event.preventDefault();
        GameStore.startGame('Mr User', 'x01');
    };

    handleChangeGame = (event) => {
    };

    handlePlayerNameChange = (playerName) => {
        this.playerName = playerName;
    };

    handleAddPlayer = (event) => {
    };

    render() {
        if (GameStore.gameToken) {
            return <Redirect to="/game" />;
        }

        return (
            <div>
                {
                    <form onSubmit={this.handleSubmit}>
                        <Select onChange={this.handleChangeGame} name="game" />

                        <Input onChange={this.handlePlayerNameChange} name="playerName" value={this.playerName} />
                        <Button type="button" onClick={this.handleAddPlayer}>
                            +
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
