import React from 'react';
import {observable} from 'mobx';
import {observer} from 'mobx-react';
import Input from '../../components/Input';
import Button from '../../components/Button/Button';

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

        // TODO call store.
    };

    render() {
        return (
            <form onClick={this.handleSubmit}>
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
        );
    }
}
