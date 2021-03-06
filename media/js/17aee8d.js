/*
 * jQuery Format Plugin v1.3
 * http://www.asual.com/jquery/format/
 *
 * Copyright (c) 2009-2011 Rostislav Hristov
 * Uses code by Matt Kruse
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * Date: 2013-09-28 11:18:54 +0300 (Sat, 28 Sep 2013)
 */
(function(z){z.format=function(){var o={date:{format:"MMM dd, yyyy h:mm:ss a",monthsFull:["January","February","March","April","May","June","July","August","September","October","November","December"],monthsShort:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],daysFull:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],daysShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],shortDateFormat:"M/d/yyyy h:mm a",longDateFormat:"EEEE, MMMM dd, yyyy h:mm:ss a"},
number:{format:"#,##0.0#",groupingSeparator:",",decimalSeparator:"."}};return{locale:function(b){a={a:6};if(b)for(var i in b)for(var g in b[i])o[i][g]=b[i][g];return o},date:function(b,i){var g=0,h=0,c=0;c=h="";var l,e;if(typeof b=="string"){var m=function(r,v,y,w){for(w=w;w>=y;w--){var x=r.substring(v,v+w);if(x.length>=y&&/^\d+$/.test(x))return x}return null};if(typeof i=="undefined")i=o.date.format;var d=0,n=new Date(0,0,0,0,0,0,0),j=n.getYear(),f=n.getMonth()+1,p=1,k=n.getHours(),t=n.getMinutes(),
u=n.getSeconds();n=n.getMilliseconds();for(var s="",q;g<i.length;){c="";for(h=i.charAt(g);i.charAt(g)==h&&g<i.length;)c+=i.charAt(g++);if(c.indexOf("MMMM")>-1&&c.length>4)c="MMMM";if(c.indexOf("EEEE")>-1&&c.length>4)c="EEEE";if(c=="yyyy"||c=="yy"||c=="y"){if(c=="yyyy")e=l=4;if(c=="yy")e=l=2;if(c=="y"){l=2;e=4}j=m(b,d,l,e);if(j===null)return 0;d+=j.length;if(j.length==2){j=parseInt(j,10);j=j>70?1900+j:2E3+j}}else if(c=="MMMM"){h=f=0;for(c=o.date.monthsFull.length;h<c;h++){q=o.date.monthsFull[h];if(b.substring(d,
d+q.length).toLowerCase()==q.toLowerCase()){f=h+1;d+=q.length;break}}if(f<1||f>12)return 0}else if(c=="MMM"){h=f=0;for(c=o.date.monthsShort.length;h<c;h++){q=o.date.monthsShort[h];if(b.substring(d,d+q.length).toLowerCase()==q.toLowerCase()){f=h+1;d+=q.length;break}}if(f<1||f>12)return 0}else if(c=="EEEE"){h=0;for(c=o.date.daysFull.length;h<c;h++){q=o.date.daysFull[h];if(b.substring(d,d+q.length).toLowerCase()==q.toLowerCase()){d+=q.length;break}}}else if(c=="EEE"){h=0;for(c=o.date.daysShort.length;h<
c;h++){q=o.date.daysShort[h];if(b.substring(d,d+q.length).toLowerCase()==q.toLowerCase()){d+=q.length;break}}}else if(c=="MM"||c=="M"){f=m(b,d,1,2);if(f===null||f<1||f>12)return 0;d+=f.length}else if(c=="dd"||c=="d"){p=m(b,d,1,2);if(p===null||p<1||p>31)return 0;d+=p.length}else if(c=="hh"||c=="h"){k=m(b,d,1,2);if(k===null||k<1||k>12)return 0;d+=k.length}else if(c=="HH"||c=="H"){k=m(b,d,1,2);if(k===null||k<0||k>23)return 0;d+=k.length}else if(c=="KK"||c=="K"){k=m(b,d,1,2);if(k===null||k<0||k>11)return 0;
d+=k.length}else if(c=="kk"||c=="k"){k=m(b,d,1,2);if(k===null||k<1||k>24)return 0;d+=k.length;k--}else if(c=="mm"||c=="m"){t=m(b,d,1,2);if(t===null||t<0||t>59)return 0;d+=t.length}else if(c=="ss"||c=="s"){u=m(b,d,1,2);if(u===null||u<0||u>59)return 0;d+=u.length}else if(c=="SSS"||c=="SS"||c=="S"){n=m(b,d,1,3);if(n===null||n<0||n>999)return 0;d+=n.length}else if(c=="a"){s=b.substring(d,d+2).toLowerCase();if(s=="am")s="AM";else if(s=="pm")s="PM";else return 0;d+=2}else if(c!=b.substring(d,d+c.length))return 0;
else d+=c.length}if(d!=b.length)return 0;if(f==2)if(j%4===0&&j%100!==0||j%400===0){if(p>29)return 0}else if(p>28)return 0;if(f==4||f==6||f==9||f==11)if(p>30)return 0;if(k<12&&s=="PM")k=k-0+12;else if(k>11&&s=="AM")k-=12;return new Date(j,f-1,p,k,t,u,n)}else{g=function(r,v){if(typeof v=="undefined"||v==2)return(r>=0&&r<10?"0":"")+r;else{if(r>=0&&r<10)return"00"+r;if(r>=10&&r<100)return"0"+r;return r}};if(typeof i=="undefined")i=o.date.format;e=b.getYear();if(e<1E3)e=String(e+1900);m=b.getMonth()+1;
d=b.getDate();j=b.getDay();f=b.getHours();p=b.getMinutes();l=b.getSeconds();k=b.getMilliseconds();b={y:e,yyyy:e,yy:String(e).substring(2,4),M:m,MM:g(m),MMM:o.date.monthsShort[m-1],MMMM:o.date.monthsFull[m-1],d:d,dd:g(d),EEE:o.date.daysShort[j],EEEE:o.date.daysFull[j],H:f,HH:g(f)};b.h=f===0?12:f>12?f-12:f;b.hh=g(b.h);b.k=f!==0?f:24;b.kk=g(b.k);b.K=f>11?f-12:f;b.KK=g(b.K);b.a=f>11?"PM":"AM";b.m=p;b.mm=g(p);b.s=l;b.ss=g(l);b.S=k;b.SS=g(k);b.SSS=g(k,3);e="";g=0;c=h="";for(l=false;g<i.length;){c="";h=
i.charAt(g);if(h=="'"){g++;if(i.charAt(g)==h){e+=h;g++}else l=!l}else{for(;i.charAt(g)==h;)c+=i.charAt(g++);if(c.indexOf("MMMM")!=-1&&c.length>4)c="MMMM";if(c.indexOf("EEEE")!=-1&&c.length>4)c="EEEE";e+=typeof b[c]!="undefined"&&!l?b[c]:c}}return e}},number:function(b,i){var g,h,c,l,e;if(typeof b=="string"){g=o.number.groupingSeparator;c=o.number.decimalSeparator;l=b.indexOf(c);e=1;if(l!=-1)e=Math.pow(10,b.length-l-1);b=b.replace(new RegExp("["+g+"]","g"),"");b=b.replace(new RegExp("["+c+"]"),".");
return Math.round(b*e)/e}else{if(typeof i=="undefined"||i.length<1)i=o.number.format;g=",";h=i.lastIndexOf(g);c=".";l=i.indexOf(c);var m=g="";c=b<0;var d=i.substr(l+1).replace(/#/g,"").length,n=i.substr(l+1).length,j=10;b=Math.abs(b);if(l!=-1){m=o.number.decimalSeparator;if(n>0){e=1E3;j=Math.pow(j,n);var f=Math.round(parseInt(b*j*e-Math.round(b)*j*e,10)/e);f=String(f<0?Math.round(parseInt(b*j*e-parseInt(b,10)*j*e,10)/e):f);var p=b.toString().split(".");if(typeof p[1]!="undefined")for(e=0;e<n;e++)if(p[1].substr(e,
1)=="0"&&e<n-1&&f.length!=n)f="0"+f;else break;for(e=0;e<n-m.length;e++)f+="0";p="";for(e=0;e<f.length;e++){n=f.substr(e,1);if(e>=d&&n=="0"&&/^0*$/.test(f.substr(e+1)))break;p+=n}m+=p}if(m==o.number.decimalSeparator)m=""}if(l!==0){g=m!=""?String(parseInt(Math.round(b*j)/j,10)):String(Math.round(b));b=o.number.groupingSeparator;d=0;if(h!=-1){d=l!=-1?l-h:i.length-h;d--}if(d>0){h=0;j="";for(e=g.length;e--;){if(h!==0&&h%d===0)j=b+j;j=g.substr(e,1)+j;h++}g=j}h=/#|,/g;i=l!=-1?i.substr(0,l).replace(h,"").length:
i.replace(h,"").length;for(e=g.length;e<i;e++)g="0"+g}i=g+m;return(c?"-":"")+i}}}}()})(jQuery);

/* mambocar.js file */

$(document).ready(function(){

    $.format.locale({
        number: {
            groupingSeparator: '.',
            decimalSeparator: ','
        }
    });

    //  ===========================
    //  = Cargar bloques vía ajax =
    //  ===========================

    $('[data-load]').each(function(event) {
        $(this).load($(this).attr('data-load'), function(){
            $('[rel=tooltip]').tooltip();
        });
    });
    var ajaxLinks = '.dropdown-menu a, .pagination a';
    $('[data-load]').on('click', ajaxLinks, function(event) {
        event.preventDefault();

        $(this).parents('[data-load]').load($(this).attr('href'));
    });

    //  ====================================
    //  = Cambiar fotos en ficha del coche =
    //  ====================================

    $('.fotoCoche').on('click', function(event) {
        event.preventDefault();
        var that = $(this);
        var rel = that.attr('rel');

        $('.bordeFotoCochePeque').removeClass('selectedFoto');
        that.parent().addClass('selectedFoto');

        $('.bordeFotoCocheGrande').each(function() {
            var innerRel = $(this).attr('rel');

            if (innerRel == rel) {
                $(this).removeClass('hide');
            }
            else {
                $(this).addClass('hide');
            }
        });
    });

    $('.flash-notifications .close-button a').on('click', function(event) {
        event.preventDefault();
        var that = $(this);
        that.parent().parent().hide('slow');
    });

    //  ====================================
    //  = Enviar formulario de Reserva     =
    //  ====================================

    $('#boton-reservar-link').on('click', function(event) {
        event.preventDefault();

        //Found if theres any place checked
        founded = false;
        $('#rental-places-car-wrapper input').each(function() {
            if ($(this).is(':checked')) {
                founded = true;
            }
        });

        if (! founded) {
            $('#rental-places-error').removeClass('hide');
            return false;
        }

        //Submit the form
        $('#rental-request-form').submit();
    });

    $('#rental-places-car-wrapper input').on('change', function() {
        var that = $(this);

        if (that.val() == rentalPlaceWithFee) {
            var price = totalPrice + rentalPlaceFeeValue;
            $('#precio-total-reserva').text($.format.number(price, '#,##0')+' €');
        }
        else {
            $('#precio-total-reserva').text($.format.number(totalPrice, '#,##0')+' €');
        }
    });

});