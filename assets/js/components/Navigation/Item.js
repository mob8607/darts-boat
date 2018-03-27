import React from 'react';
import PropTypes from 'prop-types';
import { Link } from 'react-router-dom';
import navigationStyles from './navigation.scss';

export default class Item extends React.PureComponent {
    static propTypes = {
        to: PropTypes.string.isRequired,
    };

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
