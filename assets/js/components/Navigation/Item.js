import React from 'react';
import { Link } from 'react-router-dom';
import navigationStyles from './navigation.scss';

export default class Dashboard extends React.PureComponent {
    render() {
        const {to} = this.props;

        return (
            <li className={navigationStyles.item}>
                <Link to={to} className={navigationStyles.link}>
                    {this.props.children}
                </Link>
            </li>
        );
    }
}
