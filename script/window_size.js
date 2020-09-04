function window_size(x) 
{
    var w, h; // ќбъ€вл€ем переменные, w - длина, h - высота
    w = (window.innerWidth ? window.innerWidth : (document.documentElement.clientWidth ? document.documentElement.clientWidth : document.body.offsetWidth));
    h = (window.innerHeight ? window.innerHeight : (document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.offsetHeight)); 
    if (x == 'w') return w;
    if (x == 'h') return h;
     // document.write('<span>размеры рабочей области окна: ' + w + ' x ' + h + '</span>');
}    

