import React from 'react';

export default class NotFound extends React.Component {
    componentDidMount() {
        document.title = 'Error 404';
    }

    render() {
        return (<div>Route was not found.</div>);
    }
}
