import React from 'react';
import NewGameForm from '../../containers/NewGameForm';

export default class NewGame extends React.Component {
    componentDidMount() {
        document.title = 'Game';
    }

    render() {
        return (<div>
            <NewGameForm />
        </div>);
    }
}
