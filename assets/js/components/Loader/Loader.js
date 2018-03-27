import React from 'react';
import loaderStyles from './loader.scss';

export default class Loader extends React.PureComponent {
    render() {
        return (
            <div className={loaderStyles.loader}>
                {this.props.children}
            </div>
        );
    }
}
