import {observable, action} from 'mobx';
import Requester from '../../services/Requester';

class SecurityStore {
    @observable loading = false;
    @observable error;
    @observable user = window.user;

    @action login = (username, password) => {
        this.setLoading(true);
        this.setError(null);

        try {
            Requester.post(
                '/api/login',
                {
                    username: username,
                    password: password,
                }
            ).then((value) => {
                this.setLoading(false);
                this.setUser(value);
            });
        } catch (e) {
            this.setError(e);
            this.setLoading();
        }
    };

    @action logout = () => {
        this.setUser(null);
        window.location.href = '/logout';
    };

    @action setUser(user) {
        this.user = user;
    }

    @action setLoading(loading) {
        this.loading = loading;
    }

    @action setError(error) {
        this.error = error;
    }
}

export default new SecurityStore();
