"use strict";

class AgCookie {
    create(name, value, days) {
        value = escape(JSON.stringify(value));
        let expires;

        if (days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = '; expires=' + date.toGMTString();
        } else {
            expires = '';
        }

        document.cookie = name + '=' + value + expires + '; path=/';
    }

    read(name) {
        const nameEQ = name + '=';
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') {
                c = c.substring(1, c.length);
            }
            if (c.indexOf(nameEQ) === 0) {
                let contents = c.substring(nameEQ.length, c.length);
                contents = JSON.parse(unescape(contents));
                return contents;
            }
        }
        return null;
    }
    erase(name) {
        this.create(name, '', -1);
    }
}

export default AgCookie;