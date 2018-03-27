import {observable, action} from 'mobx';

export default class SecurityStore {
    @observable loading = false;
    @observable isLoggedIn = false;
    @observable username;

    @action login = (username, password) => {
        // TODO
        username;
        password;
    };

    @action logout = () => {
        // TODO
    };

    @action setLoading(loading) {
        this.loading = loading;
    }
}
