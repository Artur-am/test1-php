(function(form){ if(!form) return null;

    function onChange(ev)
    {
        let _is = true;
        for(let input of Array.from(form.elements.remove_id))
        {
            if(true === input.checked)
            {
                _is = false;
                continue;
            }
        }
        if(_is)
        {
            form.elements.remove.classList.add('close');
            return null;
        }

        form.elements.remove.classList.remove('close');
    }

    function onSubmit(ev)
    {
        ev.preventDefault();

        let remove_id = [];

        for(let input of Array.from(form.elements.remove_id))
        {
            if(true === input.checked)
            {
                remove_id.push(input.value);
            }
        }
        if(0>=remove_id.length)
        {
            return console.warn(1);
        }

        Ajax({
            method: 'POST',
            url: 'main/remove',
            data: {
                'id': remove_id
            },
            success: function(data){
                window.location = window.location;
            }
        });
    }

    for(let input of Array.from(form.elements.remove_id))
    {
        input.addEventListener('change', onChange);
    }
    form.addEventListener('submit', onSubmit);
}(document.forms.remove));