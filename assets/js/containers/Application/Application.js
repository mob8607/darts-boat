import React from 'react';
import {observer} from 'mobx-react';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import './global.scss';
import Login from '../../views/Login';
import Dashboard from '../../views/Dashboard';
import TimeTracking from '../../views/TimeTracking';
import NotFound from '../../views/NotFound';
import Navigation from '../../components/Navigation';
import SecurityStore from '../../stores/SecurityStore';

@observer
export default class Application extends React.Component {
    render() {
        return (
            <Router>
                <div>
                    {
                        SecurityStore.user ? (
                            <div>
                                <Navigation>
                                    <Navigation.Item to="/">
                                        Dashboard
                                    </Navigation.Item>

                                    <Navigation.Item to="/timetracking">
                                        TimeTracking
                                    </Navigation.Item>
                                </Navigation>

                                <a href="/logout">
                                    {SecurityStore.user.username}
                                </a>
                            </div>
                        ) : null
                    }

                    <Switch>
                        <Route exact path="/" component={Dashboard} />
                        <Route path="/login" component={Login} />
                        <Route path="/timetracking" component={TimeTracking} />
                        <Route component={NotFound} />
                    </Switch>
                </div>
            </Router>
        );
    }
}
