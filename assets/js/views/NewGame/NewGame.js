import React from 'react';
import GameForm from '../../containers/NewGameForm';

export default class NewGame extends React.Component {
    componentDidMount() {
        document.title = 'Game';
    }

    render() {
        return (<div>
            <GameForm />
        </div>);
    }
}
