(function(form){ if(!form) return null;

    function ClickedCreateForm(ev)
    {
        ev.preventDefault();
        
        let el = this;
        let table = el.closest('table');
        if(!table) return console.warn();

        let el_clone = table.getElementsByClassName('clone-element')[0];
        let el_clone_node = el_clone.cloneNode(true);
        el_clone_node.classList.remove('clone-element');
        
        for(let item of [...el_clone_node.querySelectorAll('[data-form]')])
        {
            item.setAttribute('form', item.dataset.form);
            item.removeAttribute('data-form');
        }

        el_clone.insertAdjacentHTML('beforebegin', el_clone_node.outerHTML);
        document.getElementsByClassName('btn-add')[0].classList.remove('close');

        el.disabled = true;
    }

    document.getElementsByClassName('btn-create')[0].addEventListener('click', ClickedCreateForm);
    
}(document.forms.create));