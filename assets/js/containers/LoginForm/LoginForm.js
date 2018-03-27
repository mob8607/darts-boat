import React from 'react';
import {observable} from 'mobx';
import {observer} from 'mobx-react';
import { Redirect } from 'react-router-dom';
import Input from '../../components/Input';
import Button from '../../components/Button';
import Loader from '../../components/Loader';
import SecurityStore from '../../stores/SecurityStore';

@observer
export default class LoginForm extends React.Component {
    @observable username;
    @observable password;

    handleChangeUsername = (username) => {
        this.username = username;
    };

    handleChangePassword = (password) => {
        this.password = password;
    };

    handleSubmit = (event) => {
        event.preventDefault();

        SecurityStore.login(this.username, this.password);
    };

    render() {
        if (SecurityStore.user) {
            return <Redirect to="/" />;
        }

        return (
            <div>
                {
                    SecurityStore.loading ?
                        <Loader>Loading ...</Loader> :
                        <form onSubmit={this.handleSubmit}>
                            <Input
                                name="username"
                                placeholder="Username"
                                value={this.username}
                                onChange={this.handleChangeUsername}
                            />

                            <Input
                                name="password"
                                type="password"
                                placeholder="Password"
                                value={this.password}
                                onChange={this.handleChangePassword}
                            />

                            <Button type="submit">
                                Login
                            </Button>
                        </form>
                }
            </div>
        );
    }
}
