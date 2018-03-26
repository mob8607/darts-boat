import React from 'react';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import './global.scss';
import Login from '../../views/Login';
import Dashboard from '../../views/Dashboard';
import NotFound from '../../views/NotFound';
import Navigation from '../../components/Navigation';

export default class Application extends React.Component {
    isLoggedIn() {
        // TODO check if user is logged in

        return true;
    }

    render() {
        if (!this.isLoggedIn()) {
            return <Login />;
        }

        return (
            <Router>
                <div>
                    <Navigation>
                        <Navigation.Item to="/">
                            Dashboard
                        </Navigation.Item>

                        <Navigation.Item to="/login">
                            Login
                        </Navigation.Item>
                    </Navigation>

                    <Switch>
                        <Route exact path="/" component={Dashboard} />
                        <Route path="/login" component={Login} />
                        <Route component={NotFound} />
                    </Switch>
                </div>
            </Router>
        );
    }
}
