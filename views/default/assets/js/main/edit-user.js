(function(inputs){ if(!inputs) return null;

    function onChange(ev)
    {
        let el = this;
        let parent = el.closest('tr[data-id]');

        if(
            (0>=parent.length) ||
            !('id' in parent.dataset)
        ){
            return console.warn('');
        }

        let user_id = parent.dataset.id;
        let name = el.name.toString();
        let value = el.value.toString();
        
        if(
            (false===Number.isInteger(user_id)) ||
            (2>=name.length) ||
            (2>=value.length)
        ){
            return console.warn('');
        }

        Ajax({
            method: 'POST',
            url: 'main/create',
            data: {
                'action': 'create',
                'name': name,
                'value': value,
                'id': id
            },
            success: function(data){
                console.log('data', data);
            }
        });
    }

    function onBlur(ev)
    {
        console.log('onBlur', this);
        
    }

    for(let input of inputs)
    {
        input.addEventListener('change', onChange);
    }

}(document.getElementsByClassName('td-input')));


(function(lists){ if(!lists) return null;

    function onClick(ev)
    {
        let el = this.parentElement;
        let parent = el.closest('tbody');
        let input = el.querySelector('input');

        if(!input||!parent) return console.warn('');

        let selected = parent.querySelector('input[disabled="false"]');
        if(selected)
        {
            selected.setAttribute('disabled', 'true');
            selected.disabled = true;
        }
        input.setAttribute('disabled', 'false');
        input.disabled = false;
    }

    for(let list of lists)
    {
        list.addEventListener('click', onClick);
    }

}(document.querySelectorAll('.js-edit')));

Ajax({
    method: 'POST',
    url: 'main/create',
    data: {
        'action': 'create',
        'name': 45464,
        'value': 'dfggrjelrkgj',
        'id': 7
    },
    success: function(data){
        console.log('data', data);
    }
});