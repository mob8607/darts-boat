import React from 'react';
import PropTypes from 'prop-types';
import inputStyles from './input.scss';

export default class Input extends React.PureComponent {
    static propTypes = {
        name: PropTypes.string.isRequired,
        type: PropTypes.string,
        placeholder: PropTypes.string,
        value: PropTypes.string,
        onChange: PropTypes.func,
    };

    static defaultProps = {
        type: 'text',
    };

    handleChange = (event) => {
        if (this.props.onChange) {
            this.props.onChange(event.currentTarget.value || undefined, event);
        }
    };

    render() {
        const {
            name,
            type,
            placeholder,
            value,
        } = this.props;

        return (
            <label className={inputStyles.label}>
                <input
                    className={inputStyles.input}
                    name={name}
                    placeholder={placeholder}
                    type={type}
                    value={value || ''}
                    onChange={this.handleChange}
                />
            </label>
        );
    }
}
