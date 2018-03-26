import React from 'react';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import './global.scss';
import Login from '../../views/Login';
import Dashboard from '../../views/Dashboard';
import TimeTracking from '../../views/TimeTracking';
import NotFound from '../../views/NotFound';
import Navigation from '../../components/Navigation';

export default class Application extends React.Component {
    isLoggedIn() {
        // TODO check if user is logged in

        return true;
    }

    render() {
        return (
            <Router>
                <div>
                    {
                        this.isLoggedIn() ? (
                            <Navigation>
                                <Navigation.Item to="/">
                                    Dashboard
                                </Navigation.Item>

                                <Navigation.Item to="/timetracking">
                                    TimeTracking
                                </Navigation.Item>
                            </Navigation>
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
