import React from 'react';
import Input from '../../components/Input';
import Button from '../../components/Button/Button';

export default class LoginForm extends React.Component {
    render() {
        return (
            <form>
                <Input name="username" placeholder="Username" />
                <Input name="password" type="password" placeholder="Password" />

                <Button>
                    Login
                </Button>
            </form>
        );
    }
}
