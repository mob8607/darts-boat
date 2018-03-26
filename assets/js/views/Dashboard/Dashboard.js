import React from 'react';

export default class Dashboard extends React.Component {
    componentDidMount() {
        document.title = 'Dashboard';
    }

    render() {
        return (<div>Dashboard</div>);
    }
}
