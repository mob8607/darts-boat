import React from 'react';
import {observable} from 'mobx';
import {observer} from 'mobx-react';
import { Redirect } from 'react-router-dom';
import Input from '../../components/Input';
import Select from '../../components/Select';
import Button from '../../components/Button';

@observer
export default class LoginForm extends React.Component {

    handleSubmit = (event) => {
    };

    render() {
        return (
            <div>
                {
                    <form onSubmit={this.handleSubmit}>
                        <Select onChange={this.handleChangeGame} name="game" />

                        <Button type="submit">
                            Start
                        </Button>
                    </form>
                }
            </div>
        );
    }
}
