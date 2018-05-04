import React from 'react';

export default class Game extends React.Component {
    componentDidMount() {
        document.title = 'Game';
    }

    render() {
        return (<div>
          Game
        </div>);
    }
}
