import React from 'react';
import RunningGameForm from '../../containers/RunningGameForm';

export default class Game extends React.Component {
    componentDidMount() {
        document.title = 'Game';
    }

    render() {
        return (<div>
            <RunningGameForm />
        </div>);
    }
}
