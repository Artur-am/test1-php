(function (e) {
    e.closest = e.closest || function (css) {
        var node = this;

        while (node) {
            if (node.matches(css)) return node;
            else node = node.parentElement;
        }
        return null;
    }
})(Element.prototype);


//= ./user.js
//= ./ajax.js
//= ./edit-user.js
//= ./create-user.js
//= ./remove-user.js
//= ./add-user.js