import React from 'react';
import {observer} from 'mobx-react';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import './global.scss';
import NewGame from '../../views/NewGame';
import Game from '../../views/Game';
import Dashboard from '../../views/Dashboard';
import NotFound from '../../views/NotFound';
import Navigation from '../../components/Navigation';

@observer
export default class Application extends React.Component {
    render() {
        return (
            <Router>
                <div>
                    <Navigation>
                        <a href="/new-game">
                            New Game
                        </a>
                    </Navigation>
                    <Switch>
                        <Route exact path="/" component={Dashboard} />
                        <Route exact path="/new-game" component={NewGame} />
                        <Route exact path="/game" component={Game} />
                        <Route component={NotFound} />
                    </Switch>
                </div>
            </Router>
        );
    }
}
