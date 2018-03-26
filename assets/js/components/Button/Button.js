import React from 'react';
import PropTypes from 'prop-types';
import inputStyles from './button.scss';

export default class Button extends React.PureComponent {
    static propTypes = {
        type: PropTypes.string,
        onClick: PropTypes.func,
    };

    static defaultProps = {
        type: 'button',
    };

    handleClick = (event) => {
        if (this.props.onClick) {
            this.props.onClick(event.currentTarget.value || undefined, event);
        }
    };

    render() {
        const {
            type,
        } = this.props;

        return (
            <button type={type} className={inputStyles.button} onClick={this.handleClick}>
                {this.props.children}
            </button>
        );
    }
}
