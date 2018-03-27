import React from 'react';
import Item from './Item';
import navigationStyles from './navigation.scss';

export default class Navigation extends React.PureComponent {
    static Item = Item;

    render() {
        return (
            <ul className={navigationStyles.navigation}>
                {this.props.children}
            </ul>
        );
    }
}
