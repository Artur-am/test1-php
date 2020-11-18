(function(inputs){ if(!inputs) return null;

    function onChange(ev)
    {
        let el = this;
        let parent = el.closest('tr[data-id]');

        if(
            (0>=parent.length) ||
            !('id' in parent.dataset)
        ){
            return console.warn('1');
        }

        let user_id = +parent.dataset.id;
        let name = el.name.toString();
        let value = el.value.toString();
        let _is = {'group_id': true,'age': true, 'floor': true, 'faculty_id': true};

        if((false===Number.isInteger(user_id))){return console.error('');}

        if(!(name in _is))
        {
            if(
                (2>=name.length) ||
                (2>=value.length)
            )
            {
                return console.warn('2.1');
            }
        }
        else{
            if(el.type.indexOf('checkbox')!=-1)
            {
                value = +el.checked;
            }
        }
        Ajax({
            method: 'POST',
            url: 'main/update',
            data: {
                'name': name,
                'value': value,
                'id': user_id
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
        let select = el.querySelector('select');

        if(!input||!parent) return console.warn('');

        let selected = parent.querySelector('.td-input:enabled');
        let selected2 = parent.querySelector('.ts-select:enabled');
        if(selected)
        {
            selected.disabled = true;
        }
        if(selected2)
        {
            selected2.disabled = true;
        }
    
        input.disabled = false;
        if(select)
        {
            select.disabled = false;
        }
    }

    for(let list of lists)
    {
        list.addEventListener('click', onClick);
    }

}(document.querySelectorAll('.js-edit')));


(function(selects){ if(!selects) return null;

    function onChange(ev)
    {
        let el = this;
        let parent = el.parentElement;
        let input = parent.querySelector('input');
        input.value = el.value;
        let event = new MouseEvent("change",{bubbles: true});
        input.dispatchEvent(event);
    }

    for(let select of selects)
    {
        select.addEventListener('change', onChange);
    }

}(document.querySelectorAll('.ts-select')));

(function(inputs){ if(!inputs) return null;

    function onChange(ev)
    {
        let el = this;
        // let event = new MouseEvent("change",{bubbles: true});
        // console.log(el.value);
        // el.dispatchEvent(event);
    }

    for(let input of inputs)
    {
        // input.addEventListener('change', onChange);
    }

}(document.querySelectorAll('.custom-checkbox')));