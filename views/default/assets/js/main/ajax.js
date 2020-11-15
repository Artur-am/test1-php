function Ajax(args)
{
    if(!('action' in args)) console.warn('Query Ajax not found action arg');

    args.data.token = window.token;

    let url = window.location.href;
    if('url' in args)
    {
        url += args.url+'/';
    }
    let d = '';

    for(let item in args.data)
    {
        d += item+'='+args.data[item]+'&';
    }
    d = d.slice(0, -1);

    if('post'==args.method.toLowerCase())
    {
        if(!('header' in args))
        {
            args.header = [];
        }

        if(!('Content-type' in args.header))
        {
            args.header['Content-type'] = "application/x-www-form-urlencoded; charset=UTF-8";
        }
    }
    else{
        url += d;
        d = null;
    }

    const req = new XMLHttpRequest();

    req.onreadystatechange = function(){

        if(req.readyState == 4)
        {
            if(req.status == 200)
            {
                const data = (function( data ) {
                    try {
                        return JSON.parse( data );
                    } catch (err) {
                        return false;
                    }
                })(req.responseText);

                if(true===data.success)
                {
                    
                    args.success(data);
                }
            }
        }
    }

    req.open(args.method, url, true);

    if(Array.isArray(args.header))
    {
        for(let head in args.header)
        {
            console.log(head, args.header[head]);
            req.setRequestHeader(head, args.header[head]);
        }    
    }
    req.send(d);
}