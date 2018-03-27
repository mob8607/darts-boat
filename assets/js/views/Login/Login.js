import React from 'react';
import LoginForm from '../../containers/LoginForm/LoginForm';

export default class Login extends React.Component {
    componentDidMount() {
        document.title = 'Dashboard';
    }

    render() {
        return (
            <div>
                <h1>Login</h1>

                <LoginForm />
            </div>
        );
    }
}
