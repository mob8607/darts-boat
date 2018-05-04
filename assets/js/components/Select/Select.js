import React from 'react';
import PropTypes from 'prop-types';
import selectStyles from './select.scss';

export default class Input extends React.PureComponent {
    static propTypes = {
        onChange: PropTypes.func.isRequired,
        name: PropTypes.string.isRequired,
    };

    handleChange = (event) => {
        this.props.onChange(event.currentTarget.value || undefined, event, this.props.name);
    };

    render() {
        const {
            name,
        } = this.props;

        return (
            <select
                className={selectStyles.select}
                name={name}
                onChange={this.handleChange}
            >
                <option value="x01">x01</option>
                <option>another game</option>
            </select>
        );
    }
}
