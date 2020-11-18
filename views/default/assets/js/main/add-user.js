(function(form){ if(!form) return null;

    function onSubmit(ev)
    {
        ev.preventDefault();

        let el = this;
        let elements = el.elements;

        let data = {
            firstName: elements.firstName.value.toString(),
            lastName: elements.lastName.value.toString(),
            age: +elements.age.value,
            floor: +elements.floor.checked,
            group: +elements['select-group'].value,
            faculty: +elements['select-faculty'].value
        };
        let hash_error = (el, status)=>{
            el.style.boxShadow = (true===status) ? 'inset 0 0 4px red' : null;
        }

        hash_error(elements.firstName, 3>=data.firstName.length);
        hash_error(elements.lastName, 3>=data.lastName.length);
        hash_error(elements.age, (isNaN(data.age)||!data.age));
        hash_error(elements.floor, isNaN(data.floor));
        hash_error(elements['select-group'], isNaN(data.group));
        hash_error(elements['select-faculty'], isNaN(data.faculty));

        Ajax({
            method: 'POST',
            url: 'main/create',
            data: data,
            success: function(data){
                window.location = window.location;
            }
        });
    }

    form.addEventListener('submit', onSubmit);
}(document.forms.create));